<?php

/********************************************************/
// GLOBAL VARIABLES
/********************************************************/
$versioning = "1.1000005";
$prev_section = "";
$temp_class = "";

require_once("functions/menus.php");
require_once("functions/enqueue-scripts-styles.php");
require_once("functions/debugger.php");
require_once("functions/acf.php");
require_once("functions/emojis.php");
require_once("functions/body-classes.php");


/********************************************************/
// IS DEV ENV
/********************************************************/
function is_dev() {
	if(defined('SITE_ENV') && SITE_ENV == "dev") {
		return true;
	}
	else {
		return false;
	}
}

/********************************************************/
// ADD POST FEATURE IMAGE FUNCTIONALITY
/********************************************************/
add_theme_support( 'post-thumbnails' );


/********************************************************/
// REMOVE COMMENTS FROM ADMIN MENU
/********************************************************/
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
	remove_menu_page('edit-comments.php');
}

/********************************************************/
// UUID
/********************************************************/
function uuID($data = null) {
	// Generate 16 bytes (128 bits) of random data or use the data passed into the function.
	$data = $data ?? random_bytes(16);
	assert(strlen($data) == 16);

	// Set version to 0100
	$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
	// Set bits 6-7 to 10
	$data[8] = chr(ord($data[8]) & 0x3f | 0x80);

	// Output the 36 character UUID.
	return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

/********************************************************/
// HIDE USERS IN REST API
/********************************************************/
add_filter( 'rest_endpoints', function( $endpoints ) {
	if (isset( $endpoints['/wp/v2/users'])) {
		unset($endpoints['/wp/v2/users']);
	}
	if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
		unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
	}
	return $endpoints;
});

/********************************************************/
// EXCLUDE NODE_MODULES FOLDER FROM THEME EXPORT
/********************************************************/
add_filter( 'ai1wm_exclude_themes_from_export',
function ( $exclude_filters ) {
	$exclude_filters[] = 'starter-theme/node_modules';
	$exclude_filters[] = 'starter-theme/.tmp';
	return $exclude_filters;
});

/********************************************************/
// OUTPUT MENU WITH DESCRIPTION
// USED FOR MENU DROPDOWNS
/********************************************************/
class Menu_With_Description extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<span class="sub">' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// APPEND PAGE NUMBER TO CANONICAL
// ON PAGINATED ARCHIVE PAGES
function setPaginationCanonical() {
	if(is_paged()) {
		$pagination_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		add_filter('wpseo_canonical', '__return_false');
		echo '<link rel="canonical" href="'. get_the_permalink() . 'page/' . $pagination_paged . '/" />';
	}
};
?>