<?php get_header(); ?>
  <?php     
    set_query_var( 'email', get_field('email') );
    set_query_var( 'twitter', get_field('twitter') );
    set_query_var( 'working_location', get_field('working_location') );
    set_query_var( 'languages', get_field('languages') );
    set_query_var( 'author', get_field('author') );
    set_query_var( 'sequence', get_field('sequence') );
    the_post(); 
    get_template_part('template-parts/content', 'expert'); 
  ?>
<?php get_footer(); ?>
