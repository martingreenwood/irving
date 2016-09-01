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

	<div class="container">
		<div class="genres">
			<h3>Filter by Genre</h3>
			<a id="all" href="#">All</a>
			<?php 
			$genres = get_terms( array(
				'taxonomy' => 'genres',
				'hide_empty' => false,
			) );
			foreach ( $genres as $genre ): ?>
				<a id="<?php echo $genre->slug; ?>" href="#"><?php echo $genre->name; ?></a>
			<?php endforeach; ?>
		</div>
	</div>

	<?php
	$classes = "";
	$args = array( 'post_type' => 'shows', 'posts_per_page' => -1 );
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ): ?>
	<div class="container">
		<div class="theshows clear" id="show_content">
		<?php while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$classes =  get_the_terms( $post->ID, "genres" );
		$genre_class = "";
		foreach ($classes as $class) {
			$genre_class .= $class->slug . ' ';
		}
		?>
			<div class="half show all <?php echo $genre_class; ?>">
				<a href="<?php the_permalink(); ?>">
					<?php if(has_post_thumbnail()): the_post_thumbnail( 'show-thumbnail' ); endif; ?>
					<h2><?php the_title(); ?></h2>
					<h4><?php the_field('tag_line'); ?></h4>
					<p class="btn">View Show Information <i class="fa fa-angle-right" aria-hidden="true"></i></p>
				</a>
			</div>
		<?php
		}
		$classes = "";
		wp_reset_postdata(); ?>
		</div>
	</div>
	<?php else:
		// no posts found
	endif;
	?>

</article>
