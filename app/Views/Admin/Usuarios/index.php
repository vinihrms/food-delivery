<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<link rel="stylesheet" href="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.css'); ?>" />


<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo $titulo; ?></h4>

            <div class="ui-widget">
                <input placeholder="Pesquise por um usuário" id="query" name="query" class="form-control bg-light mb-5">
            </div>

            <a href="<?php echo site_url("admin/usuarios/criar"); ?>"
                class="btn btn-success btn-icon-tex btn-icon-prepend float-right mb-5"
                data-toggle="tooltip" data-placement="top" title="Cadastrar usuário">
                <i class="mdi mdi-account-plus btn-icon-prepend"></i>
                Cadastrar
            </a>

            <?php if(empty($usuarios)): ?>
                <p>Não há dados para exibir</p>
            <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>CPF</th>
                            <th>Ativo</th>
                            <th>Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <?php foreach ($usuarios as $usuario) : ?>

                            <td>
                                <a href="<?php echo site_url("admin/usuarios/show/$usuario->id"); ?>">
                                    <?php echo $usuario->nome; ?>
                                </a>
                            </td>
                            <td><?php echo $usuario->email; ?></td>
                            <td><?php echo $usuario->cpf; ?></td>
                            <td><?php echo ($usuario->ativo && $usuario->deletado_em == null ? '<label class="badge badge-primary">Sim</label>' : '<label class="badge badge-danger">Não</label>'); ?>
                            <td>

                                <?php echo ($usuario->deletado_em == null ? '<label class="badge badge-success">Disponível</label>' : '<label class="badge badge-danger">Excluído</label>'); ?>
                                <?php if($usuario->deletado_em != null): ?>
                                <a href="<?php echo site_url("admin/usuarios/desfazerexclusao/$usuario->id"); ?>"
                                    class="badge badge-dark ml-4"
                                    data-toggle="tooltip" data-placement="top" title="Recuperar usuário">
                                    <i class="mdi mdi-undo btn-icon-prepend"></i>
                                    Recuperar
                                </a>
                                <?php endif?>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

                <div class="mt-3">
                    <?php echo $pager->links(); ?>
                </div>
            </div>
            <?php endif ?>
        </div>


    </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.js'); ?>"></script>

<script>
$(function() {
    $("#query").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo site_url('admin/usuarios/procurar') ?>",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    if (data.length < 1) {
                        var data = [{
                            label: "Usuário não encontrado",
                            value: -1
                        }];
                    }
                    response(data)
                },
            })
        },
        minLength: 1,
        select: function(event, ui) {
            if (ui.item.value == -1) {
                $(this).val("");
                return false
            } else {
                window.location.href = '<?php echo site_url('admin/usuarios/show/'); ?>' + ui.item
                    .id;
            }
        }
    });
});
</script>

<?php echo $this->endSection(); ?>