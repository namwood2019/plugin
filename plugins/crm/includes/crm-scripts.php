<?php
// Add Scripts
function crm_add_scripts() {
  // Add Main CSS
  wp_enqueue_style('crm-main-style', plugins_url(). '/crm/css/style.css');

  // Add Main JS
  wp_enqueue_script('crm-main-script', plugins_url(). '/crm/js/main.js');
}

add_action('wp_enqueue_scripts', 'crm_add_scripts');