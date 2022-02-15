<?php if(get_the_post_thumbnail_url()): ?> 
<div class="page-feature-image"
     style="background-image: url(<?php the_post_thumbnail_url() ?>)">
     <div class="mx-auto max-w-5xl py-28 z-10 relative px-4 lg:px-0">
       <h1 class="text-white"><?php wp_title(''); ?></h1>
       <p class="text-2xl text-white max-w-lg mt-3"><?php echo $headline ?></p>
     </div>
</div>
<?php else: ?>
  <div class="section dark"></div>
<?php endif; ?>

<?php if($fullwidth && $fullwidth === 'no'): ?> 
  <div class="max-w-5xl lg:mx-auto mx-4 mt-4 content"> 
<?php elseif($fullwidth && $fullwidth === 'narrow'): ?> 
  <div class="max-w-3xl lg:mx-auto mx-4 content"> 
<?php else: ?>
  <div class="content">
<?php endif; ?>

<?php if (strpos(get_permalink(), '/projects/') && explode('/', get_permalink())[count(explode('/', get_permalink())) - 2] !== 'projects'): ?>
  <a class="back" href="/projects">Back to Projects</a>
<?php endif; ?>

<?php if(!get_the_post_thumbnail_url()): ?> 
  <h1 class="page-title <?php echo $title_alignment ?>"><?php wp_title(''); ?></h1>
<?php endif; ?>
<?php the_content(); ?>
</div>
