<?php echo $this->extend('layout/principal_web'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<!-- envia estilo -->


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
</style>

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

                <div class="col-md-12">
                    <?php echo form_open('registrar/criar') ?>
                    <form>
                        <div class="form-group">
                            <label for="nome">Nome completo</label>
                            <input type="text" class="form-control" name="nome" placeholder="Seu nome completo" value="<?php echo old('nome') ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email válido</label>
                            <input type="text" class="form-control" name="email" placeholder="Seu email" value="<?php echo old('email') ?>">
                        </div>

                        <!-- <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control sp_celphones" placeholder="Telefone" name="telefone"
                                value="<?php echo old('telefone'); ?>">
                        </div> -->

                        <div class="form-group">
                            <label for="cpf">CPF válido</label>
                            <input type="text" class="form-control cpf" name="cpf" placeholder="CPF" value="<?php echo old('cpf') ?>">
                        </div>

                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="password" placeholder="Senha">
                        </div>

                        <div class="form-group">
                            <label for="senha">Confirmação de senha</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua senha">
                        </div>

                        <button type="submit" class="btn btn-food">Criar conta</button>
                    </form>
                    <?php echo form_close() ?>
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