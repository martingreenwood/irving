<?php
/**
 * Custom post types for Irving
 *
 * Creating a Custom Post Type is blissfully simple ...
 * Simply add your Post Types to the $cpts array.
 * $locations = array(
		'name',
		'singlular',
		'plural',
		'icon',  -> https://developer.wordpress.org/resource/dashicons/#arrow-right-alt
		array('title','editor','thumbnail'),
		public (true / false),
	),
 *	
 * @package russell
 */

global $cpts;

$cpts = array(
	
	// Shows
	array(
		'shows',
		'Show',
		'Shows',
		'dashicons-tickets-alt', 
		array('title','editor','thumbnail'),
		true,
	),	
);

function cpts_register() {
	
	global $cpts;
	
	foreach($cpts as $cpt){
		
		$cpt_wp_name 	= $cpt[0];
		$cpt_singular 	= $cpt[1];
		$cpt_plural 	= $cpt[2];
		$cpt_icon 		= $cpt[3];
		$cpt_supports 	= $cpt[4];
		$cpt_public 	= $cpt[5];

		$labels = array(
	  	'name' 					=> _x($cpt_plural, 'post type general name'),
	    'singular_name' 		=> _x($cpt_singular, 'post type singular name'),
	    'add_new' 				=> _x('Add New', $cpt_wp_name),
	    'add_new_item' 			=> __('Add New '.$cpt_singular),
	    'edit_item' 			=> __('Edit '.$cpt_singular),
	    'new_item' 				=> __('New '.$cpt_singular),
	    'view_item' 			=> __('View '.$cpt_singular),
	    'search_items' 			=> __('Search '.$cpt_plural),
	    'not_found' 			=>  __('No '.$cpt_plural.' Found'),
	    'not_found_in_trash'	=> __('No '.$cpt_plural.' Found in Trash'), 
	    'parent_item_colon' 	=> ''
	  );
	  $args = array(
	  	'labels' 				=> $labels,
	    'public' 				=> $cpt_public,
	    'show_ui' 				=> true,
	    'publicly_queryable'	=> true,
	    'query_var'				=> true,
	    'capability_type'		=> 'post',
	    'hierarchical' 			=> false,
	    'rewrite' 				=> true,
	    'menu_icon' 			=> $cpt_icon,
	    'supports' 				=> $cpt_supports,
  		'show_in_rest'			=> true,
		);

		register_post_type($cpt_wp_name, $args );
		
	}
	
}

//create Products custom post type
add_action('init', 'cpts_register');


//create taxonomy for the experiences page
function create_genre_taxonomy()
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Genres', 'taxonomy general name' ),
    'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Genres' ),
    'all_items' => __( 'All Genres' ),
    'parent_item' => __( 'Parent Genre' ),
    'parent_item_colon' => __( 'Parent Genre:' ),
    'edit_item' => __( 'Edit Genre' ), 
    'update_item' => __( 'Update Genre' ),
    'add_new_item' => __( 'Add New Genre' ),
    'new_item_name' => __( 'New Genre' ),
    'menu_name' => __( 'Genres' ),
  );

  register_taxonomy('genres',array('shows'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'genre' ),
  ));
}

add_action( 'init', 'create_genre_taxonomy');