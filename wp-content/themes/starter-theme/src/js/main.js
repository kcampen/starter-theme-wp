$(document).ready(function() {

	/********************************************************/
	/* ELEMENT IS IN VIEWPORT */
	/********************************************************/
	// $.fn.isInViewport = function() {
	// 	var elementTop = $(this).offset().top;
	// 	var elementBottom = elementTop + $(this).outerHeight();

	// 	var viewportTop = $(window).scrollTop();
	// 	var viewportBottom = viewportTop + $(window).height();

	// 	return elementBottom > viewportTop && elementTop < viewportBottom;
	// };
	// if($("selector").isInViewport()) {
	// 	console.log("do something");
	// }

	/********************************************************/
	/* MODALS */
	/********************************************************/
	if($(".close-modals").length) {
		$(".close-modals").click(function() {
			$(".modal").each(function() {
				$(this).removeClass("active");
			});

			if($("#video-embed-modal").length) {
				$("#video-embed-modal .content").html("");
			}
		});
	}

	/********************************************************/
	/* VIDEO POPUPS */
	/********************************************************/
	if($(".video-popup-button").length) {
		$(".video-popup-button").each(function() {
			$(this).click(function(e) {
				e.preventDefault();
				let videoEmbed = $(this).find(".get-video-embed").html();

				$("#video-embed-modal .content").html("");
				$("#video-embed-modal .content").html(videoEmbed);
				$("#video-embed-modal").addClass("active");
			});
		});
	}

	/********************************************************/
	/* ANIMATED ANCHOR LINK SCROLL */
	/********************************************************/
	if($(".animate-anchor").length) {
		$(document).on("click", ".animate-anchor", function(e) {
			e.preventDefault();
			let el = $(this).attr("href");

			if(el.indexOf("#") != -1) {
				el = el.replace('#', '');

				// CHECK IF ELEMENT WITH NAME OF ANCHOR EXISTS
				if($(`[name='${el}']`).length) {
					$("html, body").animate({
						scrollTop: $(`[name='${el}']`).offset().top - 120
					}, 300);
				}

				// CHECK IF ELEMENT WITH ID OF ANCHOR EXISTS
				else if($(`#${el}`).length) {
					$("html, body").animate({
						scrollTop: $(`${el}`).offset().top - 120
					}, 300);
				}
			}
			else {
				window.location.href = el;
			}
		});
	}
});

// WAIT TIL LOAD
$(window).on('load', function() {

	/********************************************************/
	/* LAZY LOAD BACKGROUND IMAGES */
	/********************************************************/
	if($(".lazy-bg").length) {
		setTimeout(function() {
			$(".lazy-bg").each(function() {
				let bgSRC = $(this).attr("data-src");
				$(this).css({
					"background-image": `url(${bgSRC})`
				})
			});
		}, 100);
	}
});
