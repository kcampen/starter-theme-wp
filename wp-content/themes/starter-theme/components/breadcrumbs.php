<?php
    $show_breadcrumbs = get_field("show_breadcrumbs");
    $breadcrumbs = get_field("breadcrumbs");

    if($show_breadcrumbs && $breadcrumbs) :
?>

        <div class="breadcrumbs container">
            <div class="columns">
                <div class="column">
                    <ul>
                        <?php foreach($breadcrumbs as $breadcrumb) : ?>
                            <?php 
                                $breadcrumb_type = $breadcrumb['breadcrumb_type']; 
                                $link = $breadcrumb['link']; 
                                $text = $breadcrumb['text']; 
                            ?>
                                <li>
                                    <?php if($breadcrumb_type == "text") : ?>
                                        <span><?= $text; ?></span>
                                    <?php else : ?>
                                        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>">
                                            <?= $link['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>