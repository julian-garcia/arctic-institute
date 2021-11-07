<?php get_header(); ?>
<div class="container max-w-4xl mx-auto">
<?php 
  while(have_posts()) { 
    the_post(); 
    get_template_part('template-parts/content', 'archive');
  } 
?>
<?php the_posts_pagination(); ?>
</div>
<?php get_footer(); ?>
