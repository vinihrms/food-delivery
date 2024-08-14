<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpedienteModel extends Model
{
    protected $table            = 'expediente';
    protected $returnType       = 'object';
    protected $allowedFields    = ['abertura', 'fechamento', 'situacao'];

    protected bool $allowEmptyInserts = false;


    // Validation
    protected $validationRules      = [
        'abertura'        => 'required',
        'fechamento'        => 'required',

    ];
    protected $validationMessages   = [
        'abertura' => [
            'required' => 'A abertura é obrigatória.',
        ],
        'fechamento' => [
            'required' => 'O fechamento é obrigatório.',
        ],
    ];

}
