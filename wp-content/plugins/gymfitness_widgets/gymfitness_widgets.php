<?
/* 
Plugin Name: Gym Fitness - Widgets
Plugin URI:
Description: Adds custom widgets into WordPress
Version: 1.0
Author: Irfani Silviana
Author URI: https://irfanisilviana.com
Text Domain: gymfitness
*/

if (!defined('ABSPATH')) die();

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
// Disables the block editor from managing widgets.
add_filter('use_widgets_block_editor', '__return_false');

/**
 * Adds Foo_Widget widget.
 */
class GymFitness_Classes_Widget extends WP_Widget
{

  /**
   * Register widget with WordPress.
   */
  function __construct()
  {
    parent::__construct(
      'gymfitness_classes', // Base ID
      esc_html__('GymFitness Classes List', 'gymfitness'), // Name
      array('description' => esc_html__('Displays different classes in the widget', 'gymfitness'),) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget($args, $instance)
  {
    echo $args['before_widget'];
    if (! empty($instance['title'])) {
      echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
    }
    echo esc_html__('Hello, World!', 'gymfitness');
    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form($instance)
  {
    $title = ! empty($instance['title']) ? $instance['title'] : esc_html__('New title', 'gymfitness');
?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'gymfitness'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
<?php
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = (! empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';

    return $instance;
  }
} // class GymFitness_Classes_Widget

// register widget
function gymfitness_classes_widget()
{
  register_widget('GymFitness_Classes_Widget');
}
add_action('widgets_init', 'gymfitness_classes_widget');
