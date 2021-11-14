<div class="page-feature-image"
     style="background-image: url(<?php the_post_thumbnail_url() ?>)">
     <div class="mx-auto max-w-5xl py-28 z-10 relative px-4 lg:px-0">
       <h1 class="text-4xl text-white"><?php wp_title(''); ?></h1>
       <p class="text-2xl text-white max-w-md"><?php echo $headline ?></p>
     </div>
</div>

<div class="">
  <?php the_content(); ?>
</div>
