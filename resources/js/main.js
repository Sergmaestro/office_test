$.fn.isInViewport = function() {
    if (!$(this).length) return false;

    let elementTop = $(this).offset().top;
    let elementBottom = elementTop + $(this).outerHeight();
    let viewportTop = $(window).scrollTop();
    let viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom // in viewport
};

$("body").tooltip({ selector: '.et-country-flag-placeholder', delay: 1000 });
