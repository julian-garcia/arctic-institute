<div class="page-feature-image country-feature"
     style="background-image: url(<?php the_post_thumbnail_url() ?>)">
</div>
<div class="max-w-5xl md:mx-auto my-8 mx-4">
  <div class="country-details">
    <h1 class="text-4xl"><?php wp_title(''); ?></h1>
    <div class="stats">
      <div>
        <h2 class="heading">Facts & Figures</h2>
        <p>AC member since <?php echo $ac_member ?></p>
        <hr>
        <h3>Active Polar Icebreakers</h3>
        <p><?php echo $active_polar_icebreakers ?></p>
        <h3>Coordinates</h3>
        <p><?php echo $coordinates ?></p>
      </div>
      <div>
        <h3>Population</h3>
        <p><?php echo $population ?></p>
        <h3>Land Area</h3>
        <p><?php echo $land_area ?></p>
        <h3>Coastline</h3>
        <p><?php echo $coastline ?></p>
      </div>
    </div>
  </div>
  <?php the_content(); ?>
</div>
