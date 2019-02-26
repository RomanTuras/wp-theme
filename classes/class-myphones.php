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
<<<<<<< HEAD
		 * Adding a new taxonomy: 'manufacturer'
=======
		 * Adding a new taxonomies: 'manufacturer', 'reliable'
>>>>>>> fec45c8f4fc50aca5326dfccd80f4a4f560c18ee
		 */
		require_once ('class-myphones-taxonomy.php');
		$taxonomy = new Taxonomy();
		add_action( 'init', array($taxonomy, 'create_manufacturer_taxonomy') );
<<<<<<< HEAD
=======
		add_action( 'init', array($taxonomy, 'create_reliable_taxonomy') );
>>>>>>> fec45c8f4fc50aca5326dfccd80f4a4f560c18ee

		/**
		 * Adding a new post type: 'product'
		 */
		require_once ('class-myphones-post-type.php');
		$postType = new PostType();
		add_action( 'init', array($postType, 'create_manufacturer_init') );

		/**
<<<<<<< HEAD
		 * Making a filter widget
		 */
		require_once('class-myphones-filter-widget.php');
		function register_filter_widget() {
			register_widget( 'MyPhonesFilterWidget' );
		}
		add_action( 'widgets_init', 'register_filter_widget' );
=======
		 * Making a manufacturers filter widget
		 */
		require_once('class-myphones-manufacturer-filter-widget.php');
		function register_manufacturer_filter_widget() {
			register_widget( 'ManufacturerFilterWidget' );
		}
		add_action( 'widgets_init', 'register_manufacturer_filter_widget' );

>>>>>>> fec45c8f4fc50aca5326dfccd80f4a4f560c18ee
	}

}
