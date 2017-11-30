<?php
/*
Template Name: Chapter Pages
*/
get_header();

	$chapter = $_GET['title'];

	if ($comic == 'all') {
		$comic = '';
	}
	
	$args = array(
				'post_type'		=> 'comic',
				'order'			=> 'ASC',
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

				<div class="col-sm-3">

					<a href="<?php echo the_permalink(); ?>">
						<img src="<?php echo the_post_thumbnail_url( 'thumbnail' ); ?>" alt="<?php the_title(); ?>">						
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
	wp_reset_query();

get_footer();