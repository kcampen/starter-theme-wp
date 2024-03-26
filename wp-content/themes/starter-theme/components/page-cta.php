<?php
if(have_rows('page_cta_group', $page_ID)) :
	while(have_rows('page_cta_group', $page_ID)) : the_row();

        $show_section = get_sub_field("show_section");
        $use_global_cta = get_sub_field("use_global_cta");
        $cta_subhead = get_sub_field("cta_subhead");
        $cta_headline = get_sub_field("cta_headline");
        $cta_text = get_sub_field("cta_text");
        $cta_button = get_sub_field("cta_button");
        $cta_image = get_sub_field("cta_image");

        if($use_global_cta) {
            $cta_subhead = get_field("call_to_action_default_subhead", "option");
            $cta_headline = get_field("call_to_action_default_headline", "option");
            $cta_text = get_field("call_to_action_default_description", "option");
            $cta_button = get_field("call_to_action_default_link", "option");
            $cta_image = get_field("call_to_action_default_image", "option");
        }

        if($show_section) :
?>

            <section class="page-cta prev-<?= $GLOBALS['prev_section']; ?> ">
                <div class="container">
                    <div class="columns">
                        <div class="column text-side">
                            <?php if($cta_subhead) : ?>
                                <h5 class="subhead"><?= $cta_subhead; ?></h5>
                            <?php endif; ?>
                            <?php if($cta_headline) : ?>
                                <h3><?= $cta_headline; ?></h3>
                            <?php endif; ?>
                            <?php if($cta_text) : ?>
                                <div class="wysiwyg"><?= $cta_text; ?></div>
                            <?php endif; ?>
                            <?php if($cta_button) : ?>
                                <div class="button-container">
                                    <?php if($cta_button) : ?>
                                        <a href="<?= $cta_button['url']; ?>" class="btn" target="<?= $cta_button['target']; ?>">
                                            <?= $cta_button['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if($cta_image) : ?>
                            <div class="column image-side">
                                <img 
                                    src="<?= $cta_image['sizes']['medium_large']; ?>"
                                    width="<?= $cta_image['sizes']['medium_large-width']; ?>"
                                    height="<?= $cta_image['sizes']['medium_large-height']; ?>"
                                    alt="<?= $cta_image['alt']; ?>"
                                    class="img-responsive"
                                >
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <?php $GLOBALS['prev_section'] = "page-cta"; ?>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>