<?php


/********************************************************/
// ADD OPTIONS PAGE FUNCTIONALITY
/********************************************************/
if(function_exists('acf_add_options_page')) {
	acf_add_options_page();
}


/********************************************************/
// ADVANCED CUSTOM FIELDS
// MAKE THE WYSIWYG EDITOR SMALLER
/********************************************************/
function PREFIX_apply_acf_modifications() {
?>
	<style>
		.acf-editor-wrap iframe {
			min-height: 0;
		}
	</style>
	<script>
		(function($) {
			 acf.add_filter('wysiwyg_tinymce_settings', function(mceInit, id, $field) {
				mceInit.wp_autoresize_on = true;
				return mceInit;
			});
			acf.add_action('wysiwyg_tinymce_init', function(ed, id, mceInit, $field) {
				ed.settings.autoresize_min_height = 100;
				$('.acf-editor-wrap iframe').css('height', '100px');
			});
		})(jQuery)
  </script>
<?php
}
add_action('acf/input/admin_footer', 'PREFIX_apply_acf_modifications');


/********************************************************/
// MOVE YOAST TO BOTTOM
/********************************************************/
function yoasttobottom() {
	return 'low';
}
add_filter('wpseo_metabox_prio', 'yoasttobottom');


?>
