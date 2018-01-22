<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content"> <!-- yolo -->
		<?php if (!comicpress_is_bbpress()) comicpress_display_author_gravatar(); ?>
		<div class="post-info">
			<?php 
				comicpress_display_post_title();
				if (!comicpress_is_bbpress()) comicpress_display_post_calendar();
				if (is_sticky()) { ?><div class="sticky-image">Featured Post</div><?php }
				if (function_exists('comicpress_show_mood_in_post')) comicpress_show_mood_in_post(); 
			?>
			<div class="post-text">
				<?php the_date(); ?>

				<p>

				<?php
				echo 'Chapter: ';

				$chapters = get_the_terms( get_the_ID(), 'chapters');
				$numItems = count($chapters);
				$tags = 0;
				foreach($chapters as $chapter) {
					if($chapter->parent > 0) { 
						echo '<a href="' . get_site_url() . '/chapter/?title=' . $chapter->slug . '">' . $chapter->name . '</a>';
						if (++$tags === $numItems) {
							echo '';
						} else {
							echo ', ';
						}
					} 
					else { 
						echo '<a href="' . get_site_url() . '/comics/?series=' . $chapter->slug . '">' . $chapter->name . '</a>';
						if (++$tags === $numItems) {
							echo '';
						} else {
							echo ', ';
						}
					}
				}
				?>

				</p>

			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<div class="entry">
			<?php comicpress_display_the_content(); ?>
			<div class="clear"></div>
		</div>
		<div class="post-extras">



			<?php 

			$characters = get_field('select_characters');
			

			if ($characters) { ?>

				<div class="post-tags">
			
					<p>

					<?php
						
						echo '&#9492; Characters: ';
						
						$numItems = count($characters);
						$tags = 0;
						foreach ($characters as $character) {
							echo '<a href="' . get_permalink($character) . '">' . get_the_title($character) . '</a>';
							if (++$tags === $numItems) {
								echo '';
							} else {
								echo ', ';
							}
						}

					?>

					</p>

				</div>

			<?php }

			$tag_terms = get_the_terms( get_the_ID(), 'post_tag');

			if ($tag_terms) { ?>

				<div class="post-tags">
		
					<p>

					<?php
						
						echo '&#9492; Tags: ';

						
						$numItems = count($tag_terms);
						$tags = 0;
						foreach ($tag_terms as $tag_term) {
							echo '<a href="' . get_site_url() . '/comic/?post-tag=' . $tag_term->slug . '">' . $tag_term->name . '</a>';
							if (++$tags === $numItems) {
								echo '';
							} else {
								echo ', ';
							}
						}

					?>

					</p>

				</div>

			<?php }

				do_action('comicpress-post-extras');
				do_action('comic-post-extras');
				comicpress_display_comment_link(); 
			?>
			<div class="clear"></div>
		</div>
		<?php edit_post_link(__( 'Edit this comic.', 'comicpress' ), '', ''); ?>
	</div>
</article>
