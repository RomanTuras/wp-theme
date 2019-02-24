<?php
/**
 * Create a new post type
 */

class PostType {

	function create_manufacturer_init() {
		$args = array(
			'public' => true,
			'label'  => 'Products',
			'description'        => __( 'Description.', 'myphones' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
//			'rewrite'            => array( 'slug' => 'manufacturer' ),
			'capability_type'    => 'post',
			'menu_icon'          => 'dashicons-smartphone',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments' )
		);
		register_post_type( 'product', $args );
	}
}