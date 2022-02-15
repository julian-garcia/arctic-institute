<?php

function config_theme_support() {
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
}

function enqueue_styles() {
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/dist/main.css', array(), '2.2.16', 'all' );
  wp_enqueue_style( 'font', 'https://fonts.googleapis.com/css2?family=PT+Serif&display=swap">', array(), '', 'all' );
  wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array('main'), $version, 'all' );
}

function enqueue_script() {
  $version = wp_get_theme()->get('Version');
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/dist/main.bundle.js', array(), $version, true );
}

function setup_menus() {
  $locations = array(
    'primary' => 'Primary Navigation',
    'footer' => 'Footer Menu'
  );
  register_nav_menus($locations);
}

function widget_areas() {
  register_sidebar( 
    array(
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '',
      'after_widget' => '',
      'name' => 'Footer Widget',
      'id' => 'footer-1',
      'description' => 'Footer Widget Area',
    )
  );
  register_sidebar( 
    array(
      'before_widget' => '',
      'after_widget' => '',
      'name' => 'Footer Column 1',
      'id' => 'footer-col-1',
      'description' => 'Footer Column 1',
    )
  );
  register_sidebar( 
    array(
      'before_widget' => '',
      'after_widget' => '',
      'name' => 'Footer Column 2',
      'id' => 'footer-col-2',
      'description' => 'Footer Column 2',
    )
  );
  register_sidebar( 
    array(
      'before_widget' => '',
      'after_widget' => '',
      'name' => 'Footer Column 3',
      'id' => 'footer-col-3',
      'description' => 'Footer Column 3',
    )
  );
}

function add_menu_class($classes, $item, $args) {
  if($args->theme_location == 'primary') {
    $classes[] = 'main-menu-item';
  }
  return $classes;
}

function event_post_type() {
  register_post_type('event',
    array(
      'rewrite' => array('slug' => 'events'),
      'labels' => array(
        'name' => 'Events',
        'singular_name' => 'Event',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event'
      ),
      'menu_icon' => 'dashicons-calendar',
      'public' => true,
      'has_archive' => false,
      'supports' => array(
        'title', 'thumbnail', 'editor', 'excerpt'
      )
    )
  );
}

function set_posts_per_page( $query ) {
  if ( ($query->is_search() || $query->is_archive()) && !is_page('media') && !is_page('the-arctic-this-week-newsletter') ) {
    $query->set( 'posts_per_page', 10 );
  }
}

add_filter( 'nav_menu_css_class', 'add_menu_class', 10, 4 );
add_action( 'after_setup_theme', 'config_theme_support' );
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'enqueue_script' );
add_action( 'init', 'setup_menus' );
add_action( 'init', 'event_post_type' );
add_action( 'widgets_init', 'widget_areas' );
add_action( 'pre_get_posts',  'set_posts_per_page'  );
