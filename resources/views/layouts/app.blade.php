<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    @yield('styles')
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="#">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">

            <div class="container">
                <div class="row">
                @if(Auth::check()) 
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('users') }}">User</a>
                            </li>
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('user.create') }}">Add User</a>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('profile') }}">Profile</a>
                            </li>
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('category.create') }}">New Category</a>
                            </li>
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('categories') }}">Category List</a>
                            </li>
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('tag.create') }}">New Tag</a>
                            </li> 
                            <li class="list-group-item">
                                    <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('tags') }}">Tags List</a>
                                </li> 
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('post.create') }}">New Post</a>
                            </li>    
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('posts') }}">Post List</a>
                            </li> 
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('post.trashed') }}">Trashed Post List</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a style="text-align:left; padding-left:6px" class="btn btn-light btn-block" href="{{ route('settings') }}">Site Settings</a>
                            </li> 
                            @endif     
                        </ul>
                    </div>
                @endif
                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                </div>
            </div>
            
        </main>
    </div>
    
       
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script> 

    @yield('scripts')
    
</body>
</html>
