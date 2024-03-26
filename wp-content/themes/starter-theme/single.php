<?php get_header(); ?>

	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

		<section>
			<div class="container">
				<div class="columns page-content">
					<div class="column wysiwyg">
						<?php the_title(); ?>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>

		<?php require(get_stylesheet_directory() . '/components/page-cta.php'); ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
