<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>


<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-header bg-primary pb-0 pt-4">
            <h4 class="card-title text-white "><?php echo esc($titulo); ?></h4>
        </div>
        <div class="card-body">



            <p class="card-text">
                <span class="font-weight-bold">Nome: </span>
                <?php echo esc($extra->nome) ?>
            </p>
            <p class="card-text">
                <span class="font-weight-bold">Descrição: </span>
                <?php echo esc($extra->descricao) ?>
            </p>
            <p class="card-text">
                <span class="font-weight-bold">Slug: </span>
                <?php echo esc($extra->slug) ?>
            </p>
            <p class="card-text">
                <span class="font-weight-bold">Preço: </span>
                R$&nbsp;<?php echo esc($extra->preco) ?>
            </p>
            <p class="card-text">
                <span class="font-weight-bold">Ativo: </span>
                <?php echo $extra->ativo ? 'Sim' : 'Não'; ?>
            </p>

            <p class="card-text">
                <span class="font-weight-bold">Criado: </span>
                <?php echo $extra->criado_em->humanize() ?>
            </p>

            <?php if($extra->deletado_em == null): ?>

            <p class="card-text">
                <span class="font-weight-bold">Atualizado: </span>
                <?php echo $extra->atualizado_em->humanize() ?>
            </p>

            <?php else:?>
            <p class="card-text">
                <span class="font-weight-bold text-danger">Excluído: </span>
                <?php echo $extra->deletado_em->humanize() ?>
            </p>

            <?php endif?>


            <div class="mt-4">

                <?php if($extra->deletado_em == null): ?>

                <a href="<?php echo site_url("admin/extras/editar/$extra->id"); ?>"
                    class="btn btn-dark btn-sm btn-icon-tex btn-icon-prepend btn-icon-text mr-2"
                    data-toggle="tooltip" data-placement="top" title="Editar extra">
                    <i class="mdi mdi-lead-pencil btn-icon-prepend"></i>
                    Editar
                </a>
                <a href="<?php echo site_url("admin/extras/excluir/$extra->id"); ?>"
                    class="btn btn-danger btn-sm btn-icon-tex btn-icon-prepend mr-2"
                    data-toggle="tooltip" data-placement="top" title="Excluír extra">
                    <i class="mdi mdi-delete btn-icon-prepend"></i>
                    Excluir
                </a>

                <?php else:?>
                    <a href="<?php echo site_url("admin/extras/desfazerexclusao/$extra->id"); ?>"
                    class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Recuperar extra">
                    <i class="mdi mdi-undo btn-icon-prepend"></i>
                    Recuperar
                </a>

                <?php endif?>



                <a href="<?php echo site_url("admin/extras"); ?>"
                    class="btn btn-light btn-sm btn-icon-tex btn-icon-prepend"
                    data-toggle="tooltip" data-placement="top" title="Voltar">
                    <i class="mdi mdi-keyboard-backspace btn-icon-prepend"></i>
                    Voltar
                </a>
            </div>
        </div>

    </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>


<?php echo $this->endSection(); ?>