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

        <div class="product-content product-wrap clearfix product-deatil">
            <div class="row">

                

                <div class="col-md-12 col-xs-12">
                        <h2 class="section-title pull-left"> <?php echo esc($titulo); ?></h2>
                        
                </div>

                <div class="col-md-7">
                    <ul class="list-group">

                        <?php $total = 0 ?>

                        <?php foreach ($carrinho as $produto): ?>

                            <?php $subtotal = $produto['preco'] * $produto['quantidade'] ?>

                            <?php $total += $subtotal ?>

                            <li class="list-group-item">
                                <div>
                                    <h4><?php echo ellipsize($produto['nome'], 60) ?></h4>
                                    <p class="text-muted"> Quantidade: <?php echo $produto['quantidade'] ?></p>
                                    <p class="text-muted"> Preço unitário: R$&nbsp;<?php echo $produto['preco'] ?></p>
                                    <p class="text-muted"> Subtotal: R$&nbsp;<?php echo number_format($subtotal, 2) ?></p>
                                </div>
                            </li>

                        <?php endforeach ?>
                        <li class="list-group-item">
                            <span>Total de produtos:</span>
                            <strong><?php echo 'R$' . number_format($total, 2) ?></strong>
                        </li>

                        <li class="list-group-item">
                            <span>Taxa de entrega:</span>
                            <strong id="valor_entrega" class="text-danger"> Obrigatório *</strong>
                        </li>

                        <li class="list-group-item">
                            <span>Valor final:</span>
                            <strong id="total"><?php echo 'R$' . number_format($total, 2) ?></strong>
                        </li>

                        <li class="list-group-item">
                            <span>Endereço de entrega:</span>
                            <strong id="endereco" class="text-danger">Obrigatório *</strong>
                        </li>

                    </ul>

                    <a href="<?php echo site_url("/") ?>" class="btn btn-food">Mais delícias</a>

                    <a href="<?php echo site_url("carrinho") ?>" class="btn btn-primary" style="font-family: Montserrat-bold">Ver meu carrinho</a>
                </div>

                <div class="col-md-5">

                <?php if (session()->has('errors_model')): ?>
                        <ul style="margin-left: -1.6em !important; list-style: decimal">
                            <?php foreach (session('errors_model') as $error): ?>
                                <li class="text-danger"><?php echo $error; ?></li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif; ?>
                    <?php echo form_open('checkout/processar', ['id => form-checkout']) ?>
                            
                    <p style="font-size: 18px; ">Escolha a forma de pagamento na entrega</p>

                    <div class="form-row">
                        <?php foreach ($formas as $forma): ?>
                            <div class="radio">
                                <label style="font-size: 16px">
                                    <input id="forma" name="forma" type="radio" style="margin-top: 2px" class="forma"
                                        data-forma="<?php echo $forma->id ?>">
                                    <?php echo esc($forma->nome) ?>
                                </label>
                            </div>
                        <?php endforeach ?>
                        <hr>
                        <!-- sera exibida via js quando escolher a opção dinheiro -->
                        <div id="troco" class="hidden">
                            <div class="form-group col-md-12">
                                <label for="">Enviar troco para</label>
                                <input class="form-control money" type="text" id="troco_para" name="checkout[troco_para]" placeholder="Enviar troco para">
                                <label for="">
                                    <input type="checkbox" id="sem_troco" name="checkout[sem_troco]">
                                    Não preciso de troco
                                </label>
                                <hr>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Consulte a taxa de entrega</label>
                            <input type="text" name="cep" class="form-control cep" placeholder="Informe o CEP" value="">
                            <div id="cep"></div>
                        </div>

                        <div class="form-group col-md-9">
                            <label for="">Rua * </label>
                            <input id="rua" type="text" name="checkout[rua]" class="form-control" value="" readonly="" required="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Número * </label>
                            <input type="text" name="checkout[numero]" class="form-control" value="" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Ponto de referência </label>
                            <input type="text" name="checkout[referencia]" class="form-control" value="" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <input type="text" id="forma_id" name="checkout[forma_id]" placeholder="checkout[forma_id]">
                            <input type="text" id="bairro_slug" name="checkout[bairro_slug]" placeholder="checkout[bairro_slug]">
                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit" id="btn-checkout" class="btn btn-food btn-block" value="Antes, consulte a taxa de entrega">
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
<script src="<?php echo site_url('admin/vendors/mask/app.js'); ?>"></script>
<script src="<?php echo site_url('admin/vendors/mask/jquery.mask.min.js'); ?>"></script>

<script>
    $('#btn-checkout').prop('disabled', true);
    

    $(".forma").on('click', function() {

            var forma_id = $(this).attr('data-forma');

            $("#forma_id").val(forma_id);

            if (forma_id == 1) {
                $("#troco").removeClass('hidden')
            } else {
                $("#troco").addClass('hidden')

            }

        }

    )

    $("#sem_troco").on('click', function() {

            if (this.checked) {
                $('#troco_para').prop('disabled', true);

                $('#troco_para').attr('placeholder', 'Não preciso de troco, tenho o valor certinho.')
            } else {
                $('#troco_para').prop('disabled', false);

                $('#troco_para').attr('placeholder', 'Enviar troco para')

            }

        }

    )

    $("[name=cep]").focusout(function() {
        var cep = $(this).val()

        if (cep.length === 9) {
            $.ajax({
                type: 'get',
                url: '<?php echo site_url('checkout/consultacep') ?>',
                dataType: 'json',
                data: {
                    cep: cep
                },
                beforeSend: function() {
                    $("#cep").html('Consultando...')

                    $("[name=cep]").val('')

                    $('#btn-checkout').prop('disabled', true);
                    $('#btn-checkout').val('Consultando a taxa de entrega');


                },
                success: function(response) {
                    if (!response.erro) {
                        /* cep valido */

                        $("#valor_entrega").html(response.valor_entrega);
                        $("#bairro_slug").val(response.bairro_slug);

                        $('#btn-checkout').prop('disabled', false);
                        $('#btn-checkout').val('Processar pedido');

                        if(response.logradouro){
                            $('#rua').val(response.logradouro);
                        } else {
                            $('#rua').prop("readonly", false)
                        }

                        $("#endereco").html(response.endereco);

                        $("#total").html(response.total);

                        $("#cep").html(response.bairro)


                    } else {
                        $("#cep").html(response.erro)

                    }

                },
                error: function() {
                    alert('Não foi possível consultar a taxa de entrega. Entre em contato com a nossa equipe e informe o erro CONS-ERRO-TAXA-CKOT')
                
                    $('#btn-checkout').prop('disabled', true);
                    $('#btn-checkout').val('Antes, consulte a taxa de entrega');
                }
            })
        }
    })
</script>

<?php echo $this->endSection(); ?>