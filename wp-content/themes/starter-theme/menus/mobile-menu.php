<?php
	$logo = get_field("logo", "option");
?>

<div id="mobile-menu-hamburger">
	<div class="container">
		<div class="center-content columns">
			<div class="column logo-side">
				<a href="<?php echo get_home_url(); ?>"><img src="<?= $logo['url']; ?>" class="logo"></a>
			</div>
			<div class="column hamburger-side">
				<div id="hamburger">
					<span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	</div>
</div>

<nav id="mobile-menu">
	<div class="container">
		<div class="columns">
			<div class="column">
				<?php wp_nav_menu(array( 'theme_location' => 'mobile-menu', 'menu_class' => 'menu-mobile-menu', 'container' => false, 'depth' => 3 )); ?>
			</div>
		</div>
	</div>
</nav>
