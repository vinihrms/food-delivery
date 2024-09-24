<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use GuzzleHttp\RetryMiddleware;
use Predis\Command\Argument\Server\To;

class Conta extends BaseController
{
    private $usuario;
    private $usuarioModel;

    public function __construct()
    {
        $this->usuario = service('autenticacao')->pegaUsuarioLogado();
        $this->usuarioModel = new \App\Models\UsuarioModel();
    }

    public function index() {}

    public function show()
    {
        $data = [
            'titulo' => 'Meus dados',
            'usuario' => $this->usuario
        ];

        return view('Conta/show', $data);
    }
    public function editar()
    {

        if (!session()->has('pode_editar_ate')) {
            return redirect()->to(site_url('conta/autenticar'));
        }

        if (session()->get('pode_editar_ate') < time()) {
            return redirect()->to(site_url('conta/autenticar'));
        }



        $data = [
            'titulo' => 'Editar meu dados',
            'usuario' => $this->usuario
        ];

        return view('Conta/editar', $data);
    }

    public function autenticar()
    {
        $data = [
            'titulo' => 'Insira novamente a sua senha',
            'usuario' => $this->usuario
        ];

        return view('Conta/autenticar', $data);
    }

    public function processaAutenticar()
    {

        if ($this->request->getMethod() == 'post') {

            if ($this->usuario->verificaPassword($this->request->getPost('password'))) {
                session()->set('pode_editar_ate', time() + 300); // 300 = 5 minutos

                return redirect()->to(site_url('conta/editar'));
            } else {
                return redirect()->back()->with('atencao', 'Senha inválida');
            }
        } else {
            return redirect()->back();
        }
    }

    public function atualizar()
    {
        if ($this->request->getMethod() == 'post') {

            $this->usuario->fill($this->request->getPost());

            if (!$this->usuario->hasChanged()) {
                return redirect()->back()->with('info', 'Não há dados para atualizar');
            }

            if ($this->usuarioModel->save($this->usuario)) {
                return redirect()->to(site_url('conta/show'))->with('sucesso', 'Seus dados foram atualizados com sucesso.');
            } else {

                return redirect()->back()->with('errors_model', $this->usuarioModel->errors())
                    ->with('atencao', 'Por favor, verifique os errors abaixo e tente novamente.')
                    ->withInput();
            }
        } else {
            return redirect()->back();
        }
    }

    public function editarSenha()
    {
        $data = [
            'titulo' => 'Alterar senha',
            'usuario' => $this->usuario
        ];

        return view('Conta/editar_senha', $data);
    }

    public function atualizarSenha()
    {

        if ($this->request->getMethod() == 'post') {

            if (!$this->usuario->verificaPassword($this->request->getPost('current_password'))) {
                return redirect()->back()->with('atencao', 'Senha atual inválida');
            }

            $this->usuario->fill($this->request->getPost());

            if ($this->usuarioModel->save($this->usuario)) {
                return redirect()->to(site_url('conta/show'))->with('sucesso', 'Senha atualizada com sucesso.');
            } else {

                return redirect()->back()->with('errors_model', $this->usuarioModel->errors())
                    ->with('atencao', 'Por favor, verifique os errors abaixo e tente novamente.')
                    ->withInput();
            }
        } else {
            return redirect()->back();
        }
    }
}
