<?php get_header(); ?>

<main id="content">

	<div class="container">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div class="row">
				<div class="twelve columns">
					<h2><?php the_title(); ?></h2>
				</div>
			</div>

			<div class="row page-content">
				<div class="six columns text">
					<div class="container">

						<?php the_content(); ?>
					</div>
				</div>

				<div class="six columns">

					<?php echo get_the_post_thumbnail( null, 'full' ); ?>

				</div>
			</div>

		<?php endwhile; ?>

	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
