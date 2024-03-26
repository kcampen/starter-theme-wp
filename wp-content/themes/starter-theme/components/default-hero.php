<?php
if(have_rows('default_hero_group', $page_ID)) :
	while(have_rows('default_hero_group', $page_ID)) : the_row();

        $show_section = get_sub_field("show_section");
        $hero_subhead = get_sub_field("hero_subhead");
        $hero_headline = get_sub_field("hero_headline");
        $hero_text = get_sub_field("hero_text");
        $hero_button = get_sub_field("hero_button");
        $hero_button_2 = get_sub_field("hero_button_2");
        $hero_image = get_sub_field("hero_image");

        if($show_section) :
?>

            <section class="default-hero prev-<?= $GLOBALS['prev_section']; ?> ">
                <div class="container">
                    <div class="columns">
                        <div class="column text-side">
                            <?php if($hero_subhead) : ?>
                                <h5 class="subhead"><?= $hero_subhead; ?></h5>
                            <?php endif; ?>
                            <?php if($hero_headline) : ?>
                                <h3><?= $hero_headline; ?></h3>
                            <?php endif; ?>
                            <?php if($hero_text) : ?>
                                <div class="wysiwyg"><?= $hero_text; ?></div>
                            <?php endif; ?>
                            <?php if($hero_button || $hero_button_2) : ?>
                                <div class="button-container">
                                    <?php if($hero_button) : ?>
                                        <a href="<?= $hero_button['url']; ?>" class="btn" target="<?= $hero_button['target']; ?>">
                                            <?= $hero_button['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if($hero_button_2) : ?>
                                        <a href="<?= $hero_button_2['url']; ?>" class="btn light" target="<?= $hero_button_2['target']; ?>">
                                            <?= $hero_button_2['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if($hero_image) : ?>
                            <div class="column image-side">
                                <img 
                                    src="<?= $hero_image['sizes']['medium_large']; ?>"
                                    width="<?= $hero_image['sizes']['medium_large-width']; ?>"
                                    height="<?= $hero_image['sizes']['medium_large-height']; ?>"
                                    alt="<?= $hero_image['alt']; ?>"
                                    class="img-responsive"
                                >
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <?php $GLOBALS['prev_section'] = "default-hero"; ?>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>