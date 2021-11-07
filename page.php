<?php get_header(); ?>
<div class="container max-w-4xl mx-auto">
  <h1 class="text-3xl"><?php wp_title(''); ?></h1> 
  <?php the_post(); get_template_part('template-parts/content', 'page'); ?>
</div>
<?php get_footer(); ?>
