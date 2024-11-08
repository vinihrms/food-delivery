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

        <div class="product-content product-wrap clearfix product-deatil">
            <div class="row">



                <?php if ($pedido->situacao == 0): ?>
                    <div class="col-md-12 col-xs-12">
                        <h2 class="section-title pull-left"> <?php echo ($titulo); ?></h2>
                    </div>
                <?php endif ?>

                <div class="col-md-12 col-xs-12">
                    <h4> No momento, o seu pedido está com status de: <?php echo $pedido->exibeSituacaoPedido(); ?></h4>
                </div>

                <?php if ($pedido->situacao != 3): ?>
                    <div class="col-md-12 col-xs-12">
                        <h5> Quando ocorrer uma mudança no status do seu pedido, nós te notificaremos por e-mail</h5>
                    </div>
                <?php endif ?>


                <div class="col-md-12">
                    <ul class="list-group">

                        <?php foreach ($produtos as $produto): ?>

                            <li class="list-group-item">
                                <div>
                                    <h4><?php echo ellipsize($produto['nome'], 60) ?></h4>
                                    <p class="text-muted"> Quantidade: <?php echo $produto['quantidade'] ?></p>
                                    <p class="text-muted"> Preço unitário: R$&nbsp;<?php echo $produto['preco'] ?></p>
                                </div>
                            </li>

                        <?php endforeach ?>
                        <li class="list-group-item">
                            <span>Data do pedido:</span>
                            <strong><?php echo $pedido->criado_em->humanize(); ?></strong>
                        </li>
                        <li class="list-group-item">
                            <span>Total de produtos:</span>
                            <strong><?php echo 'R$' . number_format($pedido->valor_produtos, 2) ?></strong>
                        </li>

                        <li class="list-group-item">
                            <span>Taxa de entrega:</span>
                            <strong><?php echo 'R$' . number_format($pedido->valor_entrega, 2) ?></strong>
                        </li>

                        <li class="list-group-item">
                            <span>Valor final do pedido:</span>
                            <strong><?php echo 'R$' . number_format($pedido->valor_pedido, 2) ?></strong>
                        </li>

                        <li class="list-group-item">
                            <span>Endereço de entrega:</span>
                            <strong><?php echo esc($pedido->endereco_entrega) ?></strong>
                        </li>
                        <li class="list-group-item">
                            <span>Forma de pagamento na entrega:</span>
                            <strong><?php echo esc($pedido->forma_pagamento) ?></strong>
                        </li>
                        <li class="list-group-item">
                            <span>Observações:</span>
                            <strong><?php echo esc($pedido->observacoes) ?></strong>
                        </li>

                    </ul>

                    <a href="<?php echo site_url("/") ?>" class="btn btn-food">Mais delícias</a>

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