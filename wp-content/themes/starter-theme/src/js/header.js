$(document).ready(function() {
    var sectionScrollPositionY = 0;
    var sectionVpHeight = 0;


    /********************************************************/
    /* RETURN WIDTH OF VIEWPORT */
    /* MATCHES DEBUGGING AND BREAKPOINT SIZING */
    /********************************************************/
    function viewportWidth() {
        let e = window,
            a = 'inner';
        if(!('innerWidth' in window)) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        return e[a + 'Width'];
    }


    /********************************************************/
    /* STICKY HEADER MENU */
    /* FIX HEADER MENU TO TOP ON SCROLL */
    /********************************************************/
    function stickyMenu() {
        let scrollPosition = $(document).scrollTop();
        let changePos = 50;

        if(scrollPosition > changePos) {
            $("header").addClass("fixed-menu");
            $("body").addClass("fixed-menu");
        }
        else {
            if($('html').css('position') != 'fixed') {
                $("header").removeClass("fixed-menu");
                $("body").removeClass("fixed-menu");
            }
        }
    }

    // check on scroll
    var lastScrollTop = 0;
    $(window).scroll(function() {
        var vpWidth = viewportWidth();
        stickyMenu();
    });

    // check on initial page load
    var vpWidth = viewportWidth();
    stickyMenu();


    /********************************************************/
    /* BODY LOCK */
    /********************************************************/
    function bodyLock() {
        var scrollPosition = [
            self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
            self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
        ];
        var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
        html.data('scroll-position', scrollPosition);
        html.data('previous-overflow', html.css('overflow'));
        html.css('overflow', 'hidden');
        html.css('height', '100vh');
        window.scrollTo(scrollPosition[0], scrollPosition[1]);
    }

    function bodyUnLock() {
        var scrollPosition = [
            self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
            self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
        ];
        // un-lock scroll position
        var html = jQuery('html');
        var scrollPosition = html.data('scroll-position');
        html.css('overflow', html.data('previous-overflow'));
        html.css('height', 'auto');
        window.scrollTo(scrollPosition[0], scrollPosition[1]);
    }


    /********************************************************/
    /* MAIN MENU - DESKTOP */
    /* SHOW DROPDOWN ON CLICK */
    /********************************************************/
    if($("header .menu-main-menu > li.menu-item-has-children, header .menu-utility-menu > li.menu-item-has-children")) {

        $("header .menu-main-menu > li.menu-item-has-children > a, header .menu-utility-menu > li.menu-item-has-children > a").click(function(e) {
            e.preventDefault();
            let that = $(this);

            $("header .menu-main-menu > li.menu-item-has-children > a, header .menu-utility-menu > li.menu-item-has-children > a").each(function() {
                if($(this)[0] != e.target) {
                    $(this).removeClass("active");
                    $(this).closest("li").children("ul").removeClass("active");
                }
                else {
                    that.toggleClass("active");
                    that.closest("li").children("ul").toggleClass("active");
                }
            })
        });

        // main menu - click outside close
        $('body').click(function(evt) {
            if($(evt.target).closest('.menu-main-menu').length) { return; }
            $("header .menu-main-menu > li.menu-item-has-children > a").each(function() {
                $(this).closest("li").children("ul").removeClass("active");
                $(this).removeClass("active");
            });
        });

        $(document).on("mouseleave", "header .menu-main-menu > li.menu-item-has-children > ul", function(e) {
            let $this = $(this);
            let top = $this.offset().top;

            // main menu - close menu if mouseleave out of the bottom
            if(e.pageY >= top) {
                $("header .menu-main-menu > li.menu-item-has-children > a").each(function() {
                    $(this).closest("li").children("ul").removeClass("active");
                    $(this).removeClass("active");
                });
            }
        });

        // utility menu - click outside close
        $('body').click(function(evt) {
            if($(evt.target).closest('.menu-utility-menu').length) { return; }
            $("header .menu-utility-menu > li.menu-item-has-children > a").each(function() {
                $(this).closest("li").children("ul").removeClass("active");
                $(this).removeClass("active");
            });
        });

        $(document).on("mouseleave", "header .menu-utility-menu > li.menu-item-has-children > ul", function(e) {
            let $this = $(this);
            let top = $this.offset().top;

            // utility menu - close menu if mouseleave out of the bottom
            if(e.pageY >= top) {
                $("header .menu-utility-menu > li.menu-item-has-children > a").each(function() {
                    $(this).closest("li").children("ul").removeClass("active");
                    $(this).removeClass("active");
                });
            }
        });
    }


    /********************************************************/
    /* MAIN MENU - MOBILE */
    /* HAMBURGER */
    /********************************************************/
    if($("#hamburger").length) {

        $("#hamburger").click(function() {
            $(this).toggleClass("active");
            $("#mobile-menu").toggleClass("active");
            $("body").toggleClass("mobile-menu-open");
        });
    }


    /********************************************************/
    /* MOBILE MENU */
    /* SHOW DROPDOWN ON CLICK */
    /********************************************************/
    if($("#mobile-menu .menu-mobile-menu > li.menu-item-has-children")) {

        $("#mobile-menu .menu-mobile-menu > li.menu-item-has-children > a").click(function(e) {
            e.preventDefault();
            let that = $(this);

            $("#mobile-menu .menu-mobile-menu > li.menu-item-has-children > a").each(function() {
                if($(this)[0] != e.target) {
                    $(this).closest("li").children("ul").hide();
                    $(this).closest("li").removeClass("active");
                }
                else {
                    that.closest("li").children("ul").toggle();
                    that.closest("li").toggleClass("active");
                }
            })
        });
        $("#mobile-menu .menu-mobile-menu > li.menu-item-has-children > a").append("<div class='dropdown-caret'></div>");
    }


    /********************************************************/
    /* ANNOUNCEMENT BAR */
    /********************************************************/
    if($("#top-announcement-bar").length) {
        function showAnnouncementBar() {
            $("#top-announcement-bar").addClass("visible");
        }

        function closeAnnouncementBar() {
            $("#top-announcement-bar").hide();
            $("body").removeClass("has-announcement-bar");
            if($("nav.utility-menu").length) {
                $("header").css({
                    "top": "0px"
                });
                let barHeight = $("nav.utility-menu").outerHeight();
                $("#mobile-menu-hamburger").css({
                    "top": `${barHeight}px`
                });
            }
            else {
                $("header, #mobile-menu-hamburger").css({
                    "top": `${barHeight}px`
                });
            }
        }

        function AnnouncementBarSetHeight() {
            let barHeight = 0;
            if($("body").hasClass("has-announcement-bar")) {
                barHeight = $("#top-announcement-bar").outerHeight();
            }
            if($("nav.utility-menu").length) {
                $("header").css({
                    "top": `${barHeight}px`
                });
                barHeight = barHeight + $("nav.utility-menu").outerHeight();
                $("#mobile-menu-hamburger").css({
                    "top": `${barHeight}px`
                });
            }
            else {
                $("header, #mobile-menu-hamburger").css({
                    "top": `${barHeight}px`
                });
            }
        }

        $("#top-announcement-bar .close-announcement-bar").click(function() {
            closeAnnouncementBar();
        });

        if($("body.has-announcement-bar").length && $("#top-announcement-bar").length) {
            showAnnouncementBar();
        }

        AnnouncementBarSetHeight();
        $(window).resize(function() {
            if($("#top-announcement-bar").hasClass("visible")) {
                AnnouncementBarSetHeight();
            }
        });
    }


});
