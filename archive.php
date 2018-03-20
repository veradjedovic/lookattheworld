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
                    <?php
                    if(have_posts()):
                        ?>
                        <h3 class="title-archives">
                            <?php
                            if(is_category()) {
                                single_cat_title();
                            } elseif (is_tag()) {
                                single_tag_title();
                            } elseif (is_author()) {
                                echo 'Arhiva autora: ' . get_the_author();
                                rewind_posts();
                            } elseif (is_day()) {
                                echo 'Dnevna arhiva: ' . get_the_date();
                            } elseif (is_month()) {
                                echo 'Mesečna arhiva: ' . get_the_date('F Y');
                            } elseif (is_year()) {
                                echo 'Godišnja arhiva: ' . get_the_date('Y');
                            } else {
                                echo 'Arhiva: ';
                            }
                            ?>
                        </h3>
                        <div class="row-article-content">
                            <?php
                            while(have_posts()):the_post();

                                get_template_part('content', get_post_format());

                            endwhile;
                            load_more_button();
                            ?>
                        </div>
                        <!-- <div class="navigation">-->
                        <?php // echo paginate_links(); ?>
                        <!-- </div>-->
                        <?php
                    else: // ako nema
                        ?>
                        <article class="text-justify">
                            <p>Nema rezultata.</p>
                        </article>
                        <?php
                    endif; ?>
                </div>
                <!-- End Main Content -->

                <!-- Sidebar -->
                <div class="col-md-3 col-sm-4 row-sidebar">
                    <?php get_template_part('sidebar'); ?>
                </div>
                <!-- End Sidebar -->
            </div>
<?php get_footer() ?>