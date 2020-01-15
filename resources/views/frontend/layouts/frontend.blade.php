<!DOCTYPE HTML>
<html>
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial scale=1.0">

        <script src="https://cdn.rawgit.com/scottjehl/picturefill/3.0.2/dist/picturefill.min.js"></script>
        
        <!-- Page Title -->
        <title>@yield('title')</title>

        <!-- Google Font Stylesheet -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400|Open+Sans:300,400|Oswald:200,300,400|Roboto:100,300,400|Vollkorn" rel="stylesheet" type="text/css">
        
        <!-- Bootstrap Stylesheet -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- JQuery Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Popper Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/frontend.css">
        
        <!-- Font Awesome Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    </head>
    <body>



  
        <div id="app"">
            <app></app>
        </div>

    </body>

 

    <script src="/js/app.js"></script>


    <script>
        $('.sidebar-toggler').on('click', function() {
            if (!$('aside').hasClass('show') && !$('#frontend').hasClass('show')) {
                slideInElements();
            } else {
                slideOutElements();
            }
        })
           
        $('#frontend, aside a').on('click', function() {
            if ($('aside').hasClass('show') && $('#frontend').hasClass('show')) {
                slideOutElements();
            }
        })
        

        
        function slideOutElements() {
            $('aside').removeClass('slide-in-navigation show');
            $('#frontend').removeClass('slide-in-content show');
            slideOutNavigation();
            slideOutContent();
        }

        function slideInElements() {
            $('aside').removeClass('slide-in-navigation slide-out-navigation show');
            $('#frontend').removeClass('slide-in-content slide-out-content show');
            slideInNavigation();
            slideInContent();
        }

        function slideOutNavigation() {
            $('aside').addClass('slide-out-navigation');
        }

        function slideOutContent() {
            $('#frontend').addClass('slide-out-content');
        }

        function slideInNavigation() {
            $('aside').addClass('slide-in-navigation show');
        }
        function slideInContent() {
            $('#frontend').addClass('slide-in-content show');
        }

    </script>


</html>



