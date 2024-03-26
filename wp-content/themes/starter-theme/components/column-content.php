<?php
if(have_rows('column_content_group', $page_ID)) :
	while(have_rows('column_content_group', $page_ID)) : the_row();

        $show_section = get_sub_field("show_section");
        $section_subhead = get_sub_field("section_subhead");
        $section_headline = get_sub_field("section_headline");
        $section_text = get_sub_field("section_text");
        $number_of_columns = get_sub_field("number_of_columns");
        $contents = get_sub_field("content");

        if($show_section && $contents) :
?>

            <section class="column-content prev-<?= $GLOBALS['prev_section']; ?> ">
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
                <div class="container content-loop">
                    <div class="columns column-number-<?= $number_of_columns; ?>">
                        <?php $content_index = 0; ?>
                        <?php foreach($contents as $content) : ?>
                            <?php
                                $image = $content['image'];
                                $headline = $content['headline'];
                                $text = $content['text'];
                                $link = $content['link'];
                            ?>
                                    <div class="column">
                                        <?php if($image) : ?>
                                            <img 
                                                src="<?= $image['sizes']['medium_large']; ?>"
                                                width="<?= $image['sizes']['medium_large-width']; ?>"
                                                height="<?= $image['sizes']['medium_large-height']; ?>"
                                                alt="<?= $image['alt']; ?>"
                                                loading="lazy"
                                            >
                                        <?php endif; ?>
                                        <?php if($headline) : ?>
                                            <h4><?= $headline; ?></h4>
                                        <?php endif; ?>
                                        <?php if($text) : ?>
                                            <div class="wysiwyg"><?= $text; ?></div>
                                        <?php endif; ?>
                                        <?php if($link) : ?>
                                            <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>">
                                                <?= $link['title']; ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                        <?php $content_index++; endforeach; ?> 
                        </div>
                    </div>
                </div>
            </section>
            <?php $GLOBALS['prev_section'] = "column-content"; ?>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>