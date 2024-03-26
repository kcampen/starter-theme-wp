<?php
if(have_rows("recent_resources_group", $page_ID)) :
	while(have_rows("recent_resources_group", $page_ID)) : the_row();

    $show_section = get_sub_field("show_section");
    $section_subhead = get_sub_field("section_subhead");
    $section_headline = get_sub_field("section_headline");
    $section_text = get_sub_field("section_text");

	$use_recent_resources = get_sub_field("use_recent_resources");
    $resources = get_sub_field("resources");
    $posts_in = array();

    // use page specific resources
    if(!$use_recent_resources && $resources) {
        foreach($resources as $resource) {
            array_push($posts_in, $resource['resource']);
        }
    }

    // defaults to 3 most recent resources
    $resource_args = array(
        'post_type' => ['resource_posts'],
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'post__in' => $posts_in
    );

    $resource_loop = new WP_Query($resource_args);

    if($show_section && $resource_loop->have_posts()) :
?>

			<section class="recent-resources prev-<?= $GLOBALS['prev_section']; ?>">
                <?php if($section_subhead || $section_headline || $section_text) : ?>
                    <div class="container section-heads">
                        <div class="columns">
                            <div class="column">
                                <?php if($section_subhead) : ?>
                                    <h5 class="subhead"><?= $section_subhead; ?></h5>
                                <?php endif; ?>
                                <?php if($section_headline) : ?>
                                    <h3><?= $section_headline; ?></h3>
                                <?php endif; ?>
                                <?php if($section_text) : ?>
                                    <div class="wysiwyg"><?= $section_text; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="container">
                    <div class="columns archive-loop">
                        <?php while($resource_loop->have_posts()) : $resource_loop->the_post(); ?>

                            <div class="column">
                                <?php require(get_stylesheet_directory() . '/page-templates/resources/resource-loop-item.php'); ?>
                            </div>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
			</section>
            <?php $GLOBALS['prev_section'] = "recent-resources"; ?>

        <?php endif; ?>
	<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>