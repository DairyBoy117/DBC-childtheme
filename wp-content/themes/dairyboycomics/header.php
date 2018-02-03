<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> 
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<meta name="ComicPress" content="<?php echo comicpress_themeinfo('version'); ?>" />
<?php wp_head(); ?>
<?php
	$comicStyle = get_field('change_style');
	switch ($comicStyle) {
	    case "thunder-moo": ?>
	        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/thunder-moo.css" type="text/css" />
	        <?php break;
	    case "halo-pwned": ?>
	        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/halo-pwned.css" type="text/css" />
	        <?php break;
	    case "ninth-circle": ?>
	        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/ninth-circle.css" type="text/css" />
	        <?php break;
	}
?>
</head>

<body <?php body_class(); ?>>
<?php comicpress_get_sidebar('above-header'); ?>
<div id="page-wrap">
	<div id="page">
		<header id="header">
			<div class="row">
				<div class="col-xs-2">
					<a href="<?php echo site_url(); ?>">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/dbc-logo.png" class="logo" alt="DairyBoy Comics">
					</a>
				</div>
				<div class="col-xs-10">
					<div class="header-info">
						<a href="<?php echo site_url(); ?>">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/banners/banner_<?php $random = rand(1,2); echo $random; ?>.jpg" alt="Home to Austin's Inferno" class="random-banner"/>
						</a>
					</div>
					<?php comicpress_get_sidebar('header'); ?>
					<div class="clear"></div>
					
					<nav>
						<?php wp_nav_menu(); ?>
					</nav>
					
				</div>
			</div>
		</header>
		
<?php

get_template_part('layout', 'head');