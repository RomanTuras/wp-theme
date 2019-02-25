<?php

get_header();
?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<div class="sidenav" >
<!--							--><?php //get_sidebar(); ?>
						</div>
					</div>
				<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', 'single' ); ?>

							<div class="showcase col-md-8">
								<h2><?php the_title(); ?></h2>
								<span class="post-img"><?php the_post_thumbnail('medium'); ?></span>
								<p><?php the_content(); ?></p>
							</div>

				<?php

				endwhile; // End of the loop.
				?>
				</div>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->


<?php 
get_footer();
?>