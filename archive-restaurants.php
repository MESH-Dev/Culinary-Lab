<?php
get_header(); ?>

<main id="content">

	<div class="container">
		<div class="row">
			<div class="six columns offset-by-three">

				<div class="text-property">
					<h2>Meet Our Properties</h2>
				</div>

			</div>
		</div>

		<?php if ( have_posts() ) : ?>

			<?php $loop = new WP_Query( array( 'post_type' => 'restaurants', 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="row" id="<?php echo $post->post_name; ?>">
					<div class="six columns">
						<h4 class="restaurant-title"><?php the_title(); ?></h4>
						<h6>Executive Chef</h6>
						<span class="restaurant-address">10 W. Century Dr, Los Angeles, CA 90067</span>
						<span class="restaurant-website"><a href="">hinokiandthebird.com</a></span>
						<?php the_content(); ?>
					</div>
					<div class="six columns">
						<?php $image = get_field('restaurant_image'); ?>
						<img src="<?php echo $image['sizes']['large']; ?>" />
					</div>
				</div>

      <?php endwhile; // end of the loop. ?>

		<?php endif; ?>

	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
