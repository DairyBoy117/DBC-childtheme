<?php get_header();

	if (have_posts()) {

		while (have_posts()) : the_post(); ?>

			<div class="comic-series">

				<div class="row">
					<div class="col-xs-6 character-info">
						<h1><?php the_title(); ?></h1>

						<?php if ( has_term( 'austins-inferno', 'from_comic' ) ) { 

							$grade = get_field('grade');
							$weapon = get_field('weapon_of_choice');
							$powers = get_field('super_powers');
							$question = get_field('random_question');
							$answer = get_field('random_answer');

							if ($grade) { ?>
								<p><strong>Grade:</strong> <?php echo $grade; ?></p>
							<?php }

							if ($weapon) { ?>
								<p><strong>Weapon of choice:</strong> <?php echo $weapon; ?></p>
							<?php }

							if ($powers) { ?>
								<p><strong>Super Powers:</strong> <?php echo $powers; ?></p>
							<?php }

							if ($question) { ?>
								<p><strong><?php echo $question; ?>:</strong> <?php echo $answer; ?></p>
							<?php } 
						
						}

						if ( has_term( 'halo-pwned', 'from_comic' ) ) {

							$species = get_field('species');
							$faction = get_field('faction');
							$playedBy = get_field('played_by');
							$player = $playedBy[0];
							$halo = get_field('halo_bio');

							if ($species) { ?>
								<p>Species: <?php echo $species; ?></p>
							<?php }

							if ($faction) { ?>
								<p>Faction: <?php echo $faction; ?></p>
							<?php }

							if ($playedBy) { ?>
								<p>Played By: <a href="<?php echo get_permalink($player); ?>"><?php echo get_the_title($player); ?></a></p>
							<?php }

							if ($halo) { ?>
								<a href="<?php echo $halo; ?>">Original Character's Bio</a>
							<?php } 

						} ?>

						<?php the_content(); ?>

						<a href="<?php echo get_site_url(); ?>/comic/?characterId=<?php echo get_the_ID(); ?>">View Comics</a>
					
					</div>
					<div class="col-xs-6">
						
						<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="400" height="500">

					</div>
				</div>

				<?php

				if ( has_term( 'austins-inferno', 'from_comic' ) ) {
					$comic = 'austins-inferno';
				} else if ( has_term( 'halo-pwned', 'from_comic' ) ) {
					$comic = 'halo-pwned';
				}

				//All other characters
				$otherCharacters = array (
					'post_type'			=> 'characters',
					'orderby'			=> 'title',
					'order'				=> 'ASC',
					'from_comic'		=> $comic,
	                'posts_per_page'    => -1
	            );
	            $characters = new WP_Query( $otherCharacters );
	            if ( $characters -> have_posts() ) : ?>

	            	<div class="row">

	            	<h3 class="character-info">Other characters</h3>
	                
	                <?php while ( $characters -> have_posts() ) : $characters -> the_post(); ?>
	                    <div class="col-xs-1">
	                    	<a href="<?php the_permalink(); ?>">
	                    		<img src="<?php echo get_field('character_thumbnail'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" height="50" width="50">
	                    	</a>
						</div>
	                <?php endwhile; ?>

	            	</div>

	            <?php endif; ?>

            </div>

		<?php endwhile;
	
	}

get_footer(); ?>