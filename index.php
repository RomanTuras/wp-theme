
<?php get_header(); ?>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">My Phones</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>
    </div>

    <style>
        div .showcase img{
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
            <h2>index.php</h2>
        <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 10 );
        $the_query = new WP_Query( $args );
        ?>
        <div class="row">
            <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="showcase col-md-4">
                <h2><?php the_title(); ?></h2>
                <span class="post-img"><?php the_post_thumbnail('full'); ?></span>
                <p><?php the_excerpt(); ?></p>
                <p><a class="btn btn-secondary" href="<?php the_permalink(); ?>" role="button">View details &raquo;</a></p>
            </div>
            <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else: ?>

            <?php endif; ?>
        </div>

        <hr>

    </div> <!-- /container -->
    </div>
</div>    
    
</main>

<?php get_footer(); ?>
