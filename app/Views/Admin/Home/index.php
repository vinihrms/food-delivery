<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<!-- envia estilo -->
<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>
<!-- envia conteudo -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body dashboard-tabs p-0">
                <div class="tab-content py-0 px-0">
                    <div
                        class="tab-pane fade show active"
                        id="overview"
                        role="tabpanel"
                        aria-labelledby="overview-tab">
                        <div
                            class="d-flex flex-wrap justify-content-xl-between">
                            <div
                                class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i
                                    class="mdi mdi-currency-usd icon-lg mr-3 text-primary"></i>
                                <div
                                    class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Pedidos entregues
                                        <span class="badge badge-pill badge-primary"><?php echo esc($valorPedidosEntregues->total) ?></span>
                                    </small>
                                    <h5 class="mr-2 mb-0">R$ <?php echo esc(number_format($valorPedidosEntregues->valor_pedido, 2)) ?></h5>
                                </div>
                            </div>
                            <div
                                class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i
                                    class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                <div
                                    class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Pedidos cancelados
                                        <span class="badge badge-pill badge-danger"><?php echo esc($valorPedidosCancelados->total) ?></span>
                                    </small>
                                    <h5 class="mr-2 mb-0">R$ <?php echo esc(number_format($valorPedidosCancelados->valor_pedido, 2)) ?></h5>
                                </div>
                            </div>
                            <div
                                class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i
                                    class="mdi mdi-account-multiple mr-3 icon-lg text-success"></i>
                                <div
                                    class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Clientes ativos</small>
                                    <h5 class="mr-2 mb-0"><?php echo esc($recuperaTotalClientesAtivos) ?></h5>
                                </div>
                            </div>
                            <div
                                class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i
                                    class="mdi mdi-motorbike mr-3 icon-lg text-warning"></i>
                                <div
                                    class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Entregadores ativos</small>
                                    <h5 class="mr-2 mb-0"><?php echo esc($recuperaTotalEntregadoresAtivos) ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">

            <?php $expedienteHoje = expedienteHoje(); ?>

            <?php if ($expedienteHoje->situacao == false): ?>
                <div class="card-body">
                    <h4><i class="mdi mdi-calendar-alert"></i>&nbsp;Hoje é <?php echo esc($expedienteHoje->dia_descricao) ?> e estamos fechados. Portanto, não há novos pedidos</h4>
                </div>
            <?php else: ?>
                <div id="atualiza">
                    <?php if (!isset($novosPedidos)): ?>
                        <div class="card-body">
                            <h5>Não há novos pedidos no momento</h5>
                        </div>
                    <?php else: ?>
                        <div class="card-body">
                            <h5><i class="mdi mdi-shopping"></i>&nbsp;Novos pedidos realizados</h5>
                            <hr class="border-primary">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Data do pedido</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($novosPedidos as $pedido) : ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo site_url("admin/pedidos/show/$pedido->codigo"); ?>">
                                                        <?php echo esc($pedido->codigo); ?>
                                                    </a>
                                                </td>
                                                <td><?php echo esc($pedido->criado_em->humanize()); ?></td>
                                                <td>R$&nbsp;<?php echo esc(number_format($pedido->valor_pedido, 2)) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Produtos mais vendidos</p>
                <ul class="list-arrow">
                    <?php if (!isset($produtosMaisVendidos)): ?>

                    <p class="card-title text-primary">Não há dados para exibir no momento</p>

                    <?php else: ?>

                        <?php foreach ($produtosMaisVendidos as $produto): ?>

                            <li class="mb-2">
                                <?php echo word_limiter($produto->produto, 5) ?>
                                <span class="badge badge-pill badge-primary float-right"><?php echo esc($produto->quantidade) ?></span>
                            </li>

                        <?php endforeach ?>

                    <?php endif ?>

                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Clientes mais assíduos</p>
                <ul class="list-arrow">
                    <?php if (!isset($clientesMaisAsssiduos)): ?>

                    <p class="card-title text-success">Não há dados para exibir no momento</p>

                    <?php else: ?>

                        <?php foreach ($clientesMaisAsssiduos as $cliente): ?>

                            <li class="mb-2">
                                <?php echo esc($cliente->nome) ?>
                                <span class="badge badge-pill badge-success float-right"><?php echo esc($cliente->pedidos) ?></span>
                            </li>

                        <?php endforeach ?>

                    <?php endif ?>

                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Entregadores mais assiduos</p>
                <ul class="list-unstyled">
                    <?php if (!isset($entregadoresMaisAssiduos)): ?>

                    <p class="card-title text-warning">Não há dados para exibir no momento</p>

                    <?php else: ?>

                        <?php foreach ($entregadoresMaisAssiduos as $entregador): ?>

                            <li class="mb-2">
                                <img class="rounded-circle" width="40px" style="margin-right: 4px;" src="<?php echo site_url("admin/entregadores/imagem/$entregador->imagem") ?>" alt="">
                                <?php echo esc($entregador->nome) ?>
                                <span class="badge badge-pill badge-warning float-right"><?php echo esc($entregador->entregas) ?></span>
                            </li>

                        <?php endforeach ?>

                    <?php endif ?>

                </ul>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- envia script -->

<script>
    setInterval("atualiza();", 120000) //120000 ms = 2 min

    function atualiza() {
        $("#atualiza").load('<?php site_url('admin/home') ?>' + ' #atualiza');
    }
</script>
<?php echo $this->endSection(); ?>