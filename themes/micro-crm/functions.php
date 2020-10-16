<?php

// Load CSS files
function load_css(){
  wp_register_style('stylesheet', get_template_directory_uri() . '/dist/css/main.css');
  wp_enqueue_style('stylesheet');

  wp_register_style('another_css', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('another_css');
}

add_action('wp_enqueue_scripts', 'load_css');

// Load Javascript files
function load_javascript(){
  wp_register_script('app-javascript', get_template_directory_uri() . '/dist/js/app.js', 'jquery', 1, true);
  wp_enqueue_script('app-javascript');
}

add_action('wp_enqueue_scripts', 'load_javascript');

// Theme support
function mytheme_support() {
  
  // Featured Image Support
  add_theme_support('post-thumbnails');

  add_image_size('all-post-image-size', 333, 225);

  // set_post_thumbnail_size(333, 225);

  // Register menus
  register_nav_menus(
    array(
      'primary'     => __('Primary Menu'),
      'footer'      => __('Footer Menu')
    )
  );

  // Post Format Support
  add_theme_support('post-formats', array('gallery'));
}

add_action('after_setup_theme', 'mytheme_support');

// Excerpt Length
function set_excerpt_length(){
  return 25;
}

add_filter('excerpt_length', 'set_excerpt_length');
