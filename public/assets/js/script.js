/*! -----------------------------------------------------------------------------------

    Template Name: Cuba Admin
    Template URI: http://admin.pixelstrap.com/cuba/template
    Description: This is Admin theme
    Author: Pixelstrap
    Author URI: https://themeforest.net/user/pixelstrap

-----------------------------------------------------------------------------------

        01. Password show hide
        02. Background Image js
        03. sidebar filter
        04. Language js
        05. Translate js

 --------------------------------------------------------------------------------- */

(function ($) {
    "use strict";

    $(document).on("click", function (e) {
        var outside_space = $(".outside");
        if (
            !outside_space.is(e.target) &&
            outside_space.has(e.target).length === 0
        ) {
            $(".menu-to-be-close").removeClass("block");
            $(".menu-to-be-close").css("display", "none");
        }
    });

    if ($("#pageWrapper").hasClass("horizontal-wrapper")) {
        console.log("hover is active");

        $(".sidebar-list").hover(
            function () {
                $(this).addClass("hoverd");
            },
            function () {
                $(this).removeClass("hoverd");
            }
        );
        $(window).on("scroll", function () {
            if ($(this).scrollTop() < 600) {
                $(".sidebar-list").removeClass("hoverd");
            }
        });
    }

    /*=====================
      02. Background Image js
      ==========================*/
    $(".bg-center").parent().addClass("b-center");
    $(".bg-img-cover").parent().addClass("bg-size");
    $(".bg-img-cover").each(function () {
        var el = $(this),
            src = el.attr("src"),
            parent = el.parent();
        parent.css({
            "background-image": "url(" + src + ")",
            "background-size": "cover",
            "background-position": "center",
            display: "block",
        });
        el.hide();
    });

    $(".mega-menu-container").css("display", "none");
    $(".header-search").click(function () {
        $(".search-full").addClass("open");
    });
    $(".close-search").click(function () {
        $(".search-full").removeClass("open");
        $("body").removeClass("offcanvas");
    });
    $(".mobile-toggle").click(function () {
        $(".nav-menus").toggleClass("open");
    });
    $(".mobile-toggle-left").click(function () {
        $(".left-header").toggleClass("open");
    });
    $(".bookmark-search").click(function () {
        $(".form-control-search").toggleClass("open");
    });
    $(".filter-toggle").click(function () {
        $(".product-sidebar").toggleClass("open");
    });
    $(".toggle-data").click(function () {
        $(".product-wrapper").toggleClass("sidebaron");
    });
    $(".form-control-search input").keyup(function (e) {
        if (e.target.value) {
            $(".page-wrapper").addClass("offcanvas-bookmark");
        } else {
            $(".page-wrapper").removeClass("offcanvas-bookmark");
        }
    });
    $(".search-full input").keyup(function (e) {
        console.log(e.target.value);
        if (e.target.value) {
            $("body").addClass("offcanvas");
        } else {
            $("body").removeClass("offcanvas");
        }
    });

    $("body").keydown(function (e) {
        if (e.keyCode == 27) {
            $(".search-full input").val("");
            $(".form-control-search input").val("");
            $(".page-wrapper").removeClass("offcanvas-bookmark");
            $(".search-full").removeClass("open");
            $(".search-form .form-control-search").removeClass("open");
            $("body").removeClass("offcanvas");
        }
    });
    $(".mode").on("click", function () {
        const bodyModeDark = $("body").hasClass("dark-only");

        if (!bodyModeDark) {
            $(".mode").addClass("active");
            localStorage.setItem("mode-cuba", "dark-only");
            $("body").addClass("dark-only");
            $("body").removeClass("light");
        }
        if (bodyModeDark) {
            $(".mode").removeClass("active");
            localStorage.setItem("mode-cuba", "light");
            $("body").removeClass("dark-only");
            $("body").addClass("light");
        }
    });
    $("body").addClass(
        localStorage.getItem("mode-cuba")
            ? localStorage.getItem("mode-cuba")
            : "light"
    );
    $(".mode").addClass(
        localStorage.getItem("mode-cuba") === "dark-only" ? "active" : " "
    );

    // sidebar filter
    $(".md-sidebar .md-sidebar-toggle ").on("click", function (e) {
        $(".md-sidebar .md-sidebar-aside ").toggleClass("open");
    });

    $(".loader-wrapper").fadeOut("slow", function () {
        $(this).remove();
    });

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 600) {
            $(".tap-top").fadeIn();
        } else {
            $(".tap-top").fadeOut();
        }
    });

    $(".tap-top").click(function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            600
        );
        return false;
    });

    // active link
    $(".chat-menu-icons .toogle-bar").click(function () {
        $(".chat-menu").toggleClass("show");
    });

    $(".mobile-title svg").click(function () {
        $(".header-mega").toggleClass("block");
    });

    $(".onhover-dropdown").on("click", function () {
        $(this).children(".onhover-show-div").toggleClass("active");
    });

    $("#flip-btn").click(function () {
        $(".flip-card-inner").addClass("flipped");
    });

    $("#flip-back").click(function () {
        $(".flip-card-inner").removeClass("flipped");
    });
})(jQuery);
/*=====================
    Tabs Js
==========================*/
const tabs = document.querySelectorAll(".tabs");
tabs?.forEach((tab) => {
    tab.addEventListener("click", function (event) {
        const navLink = event.target.closest(".tab-link");
        if (!navLink) return;
        const allNavLinks = navLink
            .closest(".tab-links")
            ?.querySelectorAll(".tab-link");
        console.log(allNavLinks);
        allNavLinks.forEach((navLink) => {
            navLink.classList.remove("active");
        });
        navLink.classList.add("active");
        const currentTabContent = navLink.dataset.tabfilter;
        const tabContents = navLink
            .closest(".tabs")
            .parentElement.querySelectorAll(".tab-pan");
        tabContents.forEach((tabContent) => {
            tabContent.classList.remove("active");
            setTimeout(() => {
                tabContent.classList.remove("show");
            }, 400);
            tabContent.classList.remove("show");
            if (tabContent.dataset.tabcontent === currentTabContent) {
                tabContent.classList.add("active");
                setTimeout(() => {
                    tabContent.classList.add("show");
                }, 400);
            }
        });
    });
});
/*=====================
    dropdown Js
==========================*/
document.addEventListener("click", function (event) {
    const dropdown = event.target.closest(".dropdown, .btn-group");
    const allMenus = document.querySelectorAll(".dropdown-menu");
    if (!dropdown) {
        allMenus.forEach((menu) => {
            menu.classList.remove("show");
        });
    } else {
        const menu = dropdown.querySelector(".dropdown-menu");
        if (menu.classList.contains("show")) {
            menu.classList.remove("show");
        } else {
            allMenus.forEach((otherMenu) => {
                otherMenu.classList.remove("show");
            });
            if (menu) {
                menu.classList.add("show");
            }
        }
    }
});

/*=====================
    offcanvas Js
==========================*/
document.querySelectorAll('[data-bs-toggle="offcanvas"]').forEach((trigger) => {
    trigger.addEventListener("click", function (event) {
        event.preventDefault();
        const targetId =
            this.getAttribute("data-bs-target") || this.getAttribute("href");
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
            const isShown = targetElement.classList.toggle("show");
            let backdrop = targetElement.nextElementSibling;
            if (isShown) {
                if (
                    !backdrop ||
                    !backdrop.classList.contains("offcanvas-backdrop")
                ) {
                    backdrop = document.createElement("div");
                    backdrop.className = "offcanvas-backdrop";
                    targetElement.insertAdjacentElement("afterend", backdrop);
                }
            } else {
                if (
                    backdrop &&
                    backdrop.classList.contains("offcanvas-backdrop")
                ) {
                    backdrop.remove();
                }
            }
            const closeButton = targetElement.querySelector(
                ".offcanvas-header .btn-close"
            );
            if (closeButton) {
                closeButton.addEventListener("click", () => {
                    targetElement.classList.remove("show");
                    if (
                        backdrop &&
                        backdrop.classList.contains("offcanvas-backdrop")
                    ) {
                        backdrop.remove();
                    }
                });
            }
        }
    });
});

/*=====================
    selectpicker js
==========================*/
$(document).ready(function () {
    $(".selectpicker").each(function () {
        let $select = $(this);
        let $dropdown = $("<div class='custom-dropdown'></div>").insertAfter(
            $select
        );
        let $button = $(
            "<button type='button' class='dropdown-toggle'>" +
                $select.find("option:selected").text() +
                "</button>"
        ).appendTo($dropdown);
        let $menu = $("<div class='dropdown-menu'></div>").appendTo($dropdown);
        let $searchBox = $(
            "<input type='text' class='dropdown-search' placeholder='Search...'>"
        ).appendTo($menu);
        let $list = $("<ul class='dropdown-list'></ul>").appendTo($menu);

        $select.find("option").each(function () {
            let $item = $(
                "<li class='dropdown-item' data-value='" +
                    $(this).val() +
                    "'>" +
                    $(this).text() +
                    "</li>"
            );
            $list.append($item);
        });

        $button.on("click", function (e) {
            e.preventDefault(); // Prevents page refresh
            $menu.toggle();
        });

        $searchBox.on("keyup", function () {
            let searchText = $(this).val().toLowerCase();
            $list.children().each(function () {
                $(this).toggle(
                    $(this).text().toLowerCase().includes(searchText)
                );
            });
        });

        $list.on("click", ".dropdown-item", function (e) {
            e.preventDefault(); // Prevents page refresh
            let selectedText = $(this).text();
            $button.text(selectedText);
            $select.val($(this).data("value")).trigger("change");
            $menu.hide();
        });

        $(document).on("click", function (e) {
            if (!$(e.target).closest(".custom-dropdown").length) {
                $menu.hide();
            }
        });

        $select.hide();
    });
});
