<?php /*
* Template Name: Frontpage
*/
get_header(); ?>

<main id="main" class="site-main" role="main">

  <div class="landing">
    <div class="centered">
      <img src="<?php echo get_template_directory_uri(); ?>/img/culinary-lab.png" />
    </div>
    <div class="more">
      <div class="more-text">Our Restaurants</div>
      <img src="<?php echo get_template_directory_uri(); ?>/img/arrow-down.png" />
    </div>
  </div>

    <!-- Loop through and list the different restaurants -->

  <div class="container">
    <div class="six columns offset-by-three">
      <div class="listing">

        <?php $loop = new WP_Query( array( 'post_type' => 'restaurants', 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <div class="listing-item">
            <a href="<?php echo get_post_type_archive_link('restaurants'); ?>#<?php echo $post->post_name; ?>"><?php the_title(); ?></a>
          </div>

        <?php endwhile; wp_reset_query(); ?>

      </div>
    </div>
  </div>

</main><!-- #main -->

<?php get_footer(); ?>
