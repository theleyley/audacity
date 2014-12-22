<?php

function header_logo($class=NULL){
	$home_url = esc_url(get_home_url());
	$bloginfo = get_bloginfo( 'name' );
	$header_logo = audacity_get_option('logo_head');
	$header_image = ($header_logo) ? '<img src="'.$header_logo.'" class="logo img-responsive" />' : $bloginfo;
	$class = ($header_logo) ? $class.' image' : '';
	echo '<a class="navbar-brand header_logo '.$class.'" href="'. $home_url .'">'.$header_image.'</a>';
}


