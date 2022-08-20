<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">
<head>
  <?php if(is_front_page()): ?>
    <title><?php bloginfo( 'name' ); ?></title>
  <?php else: ?>
    <title><?php wp_title(''); echo ' | ';  bloginfo( 'name' ); ?></title>
  <?php endif; ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head() ?>
</head>
<body class="overflow-x-hidden">
<?php 
if (is_front_page()) {
  echo '<nav class="nav-menu">';
} else {
  echo '<nav class="nav-menu bg-gray-800">';
}
?>
  <div class="max-w-6xl mx-auto px-2 pt-4 sm:px-4 lg:px-8">
    <div class="relative flex items-left text-white gap-8">
      <?php get_search_form() ?>
      <i class="fas fa-search search <?php if(is_front_page()) { echo 'white'; } ?>"></i>
      <?php if(is_front_page()): echo get_custom_logo(); endif; ?>
      <?php if(!is_front_page()): ?>
        <a href="<?php echo site_url() ?>" class="custom-logo-link" rel="home"><img width="721" height="190" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/logo.png" class="custom-logo" alt="The Arctic Institute"></a>
      <?php endif; ?>

      <?php
        $classes = 'relative hidden lg:flex flex-grow items-center justify-between ' . (is_front_page() ? 'text-white' : 'text-black');
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
<label for="mobile-toggle-checkbox" class="mobile-toggle">
  <?php if(is_front_page()): ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/mobile-menu-toggle-light.svg" alt="">
  <?php else: ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/mobile-menu-toggle-dark.svg" alt="">
  <?php endif; ?>
</label>
<input id="mobile-toggle-checkbox" class="hidden mobile-toggle-checkbox" type="checkbox" />
<nav class="mobile-nav-menu">
  <i class="fas fa-search search white"></i>
  <div class="search-box">
    <img class="search-close" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/mobile-menu-close.svg" alt="">
    <?php get_search_form() ?>
  </div>
  <label for="mobile-toggle-checkbox">
  <img class="mobile-menu-close" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/mobile-menu-close.svg" alt=""></label>
  <?php
    wp_nav_menu(
      array(
        'menu' => 'primary',
        'container' => '',
        'theme_location' => 'primary',
        'menu_class' => 'relative text-white mobile-menu-links'
      )
    );
  ?>
</nav>
<div class="mx-auto mt-4 overflow-x-hidden">