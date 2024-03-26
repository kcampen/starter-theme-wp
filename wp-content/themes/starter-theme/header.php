<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(); ?></title>

	<?php if(!is_dev()) : ?>
		<style>
			<?php require_once(get_stylesheet_directory() . '/dist/css/critical.css'); ?>
		</style>
	<?php endif ; ?>

	<?php wp_head(); ?>

	<script>
		// global access to urls
		var homeURL = '<?php echo home_url(); ?>';
		var ajaxURL = '<?php echo home_url(); ?>/wp-json/wp/v2';
		var themeURL = '<?php echo get_stylesheet_directory_uri(); ?>';
	</script>

	<?php require_once(get_stylesheet_directory() . '/functions/scripts-header.php'); ?>
</head>

<body <?php body_class($body_classes); ?>>

	<?php require_once(get_stylesheet_directory() . '/menus/main-menu.php'); ?>
	<?php require_once(get_stylesheet_directory() . '/menus/mobile-menu.php'); ?>
	<?php require_once(get_stylesheet_directory() . '/components/announcement-bar.php'); ?>
	<?php require_once(get_stylesheet_directory() . '/components/breadcrumbs.php'); ?>
