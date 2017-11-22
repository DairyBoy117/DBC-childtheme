<?php
/*
Template Name: Comic Chapters
*/
get_header();

	$args = array(
				'post_type'		=> 'comic',
				'chapters' 		=> 'austins-inferno',
				'meta_key' 		=> 'is_cover',
				'meta_value' 	=> 'yes'
			);
	   $category_posts = new WP_Query($args);

	   if($category_posts->have_posts()) : 
	      while($category_posts->have_posts()) : 
	         $category_posts->the_post(); 

	         the_post_thumbnail('thumbnail'); 


	wp_reset_postdata();
	wp_reset_query();

get_footer();