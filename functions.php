<?php
/**
 * Amy Fletcher functions and definitions
 *
 * @package amy-fletcher
 */

/****************************************************/
/*                       Hooks                       /
/****************************************************/

/* Enqueue scripts and styles */
add_action('wp_enqueue_scripts', 'sl_scripts');

/* Enqueue admin script */
add_action( 'admin_enqueue_scripts', 'sl_admin_scripts' );

/* Add Menus */
add_action('init', 'sl_custom_menu');

/* Dashboard Config */
add_action('wp_dashboard_setup', 'sl_dashboard_widget');

/* Dashboard Style */
add_action('admin_head', 'sl_custom_style');

/* Remove Default Menu Items */
add_action('admin_menu', 'sl_remove_menus');

/* Change Posts Columns */
add_filter('manage_posts_columns', 'sl_manage_columns');

/* Reorder Admin Menu */
add_filter('custom_menu_order', 'sl_reorder_menu');
add_filter('menu_order', 'sl_reorder_menu');

/* Remove Comments Link */
add_action('wp_before_admin_bar_render', 'sl_manage_admin_bar');

/* Allow SVG */
add_filter( 'wp_check_filetype_and_ext', 'sl_allow_svg', 10, 4 );
add_filter( 'upload_mimes', 'sl_mime_types' );
add_action( 'admin_head', 'sl_fix_svg' );

/* AJAX call for Furniture Description */
add_action( 'wp_ajax_furniture_info', 'furniture_info' );
add_action( 'wp_ajax_nopriv_furniture_info', 'furniture_info' );

/* Title */
add_action( 'after_setup_theme', 'sl_custom_title' );

/* Add Custom Post Types and Taxonomies */
require 'custom-post-types.php';
require 'custom-taxonomies.php';


/****************************************************/
/*                     Functions                     /
/****************************************************/

function sl_scripts() {
	wp_enqueue_style( 'sl-style', get_stylesheet_uri() );
	wp_enqueue_script( 'sl-core-js', get_template_directory_uri() . '/inc/js/compiled.js', array('jquery'), true);
	
	wp_localize_script('sl-core-js', 'ajax_object', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	)); 
}

function sl_custom_menu() {
	register_nav_menus(array(
		'main-menu' => __( 'Main Menu' )
	));
	
	if(function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'page_title' 	=> 'Theme Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'site-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		
		acf_add_options_page(array(
			'page_title' 	=> 'Call To Action',
			'menu_title'	=> 'Call To Action',
			'menu_slug' 	=> 'call-to-action',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}
}

function sl_dashboard_widget() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'sl Support', 'sl_dashboard_help');
}

function sl_dashboard_help() {
	echo file_get_contents(__DIR__ . "/admin-settings/dashboard.html");
}

function sl_custom_style() {
	echo '<style type="text/css">' . file_get_contents(__DIR__ . "/admin-settings/style-admin.css") . '</style>';
}
 
function sl_remove_menus(){
	remove_menu_page( 'edit-comments.php' ); //Comments
}

function sl_manage_columns($columns) {
	unset($columns["comments"]);
	return $columns;
}

function sl_reorder_menu($menu_order) {
    return array(
		'index.php',                            // Dashboard
		'edit.php?post_type=interior',          // Interior
		'edit.php?post_type=artisan',           // Artisan
		'edit.php?post_type=furniture',         // Furniture
		'separator1',                           // --Space--
		'edit.php',                             // Posts
		'edit.php?post_type=page',              // Pages
		'upload.php',                           // Media
		'separator-last',                       // --Space--
		'edit.php?post_type=testimonial',       // Furniture
		'call-to-action',                       // Call to Action
		'site-general-settings',                // Theme Settings
		'separator2',                           // --Space--
		'themes.php',                           // Appearance
		'plugins.php',                          // Plugins
		'users.php',                            // Users
		'tools.php',                            // Tools
		'options-general.php',                  // Settings
		'edit.php?post_type=acf-field-group',   // ACF
		'wpcf7',                                // Contact Form 7
		'wppusher',                             // WP Pusher 
   );
}

function sl_manage_admin_bar(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}

function sl_allow_svg($data, $file, $filename, $mimes) {
 
	global $wp_version;
	if($wp_version !== '5.2.2') {
		return $data;
	}
	
	$filetype = wp_check_filetype( $filename, $mimes );
	
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
 
}
 
function sl_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
 
function sl_fix_svg() {
	echo '<style type="text/css">
			.attachment-266x266, .thumbnail img {
				width: 100% !important;
				height: auto !important;
			}
		</style>';
}

function furniture_info() {
	$title  = get_the_title($_POST["id"]);
	$colour = get_field("colour", $_POST["id"]);
	
	if($colour)
		$title .= ",";
	
	$return = array(
		'success'     => true,
		'title'       => $title,
		'colour'      => $colour,
		'description' => get_field("description", $_POST["id"]),
		'image'       => get_field("image", $_POST["id"])["url"]
	);
	
	wp_send_json($return);
}

function sl_admin_scripts($hook) {
    if ('toplevel_page_site-general-settings' != $hook) {
        return;
    }
    wp_enqueue_script( 'sl-admin-js', get_template_directory_uri() . '/admin-settings/script-admin.js', array('jquery'), true);
}

function sl_custom_title() {
	add_theme_support('title-tag');
}
