<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Registrar extends BaseController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new \App\Models\UsuarioModel();


    }

    public function novo()
    {
        $data = [
            'titulo' => 'Criar nova conta',

        ];

        return view('Registrar/novo', $data);
    }

    public function criar() {
        if($this->request->getMethod() === 'post'){

            $usuario = new \App\Entities\Usuario($this->request->getPost());

            $this->usuarioModel->desabilitaValidacaoTelefone();


            $usuario->iniciarAtivacao();

            if($this->usuarioModel->insert($usuario)){

                $this->enviaEmailParaAtivarConta($usuario);
                
                return redirect()->to(site_url('registrar/ativacaoenviada'));
                
            } else {
                return redirect()->back()->with('errors_model', $this->usuarioModel->errors())
                                ->with('atencao', 'Por favor, verifique os errors abaixo')
                                ->withInput();
            }

        } else {
            return redirect()->back();
        }
    }

    public function ativacaoEnviada() {
        $data = [
            'titulo' => 'Email de ativação da conta enviado para a sua caixa de entrada',

        ];

        return view('Registrar/ativacao_enviado', $data);
    }

    public function ativar(string $token = null)
    {
        if ($token === null) {
            return redirect()->to(site_url('/login'))->with('erro', 'Token inválido ou ausente.');
        }
    
        $sucesso = $this->usuarioModel->ativarContaPeloToken($token);
    
        if ($sucesso) {
            return redirect()->to(site_url('/login'));
        } else {
            return redirect()->to(site_url('/login'));
        }
    }
    

    private function enviaEmailParaAtivarConta(object $usuario)
    {
        $email = service('email');
        $email->setFrom('no-reply@fooddelivery.com', 'Food Delivery');
        $email->setTo($usuario->email);
        $email->setSubject('Ativação de conta');
        
        $mensagem = view('Registrar/ativacao_email', ['token' => $usuario->token]);
        $email->setMessage($mensagem);
        
        $email->send();
    }
}

        
