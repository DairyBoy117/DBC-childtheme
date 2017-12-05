<?php
get_header(); ?>

	<form class="" action="" method="get">

		<?php include_search_form(); ?>

	</form>

	<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$series = $_GET['title'];
	$series = sanitize_text_field($series);

	$character = $_GET['characterId'];
	$character = sanitize_text_field($character);

	$tag = $_GET['post-tag'];
	$tag = sanitize_text_field($tag);

	$month = $_GET['monthId'];
	$month = sanitize_text_field($month);

	$year = $_GET['yearId'];
	$year = sanitize_text_field($year);
	
	$keywords = $_GET['keywords'];
	$keywords = sanitize_text_field($keywords);

	if ($series == 'all') {
		$series = '';
	}

	if ($tag == 'all') {
		$tag = '';
	}

	if ($month == 'all') {
		$month = '';
	}
	$month = (int)$month;

	if ($year == 'all') {
		$year = '';
	}
	$year = (int)$year;

	if ($character == 'all' || $character == '') {
		$args = array(
					'post_type'		=> 'comic',
					'order'			=> 'ASC',
					'posts_per_page'=> 10,
					'chapters' 		=> $series,
					'tag'			=> $tag,
					'date_query' 	=> array(
									        array(
									            'month' => $month,
									            'year'	=> $year,
									        )
									    ),
					's' 			=> $keywords,
					'paged'			=> $paged
				);		
	} else {
		$args = array(
					'post_type'		=> 'comic',
					'order'			=> 'ASC',
					'posts_per_page'=> 10,
					'chapters' 		=> $series,
					'tag'			=> $tag,
					'date_query' 	=> array(
									        array(
									            'month' => $month,
									            'year'	=> $year,
									        )
									    ),					
					'meta_key'		=> 'select_characters',
					'meta_value'	=> $character,
					'meta_compare'	=> 'LIKE',
					's' 			=> $keywords,
					'paged'			=> $paged

				);		
	}

	$category_posts = new WP_Query($args);

	if($category_posts->have_posts()) : 

		next_posts_link();
		previous_posts_link();

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

		<?php next_posts_link(); ?>
		<?php previous_posts_link(); ?>

	    </div>

	<?php else: ?>

	    Oops, there are no posts.

	<?php
	endif;

	wp_reset_postdata();
	wp_reset_query();

get_footer(); ?>