<?php echo $this->extend('layout/principal_web'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<!-- envia estilo -->
<link rel="stylesheet" href="<?php echo site_url("/web/src/assets/css/produtos.css") ?>">
<style>

.name{
        font-weight: normal;
        font-family: 'ChunkFiveEx';
        color: #990100;
        font-size: 32px;
    }
    @media only screen and (max-width: 767px) {
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

                <?php if (!isset($carrinho)): ?>

                    <h2 class="text-center name"> Seu carrinho de compras está vazio</h2>

                    <div class="text-center">
                        <a href="<?php echo site_url("/") ?>" style="margin-top: 3em" class="btn btn-lg btn-food">Mais delícias</a>
                    </div>

                <?php else: ?>

                    <h3 class="name" style="margin-bottom: 2em;">Resumo do carrinho de compras</h3>
                    <div class="table-responsive">

                        <?php if (session()->has('errors_model')): ?>
                            <ul style="margin-left: -1.6em !important; list-style: decimal">
                                <?php foreach (session('errors_model') as $error): ?>
                                    <li class="text-danger"><?php echo $error; ?></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif; ?>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Remover</th>
                                    <th scope="col" style="max-width: 150px;">Produto</th> <!-- Define uma largura máxima -->
                                    <th scope="col">Tamanho</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Preço Unitário</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php foreach ($carrinho as $produto): ?>
                                    <tr>
                                        <?php echo form_open("carrinho/remover", ['class' => 'form-inline d-inline']); ?>
                                        <th class="text-center" scope="row">
                                            <div class="form-group">
                                                <input type="hidden" name="produto[slug]" value="<?php echo $produto->slug; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </th>
                                        <?php echo form_close() ?>


                                        <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?php echo esc($produto->nome) ?>">
                                            <?php echo esc($produto->nome) ?>
                                        </td>
                                        <td><?php echo esc($produto->tamanho) ?></td>
                                        <td class="text-center">
                                            <?php echo form_open("carrinho/atualizar", ['class' => 'form-inline d-inline']); ?>
                                            <div class="form-group d-flex align-items-center">
                                                <input type="number" class="form-control" name="produto[quantidade]" value="<?php echo $produto->quantidade ?>" min="1" max="10" step="1" required style="width: 60px; margin-right: 10px;">
                                                <input type="hidden" name="produto[slug]" value="<?php echo $produto->slug; ?>">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-refresh"></i>
                                                </button>
                                            </div>
                                            <?php echo form_close() ?>
                                        </td>
                                        <td>R$&nbsp;<?php echo esc($produto->preco) ?></td>

                                        <?php
                                        $subTotal = $produto->preco * $produto->quantidade;

                                        $total += $subTotal;
                                        ?>

                                        <td>R$&nbsp;<?php echo esc(number_format($subTotal, 2)); ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <td class="text-right" colspan="5">Total produtos:</td>
                                    <td colspan="5">R$&nbsp;<?php echo number_format($total, 2) ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right border-top-0" style="border-top: none !important" colspan="5" style="font-weight: bold">Taxa de entrega:</td>
                                    <td class="border-top-0" style="border-top: none !important" id="valor_entrega" colspan="5">
                                        Não calculado
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right" style="border-top: none; font-weight: bold !important" colspan="5">Valor final:</td>
                                    <td class="border-top-0" id="total" style="border-top: none; font-weight: bold !important" colspan="5"><?php echo 'R$&nbsp;' . number_format($total, 2) ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="form-group col-md-5">
                            <label for="">Calcular taxa de entrega</label>
                            <input type="text" name="cep" class="cep form-control" placeholder="Informe o seu CEP">
                            <div id="cep"></div>
                        </div>

                    </div>

                    <hr>

                    <div class="col-md-12">
                        <a href="<?php echo site_url("/") ?>"class="btn btn-food">Mais delícias</a>

                        <a href="<?php echo site_url("carrinho/limpar") ?>" class="btn btn-default" style="font-family: Montserrat-bold">Limpar carrinho</a>

                        <a href="<?php echo site_url("checkout") ?>" class="btn btn-success pull-right" style="font-family: Montserrat-bold">Checkout</a>
                    </div>
                <?php endif ?>

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

                        $("[name=cep]").val(cep);

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