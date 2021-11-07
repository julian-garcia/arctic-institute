<div class="home-feature-image" 
     style="background-image: url(<?php the_post_thumbnail_url() ?>">
</div>

<?php if( $headline_article ): $post = get_post( $headline_article->ID ); setup_postdata( $post );  ?>
<div class="headline-article">
  <a href="<?php the_permalink(); ?>" class="headline-link"></a>
  <div class="tags">
    <?php the_tags('<span>', ', </span> <span>','</span>'); ?>
  </div>
  <h2 class="font-bold text-3xl mb-1"><?php the_title(); ?></h2>
  <p class="author font-bold">By: 
  <?php if ( function_exists( 'coauthors_posts_links' ) ) {
      coauthors_posts_links();
  } else {
      the_author_posts_link();
  } ?>
  </p>
  <p class="text-xl mb-6"><?php echo get_the_excerpt() ?></p>
  <p class="date"><?php 
    foreach(wp_get_post_categories( $headline_article->ID ) as $c){
      $cat = get_category( $c );
      echo '<a href="/category/' . $cat->slug . '">' . $cat->name . '</a>';
    } 
    echo ' &bull; ' . get_the_date( 'M j, yy' );
  ?></p>
</div>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

<div class="section dark z-10 curve-after">
  <div class="cards md:-mt-24 z-10">
    <?php 
    $recent_posts = wp_get_recent_posts(array(
      'numberposts' => 6, 
      'post_status' => 'publish'
    ));
    foreach( $recent_posts as $post_item ) : 
      $post = get_post( $post_item['ID'] ); setup_postdata( $post );?>
      <div class="card">
        <a class="link" href="<?php the_permalink(); ?>"></a>
        <?php echo get_the_post_thumbnail($post_item['ID'], 'medium'); ?>
        <div class="tags">
          <?php the_tags('<span>', ', </span> <span>','</span>'); ?>
        </div>
        <p class="date"><?php echo get_the_date( 'M j, yy' ) ?></p>
        <p class="title"><?php the_title(); ?></p>
        <p class="author font-bold">By: 
        <?php if ( function_exists( 'coauthors_posts_links' ) ) {
            coauthors_posts_links();
        } else {
            the_author_posts_link();
        } ?>
        </p>
        <p class="category"><?php 
          foreach(wp_get_post_categories( $post_item['ID'] ) as $c){
            $cat = get_category( $c );
            echo '<a href="/category/' . $cat->slug . '">' . $cat->name . '</a>';
          } 
          ?>
        </p>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endforeach; ?>
  </div>
  <div class="text-center mt-5 p-3">
    <a href="#" class="button blue block sm:inline-block">VIEW ALL PUBLICATIONS</a>
    <a href="#" class="button clear block sm:inline-block">VIEW Upcoming Events</a>
  </div>
</div>

<div class="section mt-28 md:mt-14 pt-28 pb-10 bg-white">
  <?php the_content(); ?>
</div>
