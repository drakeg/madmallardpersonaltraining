<?php

function madmallardpersonaltraining_menus() {
  $locations = array(
    'primary' =>  'Header Menu Items',
    'footer' =>  'Footer Menu Items'
  );
  
  register_nav_menus($locations); 
}
add_action('init', 'madmallardpersonaltraining_menus');

function madmallardpersonaltraining_theme_support() {
  // Add dynamic title tag support
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'madmallardpersonaltraining_theme_support');

function madmallardpersonaltraining_register_styles() {
  $version = wp_get_theme()->get( 'Version' );
  wp_enqueue_style('madmallardpersonaltraining-custom', get_template_directory_uri() . "/style.css", array('madmallardpersonaltraining-bootstrap'), $version, 'all');
  wp_enqueue_style('madmallardpersonaltraining-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css", array(), '4.5.3', 'all');
  wp_enqueue_style('madmallardpersonaltraining-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css", array(), '5.15.2', 'all');
}

add_action('wp_enqueue_scripts', 'madmallardpersonaltraining_register_styles');

function madmallardpersonaltraining_register_scripts() {
  wp_enqueue_script('madmallardpersonaltraining-jquery', "https://code.jquery.com/jquery-3.5.1.slim.min.js", array(), '3.5.1', 'all', true);
  wp_enqueue_script('madmallardpersonaltraining-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js", array(), '1.16.1', 'all', true);
  wp_enqueue_script('madmallardpersonaltraining-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js", array(), '4.5.3', 'all', true);
}

add_action('wp_enqueue_scripts', 'madmallardpersonaltraining_register_scripts');
?>
