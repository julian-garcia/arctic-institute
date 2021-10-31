<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head() ?>
</head>
<body>
<?php 
if (is_front_page()) {
  echo '<nav class="nav-menu">';
} else {
  echo '<nav class="nav-menu bg-gray-800">';
}
?>
  <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-left justify-center text-white">
      <?php echo get_custom_logo(); ?>
      <?php
        $classes = 'relative flex flex-grow items-center justify-between ' . (is_front_page() ? 'text-white' : 'text-black');
        wp_nav_menu(
          array(
            'menu' => 'primary',
            'container' => '',
            'theme_location' => 'primary',
            'menu_class' => $classes
          )
        );
      ?>
    </div>
  </div>
</nav>
<div class="container mx-auto md:max-w-5xl mt-4">