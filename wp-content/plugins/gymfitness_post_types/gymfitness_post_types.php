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

// Register CPT CLASSES
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

// Register Custom Post Type INSTRUCTORS
function gymfitness_instructors()
{

  $labels = array(
    'name'                  => _x('Instructors', 'Post Type General Name', 'gymfitness'),
    'singular_name'         => _x('Instructor', 'Post Type Singular Name', 'gymfitness'),
    'menu_name'             => __('Instructors', 'gymfitness'),
    'name_admin_bar'        => __('Instructor', 'gymfitness'),
    'archives'              => __('Archive', 'gymfitness'),
    'attributes'            => __('Attributes', 'gymfitness'),
    'parent_item_colon'     => __('Parent Instructor', 'gymfitness'),
    'all_items'             => __('All Instructors', 'gymfitness'),
    'add_new_item'          => __('Add Instructor', 'gymfitness'),
    'add_new'               => __('Add Instructor', 'gymfitness'),
    'new_item'              => __('New Instructor', 'gymfitness'),
    'edit_item'             => __('Edit Instructor', 'gymfitness'),
    'update_item'           => __('Update Instructor', 'gymfitness'),
    'view_item'             => __('View Instructor', 'gymfitness'),
    'view_items'            => __('View Instructors', 'gymfitness'),
    'search_items'          => __('Search Instructor', 'gymfitness'),
    'not_found'             => __('Not Found', 'gymfitness'),
    'not_found_in_trash'    => __('Not Found in Trash', 'gymfitness'),
    'featured_image'        => __('Featured Image', 'gymfitness'),
    'set_featured_image'    => __('Set Featured Image', 'gymfitness'),
    'remove_featured_image' => __('Remove Featured Image', 'gymfitness'),
    'use_featured_image'    => __('Use as Featured Image', 'gymfitness'),
    'insert_into_item'      => __('Insert into Instructor', 'gymfitness'),
    'uploaded_to_this_item' => __('Uploaded to this Instructor', 'gymfitness'),
    'items_list'            => __('Instructor List', 'gymfitness'),
    'items_list_navigation' => __('Instructor Navigation', 'gymfitness'),
    'filter_items_list'     => __('Filter Instructors', 'gymfitness'),
  );

  $args = array(
    'label'                 => __('Instructors', 'gymfitness'),
    'description'           => __('Instructors for the Website', 'gymfitness'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 7,
    'menu_icon'             => 'dashicons-admin-users',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type('instructors', $args);
}
add_action('init', 'gymfitness_instructors', 0);


// Register CPT TESTIMONIAL
function gymfitness_testimonials()
{

  $labels = array(
    'name'                  => _x('Testimonials', 'Post Type General Name', 'gymfitness'),
    'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'gymfitness'),
    'menu_name'             => __('Testimonials', 'gymfitness'),
    'name_admin_bar'        => __('Testimonial', 'gymfitness'),
    'archives'              => __('Archive', 'gymfitness'),
    'attributes'            => __('Attributes', 'gymfitness'),
    'parent_item_colon'     => __('Parent Testimonial', 'gymfitness'),
    'all_items'             => __('All Testimonials', 'gymfitness'),
    'add_new_item'          => __('Add Testimonial', 'gymfitness'),
    'add_new'               => __('Add Testimonial', 'gymfitness'),
    'new_item'              => __('New Testimonial', 'gymfitness'),
    'edit_item'             => __('Edit Testimonial', 'gymfitness'),
    'update_item'           => __('Update Testimonial', 'gymfitness'),
    'view_item'             => __('View Testimonial', 'gymfitness'),
    'view_items'            => __('View Testimonials', 'gymfitness'),
    'search_items'          => __('Search Testimonial', 'gymfitness'),
    'not_found'             => __('Not Found', 'gymfitness'),
    'not_found_in_trash'    => __('Not Found in Trash', 'gymfitness'),
    'featured_image'        => __('Featured Image', 'gymfitness'),
    'set_featured_image'    => __('Set Featured Image', 'gymfitness'),
    'remove_featured_image' => __('Remove Featured Image', 'gymfitness'),
    'use_featured_image'    => __('Use as Featured Image', 'gymfitness'),
    'insert_into_item'      => __('Insert into Testimonial', 'gymfitness'),
    'uploaded_to_this_item' => __('Uploaded to this Testimonial', 'gymfitness'),
    'items_list'            => __('Testimonial List', 'gymfitness'),
    'items_list_navigation' => __('Testimonial Navigation', 'gymfitness'),
    'filter_items_list'     => __('Filter Testimonials', 'gymfitness'),
  );

  $args = array(
    'label'                 => __('Testimonials', 'gymfitness'),
    'description'           => __('Testimonials for the Website', 'gymfitness'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 8,
    'menu_icon'             => 'dashicons-editor-quote',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type('testimonials', $args);
}
add_action('init', 'gymfitness_testimonials', 0);
