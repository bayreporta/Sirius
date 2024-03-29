<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<script src="https://use.typekit.net/ole1lxp.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<script src="https://use.fontawesome.com/4ac2a9e804.js"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<header id="header" role="banner">
		<a href="<?php echo get_site_url(); ?>"><section id="branding">
			<img alt="" src="<?php header_image(); ?>">

			<div id="site-title">
				<div><?php print bloginfo('name'); ?></div>
				<div><?php print bloginfo('description'); ?></div>
			</div>
		</section></a>
		<nav id="menu" role="navigation">
			<div id="burger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>
	</header>
	<div id="container">