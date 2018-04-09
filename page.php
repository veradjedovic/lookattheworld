<?php get_header() ?>

    <!-- Baner -->
    <header class="header-page">
    </header>
    <!-- End Baner -->

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
                        <?php
                        while(have_posts()) :  // Petlja za uzimanje clanaka
                            the_post(); // Podaci o clanku

                            get_template_part('content', get_post_format());

                        endwhile;

                        echo paginate_links();

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