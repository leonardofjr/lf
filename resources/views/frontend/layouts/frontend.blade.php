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
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500&display=swap" rel="stylesheet">
        
        <!-- Font Awesome Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    </head>
    <body>
            <app id="app"></app>
    </body>
 

    <!-- Vue.js -->
    <script type="text/javascript" src="/js/app.js"></script>

</html>