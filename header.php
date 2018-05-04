<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <meta name="keywords" content="prozorusvet.com, prozor u svet, prozor u avanturu, prozor u svet avanture, pogled u svet, turizam, putovanja, priroda, pustolovina, destinacija, putopis, prirodne lepote, prirodni resursi, avantura, avanturista, planeta zemlja, turisticka destinacija, atrakcija, turisticka atrakcija, istrazivanje, blog, blogger, uzivanje, prozor, svet putovanja, zemlje sveta, upoznajte prirodu, upoznajte sebe, nasa planeta, savladavanje prepreke" />
    <meta name="description" content="Ovo je mesto za sve one koji vole avanturu i putovanja u najrazličitije zemlje sveta. Kako upoznajete prirodu, tako postepeno upoznajete i sebe, a, samim tim, i druge ljude i ostale entitete na našoj planeti, a i šire od toga. Svaka savladana prepreka na Vašem putu predstavlja savladavanje iste te prepreke u Vašem umu..." />
<!--    <title>--><?php //wp_title('•', true, 'right'); bloginfo('name'); ?><!--</title>-->
    <title><?php wp_title(''); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

        <!-- Main Navigation Bar -->
		<nav class="navbar-poz navbar navbar-expand-lg navbar-dark bg-dark" role="navigation">
<!--			<a class="brand lead" href="--><?//= home_url() ?><!--">--><?//= get_bloginfo( 'name' ) ?><!--&nbsp; | </a>-->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  	<span class="navbar-toggler-icon"></span>
			</button>

		        <?php
		            wp_nav_menu( array(
		                'menu'              => 'primary',
		                'theme_location'    => 'primary',
		                'depth'             => 10,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse',
		                'container_id'      => 'navbarSupportedContent',
		                'menu_class'        => 'nav navbar-nav',
		                'items_wrap'        => '<ul id="%1$s" class="%2$s"><li>%3$s</li></ul>',
						'item_spacing'      => 'preserve',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
		        ?>

                <?php get_search_form(); ?>
		</nav>
        <!-- End Main Navigation Bar -->
		