<?php
/*
Template Name: Blog Archive
*/
get_header(); ?>

	<div class="content-block archive-select">

		<div class="">
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
						'order'			=> 'ASC',
						'chapters' 		=> $chapter,
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

			    <?php while($category_posts->have_posts()) : 
			        $category_posts->the_post(); ?>

						<div class="row">	
							<div class="col-xs-6">
								<h2><?php the_title(); ?></h2>
								<?php the_excerpt('30'); ?>
							</div>
							<div class="col-xs-6">
								<?php the_post_thumbnail(); ?>
							</div>
			    		</div>

				<?php endwhile; ?>

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