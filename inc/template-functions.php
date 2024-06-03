<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package beheroes
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function beheroes_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'beheroes_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function beheroes_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'beheroes_pingback_header' );

/* ACF SETTINGS PAGE */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Einstellungen',
		'menu_title'	=> 'Einstellungen',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/* ADD CSS AND JS */
function add_css_js() {	
	wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/fontawesome/css/all.min.css' );
	wp_enqueue_style( 'fonts', get_stylesheet_directory_uri() . '/assets/css/fonts.css' );
	wp_enqueue_style( 'hover', get_stylesheet_directory_uri() . '/assets/css/hover.css' );
	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/css/main.css' );
	
	wp_enqueue_style( 'swipercss', get_stylesheet_directory_uri() . '/assets/swiper/swiper-bundle.min.css' );
	wp_enqueue_script( 'swiperjs', get_stylesheet_directory_uri() . '/assets/swiper/swiper-bundle.min.js' );
	
	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js' );
	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/js/custom.js' );
	wp_enqueue_script( 'customjs', get_stylesheet_directory_uri() . '/js/custom.js' );

	
	if (!is_page(array(81))) {
		wp_enqueue_style( 'mapboxcss', get_stylesheet_directory_uri() . '/assets/mapbox/mapbox-gl.css' );
		wp_enqueue_script( 'mapboxjs', get_stylesheet_directory_uri() . '/assets/mapbox/mapbox-gl.js' );
	}
}
add_action( 'wp_enqueue_scripts', 'add_css_js' );








