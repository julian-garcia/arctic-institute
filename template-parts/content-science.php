<div class="page-feature-image"
     style="background-image: url(<?php the_post_thumbnail_url() ?>)">
     <div class="mx-auto max-w-5xl py-28 z-10 relative px-4 lg:px-0">
       <h1 class="text-white"><?php wp_title(''); ?></h1>
       <p class="text-2xl text-white max-w-lg mt-3"><?php echo $headline ?></p>
     </div>
</div>
<div class="content">
  <div class="section">
    <h2 class="heading text-center">Latest Analysis </h2>
    <?php
      $post_query = array_slice(wp_get_recent_posts(array( 
        'post_status' => 'publish',
        'post_type' => 'post', 
        'tag' => array(get_field('topic')->slug)
      )), 0, 3);
    ?>
    <div class="publications less-spacing no-bottom-spacing">
      <?php 
      foreach( $post_query as $post_item ) : 
        $post = get_post( $post_item['ID'] ); 
        setup_postdata( $post );
        $cats = get_the_category(); ?>
        <div class="publication-card card">
          <a href="<?php the_permalink() ?>">
            <img src=<?php the_post_thumbnail_url('medium') ?> alt="" class="w-full">
          </a>
          <div class="tags"> <?php the_tags('<span>', ', </span> <span>','</span>'); ?> </div>
          <a class="date" href="<?php the_permalink() ?>"><?php echo get_the_date( 'F j, Y' ) ?></a>
          <a class="title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
          <p class="author"><?php echo 'By:'; ?> 
            <?php if ( function_exists( 'coauthors_posts_links' ) ) {
                coauthors_posts_links();
            } else {
                the_author_posts_link();
            } ?>
          </p>
          <div class="categories">
            <?php 
            foreach($cats as $c){
              $cat = get_category( $c );
              echo '<a href="/category/' . $cat->slug . '">' . $cat->name . '</a>';
            } 
            ?>
          </div>
        </div>
      <?php wp_reset_postdata(); endforeach; ?>
    </div>
  </div>
  <?php the_content(); ?>
</div>