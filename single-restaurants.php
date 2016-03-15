<?php get_header(); ?>

<main id="content">

	<div class="container">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div class="row">
				<div class="twelve columns">
					<h2><?php the_title(); ?></h2>
				</div>
			</div>

			<div class="row">
				<div class="six columns">

						<?php

								$r_image = get_field('restaurant_image');
								// var_dump('$r_image');
								$r_imageURL = $r_image['sizes']['study-size'];

						?>

						<?php the_content(); ?>

				</div>

				<div class="six columns">

					<img src="<?php echo $r_imageURL; ?>" >

				</div>
			</div>

		<?php endwhile; ?>

	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
