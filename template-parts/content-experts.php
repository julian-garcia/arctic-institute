<div class="section dark"></div>
<div class="experts">
  <h1><?php wp_title(''); ?></h1>
  <div class="expert-grid">
    <div class="wp-block-group__inner-container">
    <?php 
      $experts = new WP_Query(array(
        'post_type' => 'expert',
        'meta_query'  => array(
          'featured_clause' => array(
              'key' => 'sequence',
              'compare' => 'EXISTS'
          )
        ),
        'orderby' => array( 'featured_clause' => 'ASC', 'title' => 'ASC' )
      ));
      while($experts->have_posts() ):
      $experts->the_post(); 
    ?>
      <div class="wp-block-group">
        <div class="wp-block-group__inner-container">
          <div class="wp-block-image is-style-rounded">
            <figure class="aligncenter size-full">
              <a href="<?php the_permalink(); ?>">
              <div class="photo" style="background-image: url(<?php the_post_thumbnail_url('medium') ?>)"></div>
              <figcaption>
                <a href="<?php the_permalink(); ?>">
                  <?php echo get_the_title(); ?><br><?php echo get_the_excerpt(); ?>
                </a>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
      <?php wp_reset_postdata(); ?>
      <?php endwhile; ?>
    </div>
  </div>
</div>
