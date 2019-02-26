<?php
/**
 * Filter class
 */
class Filter{

	/**
	 * Processing filter parameters
	 * @param $manufacturers
	 * @param $reliables
	 *
	 * @return WP_Query
	 */
    function processingFilterParams($manufacturers, $reliables){

        if($manufacturers == 'all'){
            $termsManufacturers = [];
		}else $termsManufacturers = explode(',', $_GET['manufacturers']);
		
		if($reliables == 'all'){
            $termsReliables = [];
        }else $termsReliables = explode(',', $_GET['reliables']);

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

	    $args = [
			'post_type' => 'product',
			'posts_per_page' => 3,
			'paged' => get_query_var('page'),
			'tax_query' => $tax_query,
		 ];
		$query = new WP_Query( $args );
	    wp_reset_postdata();

	    return $query;
    }

}