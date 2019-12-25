<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="../../plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="../../plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../../plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="/index">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
                        </div>
                                        
                    
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                         <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul>
                        <!-- Authentication Links -->
                        @guest
                            <li class="icons dropdown">
                                <a data-toggle="modal" data-target="#modalGrid" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="icons dropdown">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="icons dropdown d-none d-md-flex">
                    {{-- --------------------------------------------------- --}}
                    @if(auth()->user()->is_admin == 1)
                    <h4>Admin</h4>&nbsp
                    @else
                    <h4>Normal User</h4>&nbsp
                    @endif
                    {{-- ---------------------------------------------------- --}}
                                <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                    <span class="activity active"></span>
                                    <img src="images/user/form-user.png" height="40" width="40" alt="">
                                </div>
                                <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                                                 {{ __('Logout') }}
                                             </a>
         
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                 @csrf
                                             </form></li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </li>
                        @endguest
                    </ul>
                </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @if(auth()->user()->is_admin == 1)
                    <div class="nk-sidebar">        
                        <div class="nk-nav-scroll">
                            <ul class="metismenu" id="menu">
                                <li class="nav-label">Dashboard AdminHome</li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="/index">Home 1</a></li>
                                        <li><a href="/create">create</a></li>
                                        <li><a href="/qrcode">QR Code</a></li>
                                        <li><a href="">Export file</a></li>
                                        <li><a href="/image">Upload Image</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
        @else
                    <div class="nk-sidebar">        
                        <div class="nk-nav-scroll">
                            <ul class="metismenu" id="menu">
                                <li class="nav-label">Dashboard UserHome</li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="/index">Home 1</a></li>
                                        <li><a href="">PDF</a></li>
                                        <li><a href="">QR Code</a></li>
                                        <li><a href="">Export file</a></li>
                                        <li><a href="/image">Upload Image</a></li>
                                    </ul>
                                </li>
            
                            </ul>
                        </div>
                    </div>
        @endif
        
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Somnuek Mueanprasan</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    
<!--**********************************
        Scripts
    ***********************************-->
    <script src="../../plugins/common/common.min.js"></script>
    <script src="../../js/custom.min.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/gleek.js"></script>
    <script src="../../js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="../../plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="../../plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="../../plugins/d3v3/index.js"></script>
    <script src="../../plugins/topojson/topojson.min.js"></script>
    <script src="../../plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="../../plugins/raphael/raphael.min.js"></script>
    <script src="../../plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="../../plugins/chartist/js/chartist.min.js"></script>
    <script src="../../plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <script src="../../js/dashboard/dashboard-1.js"></script>


</body>
</html>
