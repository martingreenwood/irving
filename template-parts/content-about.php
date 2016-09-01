<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package irving
 */

$page_ids = array();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="container">
		<header class="page-header">
			<h1><?php the_title(); ?></h1>
		</header>
		
		<div class="entry-content">
			<?php
				the_content();
			?>
		</div>
	</div>

	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'single-post-thumbnail' ); ?>
	<div class="parallax-wrapper">
		<div class="shape fixed-top">
			<div class="top"></div>
			<div class="bottom"></div>
		</div>
		
		<div class="parallax-background" data-bleed="10" data-z-index="0" data-parallax="scroll" data-image-src="<?php echo $image[0]; ?>"></div>
		
		<div class="shape fixed-bottom">
			<div class="top"></div>
			<div class="bottom"></div>
		</div>
	</div>

	<?php

		$pages = get_field('pages');
		foreach($pages as $p):
			$page_ids[] = $p->ID;
		endforeach;
		//usort($page_ids, "post_orderby" );
		
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'page',
			'post_status' => 'publish',
			'post__in' => $page_ids,
			'orderby' => 'post__in',
		);

		$sections = new WP_Query($args);

		/**
		* re-orders the posts into the same order that they appear in the initial array
		*/
		function post_orderby( $a, $b ) {
			global $page_ids;
			$apos = array_search( $a->ID, $page_ids );
			$bpos = array_search( $b->ID, $page_ids );
			return ( $apos < $bpos ) ? -1 : 1;
		}

		
	?>

	<div class="grid">
		<?php while($sections->have_posts()): $sections->the_post(); ?>
		<div class="page-row clear" id="<?php echo $post->post_name; ?>">

			<?php $ft_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id($post->ID) ), 'single-post-thumbnail' ); if(is_array($ft_image)): ?>
			<div class="parallax-wrapper">
				<div class="shape fixed-top">
					<div class="top"></div>
					<div class="bottom"></div>
				</div>

				<div class="parallax-background" data-bleed="10" data-z-index="0" data-parallax="scroll" data-image-src="<?php echo $ft_image[0]; ?>"></div>

				<div class="shape fixed-bottom">
					<div class="top"></div>
					<div class="bottom"></div>
				</div>
			</div>
			<?php endif; ?>

			<div class="containers">

				<?php if (!get_field('hide_title')): ?>
				<div class="container">
					<h2><?php the_title(); ?></h2>
				</div>
				<?php endif; ?>

				<?php
				if( have_rows('sections') ):
					while ( have_rows('sections') ) : the_row();
						if( have_rows('columns') ): ?>

							<div class="container">

						    <?php while ( have_rows('columns') ) : the_row(); 
							$column_width = get_sub_field('width');
							$column_content = get_sub_field('content_tyoe');

							if( have_rows('content_tyoe') ):
								while ( have_rows('content_tyoe') ) : the_row(); ?>
								<div class="column <?php echo $column_width; ?> <?php echo get_row_layout(); ?>">

							        <?php 
									if( get_row_layout() == 'heading' ):
										get_template_part( 'partials/grid', 'heading' );

									elseif( get_row_layout() == 'text' ): 
										get_template_part( 'partials/grid', 'text' );

									elseif( get_row_layout() == 'tweets' ): 
										get_template_part( 'partials/grid', 'tweets' );

									elseif( get_row_layout() == 'image' ): 
										get_template_part( 'partials/grid', 'image' );

									elseif( get_row_layout() == 'form' ): 
										get_template_part( 'partials/grid', 'form' );

									elseif( get_row_layout() == 'repeater' ): 
										get_template_part( 'partials/grid', 'repeat' );

									endif;
									?>
								</div>
								<?php
								endwhile;
							endif;

							endwhile; ?>

							</div>

						<?php endif; // end if has columns

					endwhile; // end while section 

				else: // display the content as a fallback ?>
				<div class="container">
					<?php the_content(); ?>
				</div>
				<?php endif; ?>

			</div>
		</div>
		<?php endwhile; ?>
	</div>

</article>
