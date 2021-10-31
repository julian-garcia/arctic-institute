<?php get_header(); ?>
<h1 class="text-3xl"><?php wp_title(''); ?></h1> 
<?php the_post(); get_template_part('template-parts/content', 'page'); ?>
<?php get_footer(); ?>
