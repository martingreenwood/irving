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
		<div id="parallax-background" class="parallax-background" data-parallax="scroll" data-image-src="<?php echo $image[0]; ?>">
			<div class="table">
				<div class="cell middle">
					<div class="container">
						<h1><?php the_title(); ?></h1>
						<h2>Showing 2nd Feb - 5th June 2016</h2>
					</div>
				</div>
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

<?php
get_footer();
