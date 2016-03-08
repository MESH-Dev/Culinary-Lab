<?php
get_header(); ?>

<main id="content">

  <div class="press">

    <div class="container">
      <div class="row">
        <div class="twelve columns">
          <p class="title">Read all about us...</p>
        </div>
      </div>
    </div>

  	<div class="container">
  		<div class="row">
  			<div class="four columns">

          <?php if ( have_posts() ) : ?>

      			<?php $loop = new WP_Query( array( 'post_type' => 'restaurants', 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); 
              $restaurant = get_the_ID();
              //var_dump($restaurant);
            ?>

      				<div class="row property-item">
    						<div class="filter" data-filter=".<?php echo $post->post_name; ?>"><h3 class="restaurant-title pub-title"><?php the_title(); ?></h3></div>
                <ul class="single-results">


                <?php $loop_press = new WP_Query( array( 'post_type' => 'press', 'meta_key'=>'property', 'meta_value'=>$restaurant, 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
              <?php while ( $loop_press->have_posts() ) : $loop_press->the_post(); 
                //$press = get_field('property', $post->ID)->post_name;
                
                // if ($restaurant == $press){
              ?>
                <li>
                  <h4 class="restaurant-title"><?php echo get_field('pub_month');?>.<?php echo get_field('pub_year'); ?></h4>
                  <h6><?php echo get_field('pub_title');?></h6>
                  <!-- <span class="restaurant-address">10 W. Century Dr, Los Angeles, CA 90067</span> -->
                  <span class="restaurant-website"><a href="<?php echo get_field('article_link'); ?>"><?php the_title();?></a></span>
                </li>
              <?php endwhile; // end of the loop. ?>


              </ul>
      				</div>

            <?php endwhile; // end of the loop. ?>

      		<?php endif; ?>

  			</div>
        <div class="six columns offset-by-two results hide">

          <div id="container">
            <?php if ( have_posts() ) : ?>

        			<?php $loop = new WP_Query( array( 'post_type' => 'press', 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
              <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        				<div class="mix <?php echo get_field('property', $post->ID)->post_name; ?>" id="<?php echo $post->post_name; ?>">
      						<h4 class="restaurant-title"><?php echo get_field('pub_month', $post->ID);?>.<?php echo get_field('pub_year', $post->ID); ?></h4>
      						<h6><?php echo get_field('pub_title', $post->ID);?></h6>
      						<!-- <span class="restaurant-address">10 W. Century Dr, Los Angeles, CA 90067</span> -->
      						<span class="restaurant-website"><a href="<?php echo get_field('article_link', $post->ID); ?>"><?php the_title();?></a></span>
      						<?php the_content(); ?>
        				</div>

              <?php endwhile; // end of the loop. ?>

        		<?php endif; ?>
          </div>

        </div>
  		</div>
  	</div>
  </div>

</main><!-- End of Content -->

<?php get_footer(); ?>
