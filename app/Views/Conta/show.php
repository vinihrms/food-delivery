<?php echo $this->extend('layout/principal_web'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<!-- envia estilo -->
<link rel="stylesheet" href="<?php echo site_url("/web/src/assets/css/conta.css") ?>">

<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<!-- Begin Sections-->
<div class="container section" data-aos="fade-up" style="margin-top: 3em; min-height: 300px">
    <!-- Verifique se há margens, paddings, ou outros estilos aplicados aqui -->
    <div class="col-sm-12 col-md-12 col-lg-12">

        <div class="row">
            <?php if (session()->has('sucesso')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session('sucesso'); ?>

                </div>
            <?php endif ?>

            <?php if (session()->has('info')): ?>
                <div class="alert alert-info" role="alert">
                    <?php echo session('info'); ?>

                </div>
            <?php endif ?>
            <?php if (session()->has('atencao')): ?>

                <div class="alert alert-danger" role="alert"> <?php echo session('atencao'); ?></div>

            <?php endif ?>

            <?php if (session()->has('fraude')): ?>
                <div class="alert alert-warning" role="alert"> <?php echo session('fraude'); ?></div>
            <?php endif ?>

            <?php if (session()->has('aviso')): ?>
                <div class="alert alert-warning" role="alert"> <?php echo session('aviso'); ?></div>
            <?php endif ?>
            <!-- errors de CSRF ACAO NAO PERMITIDA -->
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session('error'); ?>
                </div>
            <?php endif ?>

        </div>

        <?php echo $this->include("Conta/sidebar") ?>

        <div class="row" style="margin-top: 2em;">
            <div class="col-md-12 col-xs-12">
                <h2 class="section-title pull-left"> <?php echo esc($titulo); ?></h2>
            </div>

            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <dl>
                            <dt>Nome completo:</dt>
                            <dd><?php echo esc($usuario->nome); ?></dd>
                            <hr>
                            <dt>E-mail:</dt>
                            <dd><?php echo esc($usuario->email); ?></dd>
                            <hr>
                            <dt>Telefone:</dt>
                            <dd><?php echo esc($usuario->telefone); ?></dd>
                            <hr>
                            <dt>CPF:</dt>
                            <dd><?php echo esc($usuario->cpf); ?></dd>
                            <hr>
                            <dt>Cliente desde:</dt>
                            <dd><?php echo $usuario->criado_em->humanize(); ?></dd>
                        </dl>
                    </div>
                    <div class="panel-footer">
                        <a href="<?php echo site_url('conta/editar') ?>" class="btn btn-primary"> Editar</a>
                        <a href="<?php echo site_url('conta/editarsenha') ?>" class="btn btn-danger"> Alterar senha</a>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>



<!-- End Sections -->


<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- envia script -->
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>

<?php echo $this->endSection(); ?>