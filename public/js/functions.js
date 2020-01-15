    $('.navbar-toggler').on('click', function() {
        if (!$('aside').hasClass('show') && !$('#content').hasClass('show')) {
            slideInElements();
        } else {
            slideOutElements();
        }
    })
       
    $('#content, aside a').on('click', function() {
        if ($('aside').hasClass('show') ) {
            slideOutElements();
        }
    })
    
  $(window).resize(function(e) {
    if ($(window).width() > 800) {
        $('#content').addClass('frontend-lg');
    } else {
        $('#content').removeClass('frontend-lg');
    }
  })
    
    function slideOutElements() {
        $('aside').removeClass('slide-in-navigation show');
        $('#content').removeClass('slide-in-content show');
        slideOutNavigation();
        if($('#content').hasClass('frontend-lg')) {
            slideOutContent();
        }
    }

    function slideInElements() {
        $('aside').removeClass('slide-in-navigation slide-out-navigation show');
        $('#content').removeClass('slide-in-content slide-out-content show');
        slideInNavigation();
        if($('#content').hasClass('frontend-lg')) {
            slideInContent();
        }
    }

    function slideOutNavigation() {
        $('aside').addClass('slide-out-navigation');
    }

    function slideOutContent() {
        $('#content').addClass('slide-out-content');
    }

    function slideInNavigation() {
        $('aside').addClass('slide-in-navigation show');
    }
    function slideInContent() {
        $('#content').addClass('slide-in-content show');
    }

