<?php get_header(); ?>
<div class="section dark"></div>
<div class="article">
  <div class="max-w-5xl mx-auto">
    <?php     
      set_query_var( 'date', get_field('date') );
      set_query_var( 'link', get_field('link') );
      the_post(); 
      get_template_part('template-parts/content', 'event'); 
    ?>
  </div>
</div>
<?php get_footer(); ?>
