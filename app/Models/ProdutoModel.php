<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table            = 'produtos';
    protected $primaryKey       = 'id';
    protected $returnType       = 'App\Entities\Produto';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['categoria_id', 'nome', 'slug', 'ingredientes', 'ativo', 'imagem'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';

    // Validation
    protected $validationRules = [
        'nome'     => 'required|max_length[120]|min_length[4]|is_unique[produtos.nome,id,{id}]',
        'ingredientes'     => 'required|max_length[1000]|min_length[10]',
        'categoria_id' => 'required|integer'

    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'min_length' => 'O nome deve ter no mínimo 4 caracteres.',
            'is_unique' => 'Esse produto já está cadastrada.'
        ],
        'ingredientes' => [
            'required' => 'Os ingredientes são obrigatórios.',
            'min_length' => 'O campo ingredientes deve ter no mínimo 10 caracteres.',
        ],
        'categoria_id' => [
            'required' => 'A categoria do produto é obrigatória.',
            'integer' => 'Escolha uma categoria válida',
        ],

    ];

    public function procurar($term)
    {
        if ($term === null) {
            return [];
        };

        return $this->select('id, nome')
            ->like('nome', $term)
            ->withDeleted(true)
            ->get()
            ->getResult();
    }

    public function desfazerexclusao(int $id)
    {
        return $this->protect(false)->where('id', $id)
            ->set('deletado_em', null)
            ->update();
    }


    //eventos callback
    protected $beforeInsert = ['criaSlug'];
    protected $beforeUpdate = ['criaSlug'];

    protected function criaSlug(array $data)
    {

        if (isset($data['data']['nome'])) {
            $data['data']['slug'] = mb_url_title($data['data']['nome'], '-', true);
        }
        return $data;
    }

    public function buscaProdutosWebHome()
    {
        return $this->select([
            'produtos.id',
            'produtos.nome',
            'produtos.ingredientes',
            'produtos.imagem',
            'produtos.slug',
            'categorias.id AS categoria_id',
            'categorias.nome AS categoria',
            'categorias.slug AS categoria_slug',
        ])
            ->selectMin('produtos_especificacoes.preco', 'min_preco')
            ->join('categorias', 'categorias.id = produtos.categoria_id')
            ->join('produtos_especificacoes', 'produtos_especificacoes.produto_id = produtos.id')
            ->where('produtos.ativo', true)
            ->groupBy('produtos.id')
            ->orderBy('categorias.nome', 'ASC')
            ->findAll();
    }

    public function exibeOpcoesProdutosParaCustomizar(int $categoria_id){
        return $this->select(['produtos.id', 'produtos.nome'])
                    ->join('produtos_especificacoes', 'produtos_especificacoes.produto_id = produtos.id')
                    ->where('produtos.categoria_id', $categoria_id)
                    ->where('produtos.ativo', true)
                    ->where('produtos_especificacoes.customizavel', true)
                    ->groupBy('produtos.nome')
                    ->findAll();
    }

    public function exibeOpcoesProdutosParaCustomizarSegundaMetade(int $produto_id, int $categoria_id){
        return $this->select(['produtos.id', 'produtos.nome'])
                    ->join('produtos_especificacoes', 'produtos_especificacoes.produto_id = produtos.id')
                    ->join('categorias', 'categorias.id = produtos.categoria_id')
                    ->where('produtos.id !=', $produto_id)
                    ->where('produtos.categoria_id', $categoria_id)
                    ->where('produtos.ativo', true)
                    ->where('produtos_especificacoes.customizavel', true)
                    ->groupBy('produtos.nome')
                    ->findAll();
    }
}
