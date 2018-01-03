<?php
/*
Template Name: Home
*/
get_header(); ?>

<div id="comic">
	<div id="PW-ad-box">
		<div>project wonderful ad box</div>
	</div>
	<?php
		$args = array(
			'post_type'		=> 'comic',
			'posts_per_page'=> 1,
			'chapters' 		=> 'austins-inferno',
		);
		$query_posts = new WP_Query($args);

		if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post();

			$altText = get_post_meta (get_the_ID(), 'comic-hovertext', true) ?>
			
			<a href="<?php get_post_permalink(); ?>">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $altText; ?>" title="<?php echo $altText; ?>">
			</a>

		<?php endwhile; endif; ?>
</div>

<div id="sidebar-right-of-comic" class="sidebar">
	<div class="home-sidebar">
		<div class="social-links">
			<div style=""></div>
		</div>
	</div>
</div>

<?php get_footer();