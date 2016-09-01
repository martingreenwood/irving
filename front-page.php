<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package irving
 */

get_header();

$show = get_field('feature_show');

if( $show ): 
	$post = $show;
	setup_postdata( $post ); 
	?>
	<section id="feature-show" data-status="<?php echo get_field('show_status', $post->ID); ?>">
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div id="feature-bg" style="background-image: url('<?php echo $image[0]; ?>')">
			<div class="overlay"></div>
		</div>
		<?php else: ?>
		<div id="feature-bg brand"></div>
		<?php endif; ?>

	    <div class="intro">
	    	<div class="container">
				<div class="wrap">
					<aside class='arrow'>
						<span id="content">Upcoming Performance</span>
					</aside>
					<h2><?php the_title(); ?></h2>
					<?php if (get_field('show_status') == "rehearsal-stage"): ?>
						<h3>Currently in rehearsals</h3>
						<a class="btn info" href="<?php the_permalink(); ?>">More Information</a>
					<?php elseif(get_field('show_status') == "auditioning"): ?>
						<h3>Auditioning taking place on 2nd July</h3>
						<a class="btn info" href="<?php the_permalink(); ?>">More Information</a>
					<?php else: ?>
						<?php
						if( have_rows('dates') ):
							while( have_rows('dates') ): the_row(); 
								$link = get_sub_field('tickets_link');
								$venue = get_sub_field('venue');
								$start_date = get_sub_field('start_date'); 
								$end_date = get_sub_field('end_date'); 
								?>
								<h3>Showing <?php echo date("d M", strtotime($start_date)); ?> - <?php echo  date("d M", strtotime($end_date)); ?> <?php echo date("Y", strtotime($end_date)); ?></h3>
								<a class="btn info" href="<?php the_permalink(); ?>">More Information</a>
								<?php if( $link ): ?>
								<a class="btn onsale" target="_blank" href="<?php echo $link; ?>">Buy Tickets</a>
								<?php endif;
							endwhile;
						endif; ?>
					<?php endif; ?>
				</div>
			</div>
	    </div>
	</section>
	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
endif;

get_footer('empty');
