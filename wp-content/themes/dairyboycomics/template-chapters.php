<?php
/*
Template Name: Chapter Archive
*/
get_header(); 

$comic = $_GET['series'];
$comic = sanitize_text_field($comic); ?>

	<div class="content-block search-form">
		<h3>Search Archive</h3>
		<form class="" action="<?php bloginfo('url'); ?>/comic/" method="get">
			<?php include_search_form(); ?>
			<div class="clearleft"></div>
		</form>
	</div>

	<div class="content-block archive-select">
		<div class="row">
			<div class="col-xs-4">
				<?php if ($comic == "austins-inferno") { ?>
					<div class="comic-img current">
				<?php } else { ?>
					<div class="comic-img">
				<?php } ?>
					<a href="<?php site_url(); ?>/comics/?series=austins-inferno">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/ai-logo.png" alt="Austin's Inferno">
					</a>
				</div>
			</div>
			<div class="col-xs-4">
				<?php if ($comic == "ass") { ?>
					<div class="comic-img current">
				<?php } else { ?>
					<div class="comic-img">
				<?php } ?>
					<a href="<?php site_url(); ?>/comics/?series=ass">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/ai-logo.png" alt="Anvil Station Stories">
					</a>
				</div>
			</div>
			<div class="col-xs-4">
				<?php if ($comic == "halo-pwned") { ?>
					<div class="comic-img current">
				<?php } else { ?>
					<div class="comic-img">
				<?php } ?>
					<a href="<?php site_url(); ?>/comics/?series=halo-pwned">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/ai-logo.png" alt="Halo PWNED">
					</a>
				</div>
			</div>
		</div>
	</div>

	<div id="content-wrapper" class="content-block">
		
		<?php

		if ($comic == 'all') {
			$comic = '';
		}
		
		$args = array(
					'post_type'		=> 'comic',
					'order'			=> 'ASC',
					'chapters' 		=> $comic,
					'posts_per_page'=> -1,
					'meta_key' 		=> 'is_cover',
					'meta_value' 	=> 'yes'
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

						<?php
						
						//Get Canto info
						$terms = get_the_terms(get_the_ID(), 'chapters');
						$i = 0;
						foreach($terms as $term) {
							if ($i == 0) {
								echo "";
							} else {
								$chapterName = $term->name;
								$chapterCount = $term->count;
								$chapterSlug = $term->slug;
							}
							$i++;
						} ?> 
						
						<a href="<?php echo site_url(); ?>/chapter/?title=<?php echo $chapterSlug; ?>">
							<img src="<?php echo the_post_thumbnail_url( 'thumbnail' ); ?>" alt="<?php echo $chapterName; ?>">						
						</a>

						<p>
							<a href="<?php echo site_url(); ?>/chapter/?title=<?php echo $chapterSlug; ?>">
								<?php echo $chapterName; ?>
							</a>
						</p>
						<p>Pages: <?php echo $chapterCount; ?></p>

						<?php
						//Date of first comic in chapter
						$firstDateArg = array (
							'post_type'			=> 'comic',
							'order'				=> 'ASC',
							'chapters' 			=> $chapterSlug,
		                    'posts_per_page'    => 1
		                );
		                $firstDate = new WP_Query( $firstDateArg );
		                if ( $firstDate -> have_posts() ) :
		                    while ( $firstDate -> have_posts() ) : $firstDate -> the_post();
		                        $startDate = get_the_date('M j, Y');
		                        $firstPage = get_permalink();
		                    endwhile;
		                endif;

		                //Date of last comic in chapter
						$lastDateArg = array (
							'post_type'			=> 'comic',
							'chapters' 			=> $chapterSlug,
		                    'posts_per_page'    => 1
		                );
		                $lastDate = new WP_Query( $lastDateArg );
		                if ( $lastDate -> have_posts() ) :
		                    while ( $lastDate -> have_posts() ) : $lastDate -> the_post();
		                        $endDate = get_the_date('M j, Y');
		                    endwhile;
		                endif; ?>

		                <p><?php echo $startDate . ' - ' . $endDate; ?></p>

						<ul>
							<li>
								<a href="<?php echo $firstPage; ?>">First page</a>
							</li>
							<?php
							//Get start of story arcs within chapter
							$storyArgs = array (
								'post_type'		=> 'comic',
								'order'			=> 'ASC',
								'chapters' 		=> $chapterSlug,
			                   	'meta_query' => array(
							        array(
							            'key'     => 'story_start',
							            'value'   => 'yes',
							            'compare' => 'LIKE'
							        )
							    )
			                );
			                $storyArcs = new WP_Query( $storyArgs );
			                if ( $storyArcs -> have_posts() ) : ?>
								<li>Story arc starting pages:</li>
									<ul>
			                    <?php while ( $storyArcs -> have_posts() ) : $storyArcs -> the_post(); ?>
			                        <li>
			                        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			                        </li>
			                    <?php
			                    endwhile; ?>
			                    	</ul>
			                <?php endif; ?>
		                </ul>

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

<?php get_footer();