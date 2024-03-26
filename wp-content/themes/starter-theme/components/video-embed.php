<?php
if(have_rows('video_embed_group', $page_ID)) :
	while(have_rows('video_embed_group', $page_ID)) : the_row();

        $show_section = get_sub_field("show_section");
        $section_subhead = get_sub_field("section_subhead");
        $section_headline = get_sub_field("section_headline");
        $section_text = get_sub_field("section_text");
        $video_type = get_sub_field("video_type");
        $vimeo_embed = get_sub_field("vimeo_embed");
        $wistia_embed = get_sub_field("wistia_embed");
        $youtube_embed = get_sub_field("youtube_embed");

        if($show_section && $vimeo_embed || $show_section && $wistia_embed || $show_section && $youtube_embed) :
?>

            <section class="video-embed prev-<?= $GLOBALS['prev_section']; ?> ">
                <div class="container section-heads">
                    <div class="columns">
                        <div class="column text-side">
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
                <div class="container">
                    <div class="columns">
                        <div class="column">
                            <div class="video">
                                <?php if($video_type == "youtube" && $youtube_embed) : ?>
                                    <div class="video-responsive">
                                        <?= $youtube_embed; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($video_type == "vimeo" && $vimeo_embed) : ?>
                                    <?= $vimeo_embed; ?>
                                <?php endif; ?>
                                <?php if($video_type == "wistia" && $wistia_embed) : ?>
                                    <script src="//fast.wistia.com/embed/medias/<?= $wistia_embed; ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?= $wistia_embed; ?> playerColor=d51236 seo=false autoPlay=false controlsVisibleOnLoad=false videoFoam=true" style="height:100%;width:100%">&nbsp;</div></div></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php $GLOBALS['prev_section'] = "video-embed"; ?>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>