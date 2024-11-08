<?php echo $this->extend('layout/principal_web'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<!-- envia estilo -->
<link rel="stylesheet" href="<?php echo site_url("/web/src/assets/css/conta.css") ?>">

<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<!-- Begin Sections-->
<div class="container section" data-aos="fade-up" style="margin-top: 3em; min-height: 300px">
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

        <?php echo $this->include("Conta/sidebar") ?>

        <div class="row" style="margin-top: 2em;">
            <div class="col-md-12 col-xs-12">
                <h2 class="section-title pull-left"> <?php echo esc($titulo); ?></h2>
            </div>

            <div class="col-md-12">
                <?php if (!isset($pedidos)): ?>
                    <h4>Nessa área aparecerá o seu histórico de pedidos realizados!</h4>
                <?php else: ?>

                    <?php foreach ($pedidos as $key => $pedido): ?>

                        <div class="panel-group">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse<?php echo $key ?>">Pedido <?php echo esc($pedido->codigo) ?> - Realizado: <?php echo esc($pedido->criado_em->humanize()) ?></a>
                                    </h4>
                                </div>
                                <div id="collapse<?php echo $key ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <h5>Situação do pedido: <?php echo $pedido->exibeSituacaoPedido() ?></h5>
                                        <ul class="list-group">
                                        <?php $produtos = unserialize($pedido->produtos) ?>

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
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>
            </div>
        </div>




    </div>
</div>



<!-- End Sections -->


<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- envia script -->
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>

<?php echo $this->endSection(); ?>