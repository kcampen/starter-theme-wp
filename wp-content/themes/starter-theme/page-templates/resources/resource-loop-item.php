<?php
    $item_title = get_the_title();
    $item_id = get_the_ID();
    $item_link = get_the_permalink();
    $item_featured_image = get_the_post_thumbnail();
    $item_types = get_the_terms($item_id, 'resource_type_tax');
    $item_image = get_the_post_thumbnail_url(null, 'medium_large');
    if($item_image) {
        $item_image_alt = get_post_meta(get_post_thumbnail_id($item_id), '_wp_attachment_image_alt', true);
    }
?>

        <div class="archive-item">
            <?php if($item_image) : ?>
                <a href="<?= $item_link; ?>" aria-label="<?php echo $item_title; ?>">                   
                    <img src="<?= $item_image; ?>" alt="<?= $item_image_alt ? $item_image_alt : $item_title; ?>">
                </a>
            <?php endif; ?>
            <?php if(is_array($item_types)) : ?>
                <?php foreach($item_types as $item_type) : ?>
                    <?php $item_type_link = get_term_link($item_type); ?>
                        <a href="<?php echo $item_type_link; ?>">
                            <?= $item_type->name; ?>
                        </a>
                <?php endforeach; ?>
            <?php endif; ?>
            <a href="<?= $item_link; ?>">
                <h5><?php echo $item_title; ?></h5>
            </a>
        </div>