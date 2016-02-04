<?php
get_header(); ?>

<main id="content">

	<div class="container">
		<div class="row">
			<div class="twelve columns">

        <h1>Test test</h1>

				<?php if ( have_posts() ) : ?>

          <?php while ( have_posts() ) : the_post(); ?>

            <h1 class="entry-title"><?php the_title(); ?></h1>

          <?php endwhile; // end of the loop. ?>

				<?php endif; ?>

			</div>
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
