<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<!-- BEGIN head -->


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <!-- Meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Food Delivery | <?php echo $this->renderSection('titulo') ?></title>

    <!-- Stylesheets -->
    <link href="<?php echo site_url('web/'); ?>src/assets/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" media="all" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/fonts.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/slick.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/slick-theme.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/aos.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/scrolling-nav.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/bootstrap-datepicker.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/bootstrap-datetimepicker.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/touch-sideswipe.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/jquery.fancybox.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/main.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('web/'); ?>src/assets/css/responsive.css" type="text/css" rel="stylesheet" />


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="256x256" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/android-chrome-256x256.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/favicon-16x16.png" />
    <link rel="icon" type="image/png" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/favicon.ico" />
    <link rel="manifest" href="<?php echo site_url('web/'); ?>src/assets/img/site.html" />
    <link rel="mask-icon" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#990100" />
    <meta name="theme-color" content="#ffffff" />

    <!-- essa section renderiza os estilos especificos da view que estender esse layout -->
    <?php echo $this->renderSection('estilos') ?>

    <style>
        .navbar-nav>li>a {
            line-height: 30px;
        }

        .btn-food {
            background-color: #990100;
            color: white !important;
            font-family: 'Montserrat-bold';
        }

        .btn-food:hover {
            color: #fff;
            background-color: #660000;
            border-color: #5d0000;
            box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.5);
        }

        .btn-food:focus,
        .btn-food.focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.5);
        }

        .btn-food:not(:disabled):not(.disabled):active:focus,
        .btn-food:not(:disabled):not(.disabled).active:focus,
        .show>.btn-food.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.5);
        }
    </style>

</head>
<!-- END head -->

<!-- BEGIN body -->

<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!-- BEGIN  Loading Section -->
    <div class="loading-overlay">
        <div class="spinner">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- END Loading Section -->

    <!-- BEGIN body wrapper -->
    <div class="body-wrapper">

        <!-- Begin header-->
        <header id="header">

            <!-- BEGIN carousel -->
            <div id="main-carousel" class="carousel slide" data-ride="carousel">
                <div class="container pos_rel">

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#main-carousel" data-slide-to="1"></li>
                        <li data-target="#main-carousel" data-slide-to="2"></li>
                        <li data-target="#main-carousel" data-slide-to="3"></li>
                        <li data-target="#main-carousel" data-slide-to="4"></li>
                    </ol>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                    <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                        <!-- Carousel items   -->
                        <div class="item active">
                            <div class="carousel-caption">
                                <div class="fadeUp item_img">
                                    <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/pizza.png" alt="sample" />
                                    <div class="item_badge">
                                        <span class="badge_btext">20%</span>
                                        <span class="badge_stext">OFF</span>
                                    </div>
                                </div>
                                <div class="fadeUp fade-slow item_details">
                                    <h4 class="item_name">Produto</h4>
                                    <p class="item_info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="item_link_box">
                                        <a href="#reservation" class="item_link page-scroll">Faça seu pedido</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="carousel-caption">
                                <div class="fadeUp item_img">
                                    <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/tortilla.png" alt="sample" />
                                    <div class="item_badge">
                                        <span class="badge_btext">20%</span>
                                        <span class="badge_stext">OFF</span>
                                    </div>
                                </div>
                                <div class="fadeUp fade-slow item_details">
                                    <h4 class="item_name">Produto</h4>
                                    <p class="item_info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="item_link_box">
                                        <a href="#reservation" class="item_link page-scroll">Faça seu pedido</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="carousel-caption">
                                <div class="fadeUp item_img">
                                    <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/burger.png" alt="sample" />
                                    <div class="item_badge">
                                        <span class="badge_btext">20%</span>
                                        <span class="badge_stext">OFF</span>
                                    </div>
                                </div>
                                <div class="fadeUp fade-slow item_details">
                                    <h4 class="item_name">Produto</h4>
                                    <p class="item_info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="item_link_box">
                                        <a href="#reservation" class="item_link page-scroll">Faça seu pedido</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="carousel-caption">
                                <div class="fadeUp item_img">
                                    <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/pizza.png" alt="sample" />
                                    <div class="item_badge">
                                        <span class="badge_btext">20%</span>
                                        <span class="badge_stext">OFF</span>
                                    </div>
                                </div>
                                <div class="fadeUp fade-slow item_details">
                                    <h4 class="item_name">Produto</h4>
                                    <p class="item_info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="item_link_box">
                                        <a href="#reservation" class="item_link page-scroll">Faça seu pedido</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="carousel-caption">
                                <div class="fadeUp item_img">
                                    <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/burger.png" alt="sample" />
                                    <div class="item_badge">
                                        <span class="badge_btext">20%</span>
                                        <span class="badge_stext">OFF</span>
                                    </div>
                                </div>
                                <div class="fadeUp fade-slow item_details">
                                    <h4 class="item_name">Delicious Food</h4>
                                    <p class="item_info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="item_link_box">
                                        <a href="#reservation" class="item_link page-scroll">Faça seu pedido</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container -->
            </div>
            <!-- END carousel -->

            <!-- BEGIN navigation -->
            <div class="navigation">

                <div class="navbar-container" data-spy="affix" data-offset-top="400">
                    <div class="container">

                        <div class="navbar_top hidden-xs">
                            <div class="top_addr">
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> CORBÉLIA, PARANÁ, BRASIL - 85420-000</span>
                                <span><i class="fa fa-phone" aria-hidden="true"></i> (99) 99999-9999</span>
                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> 19:00 - 23:00</span>
                                <div class="pull-right search-block">
                                    <i class="fa fa-search" id="search" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div id="navbar_search">
                                <form method="post">
                                    <input type="text" name="q" class="form-control pull-left" value="" placeholder="Busque por algo">
                                    <button type="submit" class="pull-right close" id="search_close"><i class="fa fa-close"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- /.navbar_top -->

                        <!-- BEGIN navbar -->
                        <nav class="navbar">
                            <div id="navbar_content">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="/">
                                        <img src="<?php echo site_url('web/'); ?>src/assets/img/" alt="logo" />
                                    </a>
                                    <a href="#cd-nav" class="cd-nav-trigger right_menu_icon">
                                        <span><i class="fa fa-bars" aria-hidden="true"></i></span>
                                    </a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="navbar">
                                    <div class="navbar-right">
                                        <ul class="nav navbar-nav">
                                            <li><a class="page-scroll" href="/">Home</a></li>
                                            <li><a class="page-scroll" href="#about_us">Sobre</a></li>
                                            <li><a class="page-scroll" href="#menu">Cardápio</a></li>
                                            <li><a class="page-scroll" href="#gallery">Galeria</a></li>
                                            <li><a class="page-scroll" href="#footer">Contato</a></li>

                                            <?php if (session()->has('carrinho') && count(session()->get('carrinho')) > 0): ?>
                                                <li><a class="page-scroll" href="<?php echo site_url('/carrinho') ?>">
                                                        <i class="fa fa-shopping-cart fa fa-2x"></i>
                                                        <span style="font-size: 25px !important"> <?php echo count(session()->get('carrinho')) ?></span>
                                                    </a></li>
                                            <?php endif ?>

                                            <?php if (usuario_logado()): ?>
                                                <li><a class="page-scroll" href="<?php echo site_url('conta') ?>">Conta</a></li>
                                                <li><a class="page-scroll" href="<?php echo site_url('login/logout') ?>">Sair</a></li>

                                            <?php else: ?>
                                                <li><a class="page-scroll" href="<?php echo site_url('login') ?>">Entrar</a></li>
                                                <li><a class="page-scroll" href="<?php echo site_url('registrar') ?>">Registre-se</a></li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.navbar-collapse -->
                            </div>
                        </nav>
                    </div>
                    <!-- END navbar -->
                </div>
                <!-- /.navbar-container -->
            </div>
            <!-- END navigation -->

        </header>
        <!-- End header -->






        <!-- essa section renderiza os conteudos especificos da view que estender esse layout -->
        <?php echo $this->renderSection('conteudo') ?>



        <!--  Begin Footer  -->
        <footer id="footer">

            <!--    Contact    -->

            <!--    Google map, Social links    -->
            <div class="section" id="contact">
                <div id="googleMap"></div>
                <div class="footer_pos">
                    <div class="container">
                        <div class="footer_content">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <h4 class="footer_ttl footer_ttl_padd">Sobre nós</h4>
                                    <p class="footer_txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries but also the leap into electronic typesetting. </p>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <h4 class="footer_ttl footer_ttl_padd">expedientes</h4>
                                    <div class="footer_border">
                                        <div class="week_row clearfix">
                                            <div class="week_day">Dia</div>
                                            <div class="week_time text-right">Fechado</div>
                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Dia</div>
                                            <div class="week_time">
                                                <span class="week_time_start">19:00</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">00:00</span>
                                            </div>
                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Dia</div>
                                            <div class="week_time">
                                                <span class="week_time_start">19:00</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">00:00</span>
                                            </div>

                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Dia</div>
                                            <div class="week_time">
                                                <span class="week_time_start">19:00</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">00:00</span>
                                            </div>

                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Dia</div>
                                            <div class="week_time">
                                                <span class="week_time_start">19:00</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">00:00</span>
                                            </div>

                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Dia</div>
                                            <div class="week_time">
                                                <span class="week_time_start">19:00</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">01:00</span>
                                            </div>
                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Dia</div>
                                            <div class="week_time">
                                                <span class="week_time_start">19:00</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">01:00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <h4 class="footer_ttl footer_ttl_padd">contato</h4>
                                    <div class="footer_border">
                                        <div class="footer_cnt">
                                            <i class="fa fa-map-marker"></i>
                                            <span>CORBÉLIA, PARANÁ, BRASIL - 85420-000</span>
                                        </div>
                                        <div class="footer_cnt">
                                            <i class="fa fa-phone"></i>
                                            <span>(45) 99999-9999 </span>
                                        </div>
                                        <div class="footer_cnt">
                                            <i class="fa fa-envelope"></i>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="copy_text">
                                        <a target="_blank" href="/">Placeholder</a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="social-links">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="javascript:;" title="">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:;" title="">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:;" title="">
                                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:;" title="">
                                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- End Footer -->

    </div>
    <!-- END body-wrapper -->


    <!-- START mobile right burger menu -->

    <nav class="cd-nav-container right_menu" id="cd-nav">
        <div class="header__open_menu">
            <a href="index-2.html" class="rmenu_logo" title="yagmurmebel.az">
                <img src="<?php echo site_url('web/'); ?>src/assets/img/logo.png" alt="logo" />
            </a>
        </div>
        <div class="right_menu_search">
            <form method="post">
                <input type="text" name="q" class="form-control search_input" value="" placeholder="Busque por algo">
                <button type="submit" class="search_icon"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <ul class="rmenu_list">
            <li><a class="page-scroll" href="#header">Home</a></li>
            <li><a class="page-scroll" href="#about_us">Sobre</a></li>
            <li><a class="page-scroll" href="#menu">Cardápio</a></li>
            <li><a class="page-scroll" href="#gallery">Galeria</a></li>
            <li><a class="page-scroll" href="#footer">Contato</a></li>
        </ul>
        <div class="right_menu_addr top_addr">
            <span><i class="fa fa-map-marker" aria-hidden="true"></i> CORBÉLIA, PARANÁ, BRASIL - 85420-000</span>
            <span><i class="fa fa-phone" aria-hidden="true"></i> (99) 99999-9999</span>
            <span><i class="fa fa-clock-o" aria-hidden="true"></i> 19:00 - 23:00</span>
        </div>
    </nav>

    <div class="cd-overlay"></div>
    <!-- /.cd-overlay -->

    <!-- END mobile right burger menu -->

    <!-- JavaScript -->
    <script src="<?php echo site_url('web/'); ?>src/assets/js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/jquery.mousewheel.min.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/jquery.easing.min.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/scrolling-nav.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/aos.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/slick.min.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/jquery.touchSwipe.min.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/moment.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/bootstrap-datetimepicker.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/jquery.fancybox.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/loadMoreResults.js"></script>
    <script src="<?php echo site_url('web/'); ?>src/assets/js/main.js"></script>

    <!-- essa section renderiza os scripts especificos da view que estender esse layout -->
    <?php echo $this->renderSection('scripts') ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const section = urlParams.get('section');

            if (section) {
                const element = document.getElementById(section);
                if (element) {
                    element.scrollIntoView({
                        behavior: 'smooth'
                    });
                }

                history.replaceState(null, null, window.location.pathname);
            }
        });
    </script>
</body>

</html>