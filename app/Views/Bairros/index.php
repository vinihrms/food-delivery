<?php echo $this->extend('layout/principal_web'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<!-- envia estilo -->
<link rel="stylesheet" href="<?php echo site_url("/web/src/assets/css/produtos.css") ?>">
<style>
    @media only screen and (max-width: 767px) {
    .section-title {
        font-size: 20px !important;
        margin-top: -4em !important; 
    }
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


        <div class="product-content product-wrap clearfix product-deatil ">
            <div class="row ">

                <div class="col-md-12 col-xs-12">
                    <h2 class="section-title pull-left"> <?php echo esc($titulo); ?></h2>
                </div>

                <?php foreach ($bairros as $bairro): ?>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading fonte-panel-food" style="background: #990100; color: #ffffff"><?php echo esc($bairro->nome) ?> - <?php echo esc($bairro->cidade) ?></div>
                            <div class="panel-body fonte-food">Taxa de entrega: R$ <?php echo esc(number_format($bairro->valor_entrega, 2)) ?></div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</div>



<!-- End Sections -->


<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- envia script -->
<script>
    $(document).ready(function() {
        var especificacao_id;

        if (!especificacao_id) {
            $("#btn-adiciona").prop("disabled", true);
            $("#btn-adiciona").prop("value", "Selecione uma medida");
        }

        $(".especificacao").on('click', function() {
            especificacao_id = $(this).attr('data-especificacao');
            $("#especificacao_id").val(especificacao_id);

            $("#btn-adiciona").prop("disabled", false);
            $("#btn-adiciona").prop("value", "Adicionar ao carrinho");
        });

        $(".extra").on('click', function() {
            var extra_id = $(this).attr('data-extra');
            $("#extra_id").val(extra_id);
        });
    })
</script>

<?php echo $this->endSection(); ?>