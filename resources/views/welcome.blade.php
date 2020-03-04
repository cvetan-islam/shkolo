<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
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
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
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
                <div class="title m-b-md">
                    SHKOLO
                </div>

                <div class="links">
                    <a href="https://docs.google.com/document/d/1iHL4zVDZgp-iVwldMwsqk7ru1O_Lm1t5nWiLAxVfFUw">Go To - Task Description</a> <br/><br/>
                    SOME NOTES:
                    <ul>
                        <li>In real task I would ask some question and make some porposals:</li>
                        <li>Nothing is said about deleting/adding a button (so I guess there will always be 9 buttons on grid)</li>
                        <li>Nothing is said if the hyperlink exist - how you go on edit/delete configuration (I suggest right mouse button - but it won't work on tablets or phones)</li>
                        <li>Nothing is said if the title should be unique (I will make it unique)</li>
                    </ul>
                    <a href="{{url('dashboard')}}">Go To Implementation</a>

                </div>
            </div>
        </div>
    </body>
</html>
