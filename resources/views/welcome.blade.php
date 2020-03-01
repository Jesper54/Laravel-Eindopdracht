<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Eternal Gaming</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .home_screen_bg {
                background-image: url("https://lh3.googleusercontent.com/--4u9hAmWd5U/V1AgA9lT5ZI/AAAAAAAAACE/GspvqVYKPSk/s1600/the_elder_scrolls_skyrim_bas_magician_dragon_fantasy_96134_1920x1080.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }

            .navbar_home {
                background-color: white;

                border-radius: 4px;
            }

            .navbar_home a{
                display: inline-block;
                height: 100%;
                padding: 7px 25px;
            }

            .navbar_home a:hover {
                background-color: #cccfd1;
                transition-duration: 300ms;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height home_screen_bg">
            @if (Route::has('login'))
                <div class="top-right links navbar_home">
                        <a class="nav-link categories" href="{{ url('/threads') }}">{{ __('Categories') }}</a>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" style="color:white; font-size:100px;">
                    Eternal Gaming
                </div>
            </div>
        </div>
    </body>
</html>
