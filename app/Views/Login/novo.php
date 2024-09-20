<?php echo $this->extend('layout/principal_web'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<!-- envia estilo -->


<link rel="stylesheet" href="<?php echo site_url("/web/src/assets/css/produtos.css") ?>">

<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<!-- Begin Sections-->
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

            <!-- errors de CSRF ACAO NAO PERMITIDA -->
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session('error'); ?>
                </div>
            <?php endif ?>

        </div>

        <div class="product-content product-wrap clearfix product-deatil center-block" style="width: 40%;">
            <div class="row">
                <h3 class="text-center"><?php echo $titulo ?></h3>
                <hr>

                <?php if (session()->has('errors_model')): ?>
                    <ul>
                        <?php foreach (session('errors_model') as $error): ?>
                            <li class="text-danger"><?php echo $error; ?></li>
                        <?php endforeach ?>
                    </ul>
                    <hr>
                <?php endif; ?>

                <div class="col-md-12">
                <div class="brand-logo">
                        <img src="<?php echo site_url('admin/') ?>images/" alt="logo">
                    </div>
                    <h4>Olá. Seja bem vindo(a)!</h4>
                    <h6 class="font-weight-light mb-4">Faça o login para continuar.</h6>

                    <?php echo form_open('login/criar'); ?>
                    <div class="form-group">
                        <input type="email" name="email" value="<?php echo old('email') ?>"
                            class="form-control form-control-lg" id="exampleInputEmail1"
                            placeholder="Digite o seu e-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                            name="password" placeholder="Digite a sua senha">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn btn-food btn-lg font-weight-medium auth-form-btn"
                            href="../../index.html"> ENTRAR </button>
                    </div>
                    <!-- TODO: esqueceu a senha -->
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <a style="margin-top: .5em;" href="<?php echo site_url('password/esqueci'); ?>" class="auth-link text-black">Esqueceu a senha?</a>
                    </div>

                    <div style="margin-top: .5em;" class="text-center font-weight-light">
                        Ainda não tem uma conta? <a href="<?php echo site_url('registrar');?>"
                            class="text-primary">Criar conta</a>
                    </div>
                    <?php echo form_close()?>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- End Sections -->

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- envia script -->
<script src="<?php echo site_url('admin/vendors/mask/app.js'); ?>"></script>
<script src="<?php echo site_url('admin/vendors/mask/jquery.mask.min.js'); ?>"></script>


<?php echo $this->endSection(); ?>