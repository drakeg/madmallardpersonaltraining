<?php

function mmpt_menus() {
  $locations = array(
    'primary' =>  'Header Menu Items',
    'footer' =>  'Footer Menu Items'
  );
  
  register_nav_menus($locations); 
}
add_action('init', 'mmpt_menus');

function mmpt_theme_support() {
  // Add dynamic title tag support
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'mmpt_theme_support');

function mmpt_register_styles() {
  $version = wp_get_theme()->get( 'Version' );
  wp_enqueue_style('mmpt-custom', get_template_directory_uri() . "/style.css", array('mmpt-bootstrap','mmpt-fontawesome'), $version, 'all');
  wp_enqueue_style('mmpt-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css", array(), '4.5.3', 'all');
  wp_enqueue_style('mmpt-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css", array(), '5.15.2', 'all');
}

add_action('wp_enqueue_scripts', 'mmpt_register_styles');

function mmpt_register_scripts() {
  wp_enqueue_script('mmpt-jquery', "https://code.jquery.com/jquery-3.5.1.slim.min.js", array(), '3.5.1', 'all', true);
  wp_enqueue_script('mmpt-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js", array(), '1.16.1', 'all', true);
  wp_enqueue_script('mmpt-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js", array(), '4.5.3', 'all', true);
}

add_action('wp_enqueue_scripts', 'mmpt_register_scripts');
?>
