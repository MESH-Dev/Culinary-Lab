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
      <a href="#down"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-down.png" /></a>
    </div>
  </div>

    <!-- Loop through and list the different restaurants -->

  <div class="listing" id="down">
    <div class="container">
      <div class="six columns offset-by-three">

        <?php $loop = new WP_Query( array( 'post_type' => 'restaurants', 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <div class="listing-item">
            <h1><a href="<?php echo get_post_type_archive_link('restaurants'); ?>#<?php echo $post->post_name; ?>"><?php the_title(); ?></a></h1>
          </div>

        <?php endwhile; wp_reset_query(); ?>

      </div>
    </div>
  </div>

  <div class="static">

    <?php

      // display a sub field value
      $image = get_field('static_image');
      $imageURL = $image['sizes']['full-size'];

      echo '<img src="' . $imageURL . '" />';

    ?>

  </div>

  <div class="sliding">

    <div class="slider">

      <?php

      // check if the repeater field has rows of data
      if( have_rows('slider_images') ):

       	// loop through the rows of data
          while ( have_rows('slider_images') ) : the_row();

              // display a sub field value
              $image = get_sub_field('slider_image');
              $imageURL = $image['sizes']['full-size'];

              if( !empty($image) ) {
              	$thumb = $image['url'];
              }

              echo '<div><img src="' . $imageURL . '" /></div>';

          endwhile;

      else :

          // no rows found

      endif;

      ?>

    </div>

  </div>

  <div class="contacting">

    <div class="container">
      <div class="four columns offset-by-four">
        <a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><div class="contacting-button">More About Us</div></a>
      </div>
    </div>

  </div>

    <div id="skrollr-body" class="blue-rectangle skrollable skrollable-between" data-0="top[quadratic]:80%;" data-end="top[quadratic]:130%">
      <!-- <div class="parallax-container">
      <div class="parallax"> -->
        <!-- <div class="skrollable skrollable-between" data-0="top:0%;" data-end="top:100%;" > -->
        <img src="<?php echo get_template_directory_uri(); ?>/img/blue-rectangle.png" />
      <!-- </div> -->
     <!--  </div>
    </div> -->
    </div>

</main><!-- #main -->

<?php get_footer(); ?>
