<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Food Delivery | <?php echo $this->renderSection('titulo') ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo site_url("admin/"); ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo site_url("admin/"); ?>vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?php echo site_url("admin/"); ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
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
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">

                    <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg"
                            alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-sort-variant"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">Olá,&nbsp;<?php echo usuario_logado()->nome ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a href="<?php echo site_url("admin/usuarios/show/".usuario_logado()->id); ?>" class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Meus dados
                            </a>
                            <a href="<?php echo site_url('login/logout') ?>" class="dropdown-item">
                                <i class="mdi mdi-logout text-primary"></i>
                                Sair
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/home')?>">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Home</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/pedidos')?>">
                            <i class="mdi mdi-shopping menu-icon"></i>
                            <span class="menu-title">Pedidos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/categorias')?>">
                            <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
                            <span class="menu-title">Categorias</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/extras')?>">
                            <i class="mdi mdi-plus-box menu-icon"></i>
                            <span class="menu-title">Extras</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/medidas')?>">
                            <i class="mdi mdi-ruler menu-icon"></i>
                            <span class="menu-title">Medidas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/produtos')?>">
                            <i class="mdi mdi-food menu-icon"></i>
                            <span class="menu-title">Produtos</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/formas')?>">
                            <i class="mdi mdi-credit-card-multiple menu-icon"></i>
                            <span class="menu-title">Formas de Pagamento</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/entregadores')?>">
                            <i class="mdi mdi-motorbike menu-icon"></i>
                            <span class="menu-title">Entregadores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/bairros')?>">
                            <i class="mdi mdi-map-marker menu-icon"></i>
                            <span class="menu-title">Bairros</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/expedientes')?>">
                            <i class="mdi mdi-calendar-clock menu-icon"></i>
                            <span class="menu-title">Expedientes</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('admin/usuarios')?>">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Usuários</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">


                    <?php if(session()->has('sucesso')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Perfeito!</strong> <?php echo session('sucesso'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>

                    <?php if(session()->has('info')): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Informação!</strong> <?php echo session('info'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>

                    <?php if(session()->has('atencao')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Atenção!</strong> <?php echo session('atencao'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>

                    <!-- errors de CSRF ACAO NAO PERMITIDA -->
                    <?php if(session()->has('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erro!</strong> <?php echo session('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>

                    <!-- TODO: WELLCOME
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-end flex-wrap">
                                    <div class="mr-md-3 mr-xl-5">
                                        <h2>Welcome back,</h2>
                                        <p class="mb-md-0">Your analytics dashboard template.</p>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                        <p class="text-primary mb-0 hover-cursor">Analytics</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-end flex-wrap">
                                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                                        <i class="mdi mdi-download text-muted"></i>
                                    </button>
                                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                                        <i class="mdi mdi-clock-outline text-muted"></i>
                                    </button>
                                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                                        <i class="mdi mdi-plus text-muted"></i>
                                    </button>
                                    <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- essa section renderiza os conteudos especificos da view que estender esse layout -->
                    <?php echo $this->renderSection('conteudo') ?>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            bootstrapdash.com 2020</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a>
                            from Bootstrapdash.com</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="<?php echo site_url("admin/"); ?>vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="<?php echo site_url("admin/"); ?>vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo site_url("admin/"); ?>vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="<?php echo site_url("admin/"); ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?php echo site_url("admin/"); ?>js/off-canvas.js"></script>
    <script src="<?php echo site_url("admin/"); ?>js/hoverable-collapse.js"></script>
    <script src="<?php echo site_url("admin/"); ?>js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?php echo site_url("admin/"); ?>js/dashboard.js"></script>
    <script src="<?php echo site_url("admin/"); ?>js/data-table.js"></script>
    <script src="<?php echo site_url("admin/"); ?>js/jquery.dataTables.js"></script>
    <script src="<?php echo site_url("admin/"); ?>js/dataTables.bootstrap4.js"></script>
    <!-- End custom js for this page-->
    <script src="<?php echo site_url("admin/"); ?>js/jquery.cookie.js" type="text/javascript"></script>


    <!-- essa section renderiza os scripts especificos da view que estender esse layout -->
    <?php echo $this->renderSection('scripts') ?>
</body>

</html>