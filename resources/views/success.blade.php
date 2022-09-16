<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- Javascript -->
    <script>
        $(function () {
            $("#datepicker-13").datepicker();
            // $( "#datepicker-13" ).datepicker("setDate", "10w+1");
        });
    </script>
    <title>Covidinfo</title>
</head>
<body style="background-color: #e7e8e9;">
<!-- header  -->
<div class="header navbar-light bg-light shadow-sm mb-5 bg-body sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img style="width:120px;" src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLang" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $langs[app()->getLocale()] ?? 'English' }}</a>
                            {{--<ul class="dropdown-menu" aria-labelledby="navbarDropdownLang">
                                    @if($langs)
                                        @foreach($langs as $ke => $lang )
                                            <li><a class="dropdown-item" href="{{ route('changelang',$ke) }}">{{ $lang }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>--}}
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/home') }}" class="nav-link">Home</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                    {{-- <li class="nav-item">
                                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                                    </li> --}}
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- main content -->
<div class="main-content mb-5">
    <div class="container">
        <div class="row d-flex justify-content-center">
             <div class="col-md-6 col-lg-5 col-xxl-4">
                 <div class="success_page">
                     <div class="card">
                         <div class="card-header text-center">
                            <i class="fa fa-check"></i>
                             <h4>Success</h4>
                         </div>
                         <div class="card-body">
                             <p>Congratulations your information successfully submitted.</p>
                             <div class="text-center">
                                 <button class="btn btn-success">Go your Dashboard</button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend/assets/js/select2.full.min.js') }}"></script>


</body>
</html>
