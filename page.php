<?php get_header(); ?>
<?php 
  the_post();
  set_query_var( 'headline', get_field('headline') );
  set_query_var( 'fullwidth', get_field('fullwidth') );
  if (strpos(get_permalink(), '/experts/')) {
    set_query_var( 'email', get_field('email') );
    set_query_var( 'twitter', get_field('twitter') );
    set_query_var( 'working_location', get_field('working_location') );
    set_query_var( 'languages', get_field('languages') );
    set_query_var( 'author', get_field('author') );
    get_template_part('template-parts/content', 'expert'); 
  } else if(strpos(get_permalink(), '/countries/') && explode('/', get_permalink())[count(explode('/', get_permalink())) - 2] !== 'countries') {
    set_query_var( 'ac_member', get_field('ac_member') );
    set_query_var( 'active_polar_icebreakers', get_field('active_polar_icebreakers') );
    set_query_var( 'coordinates', get_field('coordinates') );
    set_query_var( 'population', get_field('population') );
    set_query_var( 'coastline', get_field('coastline') );
    set_query_var( 'land_area', get_field('land_area') );
    get_template_part('template-parts/content', 'country'); 
  } else {
    get_template_part('template-parts/content', 'page'); 
  }
?>
<?php get_footer(); ?>
