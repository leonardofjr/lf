/* 
Developer: Leo Felipa
Description: This script is written to slide in and slide out the navigation when the nav-toggler is clicked. The script will also slide in and slide out the #content. 
Website: lfelipa.com
*/ 

/*** Event Listeners ***/

// The following will be excuted when the window is resized.
$(window).resize(function(e) {
    // If the window.width is greater than 800 then the following if statement will be executed.
    if ($(window).width() > 800) {
        $('#content').addClass('frontend-lg');
    } else {
        $('#content').removeClass('frontend-lg');
    }
})

// This function will be excuted when the #nav-toggler is clicked.
$('.navbar-toggler').on('click', function() {
    // If the elements do not contain the .show class the below will be executed.
    if (!$('aside, #content').hasClass('show')) {
        slideInElements();
    } else {
        slideOutElements();
    }
})

// This function will be excuted when if #content or a link inside the aside tag is clicked.
$('#content, aside a').on('click', function() {
    // The following if statement will check if the aside tag contains the .show class.
    if ($('aside').hasClass('show') ) {
        slideOutElements();
    }
})

/*** Functions ***/
function slideOutElements() {
    // The following classes applied by the slideInElements() function will be removed.
    $('aside').removeClass('slide-in-navigation show');
    $('#content').removeClass('slide-in-content show');
    // The following function will be excuted
    slideOutNavigation();
    //The function bellow will only be called if #content contains the .frontend-lg class.
    if($('#content').hasClass('frontend-lg')) {
        slideOutContent();
    }
}

function slideInElements() {
    // The following classes applied by the slideOutElements() function will be removed.
    $('aside').removeClass('slide-in-navigation slide-out-navigation show');
    $('#content').removeClass('slide-in-content slide-out-content show');
    // The following function will be excuted
    slideInNavigation();
    //The function bellow will only be called if #content contains the .frontend-lg class.
    if($('#content').hasClass('frontend-lg')) {
        slideInContent();
    }
}

function slideOutNavigation() {
    // The following class that contains the animation in our stylesheet will be applied to the element.
    $('aside').addClass('slide-out-navigation');
}

function slideOutContent() {
    // The following class that contains the animation in our stylesheet will be applied to the element.
    $('#content').addClass('slide-out-content');
}

function slideInNavigation() {
    // The following class that contains the animation in our stylesheet will be applied to the element.
    $('aside').addClass('slide-in-navigation show');
}
function slideInContent() {
    // The following class that contains the animation in our stylesheet will be applied to the element.
    $('#content').addClass('slide-in-content show');
}

