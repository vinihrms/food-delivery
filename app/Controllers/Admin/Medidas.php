<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Entities\Medida;

class Medidas extends BaseController
{
    
    private $medidaModel;

    public function __construct(){
        $this->medidaModel = new \App\Models\MedidaModel;
    }

    public function index()
    {
        $data = [
            'titulo' => 'Listando as medidas de produtos',
            'medidas' => $this->medidaModel->withDeleted(true)->paginate(8),
            'pager' => $this->medidaModel->pager
        ];

        return view('Admin/Medidas/index', $data);
    }

    public function procurar(){

        if (!$this->request->isAJAX()) {
            exit('Página não encontrada.');
        };

        $medidas = $this->medidaModel->procurar($this->request->getGet('term'));

        $retorno = [];

        foreach ($medidas as $medida) {
            $data['id'] = $medida->id;
            $data['value'] = $medida->nome;

            $retorno[] = $data;
        };

        return $this->response->setJSON($retorno);
    }

    public function show($id = null) {

        $medida = $this->buscaMedidaOu404($id);

        $data = [
            'titulo' => "Detalhando o medida $medida->nome",
            'medida' => $medida,
        ];

        return view('Admin/Medidas/show', $data);
        
    }

    private function buscaMedidaOu404(int $id = null) {
        if(!$id || !$medida = $this->medidaModel->withDeleted(true)->where('id', $id)->first()){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos a medida $id");
        }
        return $medida;
    }

    public function editar($id = null) {

        $medida = $this->buscaMedidaOu404($id);

        if($medida->deletado_em != null) {
            return redirect()->back()->with('info', "A medida $medida->nome encontra-se excluída. Portanto, não é possível editá-la.");
        }

        $data = [
            'titulo' => "Editando a medida $medida->nome",
            'medida' => $medida,
        ];


        return view('Admin/Medidas/editar', $data);
        
    }

    public function atualizar($id = null){
        if($this->request->getMethod() === 'post'){
            $medida = $this->buscaMedidaOu404($id);

            if($medida->deletado_em != null) {
                return redirect()->back()->with('info', "A medida $medida->nome encontra-se excluída. Portanto, não é possível editá-la.");
            }

            $medida->fill($this->request->getPost());

            if(!$medida->hasChanged()) {
                return redirect()->back()->with('info', 'Não há dados para atualizar.');
            }

            if($this->medidaModel->save($medida)){
                return redirect()->to(site_url("admin/medidas/show/$medida->id"))
                                ->with('sucesso', "A medida $medida->nome foi atualizada com sucesso.");
            } else {
                return redirect()->back()->with('errors_model', $this->medidaModel->errors())
                                ->with('atencao', 'Por favor, verifique os errors abaixo:')
                                ->withInput();
            }
        }
        else{
            /* nao é post */
            return redirect()->back();
        }
    }

    public function excluir($id = null) {

        $medida = $this->buscaMedidaOu404($id);

        if($medida->deletado_em != null) {
            return redirect()->back()->with('info', "A medida $medida->nome já encontra-se excluída.");
        }

        if ($medida->is_admin){
            return redirect()->back()->with('info', 'Não é possivel excluir uma medida <b>administrador</b>');
        }

        if($this->request->getMethod() === 'post'){
            $this->medidaModel->delete($id);
            return redirect()->to(site_url('admin/medidas'))->with('sucesso', "Medida $medida->nome excluída com sucesso.");
        }

        $data = [
            'titulo' => "Excluindo a medida $medida->nome",
            'medida' => $medida,
        ];

        return view('Admin/Medidas/excluir', $data);
        
    }

    public function desfazerExclusao($id = null) {

        $medida = $this->buscaMedidaOu404($id);

        if($medida->deletado_em == null){
            return redirect()->back()->with('info', 'Apenas medidas deletadas podem ser recuperadas.');
        }

        if($this->medidaModel->desfazerexclusao($id)){
            return redirect()->back()->with('sucesso', 'Medida recuperada com sucesso.');
        } else {
            return redirect()->back()->with('errors_model', $this->medidaModel->errors())
                                ->with('atencao', 'Por favor, verifique os errors abaixo')
                                ->withInput();
        }
        
    }

    public function criar() {

        $medida = new Medida();

        $data = [
            'titulo' => "Criando nova medida",
            'medida' => $medida,
        ];

        return view('Admin/Medidas/criar', $data);
        
    }

    public function cadastrar(){
        if($this->request->getMethod() === 'post'){
            

            $medida = new Medida($this->request->getPost());

            if($this->medidaModel->save($medida)){
                return redirect()->to(site_url("admin/medidas/show/".$this->medidaModel->getInsertID()))
                                ->with('sucesso', "A medida $medida->nome foi criada com sucesso.");
            } else {
                return redirect()->back()->with('errors_model', $this->medidaModel->errors())
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
