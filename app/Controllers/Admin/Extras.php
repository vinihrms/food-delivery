<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Entities\Extra;

class Extras extends BaseController
{

    private $extraModel;

    public function __construct() {
        $this->extraModel = new \App\Models\ExtraModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Listando os extras de produtos',
            'extras' => $this->extraModel->withDeleted(true)->paginate(8),
            'pager' => $this->extraModel->pager
        ];

        return view('Admin/Extras/index', $data);
    }

    public function procurar(){

        if (!$this->request->isAJAX()) {
            exit('Página não encontrada.');
        };

        $extras = $this->extraModel->procurar($this->request->getGet('term'));

        $retorno = [];

        foreach ($extras as $extra) {
            $data['id'] = $extra->id;
            $data['value'] = $extra->nome;

            $retorno[] = $data;
        };

        return $this->response->setJSON($retorno);
    }

    public function show($id = null) {

        $extra = $this->buscaExtraOu404($id);

        $data = [
            'titulo' => "Detalhando o extra $extra->nome",
            'extra' => $extra,
        ];

        return view('Admin/Extras/show', $data);
        
    }

    private function buscaExtraOu404(int $id = null) {
        if(!$id || !$extra = $this->extraModel->withDeleted(true)->where('id', $id)->first()){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos a extra $id");
        }
        return $extra;
    }

    public function editar($id = null) {

        $extra = $this->buscaExtraOu404($id);

        if($extra->deletado_em != null) {
            return redirect()->back()->with('info', "A extra $extra->nome encontra-se excluída. Portanto, não é possível editá-la.");
        }

        $data = [
            'titulo' => "Editando a extra $extra->nome",
            'extra' => $extra,
        ];


        return view('Admin/Extras/editar', $data);
        
    }

    public function atualizar($id = null){
        if($this->request->getMethod() === 'post'){
            $extra = $this->buscaExtraOu404($id);

            if($extra->deletado_em != null) {
                return redirect()->back()->with('info', "O extra $extra->nome encontra-se excluído. Portanto, não é possível editá-lo.");
            }

            $extra->fill($this->request->getPost());

            if(!$extra->hasChanged()) {
                return redirect()->back()->with('info', 'Não há dados para atualizar.');
            }

            if($this->extraModel->save($extra)){
                return redirect()->to(site_url("admin/extras/show/$extra->id"))
                                ->with('sucesso', "O extra $extra->nome foi atualizado com sucesso.");
            } else {
                return redirect()->back()->with('errors_model', $this->extraModel->errors())
                                ->with('atencao', 'Por favor, verifique os errors abaixo:')
                                ->withInput();
            }
        }
        else{
            /* nao é post */
            return redirect()->back();
        }
    }

    public function criar() {

        $extra = new Extra();

        $data = [
            'titulo' => "Criando novo extra",
            'extra' => $extra,
        ];

        return view('Admin/Extras/criar', $data);
        
    }

    public function cadastrar(){
        if($this->request->getMethod() === 'post'){
            

            $extra = new Extra($this->request->getPost());

            if($this->extraModel->save($extra)){
                return redirect()->to(site_url("admin/extras/show/".$this->extraModel->getInsertID()))
                                ->with('sucesso', "O extra $extra->nome foi criado com sucesso.");
            } else {
                return redirect()->back()->with('errors_model', $this->extraModel->errors())
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

        $extra = $this->buscaExtraOu404($id);

        if($extra->deletado_em != null) {
            return redirect()->back()->with('info', "O extra $extra->nome já encontra-se excluído.");
        }

        if ($extra->is_admin){
            return redirect()->back()->with('info', 'Não é possivel excluir um extra <b>administrador</b>');
        }

        if($this->request->getMethod() === 'post'){
            $this->extraModel->delete($id);
            return redirect()->to(site_url('admin/extras'))->with('sucesso', "Extra $extra->nome excluído com sucesso.");
        }

        $data = [
            'titulo' => "Excluindo o extra $extra->nome",
            'extra' => $extra,
        ];

        return view('Admin/Extras/excluir', $data);
        
    }

    public function desfazerExclusao($id = null) {

        $extra = $this->buscaExtraOu404($id);

        if($extra->deletado_em == null){
            return redirect()->back()->with('info', 'Apenas extras deletados podem ser recuperados.');
        }

        if($this->extraModel->desfazerexclusao($id)){
            return redirect()->back()->with('sucesso', 'Extra recuperado com sucesso.');
        } else {
            return redirect()->back()->with('errors_model', $this->extraModel->errors())
                                ->with('atencao', 'Por favor, verifique os errors abaixo')
                                ->withInput();
        }
        
    }
}
