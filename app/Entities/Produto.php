<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Produto extends Entity
{
    protected $datamap = [];
    protected $dates   = ['criado_em', 'atualizado_em', 'deletado_em'];
    protected $casts   = [];

    public function combinaExtrasDosProdutos(array $extrasPrimeiroProduto, array $extrasSegundoProduto) {
        $extrasUnicos = [];
    
        $extrasCombinados = array_merge($extrasPrimeiroProduto, $extrasSegundoProduto);
    
        foreach ($extrasCombinados as $extra) {

            $extraExiste = false;
            foreach ($extrasUnicos as $extraUnico) {
                if ($extraUnico['nome'] === $extra->extra) {
                    $extraExiste = true;
                    break;
                }
            }

            if (!$extraExiste) {
                array_push($extrasUnicos, [
                    'id' => $extra->id,
                    'nome' => $extra->extra,
                    'preco' => $extra->preco,
                ]);
            }
        }
    
        return $extrasUnicos;
    }
    
    
}
