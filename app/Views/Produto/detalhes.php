<?php echo $this->extend('layout/principal_web'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<!-- envia estilo -->
<link rel="stylesheet" href="<?php echo site_url("/web/src/assets/css/produtos.css") ?>">

<style>
    .card-img-top {
        overflow: hidden;
    }

    .card-img-top img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .name{
        font-weight: normal;
        font-family: 'ChunkFiveEx';
        color: #990100;
        font-size: 32px;
    }

    @media only screen and (max-width: 767px) {
    .name {
        margin-top: 1em !important; 
    }

    .btn{
        margin-top: 1em !important; 
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


        <div class="product-content product-wrap clearfix product-deatil">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="card-img-top mb-4">
                        <img src="<?php echo site_url("produto/imagem/$produto->imagem"); ?>" alt="<?php echo esc($produto->nome) ?>" class="img-fluid" />
                    </div>
                </div>

                <?php echo form_open("carrinho/adicionar") ?>

                <div class="col-md-7 col-md-offset-1 col-sm-12 col-xs-12">
                    <?php if (session()->has('errors_model')): ?>
                        <ul style="margin-left: -1.6em !important; list-style: decimal">
                            <?php foreach (session('errors_model') as $error): ?>
                                <li class="text-danger"><?php echo $error; ?></li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif; ?>

                    <h2 class="name">
                        <?php echo esc($produto->nome) ?>
                    </h2>

                    <hr />

                    <h3 class="price-container">
                        <p class="small">Escolha uma medida</p>
                        <?php foreach ($especificacoes as $especificacao): ?>
                            <div class="radio">
                                <label style="font-size: 16px">
                                    <input type="radio" style="margin-top: 2px" class="especificacao" data-especificacao="<?php echo $especificacao->especificacao_id ?>"
                                        name="produto[preco]" value="<?php echo $especificacao->preco; ?>">
                                    <?php echo esc($especificacao->nome) ?>
                                    R$ <?php echo esc(number_format($especificacao->preco, 2)) ?>
                                </label>
                            </div>
                        <?php endforeach ?>

                        <?php if (isset($extras)): ?>
                            <hr>
                            <p class="small">Extras do produto</p>
                            <div class="radio">
                                <label style="font-size: 16px">
                                    <input type="radio" style="margin-top: 2px" class="extra" name="extra" checked=""> Sem extra
                                </label>
                            </div>

                            <?php foreach ($extras as $extra): ?>
                                <div class="radio">
                                    <label style="font-size: 16px">
                                        <input type="radio" class="extra" style="margin-top: 2px" data-extra="<?php echo $extra->id ?>"
                                            name="extra" value="<?php echo $extra->preco; ?>">
                                        <?php echo esc($extra->nome) ?>
                                        <?php echo esc(number_format($extra->preco, 2)) ?>
                                    </label>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </h3>

                    <hr />

                    <div class="row">
                        <div class="col-md-4">
                            <label>Quantidade</label>
                            <input type="number" class="form-control" placeholder="Quantidade" name="produto[quantidade]" value="1" min="1"
                                max="10" step="1" required="">
                        </div>
                    </div>

                    <hr />

                    <div class="description description-tabs">
                        <ul id="myTab" class="nav nav-pills"></ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" style="font-size: 16px" id="more-information">
                                <br />
                                <strong>Ingredientes:</strong>
                                <p><?php echo esc($produto->ingredientes) ?></p>
                            </div>
                        </div>
                    </div>
                    <hr />

                    <div>
                        <input hidden="" type="text" name="produto[slug]" value="<?php echo $produto->slug; ?>">
                        <input hidden="" type="text" id="especificacao_id" name="produto[especificacao_id]">
                        <input hidden="" type="text" id="extra_id" name="produto[extra_id]">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <input id="btn-adiciona" type="submit" class="btn btn-success btn-block " value="Adicionar ao carrinho">
                        </div>

                        <?php foreach ($especificacoes as $especificacao): ?>
                            <?php if ($especificacao->customizavel): ?>
                                <div class="col-sm-4">
                                    <a href="<?php echo site_url("produto/customizar/$produto->slug") ?>" class="btn btn-info btn-block ">Customizar</a>
                                </div>
                                <?php break ?>
                            <?php endif ?>
                        <?php endforeach ?>

                        <div class="col-sm-4">
                            <a href="<?php echo site_url("/") ?>" class="btn btn-primary btn-block ">Mais delícias</a>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
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