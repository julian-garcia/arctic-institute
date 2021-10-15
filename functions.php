<?php

function theme_title() {
  add_theme_support('title_tag');
}

function enqueue_style() {
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), $version, 'all' );
  wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/assets/dist/main.css', array(), '2.2.16', 'all' );
}
 
function enqueue_script() {
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/dist/main.bundle.js', false );
}
 
add_action( 'after_theme_setup', 'theme_title' );
add_action( 'wp_enqueue_scripts', 'enqueue_style' );
add_action( 'wp_enqueue_scripts', 'enqueue_script' );