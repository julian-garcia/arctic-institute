<a class="back" href="/events">Back to Events</a>
<h1 class="leading-tight text-4xl"><?php wp_title(''); ?></h1>
<div class="event">
  <p><?php echo date_format(date_create($date), 'l F jS, Y');  ?></p>
  <?php the_post_thumbnail(); ?>
  <?php the_content(); ?>
  <a class="button blue" href="<?php echo $link ?>">Register</a>
</div>
