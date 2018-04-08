<article class="text-justify">
    <h2 class="<?php echo (is_single() || is_page()) ? 'title-article' : ''; ?>">
        <a href="<?php the_permalink(); // link do clanka ?>">
            <i class="<?php echo (is_search() || is_page()) ? 'fas fa-paperclip' : 'fab fa-themeisle'; ?>"></i>
            <?php the_title(); // naslov clanka ?>
        </a>
    </h2>
    
    <?php
        if (is_page()):
    ?>
            <div>
                <p>
                    <?php the_content() ?>
                </p>
            </div>
    <?php
        else:
    ?>
            <p class="small text-category"><?php the_category(', ') ?> &diams; <?php the_date() ?> by
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <?php the_author() ?>
                </a>
            </p>
            <!-- Post thumbnail or banner -->
            <a href="<?php the_permalink(); ?>">
                <?php (is_single()) ? the_post_thumbnail('banner-image') : the_post_thumbnail('small-thumbnail'); ?>
            </a>
            <!-- End post thumbnail or banner -->

                <?php if (is_single()) : ?>
                        <section class="content-page">
                            <?php the_content(); ?>
                            <?php the_tags('<div class="wpb-tags"><span class="btn btn-secondary fas fa-tags tagbox"> TAGOVI: </span> ', ' / ', '</div>'); ?>
                        </section>
                        <section class="row about-author">
                            <div class="col-md-3 col-sm-4 col-xs-4 about-author-image">
                                <?php echo get_avatar(get_the_author_meta('ID'), 500); ?>
                                <p><?php echo get_the_author_meta('nickname'); ?></p>
                            </div>

                            <?php
                            $otherAuthorPosts = new WP_Query(array(
                                'author' => get_the_author_meta('ID'),
                                'posts_per_page' => 3,
                                'post__not_in' => array(get_the_ID())
                            ));
                            ?>

                            <div class="col-md-9 col-sm-8 col-xs-8 about-author-text">
                                <h3>O autoru</h3>
                                <p><?php echo get_the_author_meta('description') ?></p>

                                <?php
                                    if($otherAuthorPosts->have_posts()) :
                                    ?>
                                        <div class="other-posts-by">
                                            <h5>Još članaka od autora <?php echo get_the_author_meta('nickname') ?></h5>
<!--                                            <br />-->
                                            <ul>
                                                <?php
                                                    while($otherAuthorPosts->have_posts()) :
                                                        $otherAuthorPosts->the_post();
                                                    ?>
                                                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                                <?php
                                                    endwhile;
                                                    ?>
                                            </ul>
                                        </div>
                                <?php
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                <br />
                                <?php
                                    if(count_user_posts(get_the_author_meta('ID')) > 3) :
                                    ?>
                                        <a class="btn btn-warning" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                            Sve od autora <?php echo get_the_author_meta('nickname'); ?>
                                        </a>
                                <?php
                                    endif;
                                    ?>
                            </div>
                        </section>

                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                            ?>
            
                        <?php
                    else:
                        echo get_the_excerpt(); // opis do "Read more" dela
                        ?>
                        <a href="<?php the_permalink(); ?>">
                            <span class="badge badge-dark">
                                READ MORE &raquo;
                            </span>
                        </a>
                <?php
                    endif;
                ?>

    <?php
        endif;
    ?>
</article>
<hr class="hr-article" />



