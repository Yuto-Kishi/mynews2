<!DOCTYPE html>
<html lang="{{ app()->getLocale()  }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible"content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name"csrf-token" content="{{csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{secure_asset('js/app.js') }}"  defer></script>
        
        <link rel="dns-prefetch" 
        href="http://fonts.googleapis.com/css?family=Railway:300,400,600" rel="stylesheet" type="text/css" />
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ asset('css/front.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navber-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{url('/')}}">
                        {{ config('app.name','laravel') }}
                    </a>
                    <buttom class="navbar-toggler" 
                    type="buttom" data-toggle="collapse" data-
                    target="#navberSupportedContent" aria-
                    controls="navberSupportedContent"aria-
                    expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </buttom>
                    <div class="collapse navbar-collapse" id="navberSupportedContent">
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav ml-auto">
                             @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
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
                
                @yield('content')
            </main>
        </div>
    </body>
</html>