var $ = require("jquery");



$(document).ready(function() {
    $('body').delegate('.twa-login-toggle, .btn-close, .cart-panel, .nav-bar-mobile, .cart-toggle, #currentlyAdded, .footer-newsletter, #menu-mobile', 'click', function(e) {
        toggleDropdown(e);
    });
    function toggleDropdown(e) {
        var currentElement = $(e.currentTarget);
        if (currentElement.hasClass('twa-login-toggle')) {
            currentElement.toggleClass('is-open');
            $('.twa-login-panel').toggleClass('is-open');
            $('.cart').removeClass('active');
            $('#currentlyAdded').css("display", "none");
            $('#menu-mobile').toggleClass('is-open');
        }
        if (currentElement.hasClass('cart-toggle')) {
            $('.cart-panel').toggleClass('is-open');
            $('.cart-toggle').toggleClass('is-open');
            $('.twa-login-panel').removeClass('is-open');
            $('.nav-bar-mobile').removeClass('is-open');
            $('#currentlyAdded').css("display", "none");
        }
        if (currentElement.hasClass('nav-bar-mobile')) {
            currentElement.toggleClass('is-open');
            $('.twa-login-panel').toggleClass('is-open');
            $('.cart').removeClass('active');
        }
        if (currentElement.hasClass('menu-mobile')) {
            currentElement.toggleClass('is-open');
            $('.twa-login-panel').toggleClass('is-open');
            $('.cart').removeClass('active');
        }
        if (currentElement.hasClass('footer-newsletter')) {
            currentElement.toggleClass('is-open');
            $('.footer-newsletter-panel').toggleClass('is-open');
        }

        if (currentElement.hasClass('btn-close')) {
            $('.twa-login-toggle').removeClass('is-open');
            $('#menu-desktop').removeClass('is-open');
            $('.cart-toggle').removeClass('is-open');
         }
    }
});
