
var $ = require("jquery");


$(document).ready(function() {
    $(".btn-toggle").on("click", function() {
            var currentPopup = $(this).data("toggle");
            $(currentPopup).toggleClass("popup-visible"), $("body").toggleClass("noscroll"), $(".master-close").show()
        }),

        $(".btn-close, .btn-toggle-close").on("click", function() {
            $(".popup").removeClass("popup-visible"), $("body").removeClass("noscroll"), $(".master-close").hide()
        }),

        function($) {
            "use strict";
            $("a[href^='#']").on("click", function(s) {
                s.preventDefault();
                var o = this.hash;
                $("html, body").animate({
                    scrollTop: $(this.hash).offset().top + 0
                }, 50, function() {})
            })
        }
});
