<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.rawgit.com/scottjehl/picturefill/3.0.2/dist/picturefill.min.js"></script>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400|Open+Sans:300,400|Oswald:200,300,400|Roboto:100,300,400|Vollkorn" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="/css/backend.css">

    </head>
    <style>
        body {
            background: #fff;
        }
    </style>
    @auth
        
    <body class="container-fluid">
        <main id="admin-cpanel" >
            <div class="row">
                <aside class="col-2 col-md-2  admin-sidebar lf-black-bg ">
                        <div id="nav-top" class="mt-3 mb-5">
                            <div id="profile-img-container">
                                <img id="profile-img" src="" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <div id="profile-username" class="d-none d-md-block">
                            </div>
                        </div>
                        <script type="text/javascript">
                            const profileImageElement = document.getElementById('profile-img');
                            const profileUsernameElement = document.getElementById('profile-username');

                            function getUserData(method, url, body) {
                                // Creating an instance of XMLHttpRequest
                                let xhttp = new XMLHttpRequest();
                                // Configuring Request
                                xhttp.open(method, url, false);
                                //Sending request over network
                                xhttp.send(body);
                                // This will be called after response is received
                                if (xhttp.status !== 200) {
                                
                                } else {
                                    // Parsing response
                                    const res = JSON.parse(xhttp.responseText);
                                    updatingUserDomElements(res);
                                }
                            }


                            function updatingUserDomElements(data) {
                                if (data) {
                                    profileUsernameElement.innerHTML = data.fname + ' ' + data.lname;
                                    if (!data.profile_image) {
                                    profileImageElement.src = '/imgs/logo.png' 
                                    } else {
                                        profileImageElement.src = '/storage/' + data.profile_image;
                                    }
                                }
       
                            }

                            getUserData('GET', '/api/user', null)
    


                        </script>

                        <nav class="d-flex justify-content-center">
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link" href="{{route('Profile')}}"><i class="d-md-none fas fa-user-edit fa-2x"></i><i class="d-none d-md-inline-block fas fa-user-edit"></i> <span class="d-none d-md-inline-block">Profile</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('Blog')}}"><i class="d-md-none fas fa-edit fa-2x"></i><i class="d-none d-md-inline-block fas fa-edit"></i> <span class="d-none d-md-inline-block">Blog</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('Portfolio')}}"><i class="d-md-none fas fa-folder-plus fa-2x"></i><i class="d-none d-md-inline-block fas fa-folder-plus"></i> <span class="d-none d-md-inline-block">Portfolio</span></a></li>
                               <!-- Display if user has the necessary role -->
                                @if (Auth::user()->hasRole('admin'))
                                     <li class="nav-item"><a class="nav-link" href="{{route('Users')}}"><i class="fas fa-users"></i> <span class="d-none d-md-inline-block">Users</span></a></li>
                                @endif

                                <li class="nav-item" class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><i class="d-md-none fas fa-sign-out-alt fa-2x"></i><i class="d-none d-md-inline-block fas fa-sign-out-alt"></i>
                                                    <span class="d-none d-md-inline-block">{{ __(' Logout') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                         </nav>
                </aside>
   

                <section class="col-10 col-md-10 content">
                    
        @else   
                <div class="d-flex justify-content-center align-items-center lf-black-bg" style="height: 100vh">
    @endauth
                    @yield('content')
                </section>
             </div>
        </main>
    </body>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    @if (Request::is('admin/profile') || Request::is('admin/portfolio/*') || Request::is('admin/blog/*') || Request::is('admin/users/*'))
        <!-- CKEDITOR SCRIPT -->
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script text="type/javascript">
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
        <script defer type="text/javascript" src="/js/croppieFunctionality.js"></script>
    @endif


    @if (Request::is('admin/blog/*'))
        <script type="text/javascript">
            $('input[name="title"]').keyup( function() {
                $('input[name="slug"]').val($(this).val().replace(/ /g,"_").replace(/[$-/:-?{-~!"^`\[\]]/g, '').toLowerCase());
            })
        </script>
    @endif
    

</html>