<?php

add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

if (!defined('WP_ENV')) {
  define('WP_ENV', 'production'); 
}

function sidebar_add_body_class($classes) {
  if (display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }
  return $classes;
}
add_filter('body_class', 'sidebar_add_body_class');


function display_sidebar() {
  static $display;

  if (!isset($display)) {
    $sidebar_config = new Sidebar(
      //conditionals
      array(
        'is_404',
        'is_front_page'
      ),
      //page-templates
      array(
        'template-fullwidth.php'
      )
    );
    $display = apply_filters('audacity/display_sidebar', $sidebar_config->display);
  }  

  return $display;
}

// max width for content, including images and embedded objects
if (!isset($content_width)) { $content_width = 960; }

