<?php get_header(); ?>
<?php 
  the_post(); 
  set_query_var( 'headline_article', get_field('headline_article') );
  get_template_part('template-parts/content', 'home'); 
?>
<?php get_footer(); ?>
