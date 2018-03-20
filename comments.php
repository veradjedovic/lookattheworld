<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage lookattheworld
 * @since Look At The World 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h5 class="comments-title">
            <?php
            printf( _nx( '1 komentar na članak "%2$s"', '%1$s komentara na članak "%2$s"', get_comments_number(), 'comments title', 'lookattheworld' ),
                number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h5>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 74,
            ) );
            ?>
        </ol><!-- .comment-list -->

        <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
<!--                <h1 class="screen-reader-text section-heading">--><?php //_e( 'Comment navigation', 'lookattheworld' ); ?><!--</h1>-->
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Stariji komentari', 'lookattheworld' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Noviji komentari &rarr;', 'lookattheworld' ) ); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php _e( 'Comments are closed.' , 'lookattheworld' ); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php comment_form(); ?>

</div><!-- #comments -->