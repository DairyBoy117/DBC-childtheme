<?php
/*
Template Name: Fan Art
*/
get_header(); ?>

<div id="content-wrapper" class="content-block">
	<div class="comic-chapters">
		<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;			
		$args = array(
					'post_type'		=> 'fan-art',
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
						
						<a href="#">
							<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
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