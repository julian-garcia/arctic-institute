<div class="section dark"></div>
<div class="content expert">
  <a class="back" href="/experts">Back to Experts</a>
  <div class="grid grid-cols-12 gap-6">
    <div class="expert-image col-span-12 sm:col-span-4" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
    <div class="col-span-12 sm:col-span-8">
      <h1 class="text-4xl"><?php wp_title(''); ?></h1>
      <p class="text-2xl max-w-md mt-3"><?php echo $headline ?></p>
      <p>
        <strong>Email:</strong> <a href="mailto: <?php echo $email ?>"><?php echo $email ?></a><br>
        <?php if ($twitter): ?>
        <strong>Twitter:</strong> <a href="https://twitter.com/<?php echo $twitter ?>" target="_blank"><?php echo $twitter ?></a><br>
        <?php endif; ?>
        <strong>Working Location:</strong> <?php echo $working_location ?><br>
        <strong>Languages:</strong> <?php echo $languages ?><br>
        <?php if(get_field('research_topics')): ?>
          <strong>Research Topics:</strong>
          <?php the_field('research_topics'); ?>
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
