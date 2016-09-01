
	<div class="boxes">
	<?php
	// check if the repeater field has rows of data
	if( have_rows('col_repeat') ):

	 	// loop through the rows of data
	    while ( have_rows('col_repeat') ) : the_row();
			echo '<div class="box">';

	        // display a sub field value
			$col_repeatimage = get_sub_field('icon');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			if( $col_repeatimage ) {
				echo '<div class="img">';
				echo wp_get_attachment_image( $col_repeatimage['id'], $size );
				echo '</div>';
			}

	        the_sub_field('text');
	        
	        echo '</div>';
	    endwhile;

	endif;
	?>
	</div>
