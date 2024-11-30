<?php get_header(); ?>
<?php
  the_post();
  set_query_var('headline', get_field('headline'));
  set_query_var('fullwidth', get_field_object('fullwidth')['value']);
  set_query_var('title_alignment', get_field_object('page_title_alignment')['value']);
  if (strpos(get_permalink(), '/country-backgrounders/') && explode('/', get_permalink())[count(explode('/', get_permalink())) - 2] !== 'country-backgrounders') {
    set_query_var('ac_member', get_field('ac_member'));
    set_query_var('active_polar_icebreakers', get_field('active_polar_icebreakers'));
    set_query_var('coordinates', get_field('coordinates'));
    set_query_var('population', get_field('population'));
    set_query_var('coastline', get_field('coastline'));
    set_query_var('land_area', get_field('land_area'));
    get_template_part('template-parts/content', 'country');
  } else if (strpos(get_permalink(), '/science-backgrounders/') && explode('/', get_permalink())[count(explode('/', get_permalink())) - 2] !== 'science-backgrounders') {
    get_template_part('template-parts/content', 'science');
  } else {
    get_template_part('template-parts/content', 'page');
  }
  get_template_part('template-parts/content', 'popup');
  get_footer(); 
?>