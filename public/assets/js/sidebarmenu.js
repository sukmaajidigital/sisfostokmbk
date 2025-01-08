$(function () {
    "use strict";

    // Get the current URL and extract the base path
    var currentUrl = window.location.href.split("?")[0]; // URL without query string
    var baseUrl = window.location.origin;

    // Match sidebar links to the current URL (including query strings)
    var element = $("ul#sidebarnav a").filter(function () {
        var linkUrl = this.href.split("?")[0]; // Compare without query strings
        return (
            linkUrl.startsWith(baseUrl) && currentUrl === linkUrl // Ensure base path matches
        );
    });

    // Activate the matched elements and their parent items
    element.parentsUntil(".sidebar-nav").each(function () {
        if ($(this).is("li") && $(this).children("a").length !== 0) {
            $(this).children("a").addClass("active");
            $(this).parent("ul#sidebarnav").length === 0
                ? $(this).addClass("active")
                : $(this).addClass("selected");
        } else if (!$(this).is("ul") && $(this).children("a").length === 0) {
            $(this).addClass("selected");
        } else if ($(this).is("ul")) {
            $(this).addClass("in");
        }
    });

    element.addClass("active");

    // Handle click events for toggling
    $("#sidebarnav a").on("click", function (e) {
        if (!$(this).hasClass("active")) {
            $("ul", $(this).parents("ul:first")).removeClass("in");
            $("a", $(this).parents("ul:first")).removeClass("active");

            $(this).next("ul").addClass("in");
            $(this).addClass("active");
        } else if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).parents("ul:first").removeClass("active");
            $(this).next("ul").removeClass("in");
        }
    });

    // Prevent default behavior for items with sub-menus
    $("#sidebarnav > li > a.has-arrow").on("click", function (e) {
        e.preventDefault();
    });
});
