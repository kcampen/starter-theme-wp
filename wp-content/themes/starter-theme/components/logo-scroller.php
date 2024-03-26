<?php
if(have_rows("logo_scroller_group", $page_ID)) :
	while(have_rows("logo_scroller_group", $page_ID)) : the_row();

    $logo_defaults = get_field("logo_scroller_defaults", "option");
    $show_section = get_sub_field("show_section");
    $section_subhead = get_sub_field("section_subhead");
    $section_headline = get_sub_field("section_headline");
    $section_text = get_sub_field("section_text");
	$use_global_logos = get_sub_field("use_global_logos");
    $logo_scroller = get_sub_field("logo_scroller");
    
    $logo_count = null;
    $logo_loop = 1;

    // use global or page specific logos
    if($use_global_logos) {
        $logo_scroller = $logo_defaults;
    }

    // make sure there are enough logos to create slideshow
    // min is 10, do extra loops to get there if need be
    if($logo_scroller && is_array($logo_scroller)) {
        $logo_count = count($logo_scroller);
        $logo_loop = ceil(1 / ($logo_count / 10));
    }

    if($show_section && $logo_scroller) :
?>

			<section class="logo-scroller prev-<?= $GLOBALS['prev_section']; ?>">
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
                <div class="logo-scroller-slideshow">
                    <?php for($i = 0; $i < $logo_loop; $i++) : ?>
                        <?php foreach($logo_scroller as $logo) : ?>
                            <div>
                                <img 
                                    src="<?= $logo['logo']['sizes']['medium']; ?>"
                                    width="<?= $logo['logo']['sizes']['medium-width']; ?>"
                                    height="<?= $logo['logo']['sizes']['medium-height']; ?>"
                                    alt="<?= $logo['logo']['alt']; ?>"
                                    loading="lazy" 
                                    class="img-responsive"
                                >
                            </div>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
			</section>
            <?php $GLOBALS['prev_section'] = "logo-scroller"; ?>

        <?php endif; ?>
	<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>