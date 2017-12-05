<?php
get_header(); ?>

	<form class="" action="" method="get">

		<div class="option-bar">
			<label for="select-comic">Comic</label>
	    	<span class="selectwrap">
	        	<select name="title" id="select-comic" class="search-select" tabindex="-1" aria-hidden="true">
		        	<option value="all" selected="selected">All</option>

					<?php
					$taxonomy = 'chapters';
					$term_args = array(
						'parent' => 0,
						'order' => 'DESC'
					);
					$tax_terms = get_terms($taxonomy, $term_args);
					?>
					<ul>
					<?php
					foreach ($tax_terms as $tax_term) {  ?>
					        <option value="<?php echo $tax_term->slug; ?>"><?php echo $tax_term->name; ?></option>
					<?php } ?>

		        </select>
	    	</span>
		</div>

		<div class="option-bar large">
			<label for="select-character">Character</label>
	    	<span class="selectwrap">
	        	<select name="characterId" id="characterId" class="search-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
		        	
					<option value="all" selected="selected">All</option>

					<?php 

					$args = array(
		                'post_type' => 'characters',
		                'posts_per_page' => -1	                	
	                );

			        $posts = new WP_Query($args);
			 
			        if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); ?>

			        	<option value="<?php the_ID(); ?>"> <?php the_title(); ?> </option>  

				    <?php

				    endwhile; 

				    wp_reset_postdata();
				    wp_reset_query();

				    endif; 

				    ?>

		        </select>
	    	</span>
		</div>

		<div class="option-bar large">
			<label for="select-tag">Tag</label>
	    	<span class="selectwrap">
	        	<select name="post-tag" id="select-tag" class="search-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
		        	<option value="all" selected="selected">All</option>
		        	
					<?php
					$tags = 'post_tag';
					$tag_terms = get_terms($tags);
					?>
					<ul>
					<?php
					foreach ($tag_terms as $tag_term) { ?>
					<option value="<?php echo $tag_term->slug; ?>"><?php echo $tag_term->name; ?></option>
					<?php } ?>

		        </select>
	    	</span>
		</div>

		<div class="option-bar large">
			<label for="select-month">Month</label>
	    	<span class="selectwrap">
	        	<select name="monthId" id="month" class="search-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
		        	
					<option value="all" selected="selected">All</option>
					<option value="01">January</option>
					<option value="02">February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>


		        </select>
	    	</span>
		</div>

		<div class="option-bar large">
			<label for="select-year">Year</label>
	    	<span class="selectwrap">
	        	<select name="yearId" id="year" class="search-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
		        	
					<option value="all" selected="selected">All</option>

					<?php
					$already_selected_value = the_date('Y');
					$earliest_year = 2011;

					foreach (range(date('Y'), $earliest_year) as $x) { ?>
						<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
					<?php } ?>

		        </select>
	    	</span>
		</div>

		<div class="option-bar large">
			<label for="keywords-txt">Keywords</label>
			<input type="text" name="keywords" id="keywords-txt" value="">
		</div>

		<div class="option-bar">
				<input type="submit" value="Search" class="real-btn btn">
		</div>	

	</form>

	<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$series = $_GET['title'];
	$character = $_GET['characterId'];
	$tag = $_GET['post-tag'];
	$month = $_GET['monthId'];
	$year = $_GET['yearId'];
	$keywords = $_GET['keywords'];

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