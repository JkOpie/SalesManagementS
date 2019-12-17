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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

     <!-- Chart js -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" type="text/javascript"></script>
    
   
    
   
</head>

<body>
    <div id="app">
        <div class="wrapper" id="wrapper">

            <div class="top_navbar">
                <div class="logo">
                    <a href="#">Market</a>
                </div>
                <div class="top_menu">
                    <div class="home_link">
                        <a href="/">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span>Home</span>
                        </a>
                    </div>
                    <div class="right_info">

                        <div class="icon_wrap">
                            
                                    @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>

                                   
                                    @endif
                                    @else
                                    <li class="nav-item">
                                        <a class="btn btn-link d-inline" style="font-size:25px;" href="/cart">
                                            <i class="fas fa-shopping-cart" style="color:#3421C0"></i>
                                        </a>
                                        <span class="badge badge-notify" style="font-size:10px;">{{$cart}}</span>
                                       
                                        
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#" role="button">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
        
                                    </li>
                                    @endguest

                                     </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main_body">
                <div class="sidebar_menu">
                    <div class="inner__sidebar_menu" id="myDIV">
                        <ul class="ul">
                            <li>
                                <a href="/home" class=" icon acon">
                                    <span class="icon ">
                                        <i class="fas fa-border-all"></i></span>
                                    <span class="list">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="/product" class=" icon acon">
                                    <span class="icon"><i class="fas fa-chart-pie"></i></span>
                                    <span class="list">Product</span> 
                                   
                                </a>
                            </li>
                            <li>
                                <a href="/stock" class=" icon acon">
                                    <span class="icon"><i class="fas fa-boxes"></i></i></span>
                                    <span class="list">Inventory</span> 
                                   
                                </a>
                            </li>
                            <li>
                                <a href="/cart" class=" icon acon">
                                    <span class="icon"><i class="fas fa-cart-arrow-down"></i></span>
                                    <span class="list">Cart</span> 
                                    
                                </a>
                            </li>

                            <li>
                                <a href="/invoice" class=" icon acon">
                                    <span class="icon"><i class="fas fa-share-alt"></i></span>
                                    <span class="list">Sales</span> 
                                    
                                </a>
                            </li>
                            <li>
                                <a class="list" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                                    <span class="list">{{ __('Logout') }}</span> 
                                    
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container_wrapper">
                    @yield('content')
                </div>
           
            </div>
        </div>


    </div>
   
</body>

@yield('bottom')

</html>
