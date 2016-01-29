<?php
/**
 * Ligeti functions and definitions
 *
 * @package Ligeti
 * @since Ligeti 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Ligeti 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'ligeti_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Ligeti 1.0
 */
function ligeti_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	require( get_template_directory() . '/inc/custom.inc.php' );


	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Ligeti, use a find and replace
	 * to change 'ligeti' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ligeti', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'large21', 1600, 800, true );

	add_image_size( 'fullfree', 1920, 9999, false );
	add_image_size( 'large169', 960, 540, true );
	add_image_size( 'medium169', 480, 270, true );
	add_image_size( 'small169', 320, 180, true );

	add_image_size( 'large43', 960, 720, true );
	add_image_size( 'medium43', 480, 360, true );
	add_image_size( 'small43', 320, 240, true );




	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ligeti' ),
		'leftbottom' => __( 'Leftbottom Menu', 'ligeti'),
		'furnitures' => __( 'Furnitures Menu', 'ligeti')
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // ligeti_setup
add_action( 'after_setup_theme', 'ligeti_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function ligeti_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'ligeti_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'ligeti_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Ligeti 1.0
 */
function ligeti_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'ligeti' ),
		'id'            => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s span6">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Left Bottom Sidebar', 'ligeti' ),
		'id'            => 'sidebar-leftbottom',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ligeti_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function ligeti_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.css' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/bootstrap/css/responsive.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	//wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	//wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'ligeti_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );


function more_posts_on_taxonomy( $query ) {
    if ( $query->is_archive() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', '1000' );
    }
}
add_action( 'pre_get_posts', 'more_posts_on_taxonomy' );

