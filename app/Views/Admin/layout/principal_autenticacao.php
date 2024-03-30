<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Food Delivery | <?php echo $titulo; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo site_url("admin/"); ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo site_url("admin/"); ?>vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo site_url("admin/"); ?>css/style.css">
    <!-- endinject -->
    <!-- 
    TODO: LOGO
    <link rel="shortcut icon" href="images/favicon.png" /> -->

    <!-- essa section renderiza os estilos especificos da view que estender esse layout -->
    <?php echo $this->renderSection('estilos') ?>
</head>

<body>
    <div class="container-scroller">

        <!-- essa section renderiza os conteudos especificos da view que estender esse layout -->
        <?php echo $this->renderSection('conteudo') ?>



    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo site_url("admin/"); ?>vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?php echo site_url("admin/"); ?>js/off-canvas.js"></script>
    <script src="<?php echo site_url("admin/"); ?>js/hoverable-collapse.js"></script>
    <script src="<?php echo site_url("admin/"); ?>js/template.js"></script>
    <!-- endinject -->

    <!-- essa section renderiza os scripts especificos da view que estender esse layout -->
    <?php echo $this->renderSection('scripts') ?>
</body>

</html>