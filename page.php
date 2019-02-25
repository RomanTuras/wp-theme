
<?php get_header(); ?>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">My Phones page</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>
    </div>

    <style>
        div .col img{
            width: auto !important;
            height: 250px !important;
        }
    </style>

    <div class="row">
        <div class="col-md-2">
            <div class="sidenav" >
				<?php get_sidebar(); ?>
            </div>
        </div>
        <div class="col-md-10">
            <div class="container">
                <?php
				$args = array( 'post_type' => 'product', 'posts_per_page' => 3 );
				$the_query = new WP_Query( $args );
				?>
                <div id="showcase" class="row">
					<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="col col-md-4">
                            <h2><?php the_title(); ?></h2>
                            <span class="post-img"><?php the_post_thumbnail('full'); ?></span>
                            <p><?php the_excerpt(); ?></p>
                            <p><a class="btn btn-secondary" href="<?php the_permalink(); ?>" role="button">View details &raquo;</a></p>
                        </div>
					<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
                        <nav class="pagination">
							<?php pagination_bar(); ?>
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
function pagination_bar() {
	global $wp_query;

	$total_pages = $wp_query->max_num_pages;
	echo gget_the_posts_pagination( array(
		'mid_size' => 2,
		'prev_text' => __( 'Newer', 'textdomain' ),
		'next_text' => __( 'Older', 'textdomain' ),
	) );

	if ($total_pages > 1){
		$current_page = max(1, get_query_var('paged'));

		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => '/page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
		));
	}
}

?>
