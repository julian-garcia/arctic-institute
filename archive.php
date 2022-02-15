<?php get_header(); ?>
<div class="container max-w-4xl mx-auto">
<h2 class="heading text-center"><?php 
  if ( is_category() ) {
      single_cat_title();
  } elseif ( is_tag() ) {
      single_tag_title();
  } elseif ( is_author() ) {
      echo get_the_author();
  }
?></h2>
<?php get_template_part('template-parts/content', 'archive'); ?>
</div>
<?php get_footer(); ?>
