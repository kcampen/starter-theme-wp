<?php
	$logo = get_field("logo", "option");
?>

		<header class="">
			<nav class="utility-menu">
				<div class="container">
					<div class="columns">
						<div class="column">
							<?php wp_nav_menu(array('theme_location' => 'utility-menu', 'menu_class' => 'menu-utility-menu', 'container' => false, 'depth' => 2)); ?>
						</div>
					</div>
				</div>
			</nav>
			<nav class="main-menu">
				<div class="container">
					<div class="columns">
						<?php if($logo) : ?>
							<div class="column image-side">
								<a href="<?= home_url(); ?>" aria-label="Site Logo">
									<img 
										src="<?= $logo['sizes']['medium_large']; ?>"
										width="<?= $logo['sizes']['medium_large-width']; ?>"
										height="<?= $logo['sizes']['medium_large-height']; ?>"
										alt="Site Logo"
										class="img-responsive"
									>
								</a>
							</div>
						<?php endif; ?>
						<div class="column menu-side">
							<?php $walker = new Menu_With_Description; ?>
							<?php wp_nav_menu(array('theme_location' => 'main-menu', 'menu_class' => 'menu-main-menu', 'container' => false, 'depth' => 4, 'walker' => $walker)); ?>
						</div>
						<div class="column button-side">
							<?php wp_nav_menu(array('theme_location' => 'main-menu-button', 'menu_class' => 'menu-main-menu-button', 'container' => false, 'depth' => 1)); ?>
						</div>
					</div>
				</div>
			</nav>
		</header>