<div class="page-feature-image"
     style="background-image: url(<?php the_post_thumbnail_url() ?>)">
     <div class="mx-auto max-w-5xl py-28 z-10 relative px-4 lg:px-0">
       <h1 class="text-4xl text-white"><?php wp_title(''); ?></h1>
       <p class="text-2xl text-white max-w-3xl mt-3"><?php echo $headline ?></p>
     </div>
</div>
<form action="/publications" method="post" class="filters">
  <h2>Filter By</h2>
  <div class="sm:flex gap-6 items-end flex-wrap">
    <div>
      <h3>Topic</h3>
      <select name="topic">
        <option value="" disabled <?php echo $_POST['topic'] ? "" : "selected" ?>>Filter by topic</option>
        <option value="">All</option>
        <?php 
        $cats = get_tags();
        foreach($cats as $c) : ?>
        <option 
          value="<?php echo $c->slug; ?>" 
          <?php echo $_POST['topic'] ===  $c->slug ? "selected" :  "" ?>
        ><?php echo $c->name; ?></option>      
        <?php endforeach; ?>
      </select>
    </div>
    <div>
      <h3>Type</h3>
      <select name="type">
        <option value="" disabled <?php echo $_POST['type'] ? "" : "selected" ?>>Filter by type</option>
        <option value="">All</option>
        <?php 
        $cats = get_categories(array('taxonomy' => 'category'));
        foreach($cats as $c) : ?>
        <option 
          value="<?php echo $c->slug; ?>"
          <?php echo $_POST['type'] ===  $c->slug ? "selected" :  "" ?>
        ><?php echo $c->name; ?></option>      
        <?php endforeach; ?>
      </select>
    </div>
    <input type="submit" name="submit" value="Apply Filters" class="button blue no-margin" />
  </div>
</form>
<div class="publications">
  <?php
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    if($_POST['type'] || $_POST['topic']) {
      $post_query = new WP_Query(array( 
        'post_type' => 'post', 
        'posts_per_page' => 12,
        'category_name' => $_POST['type'],
        'tag' => $_POST['topic'],
        'paged' => $paged,
      ));
    } else {
      $post_query = new WP_Query(array( 
        'post_type' => 'post', 
        'posts_per_page' => 12,
        'paged' => $paged,
      ));
    }

    if($post_query->have_posts() ) : 
      while($post_query->have_posts() ) : $post_query->the_post(); $cats = get_the_category(); ?>
        <div class="publication-card">
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
      <?php endwhile; ?>
</div>
<div class="pagination">
  <?php
    echo paginate_links( array(
      'base' => str_replace( 999999, '%#%', esc_url( get_pagenum_link( 999999 ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $post_query->max_num_pages,
      'prev_text' => '',
      'next_text' => '',
    )); ?>
</div>
<?php else: ?>
</div>
<?php endif; ?>

<?php wp_reset_query(); ?>

<div class="section mid curve-before mt-24">
  <h2 class="text-white text-3xl font-sans text-center">From the Archives</h2>
  <div class="publications">
    <?php for ($i = 1; $i <= 3; $i++): 
      if ($i === 1 && $post_1) { 
        $post = get_post( $post_1['post']->ID ); 
        $heading = $post_1['heading']; 
        $hr_class = "border-news-alt4";
      } 
      if ($i === 2 && $post_2) { 
        $post = get_post( $post_2['post']->ID ); 
        $heading = $post_2['heading']; 
        $hr_class = "border-news-alt2";
      } 
      if ($i === 3 && $post_3) {
        if ($post_3['post']) {
          $post = get_post( $post_3['post']->ID ); 
        } else {
          $random_post = new WP_Query(array( 
            'post_type'      => 'post', 
            'orderby'        => 'rand',
            'posts_per_page' => '1',
          ));
          $random_post->the_post();
          $post = get_post($random_post->the_ID());
        }
        $heading = $post_3['heading']; 
        $hr_class = "border-news-alt3";
      }
    ?>
    <?php if( $post ): setup_postdata( $post ); $cats = get_the_category();  ?>
    <div class="publication-card no-shadow">
      <h3 class="text-white text-center lg:h-24 font-sans"><?php echo $heading ?></h3>
      <hr class="<?php echo $hr_class; ?>">
      <div class="bg-white">
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
      </div>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    <?php endfor; ?>
  </div>
</div>