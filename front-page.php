<?php
  get_header();
  the_post();
  set_query_var('headline_article', get_field('headline_article'));
  get_template_part('template-parts/content', 'home');
  get_footer();
  get_template_part('template-parts/content', 'popup'); 
?>
