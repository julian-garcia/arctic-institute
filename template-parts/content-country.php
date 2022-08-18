<div class="page-feature-image country-feature"
     style="background-image: url(<?php the_post_thumbnail_url() ?>)">
</div>
<div class="max-w-5xl md:mx-auto my-8 mx-4 section">
  <div class="country-details">
    <h1 class="text-4xl"><?php wp_title(''); ?></h1>
    <div class="stats">
      <a class="back" href="/country-backgrounders">Back to Country Backgrounders</a>
      <div>
        <h3 class="heading">Facts & Figures</h3>
        <p>AC member since <?php echo $ac_member ?></p>
        <hr>
        <h3>Active Polar Icebreakers</h3>
        <p><?php echo $active_polar_icebreakers ?></p>
        <?php if ($coordinates): ?>
        <h3>Coordinates</h3>
        <p><?php echo $coordinates ?></p>
        <?php endif; ?>
      </div>
      <div>
        <?php if ($population): ?>
        <h3>Population</h3>
        <p><?php echo $population ?></p>
        <?php endif; ?>
        <?php if ($land_area): ?>
        <h3>Land Area</h3>
        <p><?php echo $land_area ?></p>
        <?php endif; ?>
        <?php if ($coastline): ?>
        <h3>Coastline</h3>
        <p><?php echo $coastline ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="wp-block-columns values">
    <div class="wp-block-column">
      <ul>
        <?php if (get_field('history')): ?>
          <li index="1" class="active">History</li>
        <?php endif; ?>
        <?php if (get_field('environment')): ?>
          <li index="1" class="active">Environment</li>
        <?php endif; ?>
        <?php if (get_field('people')): ?>
          <li index="2">People</li>
        <?php endif; ?>
        <?php if (get_field('economy')): ?>
          <li index="3">Economy</li>
        <?php endif; ?>
        <?php if (get_field('arctic_policy')): ?>
          <li index="4">Arctic Policy</li>
        <?php endif; ?>
        <li index="5">Recent Publications</li>
        <?php if (get_field('links')): ?>
          <li index="6">Links</li>
        <?php endif; ?>
        <?php if (get_field('experts')): ?>
          <li index="7">Experts</li>
        <?php endif; ?>
      </ul>
    </div>

    <div class="wp-block-column country-content" style="flex-basis:60%">
      <?php if (get_field('history')): ?>
      <div class="wp-block-group">
        <div class="wp-block-group__inner-container">
          <?php the_field('history'); ?>
        </div>
      </div>
      <?php endif; ?>

      <?php if (get_field('environment')): ?>
      <div class="wp-block-group">
        <div class="wp-block-group__inner-container">
          <?php the_field('environment'); ?>
        </div>
      </div>
      <?php endif; ?>

      <?php if (get_field('people')): ?>
      <div class="wp-container wp-block-group hidden">
        <div class="wp-block-group__inner-container">
          <?php the_field('people'); ?>
        </div>
      </div>
      <?php endif; ?>

      <?php if (get_field('economy')): ?>
      <div class="wp-container wp-block-group hidden">
        <div class="wp-block-group__inner-container">
          <?php the_field('economy'); ?>
        </div>
      </div>
      <?php endif; ?>

      <?php if (get_field('arctic_policy')): ?>
      <div class="wp-container wp-block-group hidden">
        <div class="wp-block-group__inner-container">
          <?php the_field('arctic_policy'); ?>
        </div>
      </div>
      <?php endif; ?>

      <div class="wp-container wp-block-group hidden">
        <div class="wp-block-group__inner-container">
          <?php
            $post_query = array_slice(wp_get_recent_posts(array( 
              'post_status' => 'publish',
              'post_type' => 'post', 
              'tag' => array(get_field('recent_posts_tag')->slug)
            )), 0, 3);
          ?>
          <div class="recent-posts">
            <?php 
            foreach( $post_query as $post_item ) : 
              $post = get_post( $post_item['ID'] ); 
              setup_postdata( $post ); ?>
              <a href="<?php the_permalink() ?>">
                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <img src=<?php the_post_thumbnail_url('medium') ?> alt="" class="w-28 float-left mr-4">
                <?php endif; ?>
                <p><?php the_title(); ?></p>
              </a>
            <?php wp_reset_postdata(); endforeach; ?>
          </div>
        </div>
      </div>

      <?php if (get_field('links')): ?>
      <div class="wp-container wp-block-group hidden">
        <div class="wp-block-group__inner-container">
          <?php the_field('links'); ?>
        </div>
      </div>
      <?php endif; ?>

      <?php if (get_field('experts')): ?>
      <div class="wp-container wp-block-group hidden">
        <div class="wp-block-group__inner-container">
          <?php   $post_objects = get_field('experts'); if( $post_objects ): ?>
          <div class="wp-block-columns science-experts">
            <?php foreach( $post_objects as $post_object): ?>
              <div class="wp-block-column">
                <div class="science-expert" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post_object->ID, 'medium' );?>)">
                  <p class="text-blue text-center mt-4">
                    <a href="<?php echo get_permalink($post_object->ID); ?>">
                      <?php echo get_the_title($post_object->ID); ?>
                    </a>
                  </p>
                  <a href="<?php echo get_permalink($post_object->ID); ?>"></a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <?php endif;?>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
</div>
