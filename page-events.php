<?php get_header(); ?>
<?php 
  the_post();
  set_query_var( 'headline', get_field('headline') );
  set_query_var( 'fullwidth', get_field_object('fullwidth')['value'] );
  get_template_part('template-parts/content', 'events'); 
?>
<?php get_footer(); ?>
