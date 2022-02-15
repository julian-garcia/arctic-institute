<?php get_header(); ?>
<div class="container max-w-4xl mx-auto">
<?php  if(!have_posts()): ?>
  <h2 class="my-8 text-center">Sorry, we couldn't find any articles relating to: "<?php echo $_GET['s']; ?>"</h2>
<?php else: ?>
  <h2 class="my-8 text-center">Search results for: <?php echo $_GET['s']; ?></h2>
<?php endif; ?>
<?php get_template_part('template-parts/content', 'archive'); ?>
</div>
<?php get_footer(); ?>
