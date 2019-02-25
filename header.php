<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo wp_get_document_title(); ?></title>
    <link href="<?php echo get_bloginfo( 'template_directory' ); ?>/css/bootstrap.min.css" rel="stylesheet" >
	<?php wp_head(); ?>
</head>
<body>
<div id="logo">
	<!-- <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/shapka.png" alt="" title="" /></a -->
</div>

<?php

$args = array(
	'theme_location' => 'main-menu',
	'menu' => 'main-menu',
	'container' => 'nav',
	'container_class' => 'menu-{menu-slug}-container',
	'container_id' => 'main-menu',
	'menu_class' => '',
	'menu_id' => 'main-menu',
	'echo' => true,
	'fallback_cb' => '__return_empty_string',
	'before' => '',
	'after' => '',
	'link_before' => '',
	'link_after' => '',
	'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
	'depth' => 0,
	'walker' => ''
);

wp_nav_menu( $args );

?>

<!--<nav class="navbar navbar-expand-md navbar-dark bg-dark">-->
<!--    <a class="navbar-brand" href="#">Navbar</a>-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!---->
<!--    <div class="collapse navbar-collapse" id="navbarsExampleDefault">-->
<!--        <ul class="navbar-nav mr-auto">-->
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Link</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link disabled" href="#">Disabled</a>-->
<!--            </li>-->
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>-->
<!--                <div class="dropdown-menu" aria-labelledby="dropdown01">-->
<!--                    <a class="dropdown-item" href="#">Action</a>-->
<!--                    <a class="dropdown-item" href="#">Another action</a>-->
<!--                    <a class="dropdown-item" href="#">Something else here</a>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <form class="form-inline my-2 my-lg-0">-->
<!--            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">-->
<!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--        </form>-->
<!--    </div>-->
<!--</nav>-->
