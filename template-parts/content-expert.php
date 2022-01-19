<div class="section dark"></div>
<div class="content expert">
  <a class="back" href="/experts">Back to Experts</a>
  <div class="grid grid-cols-12 gap-6">
    <img class="col-span-12 sm:col-span-4" style="max-width: min(100%,300px)" src="<?php the_post_thumbnail_url() ?>" alt="<?php wp_title(''); ?>">
    <div class="col-span-12 sm:col-span-8">
      <h1 class="text-4xl"><?php wp_title(''); ?></h1>
      <p class="text-2xl max-w-md mt-3"><?php echo $headline ?></p>
      <p>
        <strong>Email:</strong> <a href="mailto: <?php echo $email ?>"><?php echo $email ?></a><br>
        <strong>Twitter:</strong> <a href="https://twitter.com/<?php echo $twitter ?>" target="_blank"><?php echo $twitter ?></a><br>
        <strong>Working Location:</strong> <?php echo $working_location ?><br>
        <strong>Languages:</strong> <?php echo $languages ?><br>
        <?php
          $post_query = new WP_Query(array( 
            'post_type' => 'post', 
            'author' => $author,
          ));
          $cats = [];
          if($post_query->have_posts() ) {
            echo '<strong>Research Topics:</strong> ';
            while($post_query->have_posts() ) { 
              $post_query->the_post();
              $categories = get_the_category();
              foreach($categories as $c){
                $cat = get_category( $c );
                if (!in_array($cat->name, $cats)) {
                  array_push($cats, $cat->name);
                  echo '<a href="/category/' . $cat->slug . '">' . $cat->name . '</a>';
                }
              }             
            }
          }
          wp_reset_query();
        ?>
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
