<?php
/*
Template Name: Home
*/
get_header(); ?>

<div id="comic">
	<?php
		$args = array(
			'post_type'		=> 'comic',
			'posts_per_page'=> 1,
			'chapters' 		=> 'austins-inferno',
		);
		$query_posts = new WP_Query($args);

		if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>
			
			<a href="<?php get_post_permalink(); ?>">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="comic">
			</a>

		<?php endwhile; endif; ?>
</div>

<div id="sidebar-right-of-comic" class="sidebar">
	<img src="https://dairyboy-comics.dev/wp-content/uploads/2017/11/twitter-pic-300x300.jpg" width="202" height="202" alt="">
</div>

<?php get_footer();