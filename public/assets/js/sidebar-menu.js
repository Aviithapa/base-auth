(function ($) {
    $(".toggle-nav").click(function () {
        $("#sidebar-links .nav-menu").css("left", "0px");
    });
    $(".mobile-back").click(function () {
        $("#sidebar-links .nav-menu").css("left", "-410px");
    });
    $(".page-wrapper").attr(
        "class",
        "page-wrapper " + localStorage.getItem("page-wrapper-cuba")
    );
    if (localStorage.getItem("page-wrapper-cuba") === null) {
        $(".page-wrapper").addClass("compact-wrapper");
    }

    // left sidebar and vertical menu
    if ($("#pageWrapper").hasClass("compact-wrapper")) {
        jQuery(".sidebar-title").append(
            '<div class="according-menu"><i class="fa-solid fa-angle-right"></i></div>'
        );
        jQuery(".sidebar-submenu, .menu-content").hide();
        jQuery(".submenu-title").append(
            '<div class="according-menu"><i class="fa-solid fa-angle-right"></i></div>'
        );
        jQuery(".sidebar-submenu li .sidebar-submenu").hide();
    }

    // toggle sidebar
    $nav = $(".sidebar-wrapper");
    $header = $(".page-header");
    $toggle_nav_top = $(".toggle-sidebar");
    $toggle_nav_top.click(function () {
        $nav.toggleClass("close_icon");
        $header.toggleClass("close_icon");
        $(window).trigger("overlay");
    });

    $(window).on("overlay", function () {
        $bgOverlay = $(".bg-overlay");
        $isHidden = $nav.hasClass("close_icon");
        if (
            $(window).width() <= 1184 &&
            !$isHidden &&
            $bgOverlay.length === 0
        ) {
            $('<div class="bg-overlay active"></div>').appendTo($("body"));
        }

        if ($isHidden && $bgOverlay.length > 0) {
            $bgOverlay.remove();
        }
    });

    $(".sidebar-wrapper .back-btn").on("click", function (e) {
        $(".page-header").toggleClass("close_icon");
        $(".sidebar-wrapper").toggleClass("close_icon");
        $(window).trigger("overlay");
    });

    $("body").on("click", ".bg-overlay", function () {
        $header.addClass("close_icon");
        $nav.addClass("close_icon");
        $(this).remove();
    });

    $body_part_side = $(".body-part");
    $body_part_side.click(function () {
        $toggle_nav_top.attr("checked", false);
        $nav.addClass("close_icon");
        $header.addClass("close_icon");
    });

    //    responsive sidebar
    var $window = $(window);
    var widthwindow = $window.width();
    (function ($) {
        "use strict";
        if (widthwindow <= 1184) {
            $toggle_nav_top.attr("checked", false);
            $nav.addClass("close_icon");
            $header.addClass("close_icon");
        }
    })(jQuery);
    $(window).resize(function () {
        var widthwindaw = $window.width();
        if (widthwindaw <= 1184) {
            $toggle_nav_top.attr("checked", false);
            $nav.addClass("close_icon");
            $header.addClass("close_icon");
        } else {
            $toggle_nav_top.attr("checked", true);
            $nav.removeClass("close_icon");
            $header.removeClass("close_icon");
            // jQuery(".sidebar-submenu, .menu-content").hide();
        }
    });

    // horizontal arrows
    var view = $("#sidebar-menu");
    var move = "500px";
    var leftsideLimit = -500;

    var getMenuWrapperSize = function () {
        return $(".sidebar-wrapper").innerWidth();
    };
    var menuWrapperSize = getMenuWrapperSize();

    if (menuWrapperSize >= "1660") {
        var sliderLimit = -4680;
    } else if (menuWrapperSize >= "1440") {
        var sliderLimit = -5500;
    } else {
        var sliderLimit = -5600;
    }

    $("#left-arrow").addClass("disabled");
    $("#right-arrow").click(function () {
        var currentPosition = parseInt(view.css("marginLeft"));
        if (currentPosition >= sliderLimit) {
            $("#left-arrow").removeClass("disabled");
            view.stop(false, true).animate(
                {
                    marginLeft: "-=" + move,
                },
                {
                    duration: 400,
                    // complete: function () {
                    //   if (parseInt(view.css("marginLeft")) == -4500) {
                    //     $("#right-arrow").addClass("disabled");
                    //   }
                    // },
                }
            );
            if (currentPosition == sliderLimit) {
                $(this).addClass("disabled");
                console.log("sliderLimit", sliderLimit);
            }
        }
    });

    $("#left-arrow").click(function () {
        var currentPosition = parseInt(view.css("marginLeft"));
        if (currentPosition < 0) {
            view.stop(false, true).animate(
                {
                    marginLeft: "+=" + move,
                },
                {
                    duration: 400,
                }
            );
            $("#right-arrow").removeClass("disabled");
            $("#left-arrow").removeClass("disabled");
            if (currentPosition >= leftsideLimit) {
                $(this).addClass("disabled");
            }
        }
    });

    // page active

    $(".left-header .mega-menu .nav-link").on("click", function (event) {
        event.stopPropagation();
        $(this).parent().children(".mega-menu-container").toggleClass("show");
    });

    $(".left-header .level-menu .nav-link").on("click", function (event) {
        event.stopPropagation();
        $(this).parent().children(".header-level-menu").toggleClass("show");
    });

    $(document).click(function () {
        $(".mega-menu-container").removeClass("show");
        $(".header-level-menu").removeClass("show");
    });

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            $(".mega-menu-container").removeClass("show");
            $(".header-level-menu").removeClass("show");
        }
    });

    $(".left-header .level-menu .nav-link").click(function () {
        if ($(".mega-menu-container").hasClass("show")) {
            $(".mega-menu-container").removeClass("show");
        }
    });

    $(".left-header .mega-menu .nav-link").click(function () {
        if ($(".header-level-menu").hasClass("show")) {
            $(".header-level-menu").removeClass("show");
        }
    });

    $(document).ready(function () {
        $(".outside").click(function () {
            $(this).find(".menu-to-be-close").slideToggle("fast");
        });
    });
    $(document).on("click", function (event) {
        var $trigger = $(".outside");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $(".menu-to-be-close").slideUp("fast");
        }
    });

    $(".left-header .link-section > div").on("click", function (e) {
        if ($(window).width() <= 1199) {
            $(".left-header .link-section > div").removeClass("active");
            $(this).toggleClass("active");
            $(this)
                .parent()
                .children("ul")
                .toggleClass("d-block")
                .slideToggle();
        }
    });

    if ($(window).width() <= 1199) {
        $(".left-header .link-section").children("ul").css("display", "none");
        $(this).parent().children("ul").toggleClass("d-block").slideToggle();
    }

    // active link
    if (
        $(".simplebar-wrapper .simplebar-content-wrapper") &&
        $("#pageWrapper").hasClass("compact-wrapper")
    ) {
        $(".simplebar-wrapper .simplebar-content-wrapper").animate(
            {
                scrollTop:
                    $(
                        ".simplebar-wrapper .simplebar-content-wrapper a.active"
                    ).offset().top - 400,
            },
            1000
        );
    }
})(jQuery);
