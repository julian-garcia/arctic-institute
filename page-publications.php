<?php get_header(); ?>
<?php 
  while(have_posts()) { 
    the_post();   
    set_query_var( 'headline', get_field('headline') );
    set_query_var( 'post_1', get_field('post_1') );
    set_query_var( 'post_2', get_field('post_2') );
    set_query_var( 'post_3', get_field('post_3') );
    set_query_var( 'countries', get_field('countries') );
    get_template_part('template-parts/content', 'publications');
  } 
?>
<?php get_footer(); ?>
