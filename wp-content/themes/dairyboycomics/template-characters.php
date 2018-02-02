<?php
/*
Template Name: Characters
*/
get_header(); ?>

<div id="content-wrapper" class="content-block">
	<div class="comic-series character-bios">

		<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;			
		$args = array(
					'post_type'		=> 'characters',
					'order'			=> 'ASC',
					'orderby'			=> 'title',
					'paged'			=> $paged
				);
		$category_posts = new WP_Query($args);

		if($category_posts->have_posts()) : ?>

			<div class="row page-controls-top">
				<div class="col-xs-6 prev">
					<?php previous_posts_link(); ?>
				</div>
				<div class="col-xs-6 next">
					<?php next_posts_link( 'Next Page »', $category_posts->max_num_pages ); ?>
				</div>
			</div>

			<?php $x = 0 ?>
		
			<div class="row">

		    <?php while($category_posts->have_posts()) : 
		        $category_posts->the_post();

					if ($x == 4) { ?>
						</div>
						<div class="row">
						<?php $x = 0;
					}

					$x++; ?>

					<div class="col-xs-3">

						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
						</a>
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="bio-img">
						</a>

		            </div>

			<?php endwhile; ?>

		    </div>

		    <div class="row page-controls-bottom">
				<div class="col-xs-6 prev">
					<?php previous_posts_link(); ?>
				</div>
				<div class="col-xs-6 next">
					<?php next_posts_link( 'Next Page »', $category_posts->max_num_pages ); ?>
				</div>
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