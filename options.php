<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	//var_dump($optionsframework_settings);die();
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/admin/img/';
	$sitename = get_bloginfo('name');
	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$options = array();
	
	$options[] = array(
		'name' => __('Branding', $themename),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', $themename),
		'desc' => __('Upload logo to appear in header', $themename),
		'id' => 'logo_head',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Copyright &copy; Text', $themename),
		'desc' => __('Default Copyright Text - Copyright © '.date(Y).' '.$sitename.'. All rights reserved.', $themename),
		'id' => 'copyright',
		'placeholder' => 'Adding copyright text here will override the default copyright text',
		'type' => 'text');
		
	return $options;
}