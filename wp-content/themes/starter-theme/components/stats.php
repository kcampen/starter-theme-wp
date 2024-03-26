<?php
if(have_rows('stats_group', $page_ID)) :
	while(have_rows('stats_group', $page_ID)) : the_row();

        $show_section = get_sub_field("show_section");
        $section_subhead = get_sub_field("section_subhead");
        $section_headline = get_sub_field("section_headline");
        $section_text = get_sub_field("section_text");
        $stats = get_sub_field("stats");

        if($show_section && $stats) :
?>

            <section class="stats prev-<?= $GLOBALS['prev_section']; ?> ">
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
                <div class="stats-bg">
                    <div class="container">
                        <div class="columns stats-loop">
                            <?php foreach($stats as $stat) : ?>
                                <?php
                                    $stat_text = $stat['stat'];
                                    $description = $stat['description'];
                                ?>
                                        <div class="column text-center">
                                            <?php if($stat_text) : ?>
                                                <div class="stat"><?= $stat_text; ?></div>
                                            <?php endif; ?>
                                            <?php if($description) : ?>
                                                <div class="description"><?= $description; ?></div>
                                            <?php endif; ?>
                                        </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php $GLOBALS['prev_section'] = "stats"; ?>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>