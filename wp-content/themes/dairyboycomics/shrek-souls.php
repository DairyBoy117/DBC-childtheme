<?php
/*
Template Name: Shrek Souls
*/

?>

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

	<a href="<?php echo site_url(); ?>">Get out of my swamp</a>

	<?php the_post_thumbnail(); ?>

<?php wp_footer(); ?>
</body>
</html>