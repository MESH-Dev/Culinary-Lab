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
      <?php while ( $loop->have_posts() ) : $loop->the_post(); 
      			//Get user input
      			$site = get_field('website');
      			//Decode it to an url
      			$site = urldecode($site);
      			//Parse the URL so that we can grab specific parts
      			$site_nice = parse_url($site);
      			//Take out any slashes, periods, and dub-dub-dub
      			$domain = preg_replace('/^www\./', '', $site_nice['host']);
      			//$nice_site = preg_match('#^http(s)?://#', $site);
      			//var_dump($site);
      			//$web_site = substr($site, strlen($trim));

      ?>

				<div class="row property" id="<?php echo $post->post_name; ?>">
					<div class="six columns">
						<div class="content">
							<h4 class="restaurant-title"><?php the_title(); ?></h4>
							<h6><?php echo get_field('position');?></h6>
							<span class="restaurant-address"><?php echo get_field('location'); ?></span>
							<span class="restaurant-website"><a href="<?php echo get_field('website')?>"><?php echo $domain; ?></a></span>
							<?php the_content(); ?>
						</div>
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
