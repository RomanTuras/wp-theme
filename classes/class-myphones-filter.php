<?php
/**
 * Filter class
 */
class Filter{

    function processingFilterParams(){

        if($_GET['manufacturers'] == 'all'){
            $termsManufacturers = '';
		}else $termsManufacturers = array($_GET['manufacturers']);
		
		if($_GET['reliables'] == 'all'){
            $termsReliables = '';
        }else $termsReliables = array($_GET['reliables']);

        $products_list = array();
		    $args = array( 
				'post_type' => 'product', 
				'posts_per_page' => 3, 
				'tax_query' => array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'manufacturer',
						'terms'   => $termsManufacturers,
					),
					// array( 
					// 	'taxonomy' => 'reliable',
					// 	'terms' => $termsReliables,
					// ),
				),				
			 );
			$the_query = new WP_Query( $args );
			// query_posts($myquery);
		    if ( $the_query->have_posts() ){
			    while ( $the_query->have_posts() ){
				    $the_query->the_post();
				    array_push($products_list, [
					    "title" =>  get_the_title(),
					    "post_name" => get_post_field( 'post_name', get_post() ),
					    "permalink" => get_the_permalink(),
					    "excerpt" => get_the_excerpt(),
					    "thumbnail" => get_the_post_thumbnail_url( null, 'medium' )
				    ]);
			    }
		    }
		    wp_reset_postdata();
        echo json_encode($products_list);
        die;
    }

}