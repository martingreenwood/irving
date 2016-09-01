
	<?php 
	$image = get_sub_field('col_image');
	$size = 'full'; // (thumbnail, medium, large, full or custom size)

	if( $image ) {

		echo wp_get_attachment_image( $image['id'], $size );

	}

	?>
