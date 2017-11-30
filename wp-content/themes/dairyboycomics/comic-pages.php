<?php
/*
Template Name: Chapter Pages
*/
get_header();

$blog_query = array(
		'paged' => $paged,
		'post_type' => 'post'
		);
		
$wp_query = new WP_Query(); $wp_query->query($blog_query);

if (have_posts()) {
	while (have_posts()) : the_post();

	endwhile;
}

wp_reset_postdata();
wp_reset_query();

get_footer();