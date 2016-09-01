<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package irving
 */

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

	<div class="grid">
		
		<div class="page-row clear"">

			<div class="containers">

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

				endif; ?>

			</div>
		</div>

	</div>

</article>
