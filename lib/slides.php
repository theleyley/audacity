<?php
/************* CUSTOM POST TYPE FAQ ***************/

add_action('init', 'slides_register');
 
function slides_register() {
 
	$labels = array(
		'name' => __('Slides', 'post type general name'),
		'singular_name' => __('slide', 'post type singular name'),
		'add_new' => __('Add New', 'team item'),
		'add_new_item' => __('Add New Slide'),
		'edit_item' => __('Edit Slide'),
		'new_item' => __('New Slide'),
		'view_item' => __('View Slide'),
		'search_items' => __('Search Slides'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-images-alt',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'exclude_from_search' => true,
		'menu_position' => 20,
		'show_in_nav_menus' => false,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'slides' , $args );
	flush_rewrite_rules();
}
