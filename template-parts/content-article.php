<div class="the-article">
  <a class="back" href="/publications">Back to Publications</a>
  <h1 class="leading-tight text-4xl"><?php wp_title(''); ?></h1>
  <div class="meta">
    <span class="authors">
      By
      <?php if ( function_exists( 'coauthors_posts_links' ) ) {
          coauthors_posts_links();
      } else {
          the_author_posts_link();
      } ?> 
    </span>
    <span class="separator">|</span>
    <span class="categories">
      <?php 
        $post_terms = wp_get_object_terms( get_the_ID(), 'category', array( 'fields' => 'ids' ) );
        wp_list_categories( array(
          'title_li' => '',
          'style'    => 'none',
          'echo'     => true,
          'taxonomy' => 'category',
          'separator' => '',
          'include'   => implode( ',' , $post_terms )
      ) ); ?>
    </span>
    <div class="dot"></div>
    <span class="date"><?php the_date() ?></span>
  </div>
  <div class="tags">
    <?php the_tags('', ', ','') ?>
  </div>
  <div class="social-share my-4">
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
      <i class="fab fa-brands fa-facebook-f"></i>
    </a>
    <a href="whatsapp://send?text=<?php the_permalink(); ?>">
      <i class="fab fa-brands fa-whatsapp"></i>
    </a>
    <a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>" target="_blank">
      <i class="fab fa-brands fa-linkedin-in"></i>
    </a>
    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank">
      <i class="fab fa-brands fa-twitter"></i>
    </a>
  </div>
  <div class="feature <?php echo get_field('small_feature') ? "small" : "" ?>">
    <?php the_post_thumbnail(); ?>
  </div>
  <?php the_content(); ?>
</div>