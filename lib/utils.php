<?php

function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

function clean_search_form() {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'clean_search_form');

function add_body_classes($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }
  return $classes;
}
add_filter('body_class', 'add_body_classes');


function seo_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'seo_wp_title', 10);


function clean_excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . 'Continued' . '</a>';
}
add_filter('excerpt_more', 'clean_excerpt_more');
