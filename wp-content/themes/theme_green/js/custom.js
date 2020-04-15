
jQuery('.menu-link').click(function () {
    jQuery('.menu-link').removeClass('active');
    jQuery(this).addClass('active');
});

jQuery('#btn').click(function () {
    jQuery('.menu-section').addClass("active");
    jQuery('body').addClass("side-active");
    jQuery('.btn-close').addClass("active");
});

jQuery('.btn-close').click(function(){
    jQuery('.menu-section').removeClass("active");
    jQuery('body').removeClass("side-active");
    jQuery(this).removeClass('active');
});


var header_height = jQuery('header').outerHeight();    
var hashes = window.location.href.slice(window.location.href.indexOf('#'));
if (hashes.length > 1) {
    jQuery('html, body').animate({
        scrollTop: jQuery(hashes).offset().top - header_height
    }, 1000);
}
