<?php
     $setting = DB::table('web_settings')->first();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../">
    <title>{{ $setting->app_name ?? '' }} - Login</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('back/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <style>
        button.btn.btn-lg.btn-primary.w-100.mb-5 {
            padding: 13px 3px !important;
            font-size: 14px !important;
        }
        .form-control.form-control-solid {
            background-color: #eef3f7;
            border-radius: 2px;
            border-color: #dddedf;
            color: #5e6278;
            transition: color .2s ease,background-color .2s ease;
        }
        .preloader
        {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('back/images/ajax_loader.gif') 50% 50% no-repeat rgb(249,249,249);
            opacity: .9;
        }
    </style>
    <script>
        $(window).load(function()
        {
          $("#preloaders").fadeOut(2000);
        });
    </script>
</head>

<body id="kt_body" class="bg-body">
    <div id="preloaders" class="preloader"></div>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                <div class="w-lg-500px bg-body rounded border shadow-sm p-10 p-lg-15 mx-auto">
                    <div class="mb-5 text-center">
                        <img style="width:180px;" alt="Logo" src="{{ asset($setting->logo) }}" />
                    </div>
                    <form class="form w-100" method="POST" action="{{ route('login') }}" style="padding-top:30px;">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Sign In to {{ $setting->app_name ?? '' }}</h1>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" id="email" autocomplete="off" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            </div>
                            <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" id="password" name="password" autocomplete="off" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">LogIn</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        @if (Route::has('password.request'))
                         <a class="link-primary fs-6 fw-bolder d-block text-center" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                        </a>
                        @endif
                        <div class="text-center mt-5">
                            <p>
                                <b>@lang('web.signin_text')</b>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('back/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('back/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('back/js/custom/authentication/sign-in/general.js') }}"></script>
</body>

</html>
