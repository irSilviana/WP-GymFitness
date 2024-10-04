<?php

/* 
Plugin Name: Gym Fitness - Post Types
Plugin URI:
Description: Adds new Post Type into WordPress
Version: 1.0
Author: Irfani Silviana
Author URI: https://irfanisilviana.com
Text Domain: gymfitness
*/

if (!defined('ABSPATH')) die();

// Register CPT
function gymfitness_classes_post_type()
{

  $labels = array(
    'name' => _x('Classes', 'Post Type General Name', 'gymfitness'),
    'singular_name' => _x('Class', 'Post Type Singular Name', 'gymfitness'),
    'menu_name' => __('Classes', 'gymfitness'),
    'name_admin_bar' => __('Class', 'gymfitness'),
    'archives' => __('Archive', 'gymfitness'),
    'attributes'            => __('Attributes', 'gymfitness'),
    'parent_item_colon'     => __('Parent Class', 'gymfitness'),
    'all_items'             => __('All Classes', 'gymfitness'),
    'add_new_item'          => __('Add Class', 'gymfitness'),
    'add_new'               => __('Add Class', 'gymfitness'),
    'new_item'              => __('New Class', 'gymfitness'),
    'edit_item'             => __('Edit Class', 'gymfitness'),
    'update_item'           => __('Update Class', 'gymfitness'),
    'view_item'             => __('View Class', 'gymfitness'),
    'view_items'            => __('View Classes', 'gymfitness'),
    'search_items'          => __('Search Class', 'gymfitness'),
    'not_found'             => __('Not Found', 'gymfitness'),
    'not_found_in_trash'    => __('Not Found in Trash', 'gymfitness'),
    'featured_image'        => __('Featured Image', 'gymfitness'),
    'set_featured_image'    => __('Set Featured Image', 'gymfitness'),
    'remove_featured_image' => __('Remove Featured Image', 'gymfitness'),
    'use_featured_image'    => __('Use as Featured Image', 'gymfitness'),
    'insert_into_item'      => __('Insert into Class', 'gymfitness'),
    'uploaded_to_this_item' => __('Uploaded to this Class', 'gymfitness'),
    'items_list'            => __('Class List', 'gymfitness'),
    'items_list_navigation' => __('Class Navigation', 'gymfitness'),
    'filter_items_list'     => __('Filter Classes', 'gymfitness'),
  );
  $args = array(
    'label'                 => __('Class', 'gymfitness'),
    'description'           => __('Classes for GymFitness Website', 'gymfitness'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail'),
    'hierarchical'          => false, // true = pages, false = posts
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 6,
    'menu_icon'             => 'dashicons-welcome-learn-more',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );

  register_post_type('gymfitness_classes', $args);
}
add_action('init', 'gymfitness_classes_post_type', 0);
