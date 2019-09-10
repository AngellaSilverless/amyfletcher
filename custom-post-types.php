<?php
/*
// ========= Custom Post Types - Interiors, Artisans, Furniture, Testimonials ============
*/

add_action( 'init', 'register_custom_post_types' );

function register_custom_post_types() {
	custom_post_type_interior();
	custom_post_type_artisan();
	custom_post_type_furniture();
	custom_post_type_testimonial();
}

// ====== Interiors
function custom_post_type_interior() {

    $labels = array(
        'name'                => _x( 'Interiors', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Interior',  'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Interiors',          'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Interior',    'desertdelta' ),
        'all_items'           => __( 'All Interiors',      'desertdelta' ),
        'view_item'           => __( 'View Interior',      'desertdelta' ),
        'add_new_item'        => __( 'Add New Interior',   'desertdelta' ),
        'add_new'             => __( 'Add Interior',       'desertdelta' ),
        'edit_item'           => __( 'Edit Interior',      'desertdelta' ),
        'update_item'         => __( 'Update Interior',    'desertdelta' ),
        'search_items'        => __( 'Search Interior',    'desertdelta' ),
        'not_found'           => __( 'Not Found',          'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'interior', 'desertdelta' ),
        'description'         => __( 'Interior', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'menu_icon'           => 'dashicons-admin-multisite',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    
    register_post_type( 'interior', $args );
}

// ====== Artisans
function custom_post_type_artisan() {

    $labels = array(
        'name'                => _x( 'Artisans', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Artisan',  'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Artisans',           'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Artisan',     'desertdelta' ),
        'all_items'           => __( 'All Artisans',       'desertdelta' ),
        'view_item'           => __( 'View Artisan',       'desertdelta' ),
        'add_new_item'        => __( 'Add New Artisan',    'desertdelta' ),
        'add_new'             => __( 'Add Artisan',        'desertdelta' ),
        'edit_item'           => __( 'Edit Artisan',       'desertdelta' ),
        'update_item'         => __( 'Update Artisan',     'desertdelta' ),
        'search_items'        => __( 'Search Artisan',     'desertdelta' ),
        'not_found'           => __( 'Not Found',          'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'artisan', 'desertdelta' ),
        'description'         => __( 'Artisans', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'menu_icon'           => 'dashicons-businessman',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    
    register_post_type( 'artisan', $args );
}

// ====== Furniture
function custom_post_type_furniture() {

    $labels = array(
        'name'                => _x( 'Furniture', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Furniture', 'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Furniture',          'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Furniture',   'desertdelta' ),
        'all_items'           => __( 'All Furniture',      'desertdelta' ),
        'view_item'           => __( 'View Furniture',     'desertdelta' ),
        'add_new_item'        => __( 'Add New Furniture',  'desertdelta' ),
        'add_new'             => __( 'Add Furniture',      'desertdelta' ),
        'edit_item'           => __( 'Edit Furniture',     'desertdelta' ),
        'update_item'         => __( 'Update Furniture',   'desertdelta' ),
        'search_items'        => __( 'Search Furniture',   'desertdelta' ),
        'not_found'           => __( 'Not Found',          'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'furniture', 'desertdelta' ),
        'description'         => __( 'Furniture', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'menu_icon'           => 'dashicons-hammer',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    
    register_post_type( 'furniture', $args );
}

// ====== Testimonials
function custom_post_type_testimonial() {

    $labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Testimonial',  'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Testimonials',         'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Testimonial',   'desertdelta' ),
        'all_items'           => __( 'All Testimonials',     'desertdelta' ),
        'view_item'           => __( 'View Testimonial',     'desertdelta' ),
        'add_new_item'        => __( 'Add New Testimonial',  'desertdelta' ),
        'add_new'             => __( 'Add Testimonial',      'desertdelta' ),
        'edit_item'           => __( 'Edit Testimonial',     'desertdelta' ),
        'update_item'         => __( 'Update Testimonial',   'desertdelta' ),
        'search_items'        => __( 'Search Testimonials',  'desertdelta' ),
        'not_found'           => __( 'Not Found',            'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash',   'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'testimonial', 'desertdelta' ),
        'description'         => __( 'Testimonial', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'menu_icon'           => 'dashicons-admin-comments',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    
    register_post_type( 'testimonial', $args );
}
