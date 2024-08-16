<?php echo $this->extend('layout/layout_produto'); ?>

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
        <div class="product-content product-wrap clearfix product-deatil">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="product-image">
                        <img src="<?php echo site_url("produto/imagem/$produto->imagem"); ?>" alt="<?php echo esc($produto->nome) ?>" />
                    </div>
                </div>

                <?php echo form_open("carrinho/adicionar") ?>
                <div class="col-md-7 col-md-offset-1 col-sm-12 col-xs-12">
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
                                    <?php echo esc(number_format($especificacao->preco, 2)) ?>
                                </label>
                            </div>
                        <?php endforeach ?>

                        <?php if (isset($extras)): ?>
                            <hr>

                            <p class="small">Extras do produto</p>

                            <div class="radio">
                                <label style="font-size: 16px">
                                    <input type="radio" style="margin-top: 2px" class="extra" name="extra" checked=""> Sem extra
                            </div>

                            <?php foreach ($extras as $extra): ?>
                                <div class="radio">
                                    <label style="font-size: 16px">
                                        <input type="radio" class="extra" style="margin-top: 2px" data-extra="<?php echo $extra->id_principal ?>"
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
                                    max="10" step="1" require="">
                        </div>
                    </div>

                    <hr />

                    <div class="description description-tabs">
                        <ul id="myTab" class="nav nav-pills">

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" style="font-size: 16px" id="more-information">
                                <br />
                                <strong>Ingredientes:</strong>
                                <p>
                                    <?php echo esc($produto->ingredientes) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr />

                    <div>

                        <input type="text" name="produto[slug]" value="<?php echo $produto->slug; ?>">

                        <input type="text" id="especificacao_id" name="produto[especificacao_id]">

                        <input type="text" id="extra_id" name="produto[extra_id]">

                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <input id="btn-adiciona" type="submit" class="btn btn-success  " value="Adicionar ao carrinho">
                        </div>

                        <?php  foreach ($especificoes as $especificacao): ?>
                        <?php  endforeach ?>

                        <div class="col-sm-4">
                            <a href="<?php echo site_url("produto/customizar/$produto->slug") ?>" class="btn btn-info  ">Customizar</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo site_url("/") ?>" class="btn btn-primary  ">Mais delícias</a>
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

        $(".especificacao").on('click', function () {
            especificacao_id = $(this).attr('data-especificacao');
            $("#especificacao_id").val(especificacao_id);

            $("#btn-adiciona").prop("disabled", false);
            $("#btn-adiciona").prop("value", "Adicionar ao carrinho");
        });

        $(".extra").on('click', function () {
            var extra_id = $(this).attr('data-extra');
            $("#extra_id").val(extra_id);


        });
    })
</script>

<?php echo $this->endSection(); ?>