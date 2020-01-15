<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <div><img class="logo" src="/images/img/logo/logo.png"></div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/" >Pradžia</a> <!-- pakeisti route -->
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button class="dropbtn">Prekės</button>
                                    <div class="dropdown-content">
                                        <a href="/sunys">Šunims</a>
                                        <a href="/kates">Katėms</a>
                                        <a href="/peles">Graužikams</a>
                                        <a href="/zuvys">Žuvims</a>
                                        <a href="/ropliai">Ropliams</a>
                                        <a href="/pauksciai">Paukščiams</a>
                                    </div>
                                </div>
                                <!--<a class="nav-link"  href="{{ route('login') }}">{{ __('Prekės') }}</a>  pakeisti route -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/skelbimai" >Skelbimų lenta</a> <!-- pakeisti route -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/pagalba">Pagalba</a> <!-- pakeisti route -->
                            </li>
                        @auth()
                            @if(Auth::user()->admin == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::route('blogConfirm')}}">Tvirtinimas</a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Prisijungti</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registruotis</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{route('krepselis.index')}}">
                                        Krepšelis
                                    </a>

                                    <a class="dropdown-item" href="{{route('patike.index')}}">
                                        Patikę
                                    </a>

                                    <a class="dropdown-item" href="/nustatymai">
                                        Nustatymai
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('atsijungti') }}
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
            <div class ="topatitraukimasnav">
                @include('inc.messages')
            </div>
            @yield('content')
        </main>
    </div>
    <footer class="rudasfonas">
        <div class="aligncenter">

                <div style="font-size: 20px;"> Kontaktai: </div>
                Susisiekite su mumis! <br>
                ZOOforYou@gmail.com <br>
                Tel: 868686868
        </div>
    </footer>
</body>
</html>
