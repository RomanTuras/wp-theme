<?php

/**
 * Create a new Taxonomy
 */
class Taxonomy {

	function create_manufacturer_taxonomy() {
		register_taxonomy(
			'manufacturer',
			'product',
			$args          = array(
				'hierarchical'      => true,
				'labels'            => array(
					'name'          => _x( 'Manufacturers', 'taxonomy general name' ),
					'singular_name' => _x( 'Manufacturer', 'taxonomy singular name' ),
					'search_items'  => __( 'Search manufacturer' ),
					'all_items'     => __( 'All manufacturers' ),
					'edit_item'     => __( 'Edit manufacturers' ),
					'update_item'   => __( 'Refresh manufacturer' ),
					'add_new_item'  => __( 'Add new manufacturer' ),
					'new_item_name' => __( 'New name manufacturer' ),
					'menu_name'     => __( 'Manufacturers' ),
				),
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'manufacturer' )
			));
	}
	
}