<div class="section dark"></div>
<div class="content expert">
  <a class="back" href="/experts">Back to Experts</a>
  <div class="grid grid-cols-12 gap-6">
    <div class="expert-image col-span-12 sm:col-span-4" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
    <div class="col-span-12 sm:col-span-8">
      <h1 class="text-4xl"><?php wp_title(''); ?></h1>
      <p class="text-2xl max-w-md mt-3"><?php echo $headline ?></p>
      <p class="mb-0">
        <h4 class="heading no-margin inline"><?php echo $emailLabel ?>:</h4> 
        <p class="inline mb-0">
          <a href="mailto: <?php echo $email ?>"><?php echo $email ?></a>
        </p><br>
        <?php if ($twitter): ?>
          <h4 class="heading no-margin inline"><?php echo $twitterLabel ?>:</h4> 
          <p class="inline">
            <a href="https://x.com/<?php echo $twitter ?>" target="_blank">
            <?php echo $twitter ?></a>
          </p><br>
        <?php endif; ?>
        <?php if ($bluesky): ?>
          <h4 class="heading no-margin inline"><?php echo $blueskyLabel ?>:</h4> 
          <p class="inline">
            <a href="https://bsky.app/profile/<?php echo $bluesky ?>.bsky.social" target="_blank">
            <?php echo $bluesky ?></a>
          </p><br>
        <?php endif; ?>
        <h4 class="heading no-margin inline"><?php echo $locationLabel ?>:</h4>
        <p class="inline">
          <?php echo $working_location ?>
        </p><br>
        <h4 class="heading no-margin inline"><?php echo $languagesLabel ?>:</h4> 
        <p class="inline">
          <?php echo $languages ?>
        </p><br>
        <?php if (get_field('specialist_topics')): ?>
          <div class = "expert-topics">
            <h4 class="heading no-margin inline align-top">Research Topics:</h4>
            <ul>
            <?php foreach (get_field('specialist_topics') as $value): ?>
              <li>
                <a href="/publications?topic=<?php echo $value->slug ?>" class="<?php echo $value->slug ?>">
                  <?php echo $value->name ?>
                </a>
              </li>
            <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </p>
    </div>
  </div>
  <div class="my-8"> 
    <?php the_content(); ?>
  </div>
  <div>
    <?php
      $post_query = new WP_Query(array( 
        'post_type' => 'post', 
        'author' => $author,
      ));
    ?>
    <?php if ( $post_query->have_posts() ) : ?>
      <hr>
      <?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
        <div class="mb-4">
          <a href="<?php the_permalink() ?>" class="text-lg mb-0"><?php the_title(); ?></a>
          <p class="m-0"><?php echo get_the_excerpt(); ?></p>
          <p class="m-0"><?php the_date('F j, Y'); ?></p>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</div>
