<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Entities\Usuario;

class Usuarios extends BaseController
{
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new \App\Models\UsuarioModel();
    }
    
    public function index()
    {
        $data = [
            'titulo' => 'Listando os usuários',
            'usuarios' => $this->usuarioModel->withDeleted()->paginate(8),
            'pager' => $this->usuarioModel->pager,

        ];

        return view('Admin/Usuarios/index', $data);
    }


    /**
     *retorna usuarios no complete
     * recebe string
     * retorna array usuarios
     */
    public function procurar(){

        if (!$this->request->isAJAX()) {
            exit('Página não encontrada.');
        };

        $usuarios = $this->usuarioModel->procurar($this->request->getGet('term'));

        $retorno = [];

        foreach ($usuarios as $usuario) {
            $data['id'] = $usuario->id;
            $data['value'] = $usuario->nome;

            $retorno[] = $data;
        };

        return $this->response->setJSON($retorno);
    }

    public function criar() {

        $usuario = new Usuario();

        $data = [
            'titulo' => "Cadastrando novo usuário",
            'usuario' => $usuario,
        ];

        return view('Admin/Usuarios/criar', $data);
        
    }

    public function cadastrar(){
        if($this->request->getMethod() === 'post'){
            $usuario = new Usuario($this->request->getPost());


            if($this->usuarioModel->protect(false)->save($usuario)){
                return redirect()->to(site_url("admin/usuarios/show/".$this->usuarioModel->getInsertID()))
                                ->with('sucesso', "O usuário $usuario->nome foi cadastrado com sucesso.");
            } else {
                return redirect()->back()->with('errors_model', $this->usuarioModel->errors())
                                ->with('atencao', 'Por favor, verifique os errors abaixo:')
                                ->withInput();
            }
        }
        else{
            /* nao é post */
            return redirect()->back();
        }
    }

        public function show($id = null) {

            $usuario = $this->buscaUsuarioOu404($id);

            $data = [
                'titulo' => "Detalhando o usuário $usuario->nome",
                'usuario' => $usuario,
            ];

            return view('Admin/Usuarios/show', $data);
            
        }
    /**
     * recebe id
     * retorna objeto usuario
     */

    private function buscaUsuarioOu404(int $id = null) {
        if(!$id || !$usuario = $this->usuarioModel->withDeleted(true)->where('id', $id)->first()){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos o usuário $id");
        }
        return $usuario;
    }

    
    public function editar($id = null) {

        $usuario = $this->buscaUsuarioOu404($id);

        if($usuario->deletado_em != null) {
            return redirect()->back()->with('info', "O usuário $usuario->nome encontra-se excluído. Portanto, não é possível editá-lo.");
        }

        $data = [
            'titulo' => "Editando o usuário $usuario->nome",
            'usuario' => $usuario,
        ];


        return view('Admin/Usuarios/editar', $data);
        
    }

    public function atualizar($id = null){
        if($this->request->getMethod() === 'post'){
            $usuario = $this->buscaUsuarioOu404($id);

            if($usuario->deletado_em != null) {
                return redirect()->back()->with('info', "O usuário $usuario->nome encontra-se excluído. Portanto, não é possível editá-lo.");
            }

            $post = $this->request->getPost();

            if(empty($post['password'])) {
                $this->usuarioModel->desabilitaValidacaoSenha();
                unset($post['password']);
                unset($post['password_confirmation']);
            }

            $usuario->fill($post);

            if(!$usuario->hasChanged()) {
                return redirect()->back()->with('info', 'Não há dados para atualizar.');
            }

            if($this->usuarioModel->protect(false)->save($usuario)){
                return redirect()->to(site_url("admin/usuarios/show/$usuario->id"))
                                ->with('sucesso', "O usuário $usuario->nome foi atualizado com sucesso.");
            } else {
                return redirect()->back()->with('errors_model', $this->usuarioModel->errors())
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

        $usuario = $this->buscaUsuarioOu404($id);

        if($usuario->deletado_em != null) {
            return redirect()->back()->with('info', "O usuário $usuario->nome já encontra-se excluído.");
        }

        if ($usuario->is_admin){
            return redirect()->back()->with('info', 'Não é possivel excluir um usuário <b>administrador</b>');
        }

        if($this->request->getMethod() === 'post'){
            $this->usuarioModel->delete($id);
            return redirect()->to(site_url('admin/usuarios'))->with('sucesso', "Usuário $usuario->nome excluído com sucesso.");
        }

        $data = [
            'titulo' => "Excluindo o usuário $usuario->nome",
            'usuario' => $usuario,
        ];

        return view('Admin/Usuarios/excluir', $data);
        
    }

    public function desfazerExclusao($id = null) {

        $usuario = $this->buscaUsuarioOu404($id);

        if($usuario->deletado_em == null){
            return redirect()->back()->with('info', 'Apenas usuários deletados podem ser recuperados.');
        }

        if($this->usuarioModel->desfazerexclusao($id)){
            return redirect()->back()->with('sucesso', 'Usuário recuperado com sucesso.');
        } else {
            return redirect()->back()->with('errors_model', $this->usuarioModel->errors())
                                ->with('atencao', 'Por favor, verifique os errors abaixo')
                                ->withInput();
        }
        
    }

}