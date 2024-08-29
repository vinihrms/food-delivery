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
    <div class="col-sm-8 col-md-offset-2">

        <div class="row">
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


            <div class="product-content product-wrap clearfix product-deatil">
                <div class="row">

                    <h2 class="name">
                        <?php echo esc($titulo) ?>
                    </h2>

                    <hr />

                    <?php echo form_open("carrinho/adicionar") ?>



                    <div class="row" style="min-height: 300px;">

                        <div class="col-md-12" style="margin-bottom: 2em;">

                            <?php if (session()->has('errors_model')): ?>
                                <ul style="margin-left: -1.6em !important; list-style: decimal">
                                    <?php foreach (session('errors_model') as $error): ?>
                                        <li class="text-danger"><?php echo $error; ?></li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif; ?>

                        </div>

                        <div class="col-md-12">

                            <?php if (session()->has('errors_model')): ?>
                                <ul style="margin-left: -1.6em !important; list-style: decimal">
                                    <?php foreach (session('errors_model') as $error): ?>
                                        <li class="text-danger"><?php echo $error; ?></li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif; ?>

                        </div>



                        <div class="col-md-6">

                            <div id="imagemPrimeiroProduto">
                                <img class="img-responsive center-block d-block mx-auto" src="<?php echo site_url("web/src/assets/img/escolha_produto.png") ?>" width="200" alt="Escolha o produto">
                            </div>

                            <label for="">Escolha a primeira metade do produto</label>
                            <select name="primeira_metade" id="primeira_metade" class="form-control">

                                <option value="">Escolha seu produto...</option>

                                <?php foreach ($opcoes as $opcao): ?>

                                    <option value="<?php echo $opcao->id ?>"> <?php echo esc($opcao->nome) ?></option>

                                <?php endforeach ?>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <div id="imagemSegundoProduto">
                                <img class="img-responsive center-block d-block mx-auto" src="<?php echo site_url("web/src/assets/img/escolha_produto.png") ?>" width="200" alt="Escolha o produto">
                            </div>

                            <label for="">Escolha a segunda metade</label>
                            <select name="segunda_metade" id="segunda_metade" class="form-control">

                                <!-- renderiza opcoes da segunda metade via JS, apos a primeira metade ser escolhida vai "remover a opcao para a segunda metade" -->

                            </select>

                        </div>



                    </div>

                    <div class="row">

                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <label for=""> Tamanho do produto </label>
                            <select name="tamanho" id="tamanho" class="form-control">

                                <!-- renderiza opcoes de tamanho via JS -->


                            </select>

                        </div>


                        <div class="col-md-6">

                            <div id="boxInfoExtras" style="display: none;">
                                <label>Extras do produto</label>

                                <div class="radio">
                                    <label for="">
                                        <input type="radio" class="extra" name="extra" checked=""> Sem extra
                                    </label>

                                </div>

                                <div id="extras">
                                    <!-- renderiz os extra via js -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <hr />

                <div>
                    <input type="text" id="extra_id" name="extra_id" hidden="">
                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <input id="btn-adiciona" type="submit" class="btn btn-success" value="Adicionar ao carrinho">
                    </div>

                    <div class="col-sm-3">
                        <a href="<?php echo site_url("/produto/detalhes/$produto->slug") ?>" class="btn btn-primary ">Voltar</a>
                    </div>

                    <div class="col-md-6">
                        <div id="valor_produto_customizado" style=" font-size: 18px; color: #990100; font-family: 'Montserrat-Bold';">
                            <!-- renderizado por js -->
                        </div>
                    </div>

                </div>
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
<script>
    $(document).ready(function() {

        $("#btn-adiciona").prop("disabled", true);
        $("#btn-adiciona").prop("value", "Selecione um tamanho");
        $("#segunda_metade").html('<option>Escolha a primeira metade</option>')
        $("#tamanho").html('<option>Escolha a segunda metade</option>')


        $("#primeira_metade").on('change', function() {
            var primeira_metade = $(this).val();

            var categoria_id = '<?php echo $produto->categoria_id ?>'

            //eventos change primeira metade
            $("#imagemPrimeiroProduto").html('<img class="img-responsive center-block d-block mx-auto" src="<?php echo site_url("web/src/assets/img/escolha_produto.png") ?>" width="200" alt="Escolha o produto">');
            $("#valor_produto_customizado").html('')
            $("#tamanho").html('<option>Escolha a segunda metade</option>')
            $("#boxInfoExtras").hide();
            $("#extras").html('');
            $("#btn-adiciona").prop("disabled", true);
            $("#btn-adiciona").prop("value", "Selecione um tamanho");

            if (primeira_metade) {
                $.ajax({

                    type: 'get',
                    url: '<?php echo site_url('produto/procurar') ?>',
                    dataType: 'json',
                    data: {
                        primeira_metade: primeira_metade,
                        categoria_id: categoria_id
                    },
                    before: function(data) {
                        $("#segunda_metade").html('<img class="img-responsive center-block d-block mx-auto" src="<?php echo site_url("produto/imagem/"); ?>' + data.imagemPrimeiroProduto + '" width="200" alt="Escolha o produto">')

                    },
                    success: function(data) {
                        if (data.imagemPrimeiroProduto) {
                            $("#imagemPrimeiroProduto").html('<img class="img-responsive center-block d-block mx-auto" src="<?php echo site_url("produto/imagem/"); ?>' + data.imagemPrimeiroProduto + '" width="200" alt="Escolha o produto">');
                        }

                        if (data.produtos) {
                            $("#segunda_metade").html('<option>Escolha a segunda metade</option>');

                            $(data.produtos).each(function() {
                                var option = $('<option />');
                                option.attr('value', this.id).text(this.nome);
                                $("#segunda_metade").append(option);
                            });
                        } else {
                            $("#segunda_metade").html('<option>Não encontramos opções de customização</option>');
                        }
                    },

                });
            } else {
                //cliente nao escolheu a primeira metade
                $("#segunda_metade").html('<option>Escolha a primeira metade</option>');

            }
        });

        $("#segunda_metade").on('change', function() {
            var primeiro_produto_id = $('#primeira_metade').val();
            var segundo_produto_id = $(this).val();


            $("#imagemSegundoProduto").html('<img class="img-responsive center-block d-block mx-auto" src="<?php echo site_url("web/src/assets/img/escolha_produto.png") ?>" width="200" alt="Escolha o produto">');
            $("#boxInfoExtras").hide();
            $("#extras").html('');
            $("#valor_produto_customizado").html('')
            $("#tamanho").html('<option>Escolha a segunda metade</option>')
            $("#btn-adiciona").prop("disabled", true);
            $("#btn-adiciona").prop("value", "Selecione um tamanho");


            if (primeiro_produto_id && segundo_produto_id) {
                $.ajax({
                    type: 'get',
                    url: '<?php echo site_url('produto/exibeTamanho') ?>',
                    dataType: 'json',
                    data: {
                        primeiro_produto_id: primeiro_produto_id,
                        segundo_produto_id: segundo_produto_id,
                    },
                    success: function(data) {
                        if (data.imagemSegundoProduto) {
                            $("#imagemSegundoProduto").html('<img class="img-responsive center-block d-block mx-auto" src="<?php echo site_url("produto/imagem/"); ?>' + data.imagemSegundoProduto + '" width="200" alt="Escolha o produto">');
                        }

                        if (data.medidas) {
                            $("#tamanho").html('<option>Escolha o tamanho...</option>');

                            $(data.medidas).each(function() {
                                var option = $('<option />');
                                option.attr('value', this.id).text(this.nome);
                                $("#tamanho").append(option);
                            });
                        } else {
                            $("#tamanho").html('<option>Escolha a segunda metade</option>');
                        }

                        if (data.extras) {
                            $("#boxInfoExtras").show();

                            $(data.extras).each(function() {
                                var input = "<div class='radio'><label for='extra" + this.id + "'><input type='radio' class='extra' name='extra' data-extra='" + this.id + "' value='" + this.preco + "'>" + this.nome + "</label></div>";

                                $("#extras").append(input);

                            });

                            $(".extra").on('click', function() {
                                var extra_id = $(this).attr('data-extra');
                                $("#extra_id").val(extra_id);
                            });
                        }

                    },
                });
            }

            $(".extra").on('click', function() {
                var extra_id = $(this).attr('data-extra');
                $("#extra_id").val(extra_id);


            });
        });

        $("#tamanho").on('change', function() {
            $("#btn-adiciona").prop("disabled", true);
            $("#btn-adiciona").prop("value", "Selecione um tamanho");

            var medida_id = $(this).val()

            $("#valor_produto_customizado").html('')

            if (medida_id) {
                $.ajax({
                    type: 'get',
                    url: '<?php echo site_url('produto/exibevalor') ?>',
                    dataType: 'json',
                    data: {
                        medida_id: medida_id,
                    },
                    success: function(data) {
                        if (data) {
                            $("#valor_produto_customizado").html('R$ ' + data.preco);
                            $("#btn-adiciona").prop("disabled", false);
                            $("#btn-adiciona").prop("value", "Adicionar ao carrinho");
                        }
                    },
                })
            }
        })



    })
</script>

<?php echo $this->endSection(); ?>