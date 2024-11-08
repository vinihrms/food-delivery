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

        <div class="product-content product-wrap clearfix product-deatil center-block" style="width: 40%;">
            <div class="row">

                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Sucesso!</h4>
                    <p><?php echo $titulo ?>.</p>

                </div>
                <hr>
                <div class="text-center">
                    <a href="<?php echo site_url("/") ?>" class="btn btn-lg btn-food">Página Inicial</a>
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

<script>
    $("[name=cep]").focusout(function() {
        var cep = $(this).val()

        if (cep.length === 9) {
            $.ajax({
                type: 'get',
                url: '<?php echo site_url('carrinho/consultacep') ?>',
                dataType: 'json',
                data: {
                    cep: cep
                },
                beforeSend: function() {
                    $("#cep").html('Consultando...')

                    $("[name=cep]").val('')

                },
                success: function(response) {
                    if (!response.erro) {
                        /* cep valido */
                        $("#cep").html('')


                        $("#valor_entrega").html(response.valor_entrega);

                        $("#total").html(response.total);

                        $("#cep").html(response.bairro)


                    } else {
                        $("#cep").html(response.erro)

                    }

                },
                error: function() {
                    alert('Não foi possível consultar a taxa de entrega. Entre em contato com a nossa equipe e informe o erro CONSULTA-ERRO-TAXA')
                }
            })
        }
    })
</script>

<?php echo $this->endSection(); ?>