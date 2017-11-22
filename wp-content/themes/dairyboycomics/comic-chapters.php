<?php
/*
Template Name: Comic Chapters
*/
get_header();

	$args = array(
				'post_type'		=> 'comic',
				'order'			=> 'ASC',
				'chapters' 		=> 'austins-inferno',
				'meta_key' 		=> 'is_cover',
				'meta_value' 	=> 'yes'
			);
	$category_posts = new WP_Query($args);

	if($category_posts->have_posts()) : 
	    while($category_posts->have_posts()) : 
	        $category_posts->the_post(); 

		        the_post_thumbnail('thumbnail'); 
				
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
				$args2 = array (
					'post_type'		=> 'comic',
					'order'			=> 'ASC',
					'chapters' 		=> $cantoSlug,
                    'posts_per_page'    => 1
                );
                $firstDate = new WP_Query( $args2 );
                if ( $firstDate -> have_posts() ) :
                    while ( $firstDate -> have_posts() ) : $firstDate -> the_post();
                        $startDate = get_the_date('M j, Y');
                    endwhile;
                endif;

                //Date of last comic in canto
				$args3 = array (
					'post_type'		=> 'comic',
					'order'			=> 'DESC',
					'chapters' 		=> $cantoSlug,
                    'posts_per_page'    => 1
                );
                $secondDate = new WP_Query( $args3 );
                if ( $secondDate -> have_posts() ) :
                    while ( $secondDate -> have_posts() ) : $secondDate -> the_post();
                        $endDate = get_the_date('M j, Y');
                    endwhile;
                endif; ?>

                <p><?php echo $startDate . ' - ' . $endDate; ?></p>

	    <?php endwhile;
	else: 
	?>

	    Oops, there are no posts.

	<?php
	endif;

	wp_reset_postdata();
	wp_reset_query();

get_footer();