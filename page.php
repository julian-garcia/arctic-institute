<?php get_header(); ?>
<?php 
  the_post(); 
  set_query_var( 'headline', get_field('headline') );
  get_template_part('template-parts/content', 'page'); 
?>
<?php get_footer(); ?>
