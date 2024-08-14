<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Expedientes extends BaseController
{

    private $expedienteModel;

    public function __construct()
    {
        $this->expedienteModel = new \App\Models\ExpedienteModel();
    }

    public function expedientes()
    {

        if($this->request->getMethod() === 'post'){
            $postExpedientes = $this->request->getPost();

            $arrayExpedientes = [];

            for($i = 0; $i < count($postExpedientes['dia_descricao']); $i++){
                array_push($arrayExpedientes, [
                    'dia_descricao' => $postExpedientes['dia_descricao'][$i],
                    'abertura' => $postExpedientes['abertura'][$i],
                    'fechamento' => $postExpedientes['fechamento'][$i],
                    'situacao' => $postExpedientes['situacao'][$i],
                ]);
            }

            $this->expedienteModel->updateBatch($arrayExpedientes, 'dia_descricao');

            return redirect()->back()->with('sucesso', 'Expedientes atualizados com sucesso');

            die; 
        }


        $data = [
            'titulo' => 'Gerenciar o horário de funcionamento',
            'expedientes' => $this->expedienteModel->findAll()
        ];

        return view('Admin/Expedientes/expedientes', $data);
    }
    
}
