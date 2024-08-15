<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data = [
            'titulo' => 'Seja muito bem vindo(a)!'
        ];

        return view('Home/index', $data);
    }


}