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

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4122ab7bf4.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/keyup.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <!-- Boostrap 4 Styles -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</head>

<body>
    <div style="margin:2em;">
        <div class="row">
            <div class="col-md-12">
                <div class="data_wrapper">
                    <div class="row">
                        

                        @yield('title')

                        <div class="col-sm-6 text-left">
                                <address style="padding-top:10px">
                                    <p>Ahmad Syuib bin Hanafiah</p>
                                    Lot, 2812-18, <br>
                                    Lorong Changkat Permai <br>
                                    Batu 6 3/4 Gombak <br>
                                    53100, Kuala Lumpur <br>
                                    Selangor</p>
                                    <p>(+60) 11-3767 2021</p>
                                </address>
                            </div>
                            <div class="col-sm-6 text-right">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </div>


                    
                        @yield('receipt_content')

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
