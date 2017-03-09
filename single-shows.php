<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package irving
 */

get_header(); ?>

<?php if (has_post_thumbnail()): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'single-post-thumbnail' ); ?>
	<div class="parallax-wrapper">
		<div class="parallax-background" data-parallax="scroll" data-image-src="<?php echo $image[0]; ?>">
			<div class="table">
				<div class="cell middle">
					<div class="container">
						<h1><?php the_title(); ?></h1>

						<?php if(get_field('show_status') == "upcoming"): ?>
							<?php
							if( have_rows('dates') ):
								while( have_rows('dates') ): the_row(); 
									$link = get_sub_field('tickets_link');
									$venue = get_sub_field('venue');
									$start_date = get_sub_field('start_date'); 
									$end_date = get_sub_field('end_date'); 
									?>
									<p class="date"><?php echo date("d M", strtotime($start_date)); ?> - <?php echo date("d M", strtotime($end_date)); ?> <?php echo date("Y", strtotime($end_date)); ?></p>
								<?php	
								endwhile;
							endif; ?>
						<?php endif; ?>

					</div>
				</div>
			</div>
			<div class="shape fixed-bottom">
				<div class="top"></div>
				<div class="bottom"></div>
			</div>
		</div>
	</div>
<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if(get_field('gallery')): ?>
	<div class="gallery">
		<div class="container">
		<h2>Show Gallery</h2>
		<?php 

		$image_ids = get_field('gallery', false, false);

		$shortcode = '[gallery ids="' . implode(',', $image_ids) . '"]';

		echo do_shortcode( $shortcode );

		?>
		</div>
	</div>
	<?php endif; ?>

	<?php if(get_field('reviews')): ?>
	<div class="reviews">
		<div class="container">

		<?php
		if( have_rows('reviews') ):
			while( have_rows('reviews') ): the_row(); 
				$review_text = get_sub_field('review_text');
				$review_name = get_sub_field('review_name');
				$review_rating = get_sub_field('review_rating'); 
			?>
			<div class="review">
				<?php echo $review_text; ?>
				<?php if ($review_rating): ?>
				<div class="star-rating">
					<span style="width:<?php echo $review_rating; ?>"></span>
				</div>
				<?php endif; ?>
				<small><?php echo $review_name; ?></small>
			</div>
			<?php	
			endwhile;
		endif; ?>

		</div>
	</div>
	<?php endif; ?>

<?php
get_footer();
