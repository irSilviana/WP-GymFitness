<?php
$template_dir_URI = get_template_directory_uri();
$stylesheet_uri = get_stylesheet_uri();

// Create the Menus
if (!function_exists('gymfitness_menu')) {
  function gymfitness_menus()
  {
    // WordPress Function
    register_nav_menus(array(
      'main-menu' => 'Main Menu'
    ));
  }
  // Hook
  add_action('init', 'gymfitness_menus');
}

// Add Stylesheets and JS
function gymfitness_scripts()
{
  // Normalize CSS
  wp_enqueue_style('normalize', $GLOBALS['template_dir_URI'] . '/css/normalize.css', array(), '8.0.1');

  // Google Font
  wp_enqueue_style('googlefont', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Staatliches&display=swap', array(), '1.0.0');

  // Main Stylesheets
  wp_enqueue_style('style', $GLOBALS['stylesheet_uri'], array('normalize', 'googlefont'), '1.0.0');
}
add_action('wp_enqueue_scripts', 'gymfitness_scripts');
