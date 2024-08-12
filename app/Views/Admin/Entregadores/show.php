<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>


<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<div class="row">
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-header bg-primary pb-0 pt-4">
                <h4 class="card-title text-white "><?php echo esc($titulo); ?></h4>
            </div>
            <div class="card-body">
    
    
                <div class="text-center">
                    <?php if ($entregador->imagem  && $entregador->deletado_em == null): ?>
                        <img class="card-img-top w-75 mb-4" src="<?php echo site_url("admin/entregadores/imagem/$entregador->imagem"); ?>" alt="<?php echo esc($entregador->nome); ?>">
    
                    <?php else : ?>
                        <img class="card-img-top w-75 mb-4" src="<?php echo site_url('admin/images/entregador-sem-foto.png') ?>"
                            alt="Sem imagem por enquanto">
    
                    <?php endif ?>
                </div>
    
                <?php if ($entregador->deletado_em == null): ?>
                    <a href="<?php echo site_url("admin/entregadores/editarimagem/$entregador->id"); ?>"
                        class="btn btn-outline-primary btn-sm mb-2" data-toggle="tooltip"
                        data-placement="top" title="Editar">
                        <i class="mdi mdi-image btn-icon-prepend"></i>
                        Editar imagem
                    </a>
                    <hr>
                <?php endif; ?>
    
                <p class="card-text">
                    <span class="font-weight-bold">Nome: </span>
                    <?php echo esc($entregador->nome) ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">CPF: </span>
                    <?php echo esc($entregador->cpf) ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">CNH: </span>
                    <?php echo esc($entregador->cnh) ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Telefone: </span>
                    <?php echo esc($entregador->telefone) ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Veículo: </span>
                    <?php echo esc($entregador->veiculo) ?> | <?php echo esc($entregador->placa) ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Ativo: </span>
                    <?php echo $entregador->ativo ? 'Sim' : 'Não'; ?>
                </p>
    
                <p class="card-text">
                    <span class="font-weight-bold">Criado: </span>
                    <?php echo $entregador->criado_em->humanize() ?>
                </p>
    
                <?php if ($entregador->deletado_em == null): ?>
    
                    <p class="card-text">
                        <span class="font-weight-bold">Atualizado: </span>
                        <?php echo $entregador->atualizado_em->humanize() ?>
                    </p>
    
                <?php else: ?>
                    <p class="card-text">
                        <span class="font-weight-bold text-danger">Excluído: </span>
                        <?php echo $entregador->deletado_em->humanize() ?>
                    </p>
    
                <?php endif ?>
    
    
                <div class="mt-4">
    
                    <?php if ($entregador->deletado_em == null): ?>
    
                        <a href="<?php echo site_url("admin/entregadores/editar/$entregador->id"); ?>"
                            class="btn btn-dark btn-sm btn-icon-tex btn-icon-prepend btn-icon-text mr-2" data-toggle="tooltip"
                            data-placement="top" title="Editar entregador">
                            <i class="mdi mdi-lead-pencil btn-icon-prepend"></i>
                            Editar
                        </a>
                        <a href="<?php echo site_url("admin/entregadores/excluir/$entregador->id"); ?>"
                            class="btn btn-danger btn-sm btn-icon-tex btn-icon-prepend mr-2" data-toggle="tooltip"
                            data-placement="top" title="Excluír entregador">
                            <i class="mdi mdi-delete btn-icon-prepend"></i>
                            Excluir
                        </a>
    
                    <?php else: ?>
                        <a href="<?php echo site_url("admin/entregadores/desfazerexclusao/$entregador->id"); ?>"
                            class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Recuperar entregador">
                            <i class="mdi mdi-undo btn-icon-prepend"></i>
                            Recuperar
                        </a>
    
                    <?php endif ?>
    
    
    
                    <a href="<?php echo site_url("admin/entregadores"); ?>"
                        class="btn btn-light btn-sm btn-icon-tex btn-icon-prepend" data-toggle="tooltip"
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