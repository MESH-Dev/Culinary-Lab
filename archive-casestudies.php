<?php
get_header(); ?>

<main id="content">

  <div class="casestudies">

  	<div class="container">

      <div class="row">
  			<div class="eight columns offset-by-two">

  				<div class="text-property">
  					<h2>Let us show you our chops</h2>
  				</div>

  			</div>
  		</div>

  		<div class="row">
  			<div class="ten columns offset-by-one">

          <?php if ( have_posts() ) : ?>

      			<?php $loop = new WP_Query( array( 'post_type' => 'casestudies', 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

              <div class="case-study-top" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', true )[0]; ?>)">
                <div class="case-study-text">

                  <?php the_content(); ?>
                </div>
              </div>

              <div class="case-study-bottom">
                <h5>Title of case study here if long, two lines</h5>
              </div>

              <div class="case-study-line">
                <img src="<?php echo get_template_directory_uri(); ?>/img/blue-short-line.png" />
              </div>

            <?php endwhile; // end of the loop. ?>

      		<?php endif; ?>

  			</div>
  		</div>
  	</div>

  </div>

</main><!-- End of Content -->

<?php get_footer(); ?>
