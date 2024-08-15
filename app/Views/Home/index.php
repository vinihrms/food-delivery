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
                <h1 class="section-title title_sty1">about us</h1>
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
        <h1 class="section-title">Our Menus</h1>
    </div>

    <!--    Menus filter    -->
    <div class="menu_filter text-center">
        <ul class="list-unstyled list-inline d-inline-block">
            <li class="item active">
                <a href="javascript:;" class="filter-button" data-filter="burger">Burger</a>
            </li>
            <li class="item">
                <a href="javascript:;" class="filter-button" data-filter="pizza">Pizza</a>
            </li>
            <li class="item">
                <a href="javascript:;" class="filter-button" data-filter="salad">Salad</a>
            </li>
            <li class="item">
                <a href="javascript:;" class="filter-button" data-filter="frices">Frices</a>
            </li>
            <li class="item">
                <a href="javascript:;" class="filter-button" data-filter="drinks">Drinks</a>
            </li>
        </ul>
    </div>

    <!--    Menus items     -->
    <div id="menu_items">

        <div class="filtr-item image filter burger active">
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-1.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-1.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Margherita</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$10.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-2.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-2.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Greece</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$7.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-3.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-3.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Pepperoni</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$8.50</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-4.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-4.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Chicken lovers</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$8.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-5.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-5.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Italiano</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$11.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
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
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-7.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-7.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Hawai</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$11.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-8.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-8.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Caesar</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$9.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="filtr-item image filter pizza">
            <div class="row">
                <div class="col-sm-6">
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
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-8.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-8.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Caesar</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$9.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-7.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-7.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Hawai</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$11.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-5.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-5.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Italiano</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$11.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="filtr-item image filter salad">
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-3.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-3.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Pepperoni</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$8.50</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-2.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-2.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Greece</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$7.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-4.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-4.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Chicken lovers</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$8.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-1.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-1.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Margherita</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$10.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="filtr-item image filter frices">
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-8.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-8.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Caesar</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$9.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-7.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-7.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Hawai</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$11.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
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
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-2.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-2.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Greece</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$7.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="filtr-item image filter drinks">
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-1.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-1.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Margherita</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$10.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-5.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-5.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Italiano</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$11.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-3.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-3.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Pepperoni</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$8.50</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo site_url('web/'); ?>src/assets/img/photos/food-4.jpg" class="block fancybox" data-fancybox-group="fancybox">
                        <div class="content">
                            <div class="filter_item_img">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/food-4.jpg" alt="sample" />
                            </div>
                            <div class="info">
                                <div class="name">Chicken lovers</div>
                                <div class="short">Classic marinara sauce, authentic pepperoni</div>
                                <span class="filter_item_price">$8.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center">
            <!-- BEGIN pagination -->
            <ul class="pagination">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
            </ul>
            <!-- END pagination -->
        </div>

    </div>
</div>

<!--    Reservation    -->

<div class="fixed_layer section" id="reservation">
    <div class="fixed_layer_padd container">
        <div class="row">
            <div class="col-md-offset-6 col-md-6" data-aos="fade-down">
                <div class="reserv_box">
                    <h1 class="section-title title_sty1">online reservation</h1>
                    <p class="short">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    <form id="reserv_form" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form_pos">
                                    <input type="text" name="name" required="" placeholder="Your name" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your name'" />
                                    <span class="form_icon"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form_pos">
                                    <input type="email" name="email" required="" placeholder="Your email" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email'" />
                                    <span class="form_icon"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group form_pos">
                                    <input type="text" name="phone" required="" placeholder="Phone" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" />
                                    <span class="form_icon"></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form_pos">
                                    <input type="text" name="date" required="" placeholder="Date" class="form-control" id="reserv_date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date'" />
                                    <span class="form_icon"></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form_pos">
                                    <input type="text" name="time" required="" placeholder="Time" class="form-control" id="reserv_time" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Time'" />
                                    <span class="form_icon"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="3" name="message" placeholder="Message" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"></textarea>
                        </div>
                        <input type="submit" name="send" value="book now" class="btn btn-block" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--    Gallery    -->
<div class="container section" id="gallery" data-aos="fade-up">
    <div class="title-block">
        <h1 class="section-title">Gallery</h1>
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