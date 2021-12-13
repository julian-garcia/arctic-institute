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
  } else {
    get_template_part('template-parts/content', 'page'); 
  }
?>
<?php get_footer(); ?>
