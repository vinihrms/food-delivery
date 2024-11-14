<?php echo $this->extend('layout/principal_web'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<link rel="stylesheet" href="<?php echo site_url("/web/src/assets/css/produtos.css") ?>">

<style>
    @media only screen and (max-width: 767px) {
    #register {
        min-width: 100% !important; 
    }
}

.name{
        font-weight: normal;
        font-family: 'ChunkFiveEx';
        color: #990100;
        font-size: 32px;
    }
    .auth-link{
        margin-top: 12px !important;
    }
</style>

<!-- envia estilo -->
<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>
<!-- envia conteudo -->



<div class="container section" data-aos="fade-up" style="margin-top: 3em">
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

        <div id="register" class="product-content product-wrap clearfix product-deatil center-block" style="width: 40%;">
            <div class="row">
                <h3 class="text-center name"><?php echo $titulo ?></h3>
                <hr>

                <?php if (session()->has('errors_model')): ?>
                    <ul>
                        <?php foreach (session('errors_model') as $error): ?>
                            <li class="text-danger"><?php echo $error; ?></li>
                        <?php endforeach ?>
                    </ul>
                    <hr>
                <?php endif; ?>
                    <h4>Digite o seu e-mail</h4>

                    <?php echo form_open('password/processaesqueci'); ?>

                    <div class="form-group">
                        <input type="email" name="email" value="<?php echo old('email') ?>"
                            class="form-control form-control-lg" id="exampleInputEmail1"
                            placeholder="Digite o seu e-mail">
                    </div>
                    
                    <div class="mt-3">
                        <input type="submit"
                        class="btn btn-block btn-food btn-lg font-weight-medium auth-form-btn" value="Recuperar senha" id="btn-reset-senha">
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <a href="<?php echo site_url('login'); ?>" class="auth-link text-black">Lembrei a minha senha</a>
                    </div>

                    <?php echo form_close()?>

            </div>
        </div>

    </div>
</div>
<!-- page-body-wrapper ends -->

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- envia script -->

<script>
    $("form").submit(function(){
        $(this).find(":submit").attr('disabled', 'disabled');

        $("#btn-reset-senha").val("Enviando e-mail de recuperação...")
    });
</script>

<?php echo $this->endSection(); ?>