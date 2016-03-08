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

					<?php //if (have_rows('case_study') ) :
					// 		while (have_rows('case_study')) : the_row();

							// $image = get_sub_field('image');
							// $image_URL = $image['sizes']['study-size'];
							// var_dump($image)
							// $summary_text = get_sub_field('summary_text');
							// $title = get_sub_field('title');

							$r_image = get_field('restaurant_image');
							// var_dump('$r_image');
							$r_imageURL = $r_image['sizes']['study-size'];

							//if($image != '' || $summary_text != '' || $title != ''){
					?>

					<!-- <div class="case_study">
						<img src="<?php echo $image_URL; ?>">
						<h5><?php echo $title; ?></h5>
						<div class="line_divider">
							<img src="<?php echo get_template_directory_uri(); ?>/img/blue-short-line.png"; ?>"
 -->
					<?php //} //endwhile; endif; ?>

						<?php the_content(); ?>

				</div>

				<div class="six columns">

					<img src="<?php echo $r_imageURL; ?>" >
					<?php //echo get_the_post_thumbnail( null, 'full' ); ?>

				</div>
			</div>

		<?php endwhile; ?>

	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>