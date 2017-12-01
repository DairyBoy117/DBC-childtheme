<?php get_header();

	if (have_posts()) {

		while (have_posts()) : the_post(); ?>

			<div class="row">
				<div class="col-sm-6">
					<h1><?php the_title(); ?></h1>

					<?php if ( has_term( 'austins-inferno', 'from_comic' ) ) { ?> 

						<p>Grade: <?php the_field('grade'); ?></p>
						<p>Weapon of choice: <?php the_field('weapon_of_choice'); ?></p>
						<p>Super Powers: <?php the_field('super_powers'); ?></p>
						<p><?php the_field('random_question'); ?>: <?php the_field('random_answer'); ?></p>

					<?php }

					if ( has_term( 'halo-pwned', 'from_comic' ) ) { ?>

						
						
					<?php } ?>
				
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