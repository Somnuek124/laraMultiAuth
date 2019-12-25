<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HOME</title>
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
<!-- Pignose Calender -->
<link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
<!-- Chartist -->
<link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
<link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
<!-- Custom Stylesheet -->
<link href="css/style.css" rel="stylesheet">

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
                        <a href="{{ url('/index') }}">Home</a>
                    @else
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGrid" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegist" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        <div class="content">
            <div class="title m-b-md">
                @if(\Session::has('success'))
                <div class="alert alert-success">
                 <p>{{\Session::get('success') }}</p>
                </div>
                @endif
                Welcome To My Laravel
            </div>

                <!-- Modal -->
                <div class="modal fade" id="modalGrid">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Login</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="basic-form">
                                
                                                            <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('login') }}" >
                                                                @csrf
                                        
                                                                <div class="form-group row">
                                                                    <label for="email" class="col-sm-6 col-form-label">{{ __('E-Mail Address') }}</label>
                                        
                                                                    <div class="col-md-9">
                                                                        <input id="email" type="email" class="form-control input-default @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                                        
                                                                        @error('email')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                        
                                                                <div class="form-group row">
                                                                    <label for="password" class="col-sm-6 col-form-label">{{ __('Password') }}</label>
                                        
                                                                    <div class="col-md-9">
                                                                        <input id="password" type="password" class="form-control input-default @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                        
                                                                        @error('password')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                        
                                                                <div class="form-group">
                                                                    <div class="col-sm-9">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        
                                                                            <label class="form-check-label" for="remember">
                                                                                {{ __('Remember Me') }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                        
                                                                <div class="form-group">
                                                                    <div class="col-sm-9">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            {{ __('Login') }}
                                                                        </button>
                                        
                                                                        @if (Route::has('password.request'))
                                                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                                {{ __('Forgot Your Password?') }}
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

            <!-- Modal -->
            <div class="modal fade" id="modalRegist">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Register</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="basic-form">
                                    <form class="mt-5 mb-5 login-input" method="POST" action="{{ url('create') }}" enctype="multipart/form-data">
                                        @csrf
                
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                
                                            <div class="col-md-8">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                
                                            <div class="col-md-8">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-8">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label text-md-right">Select Profile Image</label>
                                            <div class="col-md-8">
                                             <input type="file" name="images" />
                                            </div>
                                        </div>
                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn login-form__btn submit w-100">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        </div>  

           <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    </body>
</html>
