<?php
/**
 * RBH WP Custom Post Types
 *
 * @package RBH WP
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Testimonials CPT
function register_testimonial_post_type() {
    $args = array(
        'public'        => true,
        'label'         => 'Testimonials',
        'supports'      => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon'     => 'dashicons-groups',
        'menu_position' => 6,
    );
    register_post_type('testimonial', $args);
  }
  add_action('init', 'register_testimonial_post_type');

// Portfolio Custom Post Type
function portfolio() {

	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'rbh-wp' ),
		'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'rbh-wp' ),
		'menu_name'             => __( 'Portfolio', 'rbh-wp' ),
		'name_admin_bar'        => __( 'Portfolio', 'rbh-wp' ),
		'archives'              => __( 'Portfolio Archives', 'rbh-wp' ),
		'attributes'            => __( 'Item Attributes', 'rbh-wp' ),
		'parent_item_colon'     => __( 'Parent Item:', 'rbh-wp' ),
		'all_items'             => __( 'All Portfolio Items', 'rbh-wp' ),
		'add_new_item'          => __( 'Add New Portfolio Item', 'rbh-wp' ),
		'add_new'               => __( 'Add New Portfolio Item', 'rbh-wp' ),
		'new_item'              => __( 'New Item', 'rbh-wp' ),
		'edit_item'             => __( 'Edit Item', 'rbh-wp' ),
		'update_item'           => __( 'Update Item', 'rbh-wp' ),
		'view_item'             => __( 'View Item', 'rbh-wp' ),
		'view_items'            => __( 'View Items', 'rbh-wp' ),
		'search_items'          => __( 'Search Item', 'rbh-wp' ),
		'not_found'             => __( 'Not found', 'rbh-wp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'rbh-wp' ),
		'featured_image'        => __( 'Featured Image', 'rbh-wp' ),
		'set_featured_image'    => __( 'Set featured image', 'rbh-wp' ),
		'remove_featured_image' => __( 'Remove featured image', 'rbh-wp' ),
		'use_featured_image'    => __( 'Use as featured image', 'rbh-wp' ),
		'insert_into_item'      => __( 'Insert into item', 'rbh-wp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'rbh-wp' ),
		'items_list'            => __( 'Items list', 'rbh-wp' ),
		'items_list_navigation' => __( 'Items list navigation', 'rbh-wp' ),
		'filter_items_list'     => __( 'Filter items list', 'rbh-wp' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio Item', 'rbh-wp' ),
		'description'           => __( 'Post Type Description', 'rbh-wp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'post_tag', 'genres' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
        'menu_icon'             => 'dashicons-portfolio',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio', 0 );

// Genre Custom Taxonomy
function jch_create_genre_taxonomy() {
    $labels = array(
        'name'          => _x('Genres', 'Taxonomy General Name', 'rbh-wp'),
        'singular_name' => _x('Genre', 'Taxonomy Singular Name', 'rbh-wp'),
    );

    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
        'public'       => true,
        'show_in_rest' => true,
    );

    register_taxonomy('genre', array('portfolio'), $args);
}

add_action('init', 'jch_create_genre_taxonomy');

function company_post_type() {
    $labels = array(
        'name'                  => _x('Companies', 'Post Type General Name', 'rbh-wp'),
        'singular_name'         => _x('Company', 'Post Type Singular Name', 'rbh-wp'),
        'menu_name'             => __('Companies', 'rbh-wp'),
        'name_admin_bar'        => __('Company', 'rbh-wp'),
        'archives'              => __('Company Archives', 'rbh-wp'),
        'attributes'            => __('Company Attributes', 'rbh-wp'),
        'parent_item_colon'     => __('Parent Company:', 'rbh-wp'),
        'all_items'             => __('All Companies', 'rbh-wp'),
        'add_new_item'          => __('Add New Company', 'rbh-wp'),
        'add_new'               => __('Add New', 'rbh-wp'),
        'new_item'              => __('New Company', 'rbh-wp'),
        'edit_item'             => __('Edit Company', 'rbh-wp'),
        'update_item'           => __('Update Company', 'rbh-wp'),
        'view_item'             => __('View Company', 'rbh-wp'),
        'view_items'            => __('View Companies', 'rbh-wp'),
        'search_items'          => __('Search Company', 'rbh-wp'),
        'not_found'             => __('Not found', 'rbh-wp'),
        'not_found_in_trash'    => __('Not found in Trash', 'rbh-wp'),
        'featured_image'        => __('Featured Image', 'rbh-wp'),
        'set_featured_image'    => __('Set featured image', 'rbh-wp'),
        'remove_featured_image' => __('Remove featured image', 'rbh-wp'),
        'use_featured_image'    => __('Use as featured image', 'rbh-wp'),
        'insert_into_item'      => __('Insert into company', 'rbh-wp'),
        'uploaded_to_this_item' => __('Uploaded to this company', 'rbh-wp'),
        'items_list'            => __('Companies list', 'rbh-wp'),
        'items_list_navigation' => __('Companies list navigation', 'rbh-wp'),
        'filter_items_list'     => __('Filter companies list', 'rbh-wp'),
    );

    $args = array(
        'label'               => __('Company', 'rbh-wp'),
        'description'         => __('Post Type Description', 'rbh-wp'),
        'labels'              => $labels,
        'supports'            => array('title', 'thumbnail'),
        'taxonomies'          => array('category', 'post_tag'),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-building',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type('company', $args);
}

add_action('init', 'company_post_type');

