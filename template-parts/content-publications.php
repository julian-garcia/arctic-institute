<div class="page-feature-image"
     style="background-image: url(<?php the_post_thumbnail_url() ?>)">
  <div class="mx-auto max-w-5xl py-28 z-10 relative px-4 lg:px-0">
    <h1 class="text-4xl text-white"><?php wp_title(''); ?></h1>
    <p class="text-2xl text-white max-w-3xl mt-3"><?php echo $headline ?></p>
  </div>
</div>
<?php if ($_GET['type']) { $_POST['type'] = $_GET['type']; } ?>
<form action="/publications" method="post" class="filters">
  <h2>Filter By</h2>
  <div class="sm:flex gap-6 items-end flex-wrap">
    <div>
      <div class="select">
        <label for="topic">Topic</label>
        <select name="topic" id="topic">
          <option value="" disabled <?php echo $_POST['topic'] ? "" : "selected" ?>>FILTER BY TOPIC</option>
          <option value="">All</option>
          <?php  
          $cats = get_tags();
          foreach($cats as $c) : 
            $isCountry = false;
            foreach($countries as $cntry) {
              if ($cntry->slug === $c->slug) {
                $isCountry = true;
              }
            } ?>
          <?php if(!$isCountry): ?>
          <option 
            value="<?php echo $c->slug; ?>" 
            <?php echo $_POST['topic'] ===  $c->slug ? "selected" :  "" ?>
          ><?php echo $c->name; ?></option>
          <?php endif; ?>
          <?php endforeach; ?>
        </select>
        <i class="fas fa-chevron-down text-lg"></i>
      </div>
    </div>
    <div>
      <div class="select">
        <label for="type">Type</label>
        <select name="type" id="type">
          <option value="" disabled <?php echo $_POST['type'] ? "" : "selected" ?>>FILTER BY TYPE</option>
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
        <i class="fas fa-chevron-down text-lg"></i>
      </div>
    </div>
    <div>
      <div class="select">
        <label for="country">Country</label>
        <select name="country" id="country">
          <option value="" disabled <?php echo $_POST['country'] ? "" : "selected" ?>>FILTER BY COUNTRY</option>
          <option value="">All</option>
          <?php 
          foreach(wp_list_sort( $countries, 'slug' ) as $c) : ?>
          <option 
            value="<?php echo $c->slug; ?>"
            <?php echo $_POST['country'] ===  $c->slug ? "selected" :  "" ?>
          ><?php echo $c->name; ?></option>      
          <?php endforeach; ?>
        </select>
        <i class="fas fa-chevron-down text-lg"></i>
      </div>
    </div>
    <input type="submit" name="submit" value="Apply Filters" class="button blue no-margin" />
  </div>
</form>
<div class="publications masonry">
  <?php
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    if($_POST['type'] || $_POST['topic'] || $_POST['country']) {
      if (!$_POST['topic'] && !$_POST['country']) {
        $slugs = array();
      } else {
        $slugs = array($_POST['topic'], $_POST['country']);
      }
      $post_query = new WP_Query(array( 
        'post_type' => 'post', 
        'posts_per_page' => 12,
        'category_name' => $_POST['type'],
        'tag_slug__in' => $slugs,
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
  <div class="publications less-spacing">
    <?php for ($i = 1; $i <= 3; $i++): 
      if ($i === 1 && $post_1) { 
        $post = get_post( $post_1['post']->ID ); 
        $heading = $post_1['heading']; 
        $hr_class = "border-news-alt4";
      } 
      if ($i === 2) {
        $today = getdate(strtotime(date("Y-m-d"). ' - 5 years 1 day'));
        $old_post = new WP_Query(array( 
            'post_type'      => 'post', 
            'order'          => 'asc',
            'tag'            => $post_2['tag']->slug,
            'date_query'     => array(
                array(
                    'after' => array(
                      'year'  => $today['year'],
                      'month' => $today['mon'],
                      'day'   => $today['mday'],
                    ),
                ),
            ),
            'posts_per_page' => '1',
          ));
        $old_post->the_post();
        $post = get_post($old_post->the_ID());
        $heading = $post_2['heading'] . ' ' . $post_2['tag']->name; 
        $hr_class = "border-news-alt2";
      } 
      if ($i === 3) {
        if ( false === ( $post = get_transient( 'random_post' ) ) ) {
          $random_post = new WP_Query(array( 
            'post_type'      => 'post', 
            'orderby'        => 'rand',
            'posts_per_page' => '1',
          ));
          $random_post->the_post();
          $post = get_post($random_post->the_ID());
          set_transient( 'random_post', $post, DAY_IN_SECONDS );
        }
        $heading = $post_3['heading']; 
        $hr_class = "border-news-alt3";
      }
    ?>
    <?php if( $post ): setup_postdata( $post ); $cats = get_the_category();  ?>
    <div class="publication-card no-shadow">
      <h3 class="archive-heading">
        <?php echo $heading ?>
      </h3>
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