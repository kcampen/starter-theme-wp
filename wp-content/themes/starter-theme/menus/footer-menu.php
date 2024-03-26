<?php
	$logo = get_field("logo", "option");
	$company_info = get_field("company_info", "option");
	$phone = get_field("phone", "option");
	$email = get_field("email", "option");
	$facebook = get_field("facebook", "option");
	$youtube = get_field("youtube", "option");
	$twitter = get_field("twitter", "option");
	$instagram = get_field("instagram", "option");
	$linkedin = get_field("linkedin", "option");
?>

<footer class="prev-<?= $GLOBALS['margin_bottom']; ?> prev-<?= $GLOBALS['prev_section']; ?>">
	<div class="container footer-menu">
		<div class="columns">
			<div class="column info-side">
				<?php if($company_info) : ?>
					<div class="wysiwyg">
						<?= $company_info; ?>
					</div>
				<?php endif; ?>
				<?php if($phone) : ?>
					<div class="phone">
						Phone: <a href="<?= $phone['url']; ?>" target="_blank"><?= $phone['title']; ?></a>
					</div>
				<?php endif; ?>
				<?php if($email) : ?>
					<div class="email">
						Email: <a href="<?= $email['url']; ?>" target="_blank"><?= $email['title']; ?></a>
					</div>
				<?php endif; ?>
			</div>
			<div class="column menu-side">
				<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'menu-footer-menu', 'container' => false, 'depth' => 4)); ?>
			</div>
		</div>
	</div>
	<div class="container logo-social">
		<div class="columns">
			<div class="column logo-side">
				<a href="<?= get_home_url(); ?>" class="logo">
					<img 
						src="<?= $logo['sizes']['medium_large']; ?>"
						width="<?= $logo['sizes']['medium_large-width']; ?>"
						height="<?= $logo['sizes']['medium_large-height']; ?>"
						alt="Site Logo"
						class="img-responsive"
					>
				</a>
			</div>
			<div class="column social-side">
				<ul class="social-icons">
					<?php if($facebook) : ?>
						<li>
							<a href="<?= $facebook; ?>" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/></svg>
							</a>
						</li>
					<?php endif; ?>
					<?php if($youtube) : ?>
						<li>
							<a href="<?= $youtube; ?>" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.441 16.892c-2.102.144-6.784.144-8.883 0-2.276-.156-2.541-1.27-2.558-4.892.017-3.629.285-4.736 2.558-4.892 2.099-.144 6.782-.144 8.883 0 2.277.156 2.541 1.27 2.559 4.892-.018 3.629-.285 4.736-2.559 4.892zm-6.441-7.234l4.917 2.338-4.917 2.346v-4.684z"/></svg>
							</a>
						</li>
					<?php endif; ?>
					<?php if($instagram) : ?>
						<li>
							<a href="<?= $instagram; ?>" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M14.829 6.302c-.738-.034-.96-.04-2.829-.04s-2.09.007-2.828.04c-1.899.087-2.783.986-2.87 2.87-.033.738-.041.959-.041 2.828s.008 2.09.041 2.829c.087 1.879.967 2.783 2.87 2.87.737.033.959.041 2.828.041 1.87 0 2.091-.007 2.829-.041 1.899-.086 2.782-.988 2.87-2.87.033-.738.04-.96.04-2.829s-.007-2.09-.04-2.828c-.088-1.883-.973-2.783-2.87-2.87zm-2.829 9.293c-1.985 0-3.595-1.609-3.595-3.595 0-1.985 1.61-3.594 3.595-3.594s3.595 1.609 3.595 3.594c0 1.985-1.61 3.595-3.595 3.595zm3.737-6.491c-.464 0-.84-.376-.84-.84 0-.464.376-.84.84-.84.464 0 .84.376.84.84 0 .463-.376.84-.84.84zm-1.404 2.896c0 1.289-1.045 2.333-2.333 2.333s-2.333-1.044-2.333-2.333c0-1.289 1.045-2.333 2.333-2.333s2.333 1.044 2.333 2.333zm-2.333-12c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.958 14.886c-.115 2.545-1.532 3.955-4.071 4.072-.747.034-.986.042-2.887.042s-2.139-.008-2.886-.042c-2.544-.117-3.955-1.529-4.072-4.072-.034-.746-.042-.985-.042-2.886 0-1.901.008-2.139.042-2.886.117-2.544 1.529-3.955 4.072-4.071.747-.035.985-.043 2.886-.043s2.14.008 2.887.043c2.545.117 3.957 1.532 4.071 4.071.034.747.042.985.042 2.886 0 1.901-.008 2.14-.042 2.886z"/></svg>
							</a>
						</li>
					<?php endif; ?>
					<?php if($linkedin) : ?>
						<li>
							<a href="<?= $linkedin; ?>" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/></svg>
							</a>
						</li>
					<?php endif; ?>
					<?php if($twitter) : ?>
						<li>
							<a href="<?= $twitter; ?>" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z"/></svg>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="container copyright">
		<div class="columns">
			<div class="column">
				&copy; <?= date("Y"); ?> Starter
			</div>
		</div>
	</div>
</footer>