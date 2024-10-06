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

  // Lightbox CSS
  if (basename(get_page_template()) === 'gallery.php'):
    wp_enqueue_style('lightboxcss', $GLOBALS['template_dir_URI'] . '/css/lightbox.min.css', array(), '2.11.5');
  endif;

  // BxSlider
  if (is_front_page()):
    wp_enqueue_style('bxslidercss', 'https://cdn.jsdelivr.net/npm/bxslider@4.2.17/dist/jquery.bxslider.min.css', array(), '4.2.17');
  endif;

  // Main Stylesheets
  wp_enqueue_style('style', $GLOBALS['stylesheet_uri'], array('normalize', 'googlefont'), '1.0.0', 'all');

  wp_enqueue_script('jquery');

  // SlickNav JS
  wp_enqueue_script('slicknavjs', $GLOBALS['template_dir_URI'] . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

  // Lightbox JS
  if (basename(get_page_template()) === 'gallery.php'):
    wp_enqueue_script('lightboxjs', $GLOBALS['template_dir_URI'] . '/js/lightbox.min.js', array(), '2.11.5', true);
  endif;

  // BxSlider
  if (is_front_page()):
    wp_enqueue_script('bxsliderjs', 'https://cdn.jsdelivr.net/npm/bxslider@4.2.17/dist/jquery.bxslider.min.js', array(), '4.2.17', true);
  endif;

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

  // SEO Titles
  add_theme_support('title-tag');
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
      'before_title' => '<h3 class="text-primary">',
      'after_title' => '</h3>'
    )
  );
}
add_action('widgets_init', 'gymfitness_widgets');

// Display the Hero image on the background of the Front-page
function gymfitness_hero_image()
{
  $front_page_id = get_option('page_on_front');
  $image_id = get_field('hero_image', $front_page_id);

  if (!empty($image_id)) {
    $image = $image_id['url'];
    // Create a "FALSE" stylesheet 
    wp_register_style('custom', false);
    wp_enqueue_style('custom', false);
    $featured_image_css = "
    body.home .site-header{
      background-image: linear-gradient(rgba(0,0,0, 0.75), rgba(0,0,0, 0.75)), url($image);
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      }
      ";
    wp_add_inline_style('custom', $featured_image_css);
  }
}
add_action('init', 'gymfitness_hero_image');
