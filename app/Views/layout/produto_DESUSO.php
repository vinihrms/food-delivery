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
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="256x256" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/android-chrome-256x256.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/favicon-16x16.png" />
    <link rel="icon" type="image/png" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/favicon.ico" />
    <link rel="manifest" href="<?php echo site_url('web/'); ?>src/assets/img/site.html" />
    <link rel="mask-icon" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#990100" />
    <meta name="theme-color" content="#ffffff" /> -->

    <!-- essa section renderiza os estilos especificos da view que estender esse layout -->
    <?php echo $this->renderSection('estilos') ?>
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
                <div class="container pos_rel2">

                </div>
                <!-- /.container -->
            </div>
            <!-- END carousel -->

            <!-- BEGIN navigation -->
            <div class="navigation">

                <div class="navbar-container" data-spy="affix" data-offset-top="400">
                    <div class="container">

                        <div id="navbar_search">
                            <form method="post">
                                <input type="text" name="q" class="form-control pull-left" value="" placeholder="Busque por algo">
                                <button type="submit" class="pull-right close" id="search_close"><i class="fa fa-close"></i></button>
                            </form>
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
                                            <li><a href="<?php echo site_url('/') ?>">Home</a></li>
                                            <li><a href="<?php echo site_url('/') ?>?section=about_us">Sobre</a></li>
                                            <li><a href="<?php echo site_url('/') ?>?section=menu">Cardápio</a></li>
                                            <li><a href="<?php echo site_url('/') ?>?section=gallery">Galeria</a></li>
                                            <li><a href="<?php echo site_url('/') ?>?section=footer">Contato</a></li>
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
                                    <h4 class="footer_ttl footer_ttl_padd">working hours</h4>
                                    <div class="footer_border">
                                        <div class="week_row clearfix">
                                            <div class="week_day">Monday</div>
                                            <div class="week_time text-right">Closed</div>
                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Tuesday</div>
                                            <div class="week_time">
                                                <span class="week_time_start">10 am</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">12 am</span>
                                            </div>
                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Wednsday</div>
                                            <div class="week_time">
                                                <span class="week_time_start">10 am</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">12 am</span>
                                            </div>

                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Thursday</div>
                                            <div class="week_time">
                                                <span class="week_time_start">10 am</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">12 am</span>
                                            </div>

                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Friday</div>
                                            <div class="week_time">
                                                <span class="week_time_start">10 am</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">12 am</span>
                                            </div>

                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Saturday</div>
                                            <div class="week_time">
                                                <span class="week_time_start">7 am</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">1 am</span>
                                            </div>
                                        </div>
                                        <div class="week_row clearfix">
                                            <div class="week_day">Sunday</div>
                                            <div class="week_time">
                                                <span class="week_time_start">7 am</span>
                                                <span class="week_time_node">-</span>
                                                <span class="week_time_end">1 am</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <h4 class="footer_ttl footer_ttl_padd">contact us</h4>
                                    <div class="footer_border">
                                        <div class="footer_cnt">
                                            <i class="fa fa-map-marker"></i>
                                            <span>Your City, Your streert, 18765, 100 Tenth Avenue, New York City, NY 1001</span>
                                        </div>
                                        <div class="footer_cnt">
                                            <i class="fa fa-phone"></i>
                                            <span>(457) 570 5682; (385) 620 756</span>
                                        </div>
                                        <div class="footer_cnt">
                                            <i class="fa fa-envelope"></i>
                                            <span>info@butazzopizza.net</span>
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
                                        <a target="_blank" href="https://www.templateshub.net">Templates Hub</a>
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
            <li><a class="page-scroll" href="#about_us">About</a></li>
            <li><a class="page-scroll" href="#menu">Cardápio</a></li>
            <li><a class="page-scroll" href="#gallery">Gallery</a></li>
            <li><a class="page-scroll" href="#reservation">Reservation</a></li>
            <li><a class="page-scroll" href="#footer">Contact</a></li>
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
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcg5Y2D1fpGI12T8wcbtPIsyGdw-_NV1Y&amp;callback=myMap"></script> -->

    <!-- essa section renderiza os scripts especificos da view que estender esse layout -->
    <?php echo $this->renderSection('scripts') ?>
</body>

</html>