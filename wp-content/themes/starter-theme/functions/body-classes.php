<?php
add_filter('body_class','my_body_classes');
function my_body_classes($body_classes) {
	
	// ADD OS AND BROWSER
	$debugger_classes = show_debugger();
	$body_classes[] = "browser-" . $debugger_classes[0];
	$body_classes[] = "os-" . $debugger_classes[1];

	// ANNOUNCEMENT BAR
	if(is_front_page()) {
		$show_announcement_bar = get_field("show_announcement_bar", "option");
		$announcement_bar_content = get_field("announcement_bar_content", "option");
		if($show_announcement_bar && $announcement_bar_content) {
			$body_classes[] = "has-announcement-bar";
		}
	}

    $show_breadcrumbs = get_field("show_breadcrumbs");
    $breadcrumbs = get_field("breadcrumbs");
	if($show_breadcrumbs && $breadcrumbs) {
		$body_classes[] = "has-breadcrumbs";
	}

	return $body_classes;
}
?>