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


          <?php if ( have_posts() ) : ?>

      			<?php $loop = new WP_Query( array( 'post_type' => 'casestudies', 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
            <?php
                $cs_ctr=0;
                while ( $loop->have_posts() ) : $loop->the_post();
                $cs_ctr++;
                $count = $loop->found_posts;
            ?>

            <div class="ten columns offset-by-one">
              <div class="case-study-top" id="<?php echo $post->post_name; ?>"><!-- style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', true )[0]; ?>)" -->
                <div class="cs_image" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'study-size', true )[0]; ?>); background-repeat: no-repeat; background-position: center; background-size: cover;"> <!-- <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'study_size', true )[0]; ?>"> --></div>
                <div class="case-study-text">
                  <div class="case-study-text-inner">
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="six columns offset-by-three">
              <div class="case-study-bottom">
                <h5>
                  <?php if(get_field('case_study_pdf')) { ?>
                    <a href="<?php echo get_field('case_study_pdf', get_the_id()); ?>" target="_blank">
                  <?php } ?>
                    <?php the_title(); ?>
                  <?php if(get_field('case_study_pdf')) { ?>
                    </a>
                  <?php } ?>
                </h5>
              </div>
            </div>

            <div class="twelve columns">
              <?php
              $final = $count-$cs_ctr;
              //var_dump($final);
              if ($final > 0){
              ?>
              <div class="case-study-line">
                <img src="<?php echo get_template_directory_uri(); ?>/img/CaseStudiesStripe.png" />
              </div>
              <?php } ?>
            </div>

            <?php endwhile; // end of the loop. ?>

      		<?php endif; ?>


  		</div>
  	</div>

  </div>

</main><!-- End of Content -->

<?php get_footer(); ?>
