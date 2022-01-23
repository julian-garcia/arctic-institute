<div class="page-feature-image"
     style="background-image: url(<?php the_post_thumbnail_url() ?>)">
     <div class="mx-auto max-w-5xl py-28 z-10 relative px-4 lg:px-0">
       <h1 class="text-white"><?php wp_title(''); ?></h1>
       <p class="text-2xl text-white max-w-lg mt-3"><?php echo $headline ?></p>
     </div>
</div>
<div class="content">
  <div class="section">
    <h2 class="heading text-center">Upcoming Events</h2>
    <div class="cards events">
    <?php 
    $recent_posts = wp_get_recent_posts(array(
      'numberposts' => 6, 
      'post_status' => 'publish',
      'post_type'   => 'event',
      'meta_query'  => array(
        'featured_clause' => array(
            'key' => 'date',
            'compare' => 'EXISTS'
        )
      ),
      'orderby' => array( 'featured_clause' => 'DESC' )
    ));
    foreach( $recent_posts as $post_item ) : 
      $post = get_post( $post_item['ID'] ); setup_postdata( $post );?>
      <div class="card">
        <a class="link" href="<?php the_permalink(); ?>"></a>
        <?php echo get_the_post_thumbnail($post_item['ID'], 'medium'); ?>
        <p class="date mt-4">
          <?php 
            echo date_format(date_create(get_field('date')), 'D M j, Y'); 
          ?>
        </p>
        <p class="title"><?php the_title(); ?></p>
        <p><?php the_excerpt(); ?></p>
        <a class="more" href="<?php the_permalink(); ?>">READ MORE</a>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endforeach; ?>
    </div>
  </div>
  <div class="my-8">
    <?php the_content(); ?>
  </div>
  <div class="section mid -mb-8">
    <div class="max-w-5xl mx-auto">
      <h2 class="white heading text-center">TAI Presents</h2>
      <p class="text-white text-center mx-auto">Our team members regularly present their work at conferences, public events, and academic seminars. Explore our Arctic Institute Presents calendar below to see our scholars present virtually or in a city near you. </p>
    </div>
    <div class="calendar-container">
      <h3 class="calendar-month-year text-center"></h3>
      <span class="calendar-prev"><i class="fas fa-arrow-left"></i></span>
      <span class="calendar-next"><i class="fas fa-arrow-right"></i></span>
      <table class="calendar w-full">
        <thead>
          <th>Sun</th>
          <th>Mon</th>
          <th>Tue</th>
          <th>Wed</th>
          <th>Thu</th>
          <th>Fri</th>
          <th>Sat</th>
        </thead>
        <tbody class="calendar-body"></tbody>
      </table>
    </div>
    <div class="calendar-list">
      <hr class="border-white">
      <?php 
        $events = new WP_Query(array(
          'post_type' => 'event',
          'meta_query'  => array(
            'featured_clause' => array(
                'key' => 'date',
                'compare' => 'EXISTS'
            )
          ),
          'orderby' => array( 'featured_clause' => 'DESC' ),
          'posts_per_page' => '10'
        ));
        while($events->have_posts() ):
        $events->the_post(); 
      ?>
        <a class="list-event" href="<?php the_permalink(); ?>">
          <span class="list-event-title"><?php the_title(); ?></span>
          <?php echo date_format(date_create(get_field('date')), 'D M j, Y'); ?>
        </a>
        <?php wp_reset_postdata(); ?>
      <?php endwhile; ?>
    </div>
  </div>
</div>
<?php
    $event_posts = new WP_Query(array('post_type' => 'event'));
    echo '<script>var events = [];';
    while($event_posts->have_posts() ) {
      $event_posts->the_post(); 
      echo 'events.push({title:"', the_title(), '", 
                         link:"', the_permalink(),'", 
                         image:"', get_the_post_thumbnail_url(get_the_ID(), 'full'),'",
                         time:"', the_field('time'),'", 
                         date:"', the_field('date'),'"});';
    }
    wp_reset_postdata(); 
    echo '</script>';
?>