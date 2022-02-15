<div class="section grid grid-cols-2 gap-12">
  <?php  while(have_posts()): the_post(); ?>
  <div>
    <h3 class="my-4"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
    <?php $excerpt = substr( get_the_excerpt(), 0, 120 ); 
        echo substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );?>
  </div>
  <?php endwhile; ?>
</div>
<?php the_posts_pagination(array(
  'prev_text' => '',
  'next_text' => '',
)); ?>
