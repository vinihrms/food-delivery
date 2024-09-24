<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function novo()
    {
        $data = [
            'titulo' => 'Reazlie o login',
        ];

        return view('Login/novo', $data);
    }

    public function criar() {
        if($this->request->getMethod() === 'post'){

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $autenticacao = service('autenticacao');
        
            if($autenticacao->login($email, $password)){
                $usuario = $autenticacao->pegaUsuarioLogado();

                if(!$usuario->is_admin){

                    if(session()->has('carrinho')){

                        return redirect()->to(site_url('carrinho'));

                    }

                    return redirect()->to(site_url('/'));
                }

                return redirect()->to(site_url('admin/home'))->with('sucesso', "Olá $usuario->nome, que bom ter você de volta!");
            }else{
                return redirect()->back()->with('atencao', 'Não encontramos suas credencias de acesso.');
            }

            } else {
                return redirect()->back();
        }
    }

    //logout redireciona para uma mensagem de saída
    public function logout() {
        service('autenticacao')->logout();
        
        return redirect()->to(site_url('login/mostraMensagemLogout'));
    }
    
    public function mostraMensagemLogout(){

        return redirect()->to(site_url('login'))->with('info', 'Esperamos ver você novamente.');
    }
}
