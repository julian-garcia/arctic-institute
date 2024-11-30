<?php get_header(); ?>
<div class="section dark"></div>
<div class="article">
  <div class="content">
    <?php the_post(); get_template_part('template-parts/content', 'article'); ?>
    <div class="sidebar related">
    <?php $related_posts = get_field('related');
      if( $related_posts ): $count = count($related_posts); ?>
      <h2>Related</h2>
      <?php foreach( $related_posts as $key => $related_post ): 
          $post = get_post( $related_post ); 
          setup_postdata( $post );
          $permalink = get_permalink( $related_post->ID );
          $title = get_the_title( $related_post->ID ); 
          $date = get_the_date( 'F j, Y' ); 
          $cats = get_the_category(); ?>
        <a href="<?php echo esc_url( $permalink ); ?>">
          <span class="date"><?php echo esc_html( $date ); ?></span>
          <span class="title"><?php echo esc_html( $title ); ?></span>
        </a>
        <span class="author">
          <?php if ( function_exists( 'coauthors_posts_links' ) ) {
              coauthors_posts_links(null, null, 'By: ');
          } else {
              the_author_posts_link();
          } ?>
        </span>
        <div class="categories">
          <?php 
          foreach($cats as $c){
            $cat = get_category( $c );
            echo '<a href="/category/' . $cat->slug . '">' . $cat->name . '</a>';
          } 
          ?>
        </div>
        <a href="<?php echo esc_url( $permalink ); ?>" class="more">Read more</a>
        <?php if (($key + 1) < $count): ?><hr><?php endif; ?>
      <?php wp_reset_postdata(); endforeach; ?>
    <?php endif; ?>
    <?php if( !$related_posts ): ?>
      <h2>Latest</h2>
      <?php $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 3, 
        'post_status' => 'publish'
      )); $count = count($recent_posts);
      foreach( $recent_posts as $key => $post_item ) : 
        $post = get_post( $post_item['ID'] );
        setup_postdata( $post );
        $permalink = get_permalink( $post_item['ID'] );
        $title = get_the_title( $post_item['ID'] ); 
        $date = get_the_date( 'F j, Y' ); 
        $cats = get_the_category(); ?>
        <a href="<?php echo esc_url( $permalink ); ?>">
          <span class="date"><?php echo esc_html( $date ); ?></span>
          <span class="title"><?php echo esc_html( $title ); ?></span>
        </a>
        <span class="author">
          <?php if ( function_exists( 'coauthors_posts_links' ) ) {
              coauthors_posts_links(null, null, 'By: ');
          } else {
              the_author_posts_link();
          } ?>
        </span>
        <div class="categories">
          <?php 
          foreach($cats as $c){
            $cat = get_category( $c );
            echo '<a href="/category/' . $cat->slug . '">' . $cat->name . '</a>';
          } 
          ?>
        </div>
        <a href="<?php echo esc_url( $permalink ); ?>" class="more">Read more</a>
        <?php if (($key + 1) < $count): ?><hr><?php endif; ?>
    <?php wp_reset_postdata(); endforeach; endif; ?>
    </div>
  </div>
</div>
<?php 
  get_footer();
  get_template_part('template-parts/content', 'popup');
?>