<?php echo $this->extend('Admin/layout/principal_autenticacao'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<!-- envia estilo -->
<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>
<!-- envia conteudo -->
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-5 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">


                    <?php if(session()->has('sucesso')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Perfeito!</strong> <?php echo session('sucesso'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>

                    <?php if(session()->has('info')): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Informação!</strong> <?php echo session('info'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>

                    <?php if(session()->has('atencao')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Atenção!</strong> <?php echo session('atencao'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>

                    <!-- errors de CSRF ACAO NAO PERMITIDA -->
                    <?php if(session()->has('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erro!</strong> <?php echo session('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>


                    <div class="brand-logo">
                        <img src="<?php echo site_url('admin/') ?>images/logo.svg" alt="logo">
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
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                            href="../../index.html"> ENTRAR </button>
                    </div>
                    <!-- TODO: esqueceu a senha -->
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <a href="#" class="auth-link text-black">Esqueceu a senha?</a>
                    </div>

                    <div class="text-center mt-4 font-weight-light">
                        Ainda não tem uma conta? <a href="<?php echo site_url('registrar');?>"
                            class="text-primary">Criar conta</a>
                    </div>
                    <?php echo form_close()?>

                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- envia script -->
<?php echo $this->endSection(); ?>