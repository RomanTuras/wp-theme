<?php

/**
 * Main Class of the MyPhones Theme
 */
class MyPhones{

	function init(){

		/**
		 * Adding thumbnails support
		 */
		add_theme_support('post-thumbnails', array('post', 'product'));

		/**
		 * Adding a new taxonomies: 'manufacturer', 'reliable'
		 */
		require_once ('class-myphones-taxonomy.php');
		$taxonomy = new Taxonomy();
		add_action( 'init', array($taxonomy, 'create_manufacturer_taxonomy') );
		add_action( 'init', array($taxonomy, 'create_reliable_taxonomy') );

		/**
		 * Adding a new post type: 'product'
		 */
		require_once ('class-myphones-post-type.php');
		$postType = new PostType();
		add_action( 'init', array($postType, 'create_manufacturer_init') );

		/**
		 * Making a manufacturers filter widget
		 */
		require_once('class-myphones-filter-widget.php');
		function register_filter_widget() {
			register_widget( 'FilterWidget' );
		}
		add_action( 'widgets_init', 'register_filter_widget' );

	}

}
