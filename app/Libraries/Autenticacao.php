<?php

namespace App\Libraries;

/*
    * cuidará da autenticacao
*/


class Autenticacao {
    private $usuario;

    public function login(string $email, string $password){
        $usuarioModel = new \App\Models\UsuarioModel();

        $usuario = $usuarioModel->buscaUsuarioPorEmail($email);
        /*se nao encontra user por email retorna false*/
        if($usuario == null) {
            return false;
        }
        // se a senha nao combinar com o hash retorna false
        if(!$usuario->verificaPassword($password)){
            return false;
        }

        //só usuario ativo pode logar
        if(!$usuario->ativo){
            return false;
        }

        //loga o usuario regenerando a sessao com o metodo logausuario
        $this->logaUsuario($usuario);

        return true; //esse metodo vai retornar booleano. login true ou false

    }

    public function logout() {
        session()->destroy();
    }

    public function pegaUsuarioLogado(){
        
        //nao esquecer de compartilhar a instancia com o services
        if($this->usuario == null){
            $this->usuario = $this->pegaUsuarioDaSessao();
        }   

        //retornamos o usuasio que foi definido no inicio da classe
        return $this->usuario;
    }

    /*
    *@return boolean
    *retorna true se o pegaUsuarioLogado nao for nulo. ou seja, esta logado
    */
    public function estaLogado() {
        return $this->pegaUsuarioLogado() != null;

    }

    private function pegaUsuarioDaSessao(){
        if(!session()->has('usuario_id')){
            return null;
        }

        //instanciamos model usuario
        $usuarioModel = new \App\Models\UsuarioModel();

        //recupera a chave do usuario da sessao pelo usuario id
        $usuario = $usuarioModel->find(session()->get('usuario_id'));

        //retorna o objeto usuario se ele for encontrado e estiver ATIVO
        if($usuario && $usuario->ativo){
            return $usuario;
        }
    }


    private function logaUsuario(object $usuario){
        $session = session();
        $session->regenerate();
        $session->set('usuario_id', $usuario->id);
    }

}
