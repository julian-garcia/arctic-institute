<?php the_post_thumbnail(); ?>
<p class="author"><?php echo 'By'; ?> 
  <?php if ( function_exists( 'coauthors_posts_links' ) ) {
      coauthors_posts_links();
  } else {
      the_author_posts_link();
  } ?>
</p>
<span><?php the_date() ?></span>
<?php the_tags('<span>#', '</span> <span>#','</span>') ?>
<?php the_content(); ?>
