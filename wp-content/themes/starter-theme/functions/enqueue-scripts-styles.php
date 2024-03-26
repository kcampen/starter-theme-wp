<?php

/********************************************************/
// ADMIN STYLES
/********************************************************/
add_action('admin_enqueue_scripts', 'load_admin_style');
function load_admin_style() {
	wp_register_style('admin_css', get_stylesheet_directory_uri() . '/dist/css/admin.css', false, $GLOBALS['versioning']);
	wp_enqueue_style('admin_css');
}

/********************************************************/
// REMOVE BLOCK LIBRARY - NOT USING IT
/********************************************************/
add_action('wp_enqueue_scripts', 'mywptheme_child_deregister_styles', 20);
function mywptheme_child_deregister_styles() {
    wp_dequeue_style('classic-theme-styles');
}

add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);
function smartwp_remove_wp_block_library_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
} 

/*  DISABLE GUTENBERG STYLE IN HEADER| WordPress 5.9 */
function wps_deregister_styles() {
    wp_dequeue_style( 'global-styles' );
}
add_action('wp_enqueue_scripts', 'wps_deregister_styles', 100);

/********************************************************/
// ADD STYLESHEET AND SCRIPTS
/********************************************************/
function add_styles_scripts() {

	if(is_dev()) {
		wp_register_style('critical', get_template_directory_uri() . "/dist/css/critical.css", null, $GLOBALS['versioning']);
		wp_enqueue_style('critical');
	}

	// css libraries
	wp_register_style('libraries', get_template_directory_uri() . "/dist/css/libraries.css", null, $GLOBALS['versioning']);
	wp_enqueue_style('libraries');

	// main css file
	wp_register_style('stylesheet', get_stylesheet_uri(), null, $GLOBALS['versioning']);
	wp_enqueue_style('stylesheet');

	wp_deregister_script('jquery');
	wp_deregister_script('wp-embed');

	// js files
	wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', null, null, true);
	wp_register_script('libraries', get_stylesheet_directory_uri() . '/dist/js/libraries.js', array('jquery'), $GLOBALS['versioning'], true);
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/dist/js/scripts.js', array('jquery', 'libraries'), $GLOBALS['versioning'], true);


	wp_enqueue_script('jquery');
	wp_enqueue_script('libraries');
	wp_enqueue_script('scripts');
}
if(!is_admin()) {
	add_action('wp_enqueue_scripts', 'add_styles_scripts');
}

/********************************************************/
// ASYNC CSS
/********************************************************/
if(!is_dev()) {
	function ct_style_loader_tag($html, $handle) {
		$async_loading = array(
			'critical',
			'libraries',
			'stylesheet'
		);
		if(in_array($handle, $async_loading)) {
			$async_html = str_replace("rel='stylesheet'", "rel='preload' as='style'", $html);
			$async_html .= str_replace('media=\'all\'', 'media="print" onload="this.media=\'all\'"', $html);
			return $async_html;
		}
		return $html;
	}
	add_filter('style_loader_tag', 'ct_style_loader_tag', 10, 2);
}

?>