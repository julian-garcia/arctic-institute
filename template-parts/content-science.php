<div class="page-feature-image"
     style="background-image: url(<?php the_post_thumbnail_url() ?>)">
     <div class="mx-auto max-w-5xl py-28 z-10 relative px-4 lg:px-0">
       <h1 class="text-white"><?php wp_title(''); ?></h1>
       <p class="text-2xl text-white max-w-lg mt-3"><?php echo $headline ?></p>
     </div>
</div>
<div class="content">
  <div class="section">
    <h2 class="heading text-center">Latest Analysis</h2>
    <?php
      $post_query = wp_get_recent_posts(array( 
        'numberposts' => 3, 
        'post_status' => 'publish',
        'post_type' => 'post', 
        'tag_slug__in' => array(get_field('topic')->slug),
        'order'        => 'DESC',
        'orderby'      => 'publish_date'
      )); ?>
    <div class="publications less-spacing no-bottom-spacing">
      <?php foreach( $post_query as $key => $post_item ) : 
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
  <?php $library = get_field('library');
    if( $library ): $count = count($library); ?>
    <div class="section library grid grid-cols-2 mx-auto max-w-3xl gap-4">
      <?php foreach( $library as $key => $library_post ): 
          $post = get_post( $library_post ); 
          setup_postdata( $post );
          $permalink = get_permalink( $library_post->ID );
          $title = get_the_title( $library_post->ID ); ?>
        <div class="item">
          <p class="author">
            <?php if ( function_exists( 'coauthors_posts_links' ) ) {
                coauthors_posts_links(null, null, '');
            } else {
                the_author_posts_link();
            } ?>
          </p>
          <a href="<?php echo esc_url( $permalink ); ?>" class="title"><?php echo esc_html( $title ); ?></a>
          <a href="<?php echo esc_url( $permalink ); ?>" class="more">Read more</a>
          <?php if (($key + 2) < $count): ?><hr><?php endif; ?>
        </div>
      <?php wp_reset_postdata(); endforeach; ?>
    </div>
  <?php endif; ?>
</div>