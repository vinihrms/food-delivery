<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>


<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<div class="row">
    <div class="col-lg-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-header bg-primary pb-0 pt-4">
                <h4 class="card-title text-white "><?php echo esc($titulo); ?></h4>
            </div>
            <div class="card-body">
    
    
                <div class="text-center">
                    <?php if($produto->imagem  && $produto->deletado_em == null):?>
                    <img class="card-img-top w-75 mb-4" src="<?php echo site_url("admin/produtos/imagem/$produto->imagem"); ?>" alt="<?php echo esc($produto->nome); ?>">
        
                    <?php else :?>
                    <img class="card-img-top w-75 mb-4" src="<?php echo site_url('admin/images/sem-imagem.jpg')?>"
                        alt="Sem imagem por enquanto">
        
                    <?php endif?>
                </div>
    
                <?php if($produto->deletado_em == null): ?>
                    <a href="<?php echo site_url("admin/produtos/editarimagem/$produto->id"); ?>"
                        class="btn btn-outline-primary btn-sm mb-2" data-toggle="tooltip"
                        data-placement="top" title="Editar">
                        <i class="mdi mdi-image btn-icon-prepend"></i>
                        Editar imagem
                    </a>
                    <hr>
                <?php endif; ?>
    
                <p class="card-text">
                    <span class="font-weight-bold">Nome: </span>
                    <?php echo esc($produto->nome) ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Categoria: </span>
                    <?php echo esc($produto->categoria) ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Ingredientes: </span>
                    <?php echo esc($produto->ingredientes) ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Slug: </span>
                    <?php echo esc($produto->slug) ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Ativo: </span>
                    <?php echo $produto->ativo ? 'Sim' : 'Não'; ?>
                </p>
    
                <p class="card-text">
                    <span class="font-weight-bold">Criado: </span>
                    <?php echo $produto->criado_em->humanize() ?>
                </p>
    
                <?php if($produto->deletado_em == null): ?>
    
                <p class="card-text">
                    <span class="font-weight-bold">Atualizado: </span>
                    <?php echo $produto->atualizado_em->humanize() ?>
                </p>
    
                <?php else:?>
                <p class="card-text">
                    <span class="font-weight-bold text-danger">Excluído: </span>
                    <?php echo $produto->deletado_em->humanize() ?>
                </p>
    
                <?php endif?>
    
    
                <div class="mt-4">
    
                    <?php if($produto->deletado_em == null): ?>
    
                    <a href="<?php echo site_url("admin/produtos/editar/$produto->id"); ?>"
                        class="btn btn-dark btn-sm btn-icon-tex btn-icon-prepend btn-icon-text mr-2" data-toggle="tooltip"
                        data-placement="top" title="Editar produto">
                        <i class="mdi mdi-lead-pencil btn-icon-prepend"></i>
                        Editar
                    </a>
                    <a href="<?php echo site_url("admin/produtos/extras/$produto->id"); ?>"
                        class="btn btn-outline-success btn-sm btn-icon-tex btn-icon-prepend btn-icon-text mr-2" data-toggle="tooltip"
                        data-placement="top" title="Gerenciar Extras">
                        <i class="mdi mdi-box-cutter btn-icon-prepend"></i>
                        Extras
                    </a>
                    <a href="<?php echo site_url("admin/produtos/especificacoes/$produto->id"); ?>"
                        class="btn btn-outline-warning btn-sm btn-icon-tex btn-icon-prepend btn-icon-text mr-2" data-toggle="tooltip"
                        data-placement="top" title="Gerenciar especificações">
                        <i class="mdi mdi-stack-overflow btn-icon-prepend"></i>
                        Especificacões
                    </a>
                    <a href="<?php echo site_url("admin/produtos/excluir/$produto->id"); ?>"
                        class="btn btn-danger btn-sm btn-icon-tex btn-icon-prepend mr-2 mt-2" data-toggle="tooltip"
                        data-placement="top" title="Excluír produto">
                        <i class="mdi mdi-delete btn-icon-prepend"></i>
                        Excluir
                    </a>
    
                    <?php else:?>
                    <a href="<?php echo site_url("admin/produtos/desfazerexclusao/$produto->id"); ?>"
                        class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Recuperar produto">
                        <i class="mdi mdi-undo btn-icon-prepend"></i>
                        Recuperar
                    </a>
    
                    <?php endif?>
    
    
    
                    <a href="<?php echo site_url("admin/produtos"); ?>"
                        class="btn btn-light btn-sm btn-icon-tex btn-icon-prepend mt-2" data-toggle="tooltip"
                        data-placement="top" title="Voltar">
                        <i class="mdi mdi-keyboard-backspace btn-icon-prepend"></i>
                        Voltar
                    </a>
                </div>
            </div>
    
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>


<?php echo $this->endSection(); ?>