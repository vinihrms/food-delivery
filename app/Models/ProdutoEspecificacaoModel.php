<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoEspecificacaoModel extends Model
{
    protected $table            = 'produtos_especificacoes';
    protected $returnType       = 'object';
    protected $allowedFields    = ['produto_id', 'medida_id', 'preco', 'customizavel'];

    protected $validationRules = [
        'medida_id'     => 'required|integer',
        'preco'     => 'required|greater_than[0]',
        'customizavel'     => 'required|integer',
    ];
    
    protected $validationMessages = [
        'medida_id' => [
            'required' => 'O campo medida é obrigatório.',
        ],
        'preco' => [
            'required' => 'O campo preço é obrigatório.',
            'greater_than' => 'O preço deve ser maior do que zero'
        ],
        'customizavel' => [
            'required' => 'O campo customizável é obrigatório.',
        ],
    ];

    public function buscaEspecificacoesDoProduto(int $produto_id, int $quantidade_paginacao) {
        return $this->select('medidas.nome AS medida, produtos_especificacoes.*')
                    ->join('medidas', 'medidas.id = produtos_especificacoes.medida_id')
                    ->join('produtos', 'produtos.id = produtos_especificacoes.produto_id')
                    ->where('produtos_especificacoes.produto_id', $produto_id)
                    ->paginate($quantidade_paginacao);
    }

    public function buscaEspecificacoesDoProdutoDetalhes(int $produto_id){
        return $this->select('medidas.nome, produtos_especificacoes.id AS especificacao_id, produtos_especificacoes.preco, produtos_especificacoes.customizavel')
        ->join('medidas', 'medidas.id = produtos_especificacoes.medida_id')
        ->join('produtos', 'produtos.id = produtos_especificacoes.produto_id')
        ->where('produtos_especificacoes.produto_id', $produto_id)
        ->findAll();
    }
}
