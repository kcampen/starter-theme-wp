<?php
/**
* Template Name: Flex Template
*/

get_header(); ?>

<?php $page_ID = get_the_ID(); ?>

<?php require(get_stylesheet_directory() . '/components/default-hero.php'); ?>

<?php
if(have_rows('page_builder')) :
    while(have_rows('page_builder')) : the_row();

        // ACCORDION
        if(get_row_layout() == 'accordion') :
	        require(get_stylesheet_directory() . '/components/accordion.php');

        // COLUMN CONTENT
        elseif(get_row_layout() == 'column_content') :
            require(get_stylesheet_directory() . '/components/column-content.php');

        // LEFT - RIGHT CONTENT
        elseif(get_row_layout() == 'left_right_content') :
            require(get_stylesheet_directory() . '/components/left-right-content.php');

        // LOGO SCROLLER
        elseif(get_row_layout() == 'logo_scroller') :
            require(get_stylesheet_directory() . '/components/logo-scroller.php');

        // RECENT RESOURCES
        elseif(get_row_layout() == 'recent_resources') :
            require(get_stylesheet_directory() . '/components/recent-resources.php');

        // STATS
        elseif(get_row_layout() == 'stats') :
            require(get_stylesheet_directory() . '/components/stats.php');

        // TABS
        elseif(get_row_layout() == 'tabs') :
            require(get_stylesheet_directory() . '/components/tabs.php');

        // VIDEO EMBED
        elseif(get_row_layout() == 'video_embed') :
            require(get_stylesheet_directory() . '/components/video-embed.php');
            
        ?>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>

<?php require(get_stylesheet_directory() . '/components/page-cta.php'); ?>

<?php get_footer(); ?>
