<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> 
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<meta name="ComicPress" content="<?php echo comicpress_themeinfo('version'); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php comicpress_get_sidebar('above-header'); ?>
<div id="page-wrap">
	<div id="page">
		<header id="header">
			<div class="row">
				<div class="col-sm-2">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/img/dbc-logo.png" alt="DairyBoy Comics">
				</div>
				<div class="col-sm-10">
					<div class="header-info">
						<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h1>
						<div class="description"><?php bloginfo('description') ?></div>
					</div>
					<?php comicpress_get_sidebar('header'); ?>
					<div class="clear"></div>
					
					<?php wp_nav_menu(); ?>
				</div>
			</div>
		</header>
		
<?php

get_template_part('layout', 'head');