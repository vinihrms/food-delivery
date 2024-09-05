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
<div class="container-fluid section" data-aos="fade-up" style="margin-top: 3em">
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

                <?php if (!isset($carrinho)): ?>

                    <h2 class="text-center"> Seu carrinho de compras está vazio</h2>

                    <div class="text-center">
                        <a href="<?php echo site_url("/") ?>" style="background-color: #990100; color: #FFFFFF; margin-top: 3em" class="btn btn-lg">Mais delícias</a>

                    </div>

                <?php else: ?>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Remover</th>
                                    <th scope="col" style="max-width: 150px;">Produto</th> <!-- Define uma largura máxima -->
                                    <th scope="col">Tamanho</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php foreach ($carrinho as $produto): ?>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <a class="btn btn-danger btn-sm" href="<?php echo site_url("carrinho/remover/$produto->slug"); ?>"> X </a>
                                        </th>
                                        <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?php echo esc($produto->nome) ?>">
                                            <?php echo esc($produto->nome) ?>
                                        </td>
                                        <td><?php echo esc($produto->tamanho) ?></td>
                                        <td class="text-center">
                                            <?php echo form_open("carrinho/atualizar", ['class' => 'form-inline d-inline']); ?>
                                            <div class="form-group d-flex align-items-center">
                                                <input type="number" class="form-control" name="produto[quantidade]" value="<?php echo $produto->quantidade ?>" min="1" max="10" step="1" required="" style="width: 60px; margin-right: 10px;"> <!-- Ajuste de largura -->
                                                <input type="hidden" name="produto[slug]" value="<?php echo $produto->slug; ?>">
                                                <button type="submit" class="btn btn-primary btn-sm"> <!-- Botão pequeno para combinar -->
                                                    Atualizar
                                                </button>
                                            </div>
                                            <?php form_close() ?>
                                        </td>
                                        <td>R$&nbsp;<?php echo esc($produto->preco) ?></td>

                                        <?php 
                                            $subTotal = $produto
                                        ?>

                                        <td><?php echo esc($produto->preco * $produto->quantidade) ?></td> <!-- Subtotal -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

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
<script>

</script>

<?php echo $this->endSection(); ?>