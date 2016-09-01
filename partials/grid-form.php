
	<?php 
	    $form_object = get_sub_field('col_form');
	    gravity_form_enqueue_scripts($form_object['id'], true);
	    gravity_form($form_object['id'], true, true, false, '', true, 1); 
	?>
