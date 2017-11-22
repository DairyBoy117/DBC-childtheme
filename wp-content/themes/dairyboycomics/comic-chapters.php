<?php
/*
Template Name: Comic Chapters
*/
get_header();

	$comic = $_GET['title'];

	$args = array(
				'post_type'		=> 'comic',
				'order'			=> 'ASC',
				'chapters' 		=> $comic,
				'meta_key' 		=> 'is_cover',
				'meta_value' 	=> 'yes'
			);
	$category_posts = new WP_Query($args);

	if($category_posts->have_posts()) : 
	    while($category_posts->have_posts()) : 
	        $category_posts->the_post(); 

		        the_post_thumbnail('thumbnail'); 
				
				//Get Canto info
				$terms = get_the_terms(get_the_ID(), 'chapters');
				$i = 0;
				foreach($terms as $term) {
					if ($i == 0) {
						echo "";
					} else {
						echo '<p>' . $term->name . '</p>';
						echo '<p>Pages: ' . $term->count . '</p>';
						$cantoSlug = $term->slug;
					}
					$i++;
				} ?>

				<?php
				//Date of first comic in canto
				$firstDateArg = array (
					'post_type'			=> 'comic',
					'order'				=> 'ASC',
					'chapters' 			=> $cantoSlug,
                    'posts_per_page'    => 1
                );
                $firstDate = new WP_Query( $firstDateArg );
                if ( $firstDate -> have_posts() ) :
                    while ( $firstDate -> have_posts() ) : $firstDate -> the_post();
                        $startDate = get_the_date('M j, Y');
                        $firstPage = get_permalink();
                    endwhile;
                endif;

                //Date of last comic in canto
				$lastDateArg = array (
					'post_type'			=> 'comic',
					'chapters' 			=> $cantoSlug,
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
						<a href="<?php echo $firstPage; ?>">First page of canto</a>
					</li>
					<?php
					//Get start of story arcs within canto
					$storyArgs = array (
						'post_type'		=> 'comic',
						'order'			=> 'ASC',
						'chapters' 		=> $cantoSlug,
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

	    <?php endwhile;
	else: 
	?>

	    Oops, there are no posts.

	<?php
	endif;

	wp_reset_postdata();
	wp_reset_query();

get_footer();