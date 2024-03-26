<?php
if(have_rows('tabs_group', $page_ID)) :
	while(have_rows('tabs_group', $page_ID)) : the_row();

        $show_section = get_sub_field("show_section");
        $random_id = uuID();
        $section_subhead = get_sub_field("section_subhead");
        $section_headline = get_sub_field("section_headline");
        $section_text = get_sub_field("section_text");
        $tabs = get_sub_field("tabs");

        if($show_section && $tabs) :
?>

            <section class="tabs prev-<?= $GLOBALS['prev_section']; ?> ">
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
                    <div class="columns">
                        <div class="column">
                            <ul class="tab-heads">
                            <?php $tab_index = 0; ?>
                            <?php foreach($tabs as $tab) : ?>
                                <li>
                                    <button id="<?= $random_id; ?>-tab-header-<?php echo $tab_index; ?>">
                                        <?= $tab['tab_title']; ?>
                                    </button>
                                </li>
                            <?php $tab_index++; endforeach; ?> 
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="columns tab-contents">
                        <?php $tab_index = 0; ?>
                        <?php foreach($tabs as $tab) : ?>
                            <div id="<?= $random_id; ?>-tab-panel-<?php echo $tab_index; ?>" class="column tab-content wysiwyg" aria-hidden="<?= $tab_index == 0 ? "false" : "true"; ?>">
                                <?= $tab['tab_content']; ?>
                            </div>
                        <?php $tab_index++; endforeach; ?> 
                    </div>
                </div>
            </section>
            <?php $GLOBALS['prev_section'] = "tabs"; ?>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>