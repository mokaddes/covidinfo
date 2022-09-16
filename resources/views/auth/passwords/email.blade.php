<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../">
    <title>TERAPEE - Login</title>
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
    </style>
</head>

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <?php
                $setting = DB::table('web_settings')->first();
                ?>
                <div class="w-lg-500px bg-body rounded shadow-sm border rounded p-10 p-lg-15 mx-auto">
                    <div class="mb-5 text-center">
                        <img style="width:180px;" alt="Logo" src="{{ asset($setting->logo) }}" />
                    </div>
                    <form class="form w-100 mt-5" method="POST" action="{{ route('password.email') }}" style="padding-top:30px;">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Reset Password</h1>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email Address') }}</label>
                             <input id="email" type="email" class="form-control form-control-solid form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                         <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">{{ __('Send Password Reset Link') }}</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
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
