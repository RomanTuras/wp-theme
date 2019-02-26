<?php /* Template Name: Filter Page */ ?>

<?php get_header(); ?>

<main role="main">

    <style>
        div .col img{
            width: auto !important;
            height: 250px !important;
        }
    </style>

	<?php
        require_once ('classes/class-myphones-filter.php');
        $filter = new Filter();

        if( isset($_GET['manufacturers']) ) $manufacturers = $_GET['manufacturers'];
        else $manufacturers = 'all';

        if( isset($_GET['reliables']) ) $reliables = $_GET['reliables'];
        else $reliables = 'all';

        $query  = $filter->processingFilterParams( $manufacturers, $reliables );
    ?>

    <div class="row">
        <div class="col-md-2">
            <div class="sidenav" >
				<?php get_sidebar(); ?>
            </div>
        </div>
        <div class="col-md-10">
            <div class="container">
                <div id="showcase" class="row">
					<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col col-md-4">
                            <h2><?php the_title(); ?></h2>
                            <span class="post-img"><?php the_post_thumbnail('full'); ?></span>
                            <p><?php the_excerpt(); ?></p>
                            <p><a class="btn btn-secondary" href="<?php the_permalink(); ?>" role="button">View details &raquo;</a></p>
                        </div>
					<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
                        <nav class="pagination">
							<?php pagination_bar($query); ?>
                        </nav>

					<?php else: ?>

					<?php endif; ?>
                </div>

                <hr>

            </div> <!-- /container -->
        </div>
    </div>

</main>

<?php get_footer(); ?>

<?php
function pagination_bar($the_query) {
    $total_pages = $the_query->max_num_pages;

	if ($total_pages > 1){
		$current_page = max(1, get_query_var('page'));
		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => 'page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
		));
    }
}

?>
