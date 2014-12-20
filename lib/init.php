<?php

function setup_init() {

  register_nav_menus(array(
    'primary_navigation' => 'Primary Navigation'
  ));

  add_theme_support('post-thumbnails');
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'setup_init');

function register_sidebars_init() {
  register_sidebar(array(
    'name'          => 'Primary',
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => 'Footer',
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'register_sidebars_init');
