<?php
	/********************************************************/
	// ADDS MENUS TO WORDPRESS ADMIN
	/********************************************************/
	function register_admin_menus() {
		register_nav_menu('main-menu',__( 'Main Menu'));
		register_nav_menu('main-menu-button',__( 'Main Menu Button'));
		register_nav_menu('footer-menu',__( 'Footer Menu'));
		register_nav_menu('footer-utility-menu',__( 'Footer Utility Menu'));
		register_nav_menu('mobile-menu',__( 'Mobile Menu'));
		register_nav_menu('utility-menu',__( 'Utility Menu'));
	}
	add_action('init', 'register_admin_menus');
?>
