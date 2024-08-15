<?php echo $this->extend('layout/principal_web'); ?>

<?php echo $this->section('titulo'); ?>
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
<!-- envia estilo -->
<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<!-- Begin Sections-->

<!--    About Us    -->
<div class="container section" id="about_us">
    <div class="col-sm-12 d-flex flex-xs-column">
        <div class="col-sm-6 d-flex align-items-center padd_lr0" data-aos="fade-up">
            <div class="content">
                <h1 class="section-title title_sty1">Sobre nós</h1>
                <p class="short">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="col-sm-6 img text-center padd_lr0" data-aos="fade-down">
            <div class="border_on">
                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/about-us.jpg" alt="sample" class="about_img" />
            </div>
        </div>
    </div>
</div>

<!--    Menus   -->
<div class="container section" id="menu" data-aos="fade-up">
    <div class="title-block">
        <h1 class="section-title">Conheça nosso cardápio</h1>
    </div>

    <!--    Menus filter    -->
    <div class="menu_filter text-center">
        <ul class="list-unstyled list-inline d-inline-block">

            <li id="todos" class="item active">
                <a href="javascript:;" class="filter-button" data-filter="todos">Todos</a>
            </li>

            <?php foreach ($categorias as $key => $categoria): ?>

                <li class="item">
                    <a href="javascript:;" class="filter-button" data-filter="<?php echo $categoria->slug; ?>"><?php echo esc($categoria->nome); ?></a>
                </li>

            <?php endforeach ?>

        </ul>
    </div>

    <!--    Menus items     -->
    <div id="menu_items">

        <div class="row">

            <?php foreach ($produtos as $produto): ?>


                <div class="col-sm-6 filter-item image filter active <?php echo $produto->categoria_slug; ?>">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-6.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-6.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Pepper beef</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$9.00</span>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endforeach ?>

        </div>


    </div>
</div>


<!--    Gallery    -->
<div class="container section" id="gallery" data-aos="fade-up">
    <div class="title-block">
        <h1 class="section-title">Galeria</h1>
    </div>
    <div id="photo_gallery" class="list1">
        <div class="row loadMore">
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-1.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-1.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-2.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-2.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-3.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-3.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-4.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-4.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-5.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-5.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-6.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-6.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-7.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-7.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-8.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-8.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-1.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-1.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-2.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-2.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-3.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-3.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-md-3 item">
                <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-4.jpg" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/gallery-4.jpg" alt="sample" />
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- End Sections -->


<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- envia script -->
<?php echo $this->endSection(); ?>