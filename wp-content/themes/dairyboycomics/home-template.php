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

			<div id="PW-ad-box">
				<div>project wonderful ad box</div>
			</div>

			<?php $altText = get_post_meta (get_the_ID(), 'comic-hovertext', true) ?>
			
			<a href="<?php echo get_post_permalink(); ?>">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $altText; ?>" title="<?php echo $altText; ?>">
			</a>

		<?php

		endwhile; endif; 
	?>
	<div class="row prev-links">
		<div class="col-xs-3">
			<div class="prev-comics" id="beginning">
				<?php
					$ass = array(
						'post_type'		=> 'comic',
						'order'			=> 'ASC',
						'posts_per_page'=> 1,
						'chapters' 		=> 'austins-inferno',
					);
					$query_posts = new WP_Query($ass);

					if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

						<a href="<?php echo get_post_permalink(); ?>">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/nav/prev-in.png" alt="jump to beginning of comic" title="jump to beginning of comic">	
						</a>

				<?php endwhile; endif; ?>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="prev-comics" id="previous">
				<?php
					$ass = array(
						'post_type'		=> 'comic',
						'posts_per_page'=> 1,
						'chapters' 		=> 'austins-inferno',
						'offset'		=> 1
					);
					$query_posts = new WP_Query($ass);

					if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

						<a href="<?php echo get_post_permalink(); ?>">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/nav/prev-in.png" alt="jump to previous comic" title="jump to previous comic">	
						</a>

				<?php endwhile; endif; ?>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="prev-comics" id="canto">
				<?php
					$ass = array(
						'post_type'		=> 'comic',
						'posts_per_page'=> 1,
						'chapters' 		=> 'austins-inferno',
						'meta_key' 		=> 'is_cover',
						'meta_value' 	=> 'yes'
					);
					$query_posts = new WP_Query($ass);

					if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

						<a href="<?php echo get_post_permalink(); ?>">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/nav/prev-in.png" alt="jump to Canto start" title="jump to Canto start">	
						</a>

				<?php endwhile; endif; ?>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="prev-comics" id="archive">
				<a href="<?php site_url(); ?>/comics/?series=austins-inferno">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/img/nav/prev-in.png" alt="go to Archive" title="go to Archive">	
				</a>
			</div>
		</div>
	</div>
</div>

<div id="sidebar-right-of-comic" class="sidebar">
	<div class="home-sidebar">
		<div class="social-media row sidebar-item">
			<div class="col-xs-6">
				<div class="social-link">
					<a href="http://www.comicchameleon.com/">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/social/sm-fb.png" alt="comic chameleon">
					</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="social-link">
					<a href="https://www.facebook.com/WebcomicAvenue/">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/social/sm-fb.png" alt="webcomic avenue">
					</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="social-link">
					<a href="https://www.facebook.com/DairyBoyComicsPage/">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/social/sm-fb.png" alt="facebook">
					</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="social-link">
					<a href="https://twitter.com/DairyBoyComics">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/social/sm-fb.png" alt="twitter">
					</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="social-link">
					<a href="https://www.youtube.com/watch?v=mNFx28NGLfI">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/social/sm-fb.png" alt="shrek souls">
					</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="social-link">
					<a href="https://dairyboycomics.deviantart.com/">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/social/sm-fb.png" alt="deviant art">
					</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="social-link">
					<a href="https://anvilstation.com/">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/social/sm-fb.png" alt="anvil station">
					</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="social-link">
					<a href="<?php site_url(); ?>/feed/">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/social/sm-fb.png" alt="rss">
					</a>
				</div>
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
						<div class="comic-preview">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/ai-logo.png" alt="Anvil Station Stories">
						</div>
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
						<div class="comic-preview">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/ai-logo.png" alt="Halo PWNED">
						</div>
					</a>
					<h3>Halo PWNED</h3>
					<a href="<?php echo get_post_permalink(); ?>">Read Latest</a>

			<?php endwhile; endif; ?>
		</div>
		<div class="search-form">
			<h4>Search Comic Archives</h4>
			<form class="" action="<?php bloginfo('url'); ?>/comic/" method="get">

				<?php include_search_form(); ?>

			</form>
		</div>
	</div>
</div>
<div class="latest-stuff home-news">
	<div class="row">
		<div class="col-xs-4">
			<div class="comic-preview">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/ai-logo.png" alt="What's up?">
			</div>
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

			<a href="<?php site_url(); ?>/news/">Read More</a>

		<?php endwhile; endif; 
	?>
</div>

<?php get_footer();