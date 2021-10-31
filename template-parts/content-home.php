<div class="home-feature-image" 
     style="background-image: url(<?php the_post_thumbnail_url() ?>">
</div>

<?php if( $headline_article ): ?>
<div class="headline">
  <?php 
    $tags = wp_get_post_tags($headline_article->ID); 
    if ( $tags ) { ?>
      <div class="tags">
      <?php foreach( $tags as $tag ) { echo $tag->name . ', '; } ?>
      </div>
    <?php } ?>
  <h2 class="font-bold text-3xl mb-1"><?php echo esc_html( $headline_article -> post_title ); ?></h2>
  <p class="mb-3">By: 
  <?php if ( function_exists( 'coauthors_posts_links' ) ) {
      coauthors_posts_links();
  } else {
      the_author_posts_link();
  } ?>
  </p>
  <p class="text-xl"><?php echo $headline_article -> post_excerpt ?></p>
</div>
<?php endif; ?>

<?php the_content(); ?>
