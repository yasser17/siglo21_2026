<?php
/**
 * Siglo 21 2026 Theme Functions
 *
 * @package Siglo21_2026
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

require_once get_template_directory() . '/inc/custom_post_types.php';
require_once get_template_directory() . '/inc/options.php';

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

if ( function_exists( 'add_theme_support' ) ) {
	// Let WordPress/Yoast manage the <title> tag
	add_theme_support( 'title-tag' );

	// Add Menu Support
	add_theme_support( 'menus' );

	// Add Thumbnail Theme Support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'listados-thumbnail', 450, 450, false );

	// Localisation Support
	load_theme_textdomain( 'siglo21_2026', get_template_directory() . '/languages' );

	// Add support for HTML5 markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}

/*------------------------------------*\
	Enqueue Styles and Scripts
\*------------------------------------*/

/**
 * Enqueue theme styles and scripts
 */
function siglo21_2026_enqueue_scripts() {
	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic', array(), null );

	// Template Styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/template-styles/vendor/bootstrap.css', [], '3.3.7' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/template-styles/vendor/font-awesome.min.css', [], '4.7.0' );
	wp_enqueue_style( 'superslides', get_template_directory_uri() . '/css/template-styles/vendor/superslides.css', [], '1.0.0' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/template-styles/vendor/owl.carousel.css', [], '2.0.0' );
	wp_enqueue_style( 'owl-transitions', get_template_directory_uri() . '/css/template-styles/vendor/owl.transitions.css', [], '2.0.0' );
	wp_enqueue_style( 'flickity', get_template_directory_uri() . '/css/template-styles/vendor/flickity.min.css', [], '2.0.0' );
	wp_enqueue_style( 'swipebox', get_template_directory_uri() . '/css/template-styles/vendor/swipebox.min.css', [], '1.4.4' );
	wp_enqueue_style( 'timecircles', get_template_directory_uri() . '/css/template-styles/vendor/TimeCircles.css', [], '1.5.3' );
	wp_enqueue_style( 'template-main', get_template_directory_uri() . '/css/template-styles/main.css', [], filemtime( get_template_directory() . '/css/template-styles/main.css' ) );
	wp_enqueue_style( 'template-demo', get_template_directory_uri() . '/css/template-styles/demo.css', [], filemtime( get_template_directory() . '/css/template-styles/demo.css' ) );

	// Color schemes - must load after main.css and demo.css to override defaults
	wp_enqueue_style( 'color-green', get_template_directory_uri() . '/css/template-styles/colors/color-green.css', array( 'template-main', 'template-demo' ), '1.0.0' );

	// Theme main style
	wp_enqueue_style( 'siglo21-2026-style', get_stylesheet_uri(), [], filemtime( get_stylesheet_directory() . '/style.css' ) );

	// Scripts
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/template-scripts/vendor/modernizr.js', [], '2.8.3', false );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/template-scripts/vendor/bootstrap.js', array( 'jquery' ), '3.3.7', true );
	wp_enqueue_script( 'superslides-js', get_template_directory_uri() . '/js/template-scripts/vendor/jquery.superslides.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/template-scripts/vendor/owl.carousel.min.js', array( 'jquery' ), '2.0.0', true );
	wp_enqueue_script( 'flickity-js', get_template_directory_uri() . '/js/template-scripts/vendor/flickity.pkgd.js', [], '2.0.0', true );
	wp_enqueue_script( 'swipebox-js', get_template_directory_uri() . '/js/template-scripts/vendor/jquery.swipebox.min.js', array( 'jquery' ), '1.4.4', true );
	wp_enqueue_script( 'timecircles-js', get_template_directory_uri() . '/js/template-scripts/vendor/TimeCircles.js', [], '1.5.3', true );
	wp_enqueue_script( 'parallax-js', get_template_directory_uri() . '/js/template-scripts/vendor/jquery.parallax.min.js', array( 'jquery' ), '1.1.3', true );
	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/js/template-scripts/vendor/isotope.pkgd.min.js', [], '3.0.6', true );
	wp_enqueue_script( 'audio-js', get_template_directory_uri() . '/js/template-scripts/vendor/audio.min.js', [], '1.0.0', true );
	wp_enqueue_script( 'twitterfetcher-js', get_template_directory_uri() . '/js/template-scripts/vendor/twitterFetcher_min.js', [], '1.0.0', true );
	wp_enqueue_script( 'template-main-js', get_template_directory_uri() . '/js/template-scripts/main.js', ['jquery', 'twitterfetcher-js' ], filemtime( get_template_directory() . '/js/template-scripts/main.js' ), true );
	wp_enqueue_script( 'twitch-sdk', 'https://player.twitch.tv/js/embed/v1.js', [], '1.0.0', true );
	wp_enqueue_script( 'twitch-player-init', get_template_directory_uri() . '/js/twitch-player-init.js', ['twitch-sdk'], filemtime( get_template_directory() . '/js/twitch-player-init.js' ), true );
	wp_enqueue_script( 'radio-player', get_template_directory_uri() . '/js/radio-player.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/radio-player.js' ), true );
}

add_action( 'wp_enqueue_scripts', 'siglo21_2026_enqueue_scripts' );

/*------------------------------------*\
	Functions
\*------------------------------------*/

/**
 * Register Navigation Menus
 */
function siglo21_2026_register_menus() {
	register_nav_menus( array(
		'header-menu' => __( 'Header Menu', 'siglo21_2026' ),
		'footer-menu' => __( 'Footer Menu', 'siglo21_2026' ),
	) );
}

add_action( 'init', 'siglo21_2026_register_menus' );

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class( $classes ) {
	global $post;
	if ( is_home() ) {
		$key = array_search( 'blog', $classes );
		if ( $key > -1 ) {
			unset( $classes[ $key ] );
		}
	} elseif ( is_page() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	} elseif ( is_singular() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	}

	// Add palette color class
	$classes[] = 'palettegreen';

	return $classes;
}

// Sidebars se registran en "widgets_init" (no antes de "init"): llamar
// register_sidebar() -y los __() de sus textos- en el cuerpo suelto de
// functions.php dispara el aviso de WP 6.7+ de traducciones cargadas
// demasiado pronto.
function siglo21_2026_register_sidebars() {
	register_sidebar( array(
		'name'          => __( 'Widget Area 1', 'siglo21_2026' ),
		'description'   => __( 'Description for this widget-area...', 'siglo21_2026' ),
		'id'            => 'widget-area-1',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Area 2', 'siglo21_2026' ),
		'description'   => __( 'Description for this widget-area...', 'siglo21_2026' ),
		'id'            => 'widget-area-2',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'siglo21_2026_register_sidebars' );

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function siglo21_2026_pagination() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links( array(
		'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
	) );
}

/**
 * Retorna el nombre de la primera categoría del post recibido.
 */
function get_nombre_categoria( $post_id ) {
	$categorias = get_the_category();
	if ( ! empty( $categorias ) ) {
		return $categorias[0]->name;
	}
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action( 'init', 'siglo21_2026_pagination' ); // Add our HTML5 Pagination

// Add Filters
add_filter( 'body_class', 'add_slug_to_body_class' );

// Remove Filters
remove_filter( 'the_excerpt', 'wpautop' ); // Remove <p> tags from Excerpt altogether

// Inhabilitar XML-RPC, que posibilita intentos de login automatizados de bots
add_filter( 'xmlrpc_enabled', '__return_false' );

?>
