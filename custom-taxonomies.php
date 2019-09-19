<?php
/*
// ========= Custom Taxonomies - Destination ============
*/

add_action( 'init', 'register_custom_taxonomies' );

function register_custom_taxonomies() {
	taxonomy_location();
	taxonomy_type();
	taxonomy_collection();
}


// ====== Location

function taxonomy_location() {
 
    $labels = array(
        'name'              => _x( 'Location', 'taxonomy general name' ),
        'singular_name'     => _x( 'Location', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Locations'  ),
        'all_items'         => __( 'All Locations'     ),
        'parent_item'       => __( 'Parent Location'   ),
        'parent_item_colon' => __( 'Parent Location:'  ),
        'edit_item'         => __( 'Edit Location'     ), 
        'update_item'       => __( 'Update Location'   ),
        'add_new_item'      => __( 'Add New Location'  ),
        'new_item_name'     => __( 'New Location Name' ),
        'menu_name'         => __( 'Locations'         )
    );     
    
    register_taxonomy( 'location', array( 'interior', 'artisan' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'location', 'hierarchical' => true )
    ));
}

// ====== Type

function taxonomy_type() {
 
    $labels = array(
        'name'              => _x( 'Type', 'taxonomy general name' ),
        'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Types' ),
        'all_items'         => __( 'All Types'    ),
        'parent_item'       => __( 'Parent Type'  ),
        'parent_item_colon' => __( 'Parent Type:' ),
        'edit_item'         => __( 'Edit Type'    ), 
        'update_item'       => __( 'Update Type'  ),
        'add_new_item'      => __( 'Add New Type' ),
        'new_item_name'     => __( 'New Type'     ),
        'menu_name'         => __( 'Types'         )
    );     
    
    register_taxonomy( 'type', array( 'furniture' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'type', 'hierarchical' => false )
    ));
}

// ====== Collection

function taxonomy_collection() {
 
    $labels = array(
        'name'              => _x( 'Collection', 'taxonomy general name' ),
        'singular_name'     => _x( 'Collection', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Collections' ),
        'all_items'         => __( 'All Collections'    ),
        'parent_item'       => __( 'Parent Collection'  ),
        'parent_item_colon' => __( 'Parent Collection:' ),
        'edit_item'         => __( 'Edit Collection'    ), 
        'update_item'       => __( 'Update Collection'  ),
        'add_new_item'      => __( 'Add New Collection' ),
        'new_item_name'     => __( 'New Collection'     ),
        'menu_name'         => __( 'Collections'         )
    );     
    
    register_taxonomy( 'collection', array( 'furniture' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'collection', 'hierarchical' => false )
    ));
}