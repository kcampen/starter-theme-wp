<?php
/**
* Template Name: Dev
*/

get_header(); ?>

	<?php $page_ID = get_the_ID(); ?>

	<?php require(get_stylesheet_directory() . '/components/default-hero.php'); ?>

	<?php require(get_stylesheet_directory() . '/components/accordion.php'); ?>
	<?php require(get_stylesheet_directory() . '/components/column-content.php'); ?>
	<?php require(get_stylesheet_directory() . '/components/left-right-content.php'); ?>
	<?php require(get_stylesheet_directory() . '/components/logo-scroller.php'); ?>
	<?php require(get_stylesheet_directory() . '/components/recent-resources.php'); ?>
	<?php require(get_stylesheet_directory() . '/components/stats.php'); ?>
	<?php require(get_stylesheet_directory() . '/components/tabs.php'); ?>
	<?php require(get_stylesheet_directory() . '/components/video-embed.php'); ?>

	<?php require(get_stylesheet_directory() . '/components/page-cta.php'); ?>

<?php get_footer(); ?>
