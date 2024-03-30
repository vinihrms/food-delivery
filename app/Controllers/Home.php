<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function email(){
        $email = \Config\Services::email();

        $email->setFrom('your@example.com', 'Your Name');
        $email->setTo('viniciushermes13@gmail.com');
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');

        $email->setSubject('Testando email');
        $email->setMessage('AHJAHAHAHAHAHHAHAHAHAHAHAH');

        if($email->send()){
            echo 'Email enviado';
        } else {
            echo $email->printDebugger();
        }
    }
}