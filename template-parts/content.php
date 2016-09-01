<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package irving
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>

	<?php if (get_field('show_status') == "rehearsal-stage"): ?>
		<div class="flash-notice">
			<p>Currently in Rehearsals</p>
		</div>
	<?php elseif(get_field('show_status') == "auditioning"): ?>
		<div class="flash-notice">
			<p class="info">Auditioning Soon</p>
		</div>
	<?php endif; ?>	

	<div class="entry-sidebar">

		<aside>
		<?php if (get_field('show_status') == "rehearsal-stage" || get_field('show_status') == "auditioning"): ?>
			<p class="info"><?php the_field('information'); ?></p>
		<?php elseif(get_field('show_status') == "taking-bookings"): ?>
			<?php
			if( have_rows('dates') ):
				while( have_rows('dates') ): the_row(); 
					$link = get_sub_field('tickets_link');
					$venue = get_sub_field('venue');
					$start_date = get_sub_field('start_date'); 
					$end_date = get_sub_field('end_date'); 
					$starting_price = get_sub_field('starting_price'); 
					?>
					<a class="btn onsale" target="_blank" href="<?php echo $link; ?>">Buy Tickets</a>


					<p><strong>Tickets start from</strong></p>
					<p>£<?php echo $starting_price; ?></p>
					<hr>
					<p><strong>Venue</strong></p>
					<p class="addr"><?php echo $venue; ?></p>
				<?php	
				endwhile;
			endif; ?>
		<?php else: ?>
			<?php
			if( have_rows('dates') ):
				while( have_rows('dates') ): the_row(); 
					$link = get_sub_field('tickets_link');
					$venue = get_sub_field('venue');
					$start_date = get_sub_field('start_date'); 
					$end_date = get_sub_field('end_date'); 
					?>
					<p><strong>Performed</strong></p>
					<p><strong><?php echo date("d M", strtotime($start_date)); ?> - <?php echo date("d M", strtotime($end_date)); ?> <?php echo date("Y", strtotime($end_date)); ?></strong></p>
				<?php	
				endwhile;
			endif; ?>
		<?php endif; ?>

		<div class="shareme" >
			<?php 
			if ( function_exists( 'sharing_display' ) ) {
				sharing_display( '', true );
			}
			?>
		</div>
		</aside>

	</div>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

</article>

<?php if(get_field('cast') || get_field('production_crew')): ?>
<section class="cast-crew">
	<div class="container">
		<div class="cast">
			<div class="title">
				<p><strong>Cast</strong></p>
			</div>

			<div class="text">
			<?php
			if( have_rows('cast') ):
				while( have_rows('cast') ): the_row(); 
					?>
					<p><span><?php the_sub_field('character'); ?></span> <?php the_sub_field('name'); ?></p>
				<?php	
				endwhile;
			endif; ?>
			<div class="grad"></div>
			</div>
		</div>

		<div class="crew">
			<div class="title">
				<p><strong>Production</strong></p>
			</div>
			
			<div class="text">
			<?php
			if( have_rows('production_crew') ):
				while( have_rows('production_crew') ): the_row(); 
					?>
					<p><span><?php the_sub_field('role'); ?></span> <?php the_sub_field('name'); ?></p>
				<?php	
				endwhile;
			endif; ?>
			<div class="grad"></div>
			</div>
		</div>
	</div>
	<center>
		<a class="expand-cast" href="#"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
 <span>Show More</span></a>
	</center>
</section>
<?php endif; ?>