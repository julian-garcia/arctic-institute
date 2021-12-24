<div class="page-feature-image"
     style="background-image: url(<?php the_post_thumbnail_url() ?>)">
     <div class="mx-auto max-w-5xl py-28 z-10 relative px-4 lg:px-0">
       <h1 class="text-white"><?php wp_title(''); ?></h1>
       <p class="text-2xl text-white max-w-lg mt-3"><?php echo $headline ?></p>
     </div>
</div>
<?php if($fullwidth && in_array('no', $fullwidth)): ?> 
  <div class="max-w-5xl md:mx-auto my-8 mx-4"> 
<?php else: ?>
  <div class="my-16">
<?php endif; ?>
  <?php the_content(); ?>
</div>
