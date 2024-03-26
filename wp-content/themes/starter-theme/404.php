<?php get_header(); ?>

	<?php
		$image = get_field("404_image", "option");
		$headline = get_field("404_headline", "option");
		$text = get_field("404_text", "option");
		$link = get_field("404_link", "option");
	?>

			<section class="error404-content">
				<div class="container">
					<div class="columns">
						<div class="column text-side">
							<?php if($headline) : ?>
								<h1><?= $headline; ?></h1>
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
						<?php if($image) : ?>
							<div class="column image-side">
								<img 
									src="<?= $image['sizes']['medium_large']; ?>"
									width="<?= $image['sizes']['medium_large-width']; ?>"
									height="<?= $image['sizes']['medium_large-height']; ?>"
									alt="<?= $image['alt']; ?>"
									class="img-responsive"
								>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
            <?php $GLOBALS['margin_bottom'] = 130; ?>
            <?php $GLOBALS['prev_section'] = "error404-content"; ?>

<?php get_footer(); ?>
