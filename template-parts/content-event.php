<a class="back" href="/events">Back to Events</a>
<h1 class="leading-tight text-4xl"><?php wp_title(''); ?></h1>
<div class="event">
  <h3>
    <?php echo date_format(date_create($date), 'l F jS, Y');  ?>
    <?php if (get_field('until')) {
      echo ' to <br>' . date_format(date_create(get_field('until')), 'l F jS, Y'); 
    }?>
    <?php if (get_field('time')): ?>
    <span><?php echo " at " . get_field('time') ?></span>
    <?php endif; ?>
  </h3>
  <?php the_post_thumbnail(); ?>
  <?php the_content(); ?>
  <a class="button blue" href="<?php echo $link ?>">Register</a>
</div>
