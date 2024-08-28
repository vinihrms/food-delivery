<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Produto extends Entity
{
    protected $datamap = [];
    protected $dates   = ['criado_em', 'atualizado_em', 'deletado_em'];
    protected $casts   = [];

    public function combinaExtrasDosProdutos(array $extrasPrimeiroProduto, array $extrasSegundoProduto)
    {
        $extrasUnicos = [];

        $extrasCombinados = array_merge($extrasPrimeiroProduto, $extrasSegundoProduto);

        foreach ($extrasCombinados as $extra) {

            // não é o melhor jeito de fazer isso mas ta funcionando a filtragem
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

    public function recuperaMedidasEmComum(array $especificacoesPrimeiroProduto, array $especificacoesSegundoProduto)
    {
        $primeiroArrayMedidas = [];

        foreach ($especificacoesPrimeiroProduto as $especificacao) {
            if ($especificacao->customizavel) {
                array_push($primeiroArrayMedidas, $especificacao->medida_id);
            }
        }


        $segundoArrayMedidas = [];

        foreach ($especificacoesSegundoProduto as $especificacao) {
            if ($especificacao->customizavel) {
                array_push($segundoArrayMedidas, $especificacao->medida_id);
            }
        }

        return array_intersect($primeiroArrayMedidas, $segundoArrayMedidas);
    }
}
