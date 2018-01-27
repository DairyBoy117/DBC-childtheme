<?php
/*
Template Name: Chapter Pages
*/
get_header(); ?>

	<div class="content-block search-form">
		<h3>Search Archive</h3>
		<form class="" action="<?php bloginfo('url'); ?>/comic/" method="get">
			<?php include_search_form(); ?>
			<div class="clearleft"></div>
		</form>
	</div>

	<div class="content-block archive-select">
		<div class="comic-chapters">
			<?php

			$chapter = $_GET['title'];
			
			$args = array(
						'post_type'		=> 'comic',
						'order'			=> 'ASC',
						'posts_per_page'=> -1,
						'chapters' 		=> $chapter,
					);
			$category_posts = new WP_Query($args);

			if($category_posts->have_posts()) : 

				$x = 0 ?>
			
				<div class="row">

			    <?php while($category_posts->have_posts()) : 
			        $category_posts->the_post();

						if ($x == 4) { ?>
							</div>
							<div class="row">
						<?php }

						$x++; ?>

						<div class="col-xs-3">

							<a href="<?php echo the_permalink(); ?>">
								<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">						
							</a>

							<p>
								<a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>		
							</p>

							<p>
								<?php echo get_the_date(); ?>
							</p>

			            </div>

				<?php endwhile; ?>

			    </div>

			<?php else: ?>

			    Oops, there are no posts.

			<?php
			endif;

			wp_reset_postdata();
			wp_reset_query(); ?>
		</div>		
	</div>

<?php get_footer();