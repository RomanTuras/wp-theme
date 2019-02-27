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

/**
 * Registering Rest API
 */
add_action( 'rest_api_init', function () {
	register_rest_route( 'myphones', '/(?P<manufacturer>[a-zA-Z,]+)/(?P<reliable>[a-zA-Z,]+)', array(
		'methods'  => 'GET',
		'callback' => 'my_awesome_func',
	) );
} );

/**
 * Processing Rest API request
 * @param WP_REST_Request $request
 *
 * @return array|WP_Error
 */
function my_awesome_func( WP_REST_Request $request ) {

	if($request['manufacturer'] == 'all'){
		$termsManufacturers = [];
	}else $termsManufacturers = explode(',', $request['manufacturer']);

	if($request['reliable'] == 'all'){
		$termsReliables = [];
	}else $termsReliables = explode(',', $request['reliable']);

	if(count($termsManufacturers) == 0 && count($termsReliables) == 0 ) $tax_query = [];
	else $tax_query = [
		'relation' => 'OR',
		[
			'taxonomy' => 'manufacturer',
			'field' => 'slug',
			'terms'   => $termsManufacturers,
		],
		[
			'taxonomy' => 'reliable',
			'field' => 'slug',
			'terms' => $termsReliables,
		],
	];

	$posts = get_posts([
			'post_type' => 'product',
			'tax_query' => $tax_query,
	]);

	if ( empty( $posts ) )
		return new WP_Error( 'no_author_posts', 'Records not found', array( 'status' => 404 ) );


	return $posts;
}