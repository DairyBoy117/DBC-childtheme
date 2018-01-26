<?php
/*
Template Name: Select Comic
*/
get_header(); ?>

<div id="content-wrapper">
	<div class="row">
		<div class="col-xs-6">
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum vitae dui id efficitur. Suspendisse fermentum fermentum neque eu fermentum. Nulla sed mauris eget massa malesuada commodo. Donec eget nibh faucibus, sodales mauris eget, lobortis sapien. Quisque ac tempor odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque suscipit bibendum nisl vitae vulputate.</p>

			<div class="row">
				<div class="col-xs-4">
					
					<?php
						$AIfirst = array(
							'post_type'		=> 'comic',
							'posts_per_page'=> 1,
							'order'			=> 'ASC',
							'chapters' 		=> 'austins-inferno',
						);
						$query_posts = new WP_Query($AIfirst);

						if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

							<a href="<?php echo get_post_permalink(); ?>">First Comic</a>

					<?php endwhile; endif; ?>

				</div>
				<div class="col-xs-4">
					
					<?php
						$AIlatest = array(
							'post_type'		=> 'comic',
							'posts_per_page'=> 1,
							'chapters' 		=> 'austins-inferno',
						);
						$query_posts = new WP_Query($AIlatest);

						if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

							<a href="<?php echo get_post_permalink(); ?>">Latest Comic</a>

					<?php endwhile; endif; ?>

				</div>
				<div class="col-xs-4">
					
					<a href="<?php site_url(); ?>/comics/?series=austins-inferno">Archive</a>

				</div>
			</div>

		</div>
		<div class="col-xs-6">
			<div class="comic-img">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/ai-logo.png" alt="What's up?">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="comic-img">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/ai-logo.png" alt="What's up?">
			</div>
		</div>
		<div class="col-xs-6">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum vitae dui id efficitur. Suspendisse fermentum fermentum neque eu fermentum. Nulla sed mauris eget massa malesuada commodo. Donec eget nibh faucibus, sodales mauris eget, lobortis sapien. Quisque ac tempor odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque suscipit bibendum nisl vitae vulputate.</p>

			<div class="row">
				<div class="col-xs-4">
					
					<?php
						$AssFirst = array(
							'post_type'		=> 'comic',
							'posts_per_page'=> 1,
							'order'			=> 'ASC',
							'chapters' 		=> 'ass',
						);
						$query_posts = new WP_Query($AssFirst);

						if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

							<a href="<?php echo get_post_permalink(); ?>">First Comic</a>

					<?php endwhile; endif; ?>

				</div>
				<div class="col-xs-4">
					
					<?php
						$AssLatest = array(
							'post_type'		=> 'comic',
							'posts_per_page'=> 1,
							'chapters' 		=> 'ass',
						);
						$query_posts = new WP_Query($AssLatest);

						if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

							<a href="<?php echo get_post_permalink(); ?>">Latest Comic</a>

					<?php endwhile; endif; ?>

				</div>
				<div class="col-xs-4">
					
					<a href="<?php site_url(); ?>/comics/?series=ass">Archive</a>

				</div>
			</div>


		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum vitae dui id efficitur. Suspendisse fermentum fermentum neque eu fermentum. Nulla sed mauris eget massa malesuada commodo. Donec eget nibh faucibus, sodales mauris eget, lobortis sapien. Quisque ac tempor odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque suscipit bibendum nisl vitae vulputate.</p>

			<div class="row">
				<div class="col-xs-4">
					
					<?php
						$HaloFirst = array(
							'post_type'		=> 'comic',
							'posts_per_page'=> 1,
							'order'			=> 'ASC',
							'chapters' 		=> 'halo-pwned',
						);
						$query_posts = new WP_Query($HaloFirst);

						if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

							<a href="<?php echo get_post_permalink(); ?>">First Comic</a>

					<?php endwhile; endif; ?>

				</div>
				<div class="col-xs-4">
					
					<?php
						$HaloLatest = array(
							'post_type'		=> 'comic',
							'posts_per_page'=> 1,
							'chapters' 		=> 'halo-pwned',
						);
						$query_posts = new WP_Query($HaloLatest);

						if($query_posts->have_posts()) : while($query_posts->have_posts()) : $query_posts->the_post(); ?>

							<a href="<?php echo get_post_permalink(); ?>">Latest Comic</a>

					<?php endwhile; endif; ?>

				</div>
				<div class="col-xs-4">
					
					<a href="<?php site_url(); ?>/comics/?series=halo-pwned">Archive</a>

				</div>
			</div>

		</div>
		<div class="col-xs-6">
			<div class="comic-img">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/ai-logo.png" alt="What's up?">
			</div>
		</div>
	</div>
</div>

<?php get_footer();