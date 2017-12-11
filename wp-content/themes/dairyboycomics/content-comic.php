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
				<?php 
				comicpress_display_post_author();
				comicpress_display_post_date();	comicpress_display_post_time(); comicpress_display_modified_date_time();
				comicpress_display_post_category();
				if (function_exists('the_ratings') && $post->post_type == 'post') { the_ratings(); }
				do_action('comicpress-post-info');
				do_action('comic-post-info');
				wp_link_pages(array('before' => '<div class="linkpages"><span class="linkpages-pagetext">Pages:</span> ', 'after' => '</div>', 'next_or_number' => 'number'));
				?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<div class="entry">
			<?php comicpress_display_the_content(); ?>
			<div class="clear"></div>
		</div>
		<div class="post-extras">

			<div class="post-tags">
		
				<p>

				<?php
					
					echo '&#9492; Tags: ';

					$tag_terms = get_the_terms( get_the_ID(), 'post_tag');
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

				<?php

				comicpress_display_post_tags();
				do_action('comicpress-post-extras');
				do_action('comic-post-extras');
				comicpress_display_comment_link(); 
			?>
			<div class="clear"></div>
		</div>
		<?php edit_post_link(__( 'Edit this comic.', 'comicpress' ), '', ''); ?>
	</div>
</article>
