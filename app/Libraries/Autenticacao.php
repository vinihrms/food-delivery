<?php

/*
    * cuidará da autenticacao
*/


class Autenticacao {
    private $usuario;

    public function login(string $email, string $password){
        $usuarioModel = new App\Models\UsuarioModel();

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

    private function logaUsuario(object $usuario){
        $session = session();
        $session->regenerate();
        $session->set('usuario_id', $usuario->id);
    }

}
