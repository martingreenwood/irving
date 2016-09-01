<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package irving
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="container">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'irving' ); ?></h1>
						</header>
						
						<div class="entry-content">
							<h4><?php esc_html_e( 'It looks like nothing was found at this location - it may have been removed', 'irving' ); ?></h4>
						</div>
					</div>

				</article>

			</section>

		</main>
	</div>

<?php
get_footer('empty');
