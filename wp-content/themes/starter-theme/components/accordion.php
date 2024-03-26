<?php
if(have_rows('accordion_group', $page_ID)) :
	while(have_rows('accordion_group', $page_ID)) : the_row();

        $show_section = get_sub_field("show_section");
        $random_id = uuID();
        $section_subhead = get_sub_field("section_subhead");
        $section_headline = get_sub_field("section_headline");
        $section_text = get_sub_field("section_text");
        $accordions = get_sub_field("accordion");

        if($show_section && $accordions) :
?>

            <section class="accordion prev-<?= $GLOBALS['prev_section']; ?> ">
                <?php if($section_subhead || $section_headline || $section_text) : ?>
                    <div class="container section-heads small">
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
                <div class="container small">
                    <div class="columns">
                        <div class="column">
                            <div class="accordion-container">
                                <?php $accordion_index = 0; ?>
                                <?php foreach($accordions as $accordion) : ?>
                                    <div class="accordion-content">
                                        <button
                                            id="<?= $random_id; ?>-accrodion-header-<?php echo $accordion_index; ?>"
                                            aria-expanded="false"
                                            aria-controls="<?= $random_id; ?>-accordion-panel-<?php echo $accordion_index; ?>"
                                        >
                                            <h5><?= $accordion['accordion_title']; ?></h5>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
                                        </button>
                                        <div class="content wysiwyg"
                                            id="<?= $random_id; ?>-accordion-panel-<?php echo $accordion_index; ?>"
                                            aria-labelledby="<?= $random_id; ?>-accordion-header-<?php echo $accordion_index; ?>"
                                        ><?= $accordion['accordion_text']; ?></div>
                                    </div>
                                <?php $accordion_index++; endforeach; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php $GLOBALS['prev_section'] = "accordion"; ?>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>