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

                <?php echo form_open('conta/processaautenticar') ?>

                <div class="panel panel-info">
                    <div class="panel-body">
                        <div>
                            <label for="">Insira sua senha: </label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Autenticar</button>
                        <a href="<?php echo site_url('conta/show') ?>" class="btn btn-default"> Cancelar </a>
                    </div>
                </div>

                <?php echo form_close(); ?>

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


<script src="<?php echo site_url('admin/vendors/mask/app.js'); ?>"></script>
<script src="<?php echo site_url('admin/vendors/mask/jquery.mask.min.js'); ?>"></script>

<?php echo $this->endSection(); ?>