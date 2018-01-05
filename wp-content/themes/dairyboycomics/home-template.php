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

			ceo_display_comic_navigation();

			$altText = get_post_meta (get_the_ID(), 'comic-hovertext', true) ?>
			
			<a href="<?php echo get_post_permalink(); ?>">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $altText; ?>" title="<?php echo $altText; ?>">
			</a>

			<?php ceo_display_comic_navigation();

		endwhile; endif; 
	?>
</div>

<div id="sidebar-right-of-comic" class="sidebar">
	<div class="home-sidebar">
		<div class="social-media row sidebar-item">
			<div class="col-xs-6">
				<div class="social-link"></div>
			</div>
			<div class="col-xs-6">
				<div class="social-link"></div>
			</div>
			<div class="col-xs-6">
				<div class="social-link"></div>
			</div>
			<div class="col-xs-6">
				<div class="social-link"></div>
			</div>
			<div class="col-xs-6">
				<div class="social-link"></div>
			</div>
			<div class="col-xs-6">
				<div class="social-link"></div>
			</div>
			<div class="col-xs-6">
				<div class="social-link"></div>
			</div>
			<div class="col-xs-6">
				<div class="social-link"></div>
			</div>
		</div>
		<div class="latest-stuff sidebar-item">
			<?php
				$ass = array(
					'post_type'		=> 'comic',
					'posts_per_page'=> 1,
					'chapters' 		=> 'ass',
				);
				$query_posts = new WP_Query($ass);

				if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

					<a href="<?php echo get_post_permalink(); ?>">
						<div class="comic-preview"></div>
					</a>
					<h3>Anvil Station Stories</h3>
					<a href="<?php echo get_post_permalink(); ?>">Read Latest</a>

			<?php endwhile; endif; ?>
		</div>
		<div class="latest-stuff sidebar-item">
			<?php
				$ass = array(
					'post_type'		=> 'comic',
					'posts_per_page'=> 1,
					'chapters' 		=> 'halo-pwned',
					'meta_key' 		=> 'is_cover',
					'meta_value' 	=> 'yes'
				);
				$query_posts = new WP_Query($ass);

				if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

					<a href="<?php echo get_post_permalink(); ?>">
						<div class="comic-preview"></div>
					</a>
					<h3>Halo PWNED</h3>
					<a href="<?php echo get_post_permalink(); ?>">Read Latest</a>

			<?php endwhile; endif; ?>
		</div>
		<div class="home-search">
			<form class="" action="<?php bloginfo('url'); ?>/comic/" method="get">

				<?php include_search_form(); ?>

			</form>
		</div>
	</div>
</div>
<div class="latest-stuff home-news">
	<div class="row">
		<div class="col-xs-4">
			<div class="comic-preview"></div>
		</div>
		<div class="col-xs-8">
			<h2>What's Up?</h2>
		</div>
	</div>
	<?php
		$args = array(
			'post_type'		=> 'post',
			'posts_per_page'=> 1
		);
		$query_posts = new WP_Query($args);

		if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

			<h3><?php the_title(); ?></h3>

			<?php the_content(); ?>

			<a href="#">Read More</a>

		<?php endwhile; endif; 
	?>
</div>

<?php get_footer();