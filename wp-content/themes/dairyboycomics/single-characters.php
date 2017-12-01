<?php get_header();

	if (have_posts()) {

		while (have_posts()) : the_post(); ?>

			<div class="row">
				<div class="col-sm-6">
					<h1><?php the_title(); ?></h1>

					<?php if ( has_term( 'austins-inferno', 'from_comic' ) ) { 

						$grade = get_field('grade');
						$weapon = get_field('weapon_of_choice');
						$powers = get_field('super_powers');
						$question = get_field('random_question');
						$answer = get_field('random_answer');

						if ($grade) { ?>
							<p>Grade: <?php echo $grade; ?></p>
						<?php }

						if ($weapon) { ?>
							<p>Weapon of choice: <?php echo $weapon; ?></p>
						<?php }

						if ($powers) { ?>
							<p>Super Powers: <?php echo $powers; ?></p>
						<?php }

						if ($question) { ?>
							<p><?php echo $question; ?>: <?php echo $answer; ?></p>
						<?php } 
					
					}

					if ( has_term( 'halo-pwned', 'from_comic' ) ) {

						$species = get_field('species');
						$faction = get_field('faction');
						$played = get_field('played_by');
						$halo = get_field('halo_bio');

						if ($species) { ?>
							<p>Species: <?php echo $species; ?></p>
						<?php }

						if ($faction) { ?>
							<p>Faction: <?php echo $faction; ?></p>
						<?php }

						if ($played) { ?>
							<p>Played By: <?php echo $played; ?></p>
						<?php }

						if ($halo) { ?>
							<a href="<?php echo $halo; ?>">Original Character's Bio</a>
						<?php } 

					} ?>
				
				</div>
				<div class="col-sm-6">
					
					<?php the_post_thumbnail( 'medium' ); ?>

				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<?php the_content(); ?>
				</div>
			</div>

		<?php endwhile;
	
	}

get_footer(); ?>