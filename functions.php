<?php

/**
 * Menu
 **/
register_nav_menus( array(
	'main-menu' => __( 'main-menu' )
));

/**
 * Flushing rewrite rules
 */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

/**
 * Styles & Scripts
 */
function my_scripts(){
	wp_enqueue_style( 'bootstrap-css', get_bloginfo( 'template_directory' ) . '/css/bootstrap.min.css',
		false, null );
	wp_enqueue_script( 'jquery-js', get_bloginfo( 'template_directory' ) . '/js/jquery.min.js', array(),
		false, null );
	wp_enqueue_script( 'bootstrap-bundle-js',
		get_bloginfo( 'template_directory' ) . '/js/bootstrap.bundle.min.js', array(), false, null );
	wp_enqueue_script( 'my-filter-js', get_bloginfo( 'template_directory' ) . '/js/my-filter.js', array(),
		false, null );
}
add_action('wp_enqueue_scripts', 'my_scripts');

/**
 * Main Class
 */
require_once(get_template_directory() . '/classes/class-myphones.php');
$myPhones = new MyPhones();
$myPhones->init();

/**
 * Sidebar
 **/
register_sidebar( array(
	'name' => __( 'Sidebar', 'myiphone' ),
	'id' => 'sidebar',
	'description' => 'Filter',
	'before_widget' => '<aside class="widget">',
	'after_widget' => '</aside>',
	'before_title' => '<div class="widget-title">',
	'after_title' => '</div>',
));

/**
 * Adding filter handler 
 */
require_once(get_template_directory() . '/classes/class-myphones-filter.php');
$filter = new Filter();
add_action( 'wp_ajax_taxonomy', array($filter, 'processingFilterParams') );
add_action( 'wp_ajax_nopriv_taxonomy', array($filter, 'processingFilterParams') );