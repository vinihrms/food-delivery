<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Entities\Produto;
use App\Entities\Categoria;


class Produtos extends BaseController
{
    private $produtoModel;
    private $categoriaModel;

    public function __construct(){
        $this->produtoModel = new \App\Models\ProdutoModel();
        $this->categoriaModel = new \App\Models\categoriaModel();
    }

    public function index(){
        $data = [
            'titulo' => 'Listando aos produtos',
            'produtos' => $this->produtoModel->select('produtos.*, categorias.nome AS categoria')
                                            ->join('categorias', 'categorias.id = produtos.categoria_id')
                                            ->withDeleted(true)->paginate(8),
            'pager' => $this->produtoModel->pager
        ];

        return view('Admin/Produtos/index', $data);
    }

    public function procurar(){

        if (!$this->request->isAJAX()) {
            exit('Página não encontrada.');
        };

        $produtos = $this->produtoModel->procurar($this->request->getGet('term'));

        $retorno = [];

        foreach ($produtos as $produto) {
            $data['id'] = $produto->id;
            $data['value'] = $produto->nome;

            $retorno[] = $data;
        };

        return $this->response->setJSON($retorno);
    }

    public function show($id = null) {

        $produto = $this->buscaProdutoOu404($id);

        $data = [
            'titulo' => "Detalhando o produto $produto->nome",
            'produto' => $produto,
        ];

        return view('Admin/Produtos/show', $data);
        
    }

    private function buscaProdutoOu404(int $id = null) {
        if(!$id || !$produto = $this->produtoModel->select('produtos.*, categorias.nome AS categoria')
                                                    ->join('categorias', 'categorias.id = produtos.categoria_id')
                                                    ->where('produtos.id', $id)
                                                    ->withDeleted(true)
                                                    ->first()){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos o produto $id");
        }
        return $produto;
    }

    public function editar($id = null) {

        $produto = $this->buscaProdutoOu404($id);

        $data = [
            'titulo' => "Editando o produto $produto->nome",
            'produto' => $produto,
            'categorias' => $this->categoriaModel->where('ativo', true)->findAll()
        ];

        return view('Admin/Produtos/editar', $data);
        
    }

    public function atualizar($id = null){
        if($this->request->getMethod() === 'post'){
            $produto = $this->buscaProdutoOu404($id);

            if($produto->deletado_em != null) {
                return redirect()->back()->with('info', "A produto $produto->nome encontra-se excluída. Portanto, não é possível editá-la.");
            }

            $produto->fill($this->request->getPost());

            if(!$produto->hasChanged()) {
                return redirect()->back()->with('info', 'Não há dados para atualizar.');
            }

            if($this->produtoModel->save($produto)){
                return redirect()->to(site_url("admin/produtos/show/$produto->id"))
                                ->with('sucesso', "A produto $produto->nome foi atualizada com sucesso.");
            } else {
                return redirect()->back()->with('errors_model', $this->produtoModel->errors())
                                ->with('atencao', 'Por favor, verifique os errors abaixo:')
                                ->withInput();
            }
        }
        else{
            /* nao é post */
            return redirect()->back();
        }
    }

    public function editarImagem($id = null){
        $produto = $this->buscaProdutoOu404($id);

        $data = [
            'titulo' => "Editando a imagem do produto $produto->nome",
            'produto' => $produto,
        ];

        return view('Admin/Produtos/editar_imagem', $data);
        
    }

    public function upload($id = null){
        $produto = $this->buscaProdutoOu404($id);

        $imagem = $this->request->getFile('foto_produto');

        if(!$imagem->isValid()){
            $codigoErro = $imagem->getError();

            if($codigoErro == UPLOAD_ERR_NO_FILE){
                return redirect()->back()->with('atencao', 'Nenhum arquivo foi selecionado.');
            }
        }

        $tamanhoImagem = $imagem->getSizeByUnit('mb');

        if($tamanhoImagem > 2){
            return redirect()->back()->with('atencao', 'O arquivo selecionado é muito grande. O máximo permitido é 2MB.');

        }

        $tipoImagem = $imagem->getMimeType();

        $tipoImagemLimpo = explode('/', $tipoImagem);

        $tiposPermitios = [
            'jpeg',
            'jpg',
            'png',
            'webp',
        ];

        if(!in_array($tipoImagemLimpo[1], $tiposPermitios)){
            return redirect()->back()->with('atencao', 'O arquivo não tem o formato permitido. Apenas: '. implode(', ', $tiposPermitios). '.');
        }

        list($largura, $altura) = getimagesize($imagem->getPathname());

        if($largura < "400" || $altura < "400" ){
            return redirect()->back()->with('atencao', 'A imagem não pode ser menor que 400x400 pixels.');
        }

        //------------------------ A PARTIR DAQUI FAZEMOS O STORE DA IMAGEM

        
        $imagemCaminho = $imagem->store('produtos');

        $imagemCaminho = WRITEPATH . 'uploads/' . $imagemCaminho;
        
        //resize da mesma imagem 
        service('image')
            ->withFile($imagemCaminho)
            ->fit(400, 400, 'center')
            ->save($imagemCaminho);

        $imagemAntiga = $produto->imagem;

        $produto->imagem = $imagem->getName();

        $this->produtoModel->save($produto);

        $caminhoImagem = WRITEPATH.'uploads/produtos/'.$imagemAntiga;

        if(is_file($caminhoImagem)){

            unlink($caminhoImagem);
        
        }

        return redirect()->to(site_url("admin/produtos/show/$produto->id"))->with('sucesso', 'Imagem alterada com sucesso.');
    }

    public function imagem(string $imagem = null){

        if($imagem){
            
            $caminhoImagem = WRITEPATH.'uploads/produtos/'.$imagem;

            $infoImagem = new \finfo(FILEINFO_MIME);

            $tipoImagem = $infoImagem->file($caminhoImagem);

            header("Content-Type: $tipoImagem");

            header("Content-Length: ".filesize($caminhoImagem));

            readfile($caminhoImagem);

            exit;
        }
    }

    public function criar() {

        $produto = new Produto();

        $data = [
            'titulo' => "Criando novo produto",
            'produto' => $produto,
            'categorias' => $this->categoriaModel->where('ativo', true)->findAll()
        ];

        return view('Admin/Produtos/criar', $data);
        
    }

    public function cadastrar(){
        if($this->request->getMethod() === 'post'){
            

            $produto = new Produto($this->request->getPost());

            if($this->produtoModel->save($produto)){
                return redirect()->to(site_url("admin/produtos/show/".$this->produtoModel->getInsertID()))
                                ->with('sucesso', "O produto $produto->nome foi criado com sucesso.");
            } else {
                return redirect()->back()->with('errors_model', $this->produtoModel->errors())
                                ->with('atencao', 'Por favor, verifique os errors abaixo:')
                                ->withInput();
            }
        }
        else{
            /* nao é post */
            return redirect()->back();
        }
    }


}
