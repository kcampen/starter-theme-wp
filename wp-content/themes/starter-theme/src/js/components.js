$(document).ready(function() {

    /********************************************************/
    /* ACCORDION */
    /********************************************************/
    if($(".accordion-content").length) {
        $(".accordion-container").each(function() {

            // show first on initial load
            $(this).find(".accordion-content:eq(0) .content").show();
            $(this).find(".accordion-content:eq(0) button").attr("aria-expanded", true);
            $(this).find(".accordion-content:eq(0)").addClass("active");

            function toggleTab(el, parent, isOpen) {
                parent.find(".accordion-content").each(function() {
                    $(this).find(".content").slideUp();
                    $(this).find("button").attr("aria-expanded", false);
                    $(this).closest("div").removeClass("active");
                });

                if(!isOpen) {
                    el.closest("div").find(".content").slideDown();
                    el.closest("div").find("button").attr("aria-expanded", true);
                    el.closest("div").addClass("active");
                }
            }

            let that = $(this);
            // $(this).find(".accordion-content svg").click(function() {
            //     let isOpen = $(this).closest("div").find(".content").is(":visible") ? true : false;
            //     toggleTab($(this), that, isOpen);
            // });
            $(this).find(".accordion-content button").click(function() {
                let isOpen = $(this).closest("div").find(".content").is(":visible") ? true : false;
                toggleTab($(this), that, isOpen);
            });
        });
    }


    /********************************************************/
    /* TABS */
    /********************************************************/
    if($("section.tabs").length) {
        $("section.tabs").each(function() {

            // show first on initial load
            $(this).find(".tab-contents .tab-content:eq(0)").show();
            $(this).find(".tab-heads li:eq(0) button").addClass("active");

            function toggleTab(parent, index) {
                parent.find(".tab-contents .tab-content").each(function() {
                    $(this).hide();
                    $(this).attr("aria-hidden", true);
                });
                parent.find(".tab-heads > li > button").each(function() {
                    $(this).removeClass("active");
                });

                parent.find(`.tab-heads > li:eq(${index}) > button`).addClass("active");
                parent.find(`.tab-contents .tab-content:eq(${index})`).show();
                parent.find(`.tab-contents .tab-content:eq(${index})`).attr("aria-hidden", false);
            }

            let that = $(this);
            $(this).find(".tab-heads button").click(function() {
                let index = $(this).closest("li").index();
                toggleTab(that, index);
            });
        });
    }


    /********************************************************/
    /* LOGO SCROLLER */
    /********************************************************/
    if($(".logo-scroller-slideshow").length) {
        $(".logo-scroller-slideshow").each(function() {

            let logoScroller = $(this).slick({
                autoplay: true,
                infinite: true,
                arrows: false,
                slidesToShow: 8,
                centerMode: true,
                pauseOnFocus: false,
                pauseOnHover: false,
                focusOnSelect: false,
                swipe: false,
                touchMove: false,
                dots: false,
                autoplaySpeed: 0,
                cssEase: 'linear',
                speed: 5000,
                responsive: [
                    {
                        breakpoint: 1260,
                        settings: {
                            slidesToShow: 6,
                        }
                    },
                    {
                        breakpoint: 1080,
                        settings: {
                            slidesToShow: 5,
                        }
                    },
                    {
                        breakpoint: 840,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 720,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 450,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        });
    }
});