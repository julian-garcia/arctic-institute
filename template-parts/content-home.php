<?php 
  $homepageFeature = get_the_post_thumbnail_url();
  $last_post = new WP_Query(array( 
    'post_type' => 'post', 
    'posts_per_page' => 1,
    'category__not_in' => array( 467, 559 )
  ));
  while($last_post->have_posts() ): $last_post->the_post(); ?>
<?php if(get_the_post_thumbnail_url()): ?>
  <?php if(get_the_category()[0]->slug == "take-five"): ?>
    <div class="home-feature-image take-five-home"
      style="background-image: url(<?php the_post_thumbnail_url() ?>)">
    </div>
  <?php else: ?>
    <div class="home-feature-image" 
        style="background-image: url(<?php the_post_thumbnail_url() ?>)">
    </div>
  <?php endif; ?>
<?php else: ?>
<div class="home-feature-image" 
     style="background-image: url(<?php echo $homepageFeature ?>)">
</div>
<?php endif; ?>
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
  <p class="text-lg mb-6"><?php echo get_the_excerpt() ?></p>
  <p class="date"><?php 
    foreach(wp_get_post_categories( get_the_ID() ) as $c){
      $cat = get_category( $c );
      echo '<a href="/category/' . $cat->slug . '">' . $cat->name . '</a>';
    } 
    echo ' &bull; ' . get_the_date( 'M j, Y' );
  ?></p>
</div>
<?php wp_reset_postdata(); ?>
<?php endwhile; ?>

<div class="section dark z-10 curve-after">
  <div class="cards md:-mt-24 z-10">
    <?php 
    $recent_posts = new WP_Query(array( 
      'post_type' => 'post', 
      'posts_per_page' => 6,
      'category__not_in' => array( 467, 559 ),
      'offset' => 1
    ));
    while($recent_posts->have_posts() ):
      $recent_posts->the_post(); ?>
      <div class="card">
        <a class="link" href="<?php the_permalink(); ?>"></a>
        <?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
        <div class="tags">
          <?php the_tags('<span>', ', </span> <span>','</span>'); ?>
        </div>
        <p class="date"><?php echo get_the_date( 'M j, Y' ) ?></p>
        <p class="title"><?php the_title(); ?></p>
        <p class="author font-bold">By: 
        <?php if ( function_exists( 'coauthors_posts_links' ) ) {
            coauthors_posts_links();
        } else {
            the_author_posts_link();
        } ?>
        </p>
        <p class="category"><?php 
          foreach(wp_get_post_categories( get_the_ID() ) as $c){
            $cat = get_category( $c );
            echo '<a href="/category/' . $cat->slug . '">' . $cat->name . '</a>';
          } 
          ?>
        </p>
      </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>
  <div class="text-center mt-5 p-3 flex justify-center gap-8">
    <a href="/publications" class="button blue">VIEW ALL PUBLICATIONS</a>
    <a href="/events" class="button clear">VIEW Upcoming Events</a>
  </div>
</div>

<div class="mt-24 md:mt-16 -mx-4 pt-4 pb-10 bg-white">
  <?php the_content(); ?>
</div>
