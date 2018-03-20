<?php get_header() ?>

    <!-- Container For Front Img -->
    <div class="row-header responsive">
        <header>
            <h1><a href="<?= home_url() ?>"><?= get_bloginfo( 'name' ) ?></a></h1>
            <p><?= get_bloginfo( 'description' ) ?></p>
            <a href="#home"><i class="fa-3x fas fa-chevron-circle-down"></i>
            </a>
        </header>
    </div>
    <!-- End Container For Front Img -->

    <!-- Container -->
    <div>
        <!-- Main Container -->
        <div class="container container-main">
            <div class="row row-main">
                <!-- Main Content -->
                <div class="row-article col-md-9 col-sm-8">
                    <p id="home"></p>
                    <?php
                    if(have_posts()): // Ukoliko ima clanaka
                        ?>
                        <h3 class="title-articles"> Articles </h3>
                        <div class="row-article-content">
                            <?php
                            while(have_posts()) :  // Petlja za uzimanje clanaka
                                the_post(); // Podaci o clanku

                                get_template_part('content', get_post_format());

                            endwhile;
                            load_more_button();
                            ?>
                        </div>
<!--                        <div class="navigation">-->
                                <?php // echo paginate_links(); ?>
<!--                        </div>-->
                    <?php
                    else: // ako nema
                    ?>
                        <article class="text-justify">
                            <p>Nema rezultata.</p>
                        </article>
                    <?php
                    endif;
                    ?>
                </div>
                <!-- End Main Content -->

                <!-- Sidebar -->
                <div class="col-md-3 col-sm-4 row-sidebar">
                    <?php get_template_part('sidebar'); ?>
                </div>
                <!-- End Sidebar -->
            </div>

<?php get_footer() ?>