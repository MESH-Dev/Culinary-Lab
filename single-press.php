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

					<div class="case_study">
						<img src="<?php echo $image_URL; ?>">
						<h5><?php echo $title; ?></h5>
						<div class="line_divider">
							<img src="<?php echo get_template_directory_uri(); ?>/img/blue-short-line.png"; ?>"

						<?php the_content(); ?>

				</div>

				<div class="six columns">

					<?php echo get_the_post_thumbnail( null, 'full' ); ?>

				</div>
			</div>

		<?php endwhile; endif; ?>

	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
