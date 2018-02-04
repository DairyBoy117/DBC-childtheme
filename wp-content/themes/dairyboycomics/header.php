<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> 
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<meta name="ComicPress" content="<?php echo comicpress_themeinfo('version'); ?>" />
<?php wp_head(); 
series_style()?>
</head>

<body <?php body_class(); ?>>
<?php comicpress_get_sidebar('above-header'); ?>
<div id="page-wrap">
	<div id="page">
		<header id="header">
			<div class="row">
				<div class="col-xs-2">
					<a href="<?php echo site_url(); ?>"> 
						<?php 
						$comicStyle = get_field('change_style');
						if (is_single()) {
							if ($comicStyle == "thunder-moo" || $comicStyle == "ninth-circle") { ?>
								<img src="<?php echo get_stylesheet_directory_uri() ?>/img/dbc-logo-light.png" class="logo" alt="DairyBoy Comics">
							<?php } else { ?>
								<img src="<?php echo get_stylesheet_directory_uri() ?>/img/dbc-logo-dark.png" class="logo" alt="DairyBoy Comics">
							<?php }
						} else { ?>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/dbc-logo-dark.png" class="logo" alt="DairyBoy Comics">
						<?php } ?>
					</a>
				</div>
				<div class="col-xs-10">
					<div class="header-info">
						<a href="<?php echo site_url(); ?>">
							<?php if (is_single()) {
								switch ($comicStyle) {
								    case "thunder-moo": ?>
								        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/banners/banner_tm.jpg" alt="Home to Austin's Inferno" class="header-banner"/>
								        <?php break;
								    case "halo-pwned": ?>
								        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/banners/banner_halo.jpg" alt="Home to Austin's Inferno" class="header-banner"/>
								        <?php break;
								    default: ?>
										<img src="<?php echo get_stylesheet_directory_uri() ?>/img/banners/banner_<?php $random = rand(1,2); echo $random; ?>.jpg" alt="Home to Austin's Inferno" class="header-banner"/>
								<?php }
							} else { ?>
								<img src="<?php echo get_stylesheet_directory_uri() ?>/img/banners/banner_<?php $random = rand(1,2); echo $random; ?>.jpg" alt="Home to Austin's Inferno" class="header-banner"/>
							<?php } ?>
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