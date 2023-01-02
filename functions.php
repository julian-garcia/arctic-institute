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
      'rewrite' => array('slug' => 'event'),
      'labels' => array(
        'name' => 'Events',
        'singular_name' => 'Event',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event'
      ),
      'menu_icon' => 'dashicons-calendar',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => true,
      'supports' => array(
        'title', 'thumbnail', 'editor', 'excerpt'
      ),
      'taxonomies' => array('post_tag')
    )
  );
}

function expert_post_type() {
  register_post_type('expert',
    array(
      'rewrite' => array('slug' => 'expert'),
      'labels' => array(
        'name' => 'Experts',
        'singular_name' => 'Expert',
        'add_new_item' => 'Add New Expert',
        'edit_item' => 'Edit Expert'
      ),
      'menu_icon' => 'dashicons-groups',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => true,
      'supports' => array(
        'title', 'thumbnail', 'editor', 'excerpt'
      )
    )
  );
}

function set_posts_per_page( $query ) {
  if ( ($query->is_search() || $query->is_archive()) && !is_page('media') && !is_page('the-arctic-this-week-newsletter') ) {
    $query->set( 'posts_per_page', 9 );
  }
  if (is_page('experts')) {
    $query->set( 'posts_per_page', -1 );
  }
}

function series_post_list() {
  if (get_field('series_tag')) {
    $post_query = new WP_Query(array( 
      'post_type' => 'post', 
      'posts_per_page' => -1,
      'orderby' => 'date',
      'order'   => 'ASC',
      'nopaging' => true,
      'tag_id' => get_field('series_tag')
    ));
    $titles = '<ul class="series">';
    while($post_query->have_posts() ) {
      $post_query->the_post();
      $titles = $titles . '<li>' . '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
    }
    $titles = $titles . '</ul>';
    wp_reset_query();
    return '<h2 class="heading">The Arctic Institute ' . get_tag(get_field('series_tag'))->name . '</h2>' . $titles;
  }
}

function impact_reports($attr,$content){
  return '<div class="impact-grid">'.do_shortcode($content).'</div>';
}

function impact_report( $atts = [], $content = null, $tag = '' ) {
	$wporg_atts = shortcode_atts(
		array(
			'link' => '',
			'image' => '',
		), $atts, $tag
	);

  return $first . "<a href='" . $wporg_atts['link'] . 
  "' target='_blank' rel='noopener noreferrer' class='impact-grid-item'>" . 
  "<img src='" . $wporg_atts['image'] . "' alt=''>" . 
  "</a>";
}

function shortcodes_init() {
  add_shortcode( 'series', 'series_post_list' );
	add_shortcode( 'impact_report', 'impact_report' );
	add_shortcode( 'impact_reports', 'impact_reports' );
}

add_action( 'init', 'shortcodes_init' );
add_filter( 'nav_menu_css_class', 'add_menu_class', 10, 4 );
add_action( 'after_setup_theme', 'config_theme_support' );
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'enqueue_script' );
add_action( 'init', 'setup_menus' );
add_action( 'init', 'event_post_type' );
add_action( 'init', 'expert_post_type' );
add_action( 'widgets_init', 'widget_areas' );
add_action( 'pre_get_posts',  'set_posts_per_page'  );
