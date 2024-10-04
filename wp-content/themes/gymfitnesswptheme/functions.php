<?php
$template_dir_URI = get_template_directory_uri();
$stylesheet_uri = get_stylesheet_uri();

// Link to the queries file
require get_template_directory() . '/inc/queries.php';

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

  // SlickNav css
  wp_enqueue_style('slicknavcss', $GLOBALS['template_dir_URI'] . '/css/slicknav.min.css', array(), '1.0.10');

  // Main Stylesheets
  wp_enqueue_style('style', $GLOBALS['stylesheet_uri'], array('normalize', 'googlefont'), '1.0.0');

  wp_enqueue_script('jquery');

  // SlickNav JS
  wp_enqueue_script('slicknavjs', $GLOBALS['template_dir_URI'] . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

  // Main Script
  wp_enqueue_script('scripts', $GLOBALS['template_dir_URI'] . '/js/scripts.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'gymfitness_scripts');

// Enable Feature images & other stuff
function gymfitness_setup()
{
  // Register new image size
  add_image_size('square', 350, 350, true);
  add_image_size('portrait', 350, 724, true);
  add_image_size('box', 400, 375, true);
  add_image_size('mediumSize', 700, 400, true);
  add_image_size('blog', 966, 644, true);

  // Featured image
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'gymfitness_setup'); //when the theme is activated and ready


// Create a Widget Zone
function gymfitness_widgets()
{
  register_sidebar(
    array(
      'name' => 'Sidebar',
      'id' => 'sidebar',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    )
  );
}
add_action('widgets_init', 'gymfitness_widgets');
