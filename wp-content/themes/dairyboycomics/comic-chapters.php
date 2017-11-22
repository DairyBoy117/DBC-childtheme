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
			
			$terms = get_the_terms(get_the_ID(), 'chapters');
			$i = 0;
			foreach($terms as $term) {
				if ($i == 0) {
					echo "";
				} else {
					echo $term->name;
				}
				$i++;
			}

	      endwhile;
	   else: 
	?>

	      Oops, there are no posts.

	<?php
	   endif;

	wp_reset_postdata();
	wp_reset_query();

get_footer();