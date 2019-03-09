<?php

/**
 * Look At The World's functions and definitions
 *
 * @package Look At The World
 * @since Look At The World 1.0
 */
 
/**
 * Register Custom Navigation Walker 
 */
if ( ! file_exists( get_template_directory() . '/wp-bootstrap-navwalker.php' ) ) {
    // file does not exist... return an error.
    return new WP_Error( 'wp-bootstrap-navwalker-missing', __( 'It appears the wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // file exists... require it.
    require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
}

/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 800; /* pixels */
 
if ( ! function_exists( 'world_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function lookattheworld_setup() {
 
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'lookattheworld', get_template_directory() . '/languages' );

    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-formats' );
 
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( [
        'primary'   => __( 'Primary Menu', 'lookattheworld' ),
        'secondary' => __( 'Secondary Menu', 'lookattheworld' )
    ] );
 
    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', [ 'aside', 'gallery', 'quote', 'image', 'video' ] );
}
endif; // lookattheworld_setup
add_action( 'after_setup_theme', 'lookattheworld_setup' );

/**
 * Add widget support
 */
function lookattheworld_widgets_init() {
    register_sidebar( [
    'name'            => __( 'Post Sidebar', 'lookattheworld' ),
    'id'              => 'post-sidebar',
    'description'     => __( 'Post Sidebar Description', 'lookattheworld' ),
    'before_widget'   => '<div>',
    'after_widget'    => '</div>',
    'before_title'    => '<h4><i class="far fa-paper-plane"></i> ',
    'after_title'     => '</h4>'
    ] );

    register_sidebar(array(
        'name' => 'Footer Area 1',
        'id' => 'footer1',
        'description'     => __( 'Footer Area 1 Description', 'lookattheworld' ),
        'before_widget'   => '<div class="widget-item">',
        'after_widget'    => '</div>',
        'before_title'    => '<h4>',
        'after_title'     => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 2',
        'id' => 'footer2',
        'description'     => __( 'Footer Area 2 Description', 'lookattheworld' ),
        'before_widget'   => '<div class="widget-item">',
        'after_widget'    => '</div>',
        'before_title'    => '<h4>',
        'after_title'     => '</h4>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer Area 3',
        'id' => 'footer3',
        'description'     => __( 'Footer Area 3 Description', 'lookattheworld' ),
        'before_widget'   => '<div class="widget-item">',
        'after_widget'    => '</div>',
        'before_title'    => '<h4> ',
        'after_title'     => '</h4>'
    ));
}
add_action( 'widgets_init', 'lookattheworld_widgets_init' );

function lookattheworld_enqueues() {
    wp_register_style( 'site-style-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css' );
    wp_enqueue_style( 'site-style-bootstrap' );
    
    wp_register_style( 'site-style-bootstrap-icons', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
    wp_enqueue_style( 'site-style-bootstrap-icons' );

    wp_register_style( 'site-style', get_template_directory_uri() . '/assets/css/site.css' );
    wp_enqueue_style( 'site-style' );
    
    wp_register_style( 'site-style-main', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'site-style-main' );


//  Namerno obrisan ovaj css zbog bele strelice koja se nepotrebno pojavljuje u sidebaru, ako treba, obrisati i css ispod
//    wp_register_style( 'site-style-superfish', get_template_directory_uri() . '/assets/plugins/node_modules/superfish/src/css/superfish.css' );
//    wp_enqueue_style( 'site-style-superfish' );

    wp_register_style( 'site-style-superfish-vertical', get_template_directory_uri() . '/assets/plugins/node_modules/superfish/src/css/superfish-vertical.css' );
    wp_enqueue_style( 'site-style-superfish-vertical' );

    wp_register_script( 'site-script-jquery', 'https://code.jquery.com/jquery-3.2.1.min.js' );
    wp_enqueue_script( 'site-script-jquery' );

    wp_register_script( 'site-script-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' );
    wp_enqueue_script( 'site-script-popper' );

    wp_register_script( 'site-script-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js' );
    wp_enqueue_script( 'site-script-bootstrap' );

    wp_register_script( 'site-script-superfish-hover', get_template_directory_uri() . '/assets/plugins/node_modules/superfish/src/js/hoverIntent.js' );
    wp_enqueue_script( 'site-script-superfish-hover' );

    wp_register_script( 'site-script-superfish', get_template_directory_uri() . '/assets/plugins/node_modules/superfish/src/js/superfish.js' );
    wp_enqueue_script( 'site-script-superfish' );

    wp_register_script( 'site-script', get_template_directory_uri() . '/assets/js/script.js' );
    wp_enqueue_script( 'site-script' );
}
add_action('wp_enqueue_scripts', 'lookattheworld_enqueues');

/**
 * Customize Appeareance Options
 */
function lookattheworld_customize_register($wp_customize) {
    $wp_customize->add_section('lwp_standard_colors', array(
        'title' => __('Standardne boje', 'lookattheworld'),
        'property' => 30
    ));

    $wp_customize->add_setting('lwp_link_color', array(
        'default' => '#333333',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_link_color_control', array(
        'label' => __('Standardni linkovi', 'lookattheworld'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_link_color'
    )));

    $wp_customize->add_setting('lwp_bg_color', array(
        'default' => '#FFFFFF',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_bg_color_control', array(
        'label' => __('Pozadina', 'lookattheworld'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_bg_color'
    )));

    $wp_customize->add_setting('lwp_font_color', array(
        'default' => '#333333',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_font_color_control', array(
        'label' => __('Boja fonta', 'lookattheworld'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_font_color'
    )));

    $wp_customize->add_setting('lwp_bg_footer_collet_color', array(
        'default' => '#ffffcc',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_bg_footer_collet_color_control', array(
        'label' => __('Boja kolet-podnožja', 'lookattheworld'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_bg_footer_collet_color'
    )));
}
add_action('customize_register', 'lookattheworld_customize_register');

/**
 * Output Customize CSS
 */
function lookattheworld_customize_css(){ ?>
    <style type="text/css">
        body {
            background-color: <?php echo get_theme_mod('lwp_bg_color'); ?>;
            color: <?php echo get_theme_mod('lwp_font_color'); ?>;
        }

        .container-main a:link,
        .container-main a:visited {
            color: <?php echo get_theme_mod('lwp_link_color'); ?>;
        }

        article a:hover,
        .footer a:hover{
            text-decoration: underline;
        }

        .footer .footer-widgets {
            background-color: <?php echo get_theme_mod('lwp_bg_footer_collet_color'); ?>;
        }
    </style>
<?php }
add_action('wp_head', 'lookattheworld_customize_css');

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '... <a href="'.get_the_permalink().'" rel="nofollow"><span class="btn btn-outline-dark btn-sm"> Pročitaj više &raquo;</span></a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Add featured image support
 */
add_theme_support('post-thumbnails');
add_image_size('small-thumbnail', 150, 120, true);
add_image_size('banner-image', 920, 500, array('left', 'top'));
add_theme_support('title-tag');

// function lookattheworld_modify_nav_menu_args( $args ) {
//     return array_merge( $args, array(
//         'walker' => WP_Bootstrap_Navwalker(),
//     ) );
// }
// add_filter( 'wp_nav_menu_args', 'lookattheworld_modify_nav_menu_args' );