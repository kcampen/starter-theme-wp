<?php get_header(); ?>

	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

		<section>
			<div class="container">
				<div class="columns">
					<div class="column col-12">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
