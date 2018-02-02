<?php
/*
Template Name: Fan Art
*/
get_header(); ?>

<style>
	#lightbox {
	    position:fixed; /* keeps the lightbox window in the current viewport */
	    top:0; 
	    left:0; 
	    width:100%; 
	    height:100%; 
	    background-color: rgba(0, 0, 0, 0.2); 
	    text-align:center;
	}

	#lightbox p {
	    text-align:right; 
	    color:#fff; 
	    margin-right:20px; 
	    font-size:12px; 
	}

	#lightbox img {
	    box-shadow:0 0 25px #111;
	    -webkit-box-shadow:0 0 25px #111;
	    -moz-box-shadow:0 0 25px #111;
	}
</style>

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
		
			<div class="row wrapper">

		    <?php while($category_posts->have_posts()) : 
		        $category_posts->the_post();

					if ($x == 3) { ?>
						</div>
						<div class="row">
						<?php $x = 0;
					}

					$x++; ?>

					<div class="col-xs-4">
						
						<a href="<?php echo get_the_post_thumbnail_url(); ?>" class="lightbox_trigger">
							<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
						</a>
						<h3>
							<a href="<?php echo site_url(); ?>/chapter/?title=<?php echo $chapterSlug; ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<h4>By <?php echo get_field('artist_name'); ?></h4>
						<?php the_content(); ?>

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