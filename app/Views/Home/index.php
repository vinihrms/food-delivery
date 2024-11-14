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
<div class="container section" id="menu" style="margin-top: 3em">

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
                        <a href="<?php echo site_url("produto/detalhes/$produto->slug"); ?>" class="block fancybox" data-fancybox-group="fancybox">
                            <div class="content">
                                <div class="filter_item_img">
                                    <i class="fa fa-search-plus"></i>
                                    <img src="<?php echo site_url("produto/imagem/$produto->imagem"); ?>" alt="<?php echo esc($produto->nome) ?>" />
                                </div>
                                <div class="info">
                                    <div class="name"><?php echo esc($produto->nome) ?></div>
                                    <div class="short"><?php echo word_limiter($produto->ingredientes, 5) ?></div>
                                    <span class="filter_item_price">A partir de R$&nbsp;<?php echo esc(number_format($produto->min_preco, 2, ',', '.')) ?></span>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach ?>

            </div>


        </div>

</div>

<!--    Menus   -->
<div class="container section" id="about_us" data-aos="fade-up">
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




<!-- End Sections -->


<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>

<script>
    function navigateToSection(section) {
        const isHomePage = window.location.pathname === '<?php echo parse_url(site_url('/'), PHP_URL_PATH); ?>';

        if (isHomePage) {
            scrollAndCleanURL(section);
        } else {
            window.location.href = '<?php echo site_url('/') ?>#' + section;
        }
    }

    function scrollAndCleanURL(section) {
        const element = document.querySelector(`#${section}`);
        if (element) {
            element.scrollIntoView({
                behavior: 'smooth'
            });

            setTimeout(() => {
                history.replaceState(null, null, window.location.pathname);
            }, 100);
        }
    }

    window.addEventListener('load', () => {
        const hash = window.location.hash;
        if (hash) {
            scrollAndCleanURL(hash.substring(1));
        }
    });
</script>

<!-- envia script -->
<?php echo $this->endSection(); ?>