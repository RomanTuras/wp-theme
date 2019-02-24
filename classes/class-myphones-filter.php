<?php
/**
 * Filter class
 */
class Filter{

    function processingFilterParams(){
        if($_GET['param'] == 'all'){
            $terms = array();
        }else $terms = array($_GET['param']);
    
        $products = get_posts( array(
            'posts_per_page' => 3,
            'orderby'        => 'rand',
            'post_type'      => 'product',
            'manufacturer'   => $terms
        ) );
        echo json_encode($products);
        die;
    }

}