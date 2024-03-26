<?php get_header(); ?>

	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

		<?php $content = get_field("content"); ?>

		<section>
			<div class="container small">
				<div class="columns page-content">
					<div class="column wysiwyg">
						<?= $content; ?>
					</div>
				</div>
			</div>
		</section>

		<?php require(get_stylesheet_directory() . '/components/page-cta.php'); ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
