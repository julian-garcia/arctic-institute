<div class="the-article">
  <a class="back" href="/publications">Back to Publications</a>
  <h1 class="leading-tight text-4xl"><?php wp_title(''); ?></h1>
  <p class="meta">
    <span class="authors">
    <?php echo 'By'; ?> 
    <?php if ( function_exists( 'coauthors_posts_links' ) ) {
        coauthors_posts_links();
    } else {
        the_author_posts_link();
    } ?> 
    </span>
    <span class="mx-8">|</span>
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
    <span class="date"><?php the_date() ?></span>
  </p>
  <div class="tags">
    <?php the_tags('', ', ','') ?>
  </div>
  <?php the_post_thumbnail(); ?>
  <?php the_content(); ?>
</div>