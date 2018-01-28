<?php
get_header(); ?>

	<div class="content-block search-form">
		<h3>Search Archive</h3>
		<form class="" action="<?php bloginfo('url'); ?>/comic/" method="get">
			<?php include_search_form(); ?>
			<div class="clearFix"></div>
		</form>
	</div>

	<div class="content-block archive-select">
		<div id="content-wrapper" class="content-block">
			<div class="comic-chapters">

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

							<div class="col-sm-3">

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
	</div>

<?php get_footer(); ?>