<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Required meta tags -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, maximum-scale=1, user-scalable=0" />

        <link rel="icon" type="image/png"  href="{{ asset($websetting->favicon ?? 'no image') }}">
        <title>{{$websetting->app_name ?? 'covidinfo'}}</title>
        <meta name="description" content="{{$websetting->description ?? 'covid info, covid report, aefi, vaccine, etc'}}" />
        <meta name="keywords" content="{{$websetting->keywords ?? 'covid info, covid report, aefi, vaccine, etc'}}" />
        <meta name="robots" content="index,follow">
        <meta name="Developer" content="Md. Maidul Islam, Md. Rony" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2-bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
        <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
        <link rel="stylesheet" href=" {{ asset('css/notify.css') }}?v=1">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <!-- Javascript -->
        <script>
            $(function () {
                $("#datepicker-13").datepicker();
                // $( "#datepicker-13" ).datepicker("setDate", "10w+1");
            });
        </script>
        <style>


            .dropify-wrapper:hover {
                background: #efefef !important;
            }
            a {
                text-decoration: none;;
            }
            #verify_phone_number-error{display: none !important;}

            #loader {
                border: 12px solid #f3f3f3;
                border-radius: 50%;
                border-top: 12px solid #444444;
                width: 70px;
                height: 70px;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                100% {
                    transform: rotate(360deg);
                }
            }

            .center {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }

            @media screen and (max-width: 450px){
                .info_wrap h3{
                    font-size: 38px;
                }
                .info_wrap{
                    padding: 18px 7px;
                }
            }

            @media screen and (max-width: 320px){
                .info_wrap h3{
                    font-size: 25px;
                    padding-bottom: 4px;
                }

                .info_wrap span {
                    font-size: 13px;
                    line-height: 18px;
                    display: inline-block;
                }
            }

        </style>
         <input type="hidden" name="base_url" id="base_url" value="{{url('/')}}">
    </head>
    <body style="background-color: #e7e8e9;" >
        <div id="loader" class="center"></div>
        <?php
            $langs = \Config::get('static_array.lang');
        ?>
        <!-- header  -->
        <div class="header navbar-light bg-light shadow-sm mb-5 bg-body sticky-top">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img style="width:120px;" src="{{ asset($websetting->logo ?? 'no logo') }}" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLang" role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">{{ $langs[app()->getLocale()] ?? 'English' }}</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownLang">
                                        @if($langs)
                                            @foreach($langs as $ke => $lang )
                                                <li><a class="dropdown-item"
                                                    href="{{ route('changelang',$ke) }}">{{ $lang }}</a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                                @if (Auth::guest())
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link">@lang('web.login')</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="@if (Auth::user()->role == 1 || Auth::user()->role == 0) {{ route('admin.home') }} @elseif(Auth::user()->role == 2) {{ route('doctor.home') }} @else {{ route('patient.home') }} @endif" class="nav-link">@lang('web.home')</a>
                                    </li>
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
                <div class="row">
                    <div class="col-lg-4  order-lg-2">
                        <div class="site_info">
                            <div class="card mb-3">
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-6 col-lg-12">
                                            <div class="info_wrap text-center">
                                                <h3>{{ count($totalPatient) + 280 }}</h3>
                                                <span>@lang('web.totalpatient')</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-12">
                                            <div class="info_wrap text-center">
                                                <h3>{{ count($todayPatient) + 3 }}</h3>
                                                <span>@lang('web.todaypatient')</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-12">
                                            <div class="info_wrap text-center">
                                                <h3>{{ count($LastSevendays) + 80 }}</h3>
                                                <span>@lang('web.lastsavendaysreport')</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-12">
                                            <div class="info_wrap text-center">
                                                <h3>{{ count($totaltherapist) + 10 }}</h3>
                                                <span>@lang('web.therapist')</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 order-lg-1">
                        <div class="card card_form">
                            <div class="card-header">
                                <h4>@lang('web.header')</h4>
                                <p>@lang('web.para')</p>
                            </div>
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <p>Your From is submitted</p>
                                        <p>A password sent to your email. @if (Session::has('mail'))
                                            {{ Session::get('mail') }}
                                        @endif</p>
                                        <p>Please Check your mail and login our website for further update. <a href="{{route('login')}}"> Login Now</a></p>
                                    </div>
                                @endif
                                @if (Auth::guest())
                                <form id="signupForm" action="{{ route('effect.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.email') <span class="text-danger">*</span>
                                                </label>
                                                <input id="email" type="email" id="email"  name="email" class="form-control"
                                                    value="{{ old('email') }}" autocomplete>
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.on_behalf_relation') <span
                                                        class="text-danger">*</span> </label>
                                                <select  name="on_behalf_relation" class="form-control" style="width: 100%;"
                                                        aria-hidden="true" id="on_behalf_relation">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="Diri">@lang('web.Diri')</option>
                                                    <option value="Waris">@lang('web.Waris')</option>
                                                </select>
                                                @error('on_behalf_relation')
                                                <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.recipient_name') <span class="text-danger">*</span>
                                                </label>
                                                <input  type="text" name="recipient_name" class="form-control"
                                                    value="{{ old('recipient_name') }}" id="recipient_name" autocomplete>
                                                @error('recipient_name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <span class="note">@lang('web.recipient_name_note')</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.vaccine_recipient_card') <span
                                                        class="text-danger">*</span> </label>
                                                <input type="text"  name="vaccine_recipient_card" id="recipient_card"
                                                    class="form-control" value="{{ old('vaccine_recipient_card') }}"
                                                    autocomplete>
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <div class="input-group mb-3">
                                                <input type="text" name="otp" id="otp" placeholder="Enter otp" class="form-control verify">
                                                <div class="input-group-append">
                                                    <button id="verify_button" class="btn-primary verify input-group-text" style="display: block">@lang('web.verify')</button>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.vaccine_recipient_phone') <span
                                                        class="text-danger">*</span> </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">+60</span>
                                                    </div>
                                                    <input type="text" name="verify_phone_number" id="verify_phone_number" class="form-control">
                                                    <div class="input-group-append">
                                                        <button id="add_phone" class="input-group-text btn-primary add_phone" style="display: block">@lang('web.send')</button>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="verification_status" id="verification_status" value="0">
                                                <input type="hidden" name="vaccine_recipient_phone" id="recipient_phone" class="form-control" value="{{ old('vaccine_recipient_phone') }}" autocomplete>
                                                <span id="otp_time_left" class="verify" style="color: red">@lang('web.minutes_left')</span>
                                                <div class="col-sm-12">
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="otp" id="otp" placeholder="Enter otp" class="form-control verify">
                                                        <div class="input-group-append">
                                                            <button id="verify_button" class="btn-primary verify input-group-text" style="display: block">@lang('web.verify')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.vaccine_recipient_email') <span
                                                        class="text-danger">*</span> </label>
                                                <input type="text"  name="vaccine_recipient_email" id="recipient_email"
                                                    class="form-control" value="{{ old('vaccine_recipient_email') }}"
                                                    autocomplete>
                                                    <input type="checkbox" id="pickAboveMail"> @lang('web.sameasabove')
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.vaccine_recipient_countries') <span
                                                        class="text-danger">*</span> </label>
                                                <?php
                                                    $countries = DB::table('countries')->get();
                                                ?>
                                                <select name="vaccine_recipient_countries"  id="recipient_countries"
                                                        class="form-control select2">
                                                    <option value="">Select Country</option>
                                                    @foreach($countries as $row)
                                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                <!-- <input type="text" name="vaccine_recipient_countries" class="form-control select2" value="" autocomplete> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.vaccine_recipient_zip') <span
                                                        class="text-danger">*</span> </label>
                                                <input type="text"  name="vaccine_recipient_zip" id="recipient_zip"
                                                    class="form-control" value="{{ old('vaccine_recipient_zip') }}"
                                                    autocomplete>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.age') <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="age" id="age" style="width: 100%;"

                                                        aria-hidden="true">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="19">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>
                                                </select>
                                                @error('age')
                                                <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.gender') <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="gender" id="gender" style="width: 100%;"

                                                        aria-hidden="true">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="Lelaki">@lang('web.Lelaki')</option>
                                                    <option value="Perempuan">@lang('web.Perempuan')</option>
                                                </select>
                                                @error('gender')
                                                <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.profession')</label>
                                                <select class="form-control" name="profession" id="profession"
                                                        style="width: 100%;" aria-hidden="true">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="Awam">@lang('web.Awam')</option>
                                                    <option value="Swasta">@lang('web.Swasta')</option>
                                                    <option value="Pendidikan">@lang('web.Pendidikan')</option>
                                                    <option value="Kesihatan">@lang('web.Kesihatan')</option>
                                                    <option value="Tidak berkerja">@lang('web.Tidak')</option>
                                                    <option value="Bekerja sendiri">@lang('web.Bekerja')</option>
                                                    <option value="Peniaga kecilan">@lang('web.Peniaga')</option>
                                                    <option value="Perniagaan">@lang('web.Perniagaan')</option>
                                                    <option value="Pelajar sekolah">@lang('web.Pelajar')</option>
                                                    <option value="Pelajar Kolej/Universiti">@lang('web.Universiti')</option>
                                                    <option value="Surirumah">@lang('web.Surirumah')</option>
                                                    <option value="Pesara">@lang('web.Pesara')</option>
                                                    <option value="Lain-lain">@lang('web.Lain')</option>
                                                </select>
                                                @error('profession')
                                                <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.nation') <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="nation" id="nation" style="width: 100%;"

                                                        aria-hidden="true">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="Malay">@lang('web.malay')</option>
                                                    <option value="China">@lang('web.china')</option>
                                                    <option value="India">@lang('web.india')</option>
                                                    <option value="Not a citizen">@lang('web.notacitizine')</option>
                                                    <option value="Permanent resident">@lang('web.permanent')</option>
                                                    <option value="Other Malaysians">@lang('web.othermalay')</option>
                                                </select>
                                                @error('nation')
                                                <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.vaccine_type') <span
                                                        class="text-danger">*</span> </label>
                                                <select class="form-control"  name="vaccine_type" id="vaccine_type"
                                                        style="width: 100%;" aria-hidden="true">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="Pfizer - Comirnaty" >Pfizer - Comirnaty</option>
                                                    <option value="Sinovac - Coronavac" >Sinovac - Coronavac</option>
                                                    <option value="AstraZeneca" >AstraZeneca</option>
                                                    <option value="Cansino" >Cansino</option>
                                                    <option value="Tidak tahu" >@lang('web.Tidak_tahu')</option>
                                                </select>
                                                @error('vaccine_type')
                                                <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.complaints') <span
                                                        class="text-danger">*</span> </label>
                                                <select class="form-control"  name="complaints" id="complaints"
                                                        style="width: 100%;" aria-hidden="true">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="Pertama" >@lang('web.Pertama')</option>
                                                    <option value="Kedua" >@lang('web.Kedua')</option>
                                                    <option value="Booster ketiga" >@lang('web.Booster_ketiga')</option>
                                                </select>
                                                @error('complaints')
                                                <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.vaccine_date') <span
                                                        class="text-danger">*</span> </label>
                                                <input type="text" id="datepicker-13" name="vaccine_date" class="form-control"

                                                    placeholder="MM/DD/YYYY" value="{{ old('vaccine_date') }}"
                                                    autocomplete="off">
                                                @error('vaccine_date')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.vaccine_location')</label>
                                                <input type="text" name="vaccine_location" id="vaccine_location"
                                                    class="form-control" value="{{ old('vaccine_location') }}" autocomplete>
                                                @error('vaccine_location')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.vaccine_batch')</label>
                                                <input type="text" name="vaccine_batch" id="vaccine_batch" class="form-control"
                                                    value="{{ old('vaccine_batch') }}" autocomplete>
                                                @error('vaccine_batch')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <span class="note">@lang('web.vaccine_batch_note')</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.symptoms')<span
                                                        class="text-danger">*</span> </label>
                                                <select class="form-control"  name="symptoms" id="symptoms" style="width: 100%;"
                                                        aria-hidden="true">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="1 jam">@lang('web.onejam')</option>
                                                    <option value="24 jam">@lang('web.tweentyfourjam')</option>
                                                    <option value="2-3 days">@lang('web.twothreedays')</option>
                                                    <option value="1 week">@lang('web.oneweek')</option>
                                                    <option value="2 weeks">@lang('web.twoweeks')</option>
                                                    <option value="3 weeks">@lang('web.threeweeks')</option>
                                                    <option value="a month and up">@lang('web.amonthandup')</option>
                                                </select>
                                                @error('symptoms')
                                                <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">@lang('web.covid_side_effect_id') <span
                                                    class="text-danger">*</span> </label>
                                            <div class="row">
                                                @foreach ($side_effect as $k => $item)
                                                    <div class="col-sm-6">
                                                        <div class="form-check">
                                                            <input name="covid_side_effect_id[]"
                                                                class="form-check-input covid-effect" type="checkbox"
                                                                value="{{$item->id}}" id="se_checkbox_{{ $k }}">
                                                            <label class="form-check-label" for="se_checkbox_{{ $k }}"
                                                                style="display: block">{{$item->name}}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.affect_quality') <span class="text-danger">*</span> </label>
                                                        <select name="affect_quality"  id="affect_quality" class="form-control" style="width: 100%;" aria-hidden="true">
                                                            <option value="">@lang('web.select')</option>
                                                            <option value="Kecacatan kekal" >@lang('web.Kecacatan_kekal')</option>
                                                            <option value="Meninggal dunia" >@lang('web.Meninggal')</option>
                                                            <option value="Kecacatan sementara" >@lang('web.Kecacatan_sementara')</option>
                                                            <option value="Teruk" >@lang('web.Teruk')</option>
                                                            <option value="Sederhana" >@lang('web.Sederhana')</option>
                                                            <option value="Sedikit sahaja" >@lang('web.Sedikit_sahaja')</option>
                                                        </select>
                                                        @error('affect_quality')
                                                        <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.hospitalized') <span class="text-danger">*</span> </label>
                                                        <select name="hospitalized"  id="hospitalized" class="form-control" style="width: 100%;" aria-hidden="true">
                                                            <option value="">@lang('web.select')</option>
                                                            <option value="ya">@lang('web.yes')</option>
                                                            <option value="tidak">@lang('web.not')</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.ward_type')</label>
                                                        <select name="ward_type" id="ward_type" class="form-control" style="width: 100%;" aria-hidden="true">
                                                            <option value="">@lang('web.select')</option>
                                                            <option value="ordinary ward">@lang('web.ordinaryward')</option>
                                                            <option value="icu (intensive care unit)">@lang('web.icu')</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.hospitalized_duration')</label>
                                                        <select name="hospitalized_duration" id="hospitalized_duration" class="form-control" style="width: 100%;" aria-hidden="true">
                                                            <option value="">@lang('web.select')</option>
                                                            <option value="Sehari" >@lang('web.Sehari')</option>
                                                            <option value="2-3 hari" >2-3 @lang('web.hari')</option>
                                                            <option value="Seminggu" >@lang('web.Seminggu')</option>
                                                            <option value="2 minggu" >@lang('web.twoweeks')</option>
                                                            <option value="3 minggu" >@lang('web.threeweeks')</option>
                                                            <option value="Sebulan dan ke atas" >@lang('web.amonthandup')</option>
                                                            <option value="Others" >Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.hospital_name')</label>
                                                        <input type="text" id="hospital_name" name="hospital_name" class="form-control" value="{{ old('hospital_name') }}" autocomplete>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.effect_duration') <span class="text-danger">*</span> </label>
                                                        <select name="effect_duration"  id="effect_duration" class="form-control" style="width: 100%;" aria-hidden="true">
                                                            <option value="">@lang('web.select')</option>
                                                            <option value="Sehari" >@lang('web.Sehari')</option>
                                                            <option value="2-3 hari" >2-3 @lang('web.hari')</option>
                                                            <option value="Seminggu" >@lang('web.Seminggu')</option>
                                                            <option value="2 minggu" >@lang('web.twoweeks')</option>
                                                            <option value="3 minggu" >@lang('web.threeweeks')</option>
                                                            <option value="Sebulan" >@lang('web.Sebulan')</option>
                                                            <option value="Masih berterusan" >@lang('web.Masih_berterusan')</option>
                                                        </select>
                                                        @error('effect_duration')
                                                        <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.present_status') <span class="text-danger">*</span> </label>
                                                        <select name="present_status"  id="present_status" class="form-control" style="width: 100%;" aria-hidden="true">
                                                            <option value="">@lang('web.select')</option>
                                                            <option value="Pulih sepenuhnya">@lang('web.fullyrecomered')</option>
                                                            <option value="Berkurang, masih ada baki kesakitan">@lang('web.decreased')</option>
                                                            <option value="Tiada perubahan">@lang('web.nochange')</option>
                                                            <option value="Semakin teruk">@lang('web.gettingworse')</option>
                                                            <option value="Meninggal dunia">@lang('web.die')</option>
                                                        </select>
                                                        <span class="note">@lang('web.present_status_note')</span>
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.previous_disease') <span class="text-danger">*</span> </label>
                                                    </div>
                                                    <div class="row">
                                                        @foreach ($previous_disease as $k => $item)
                                                        <div class="col-sm-6">
                                                            <div class="form-check">
                                                                <input name="previous_disease[]" class="form-check-input previous_disease" type="checkbox" value="{{$item->id}}" id="se_second_checkbox_{{ $k }}">
                                                                <label class="form-check-label" for="se_second_checkbox_{{ $k }}" style="display: block">{{$item->name}}</label>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @error('previous_disease')
                                                        <div class="text-danger">{{ 'Choose your option(s).' }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.diagnosis')</label>
                                                        <textarea value="{{ old('diagnosis') }}" id="diagnosis" name="diagnosis" class="form-control" class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.effect_confirm')</label>
                                                        <select name="effect_confirm" id="effect_confirm" class="form-control" style="width: 100%;" aria-hidden="true">
                                                            <option value="">@lang('web.select')</option>
                                                            <option value="ya">@lang('web.yes')</option>
                                                            <option value="tidak">@lang('web.not')</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.report') <span class="text-danger">*</span> </label>
                                                        <select name="report"  id="report" class="form-control" style="width: 100%;" aria-hidden="true">
                                                            <option value="">@lang('web.select')</option>
                                                            <option value="ya">@lang('web.yes')</option>
                                                            <option value="tidak">@lang('web.not')</option>
                                                        </select>
                                                        @error('report')
                                                        <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('web.npra') <span class="text-danger">*</span> </label>
                                                        <select name="npra" id="npra"  class="form-control" style="width: 100%;" aria-hidden="true">
                                                            <option value="">@lang('web.select')</option>
                                                            <option value="ya">@lang('web.yes')</option>
                                                            <option value="tidak">@lang('web.not')</option>
                                                        </select>
                                                        @error('npra')
                                                        <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                        @enderror
                                                    </div>

                                                @error('previous_disease')
                                                <div class="text-danger">{{ 'Choose your option(s).' }}</div>
                                                @enderror
                                                    </div>
                                            </div>

                                        </div>

                                        {{-- <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.diagnosis')</label>
                                                <textarea value="{{ old('diagnosis') }}" id="diagnosis" name="diagnosis" class="form-control" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.effect_confirm')</label>
                                                <select name="effect_confirm" id="effect_confirm" class="form-control"
                                                        style="width: 100%;" aria-hidden="true">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="Diri Sendiri">@lang('web.Diri')</option>
                                                    <option value="Waris">@lang('web.Waris')</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.report') <span class="text-danger">*</span>
                                                </label>
                                                <select name="report" id="report"  class="form-control" style="width: 100%;"
                                                        aria-hidden="true">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="Diri Sendiri">@lang('web.Diri')</option>
                                                    <option value="Waris">@lang('web.Waris')</option>
                                                </select>
                                                @error('report')
                                                <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.npra') <span class="text-danger">*</span>
                                                </label>
                                                <select name="npra" id="npra"   class="form-control" style="width: 100%;"
                                                        aria-hidden="true">
                                                    <option value="">@lang('web.select')</option>
                                                    <option value="Diri Sendiri">@lang('web.Diri')</option>
                                                    <option value="Waris">@lang('web.Waris')</option>
                                                </select>
                                                @error('npra')
                                                <div class="text-danger">{{ 'Select a choice.' }}</div>
                                                @enderror
                                            </div>
                                        </div> --}}
                                    </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.contact') </label>
                                                <textarea name="contact" id="contact" value="{{ old('contact') }}"
                                                        class="form-control" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.comments')</label>
                                                <textarea value="{{ old('comments') }}" id="comments" name="comments"
                                                        class="form-control" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.file')</label>
                                                <input type="file" name="file" class="dropify" id="input-file-now"
                                                    data-height="150">
                                            </div>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" name="agree" class="form-check-input" id="checkPolicy">
                                            <label class="form-check-label" for="checkPolicy">@lang('web.i_have_read')<a
                                                    href="{{ route('privacy.policy') }}" target="_blank"> @lang('web.privacy_policy').</a></label>
                                            @error('agree')
                                            <div class="text-danger">{{ 'Please accept our policy' }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-2 mb-4 text-center form_btn">
                                            <!-- <button class="btn btn-dark">Reviews</button>
                                            <button class="btn btn-dark">Save</button> -->
                                            <button type="button" id="previewButton" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">Review
                                            </button>
                                            <button type="submit" class="btn btn-success" id="submit_frm">Submit</button>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.tele_link')</label>
                                                <a href="https://t.me/joinchat/IvjQfqdZQRY2NTFl" target="_blank">https://t.me/joinchat/IvjQfqdZQRY2NTFl</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.tele_channel')</label>
                                                <a href="https://t.me/myaeficovid" target="_blank">https://t.me/myaeficovid</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.Kompilasi')</label>
                                                <a href="https://t.me/AEFICOVIDVAX"
                                                target="_blank">https://t.me/AEFICOVIDVAX</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('web.mailto')</label>
                                                <strong>Email: <a href="mailto:MY-AEFI@tutanota.com" target="_blank">MY-AEFI@tutanota.com</a></strong>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <p>@lang('web.Kaji')</p>
                                            </div>
                                        </div> --}}

                                    </div>
                                </form>
                                @else
                                    <p style="font-size:22px; text-align:center;">You have submitted your AEFI Report</p>
                                    <p class="text-center">Kindly login to your dashboard to view your report <a href="@if (Auth::user()->role == 1 || Auth::user()->role == 0) {{ route('admin.home') }} @elseif(Auth::user()->role == 2) {{ route('doctor.home') }} @else {{ route('patient.home') }} @endif">Dashboard</a></p>
                                @endif
                            </div>
                            <div class="card-footer p-3">
                                <h6>
                                    @lang('web.do_not_sub_infomation')
                                    <!-- <a href="#"> @lang('web.report_abuse')</a> -->
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Review Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content review_modal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Summary</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td>@lang('web.email') <span class="text-danger">*</span></td>
                                <td id="show_email"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.on_behalf_relation') <span class="text-danger">*</span></td>
                                <td id="show_on_behalf_relation"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.recipient_name') <span class="text-danger">*</span></td>
                                <td id="show_recipient_name"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.vaccine_recipient_card') <span class="text-danger">*</span></td>
                                <td id="show_recipient_card"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.vaccine_recipient_phone') <span class="text-danger">*</span></td>
                                <td id="show_recipient_phone"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.vaccine_recipient_email') <span class="text-danger">*</span></td>
                                <td id="show_recipient_email"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.vaccine_recipient_countries') <span class="text-danger">*</span></td>
                                <td id="show_recipient_countries"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.vaccine_recipient_zip') <span class="text-danger">*</span></td>
                                <td id="show_recipient_zip"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.age') <span class="text-danger">*</span></td>
                                <td id="show_age"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.gender') <span class="text-danger">*</span></td>
                                <td id="show_gender"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.profession')</td>
                                <td id="show_profession"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.nation') <span class="text-danger">*</span></td>
                                <td id="show_nation"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.vaccine_type') <span class="text-danger">*</span></td>
                                <td id="show_vaccine_type"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.complaints') <span class="text-danger">*</span></td>
                                <td id="show_complaints"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.vaccine_date') <span class="text-danger">*</span></td>
                                <td id="show_vaccine_date"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.vaccine_location')</td>
                                <td id="show_vaccine_location"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.vaccine_batch')</td>
                                <td id="show_vaccine_batch"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.symptoms')<span class="text-danger">*</span></td>
                                <td id="show_symptoms"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.covid_side_effect_id') <span class="text-danger">*</span></td>
                                <td id="covid_side_effect_id"></td>
                            </tr>
                            <!-- <tr>
                                <td>@lang('web.other_effect')</td>
                                <td id="show_other_effect"></td>
                            </tr> -->
                            <tr>
                                <td>@lang('web.affect_quality') <span class="text-danger">*</span></td>
                                <td id="show_affect_quality"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.hospitalized') <span class="text-danger">*</span></td>
                                <td id="show_hospitalized"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.ward_type')</td>
                                <td id="show_ward_type"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.select')</td>
                                <td id="show_hospitalized_duration"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.hospital_name')</td>
                                <td id="show_hospital_name"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.effect_duration') <span class="text-danger">*</span></td>
                                <td id="show_effect_duration"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.present_status') <span class="text-danger">*</span></td>
                                <td id="show_present_status"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.previous_disease') <span class="text-danger">*</span></td>
                                <td id="previous_disease"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.diagnosis')</td>
                                <td id="show_diagnosis"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.effect_confirm')</td>
                                <td id="show_effect_confirm"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.report') <span class="text-danger">*</span></td>
                                <td id="show_report"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.npra') <span class="text-danger">*</span></td>
                                <td id="show_npra"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.contact')</td>
                                <td id="show_contact"></td>
                            </tr>
                            <tr>
                                <td>@lang('web.comments')</td>
                                <td id="show_comments"></td>
                            </tr>
                            <!-- <tr>
                                <td>@lang('web.file')</td>
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
              <div class="container text-center">
                    <p>&copy; <?php echo date("Y"); ?> {{ $websetting->footer }}</p>
              </div>
        </footer>

        <section class="custom-social-proof">
            <div class="custom-notification">
                <div id="custom-notification"></div>
                <div class="custom-close"></div>
            </div>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontend/assets/js/select2.full.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                // search select
                $('.select2').select2();
                // input file image
                $('.dropify').dropify();
            })
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ asset('jsvalidate/dist/jquery.validate.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#signupForm").validate({
                    rules: {
                        email: "required",
                        recipient_name: "required",
                        vaccine_date: "required",
                        vaccine_batch: "required",
                        on_behalf_relation: "required",
                        age: "required",
                        gender: "required",
                        profession: "required",
                        nation: "required",
                        vaccine_type: "required",
                        complaints: "required",
                        symptoms: "required",
                        npra: "required",
                        report: "required",
                        covid_side_effect_id: "required",
                        affect_quality: "required",
                        effect_duration: "required",
                        previous_disease: "required",

                        recipient_name: {
                            required: true,
                            minlength: 2
                        },
                        verify_phone_number: {
                            required: true,
                            minlength:9,
                            maxlength:10
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                        confirm_password: {
                            required: true,
                            minlength: 5,
                            equalTo: "#password"
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        agree: "required"
                    },
                    messages: {
                        "previous_disease[]": {
                            required: true,
                            minlength: 1
                        },
                        recipient_name: {
                            required: true,
                            minlength: 2
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                        confirm_password: {
                            required: true,
                            minlength: 5,
                            equalTo: "#password"
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        agree: "required"
                    },
                    messages: {
                        recipient_name: "The recipient name field is required.",
                        vaccine_date: "The vaccine date field is required.",
                        vaccine_batch: "The vaccine batch field is required.",
                        on_behalf_relation: "Select a choice.",
                        age: "Select a choice.",
                        gender: "Select a choice.",
                        profession: "Select a choice.",
                        nation: "Select a choice.",
                        vaccine_type: "Select a choice.",
                        complaints: "Select a choice.",
                        symptoms: "Select a choice.",
                        npra: "Select a choice.",
                        covid_side_effect_id: "Choose your option(s).",
                        affect_quality: "Select a choice.",
                        effect_duration: "Select a choice.",
                        previous_disease: "Choose your option(s).",
                        recipient_name: {
                            required: "Please enter a Vaccine Recipient Name",
                            minlength: "Vaccine recipient name must consist of at least 2 characters"
                        },
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        confirm_password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long",
                            equalTo: "Please enter the same password as above"
                        },
                        email: "The email field is required.",

                        agree: "Please accept our policy"
                    },
                    errorElement: "em",
                    errorPlacement: function (error, element) {
                        // Add the `invalid-feedback` class to the error element
                        error.addClass("invalid-feedback");
                        if (element.prop("type") === "checkbox") {
                            error.insertAfter(element.next("label"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass("is-invalid").removeClass("is-valid");
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).addClass("is-valid").removeClass("is-invalid");
                    }
                });
            });
            $(function() {
                //hang on event of form with id=myform
                $("#signupForm").submit(function(e) {

                    var verification_status =  $('#verification_status').val();
                    if(verification_status == 1){
                        getReady();
                        $("body").css("cursor", "progress");
                        $("#submit_frm").attr("disabled", true);
                        $('#submit_frm').text('Processing...');
                        return true;
                    }else{
                        alert('Mobile number is not verified');
                        return false;
                    }
                    //prevent Default functionality
                    //get the action-url of the form
                    // var actionurl = e.currentTarget.action;
                    //do your own request an handle the results
                });

            });
        </script>
        <script>
            $('#previewButton').click(function () {
                var on_behalf_relation = $('#on_behalf_relation :selected').text();
                var siteeffect = [];
                $.each($("input[name='covid_side_effect_id[]']:checked"), function () {
                    siteeffect.push($(this).next().text());

                });
                //console.log("Your favourite programming languages are: " + siteeffect.join(", "));

                document.getElementById("covid_side_effect_id").innerHTML = siteeffect.join(",");
                var previuseffect = [];
                $.each($("input[name='previous_disease[]']:checked"), function () {
                    previuseffect.push($(this).next().text());

                });
                document.getElementById("previous_disease").innerHTML = previuseffect.join(",");
                document.getElementById("show_on_behalf_relation").innerHTML = on_behalf_relation;
                let email = $('#email').val();
                document.getElementById("show_email").innerHTML = email;
                let r_email = $('#recipient_email').val();
                document.getElementById("show_recipient_email").innerHTML = r_email;
                let recipient_name = $('#recipient_name').val();
                document.getElementById("show_recipient_name").innerHTML = recipient_name;
                let recipient_card = $('#recipient_card').val();
                document.getElementById("show_recipient_card").innerHTML = recipient_card;
                let recipient_phone = $('#verify_phone_number').val();
                document.getElementById("show_recipient_phone").innerHTML = recipient_phone;

                let recipient_zip = $('#recipient_zip').val();
                document.getElementById("show_recipient_zip").innerHTML = recipient_zip;
                let vaccine_date = $('#datepicker-13').val();
                document.getElementById("show_vaccine_date").innerHTML = vaccine_date;
                let vaccine_location = $('#vaccine_location').val();
                document.getElementById("show_vaccine_location").innerHTML = vaccine_location;
                let vaccine_batch = $('#vaccine_batch').val();
                document.getElementById("show_vaccine_batch").innerHTML = vaccine_batch;
                // let other_effect = $('#other_effect').val();
                // document.getElementById("show_other_effect").innerHTML = other_effect;
                let hospital_name = $('#hospital_name').val();
                document.getElementById("show_hospital_name").innerHTML = hospital_name;
                let diagnosis = $('#diagnosis').val();
                document.getElementById("show_diagnosis").innerHTML = diagnosis;
                let contact = $('#contact').val();
                document.getElementById("show_contact").innerHTML = contact;
                let comments = $('#comments').val();
                document.getElementById("show_comments").innerHTML = comments;
                // let file = $('#input-file-now').val();
                // document.getElementById("show_file").innerHTML = file;

                let recipient_countries = $('#recipient_countries :selected').text();
                document.getElementById("show_recipient_countries").innerHTML = recipient_countries;
                let age = $('#age :selected').text();
                document.getElementById("show_age").innerHTML = age;
                let profession = $('#profession :selected').text();
                document.getElementById("show_profession").innerHTML = profession;
                let nation = $('#nation :selected').text();
                document.getElementById("show_nation").innerHTML = nation;
                let vaccine_type = $('#vaccine_type :selected').text();
                document.getElementById("show_vaccine_type").innerHTML = vaccine_type;
                let complaints = $('#complaints :selected').text();
                document.getElementById("show_complaints").innerHTML = complaints;
                let gender = $('#gender :selected').text();
                document.getElementById("show_gender").innerHTML = gender;
                let symptoms = $('#symptoms :selected').text();
                document.getElementById("show_symptoms").innerHTML = symptoms;
                let affect_quality = $('#affect_quality :selected').text();
                document.getElementById("show_affect_quality").innerHTML = affect_quality;
                let hospitalized = $('#hospitalized :selected').text();
                document.getElementById("show_hospitalized").innerHTML = hospitalized;
                let ward_type = $('#ward_type :selected').text();
                document.getElementById("show_ward_type").innerHTML = ward_type;
                let hospitalized_duration = $('#hospitalized_duration :selected').text();
                document.getElementById("show_hospitalized_duration").innerHTML = hospitalized_duration;
                let effect_duration = $('#effect_duration :selected').text();
                document.getElementById("show_effect_duration").innerHTML = effect_duration;
                let present_status = $('#present_status :selected').text();
                document.getElementById("show_present_status").innerHTML = present_status;
                let effect_confirm = $('#effect_confirm :selected').text();
                document.getElementById("show_effect_confirm").innerHTML = effect_confirm;
                let report = $('#report :selected').text();
                document.getElementById("show_report").innerHTML = report;
                let npra = $('#npra :selected').text();
                document.getElementById("show_npra").innerHTML = npra;
            });
            $(document).ready(function () {
                let makeWait = null;
                $('.verify').hide();
                $('.add_phone').click(function (e) {
                    e.preventDefault();
                    let pn = $('#verify_phone_number').val();
                    if(pn.length > 10){
                        $('#otp_time_left').show().text('Please enter correct phone number.');
                        return false;
                    }
                    if(pn.length < 9){
                        $('#otp_time_left').show().text('Phone number must be at least 9 digits.');
                        return false;
                    }
                    // $(".add_phone").html('<i class="fa fa-spinner" aria-hidden="true"></i>');

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('send-otp') }}',
                        data: {
                            phone: $('#verify_phone_number').val(),
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (res) {
                            console.log(res);
                            if (res.success) {
                                $('.add').hide();
                                $('#verify_phone_number').attr('readonly', true);
                                $('.verify').show();
                                $('#otp_time_left').css('color', 'red');
                                $('#otp_time_left').text(res.msg);
                                $(".add_phone").text('Click for resend');

                                const minutes = 1000 * 60 * 5;
                                makeWait = setTimeout(() => {
                                    $('.add').show();
                                    // $('#verify_phone_number').attr('readonly', true);
                                    $('.verify').hide();
                                }, minutes);
                            } else {
                                $('#otp_time_left').show();
                                $('#otp_time_left').text(res.msg);
                                if(res.verification == 'verified'){
                                    $('#verification_status').val(1);
                                }
                                $('#otp_time_left').css('color', 'red');
                                $(".add_phone").text('Send OTP');
                            }
                        },
                        error: function (err) {
                            $('#otp_time_left').show();
                            // $('#otp_time_left').text('Please enter correct phone number.');
                            $('#otp_time_left').css('color', 'red');
                        }
                    });
                });
                $('#verify_button').click(function (e) {
                    e.preventDefault();
                    $('#recipient_phone').hide();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('verify-otp') }}",
                        data: {
                            otp: $('#otp').val(),
                            phone_number: $('#verify_phone_number').val(),
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (res) {
                            if (res.success) {
                                clearTimeout(makeWait);
                                $('.input-group-prepend').hide();
                                $('#recipient_phone').val('+60' + $('#verify_phone_number').val());
                                $('#recipient_phone').attr('type', 'number');
                                // $('#recipient_phone').attr('disabled', 'disabled');
                                $('#verify_button').hide();
                                $('#otp').hide();
                                $('#otp_time_left').hide();
                                $('.add_phone').text('Verified');
                                $('#add_phone').removeClass('add_phone');
                                $('#verification_status').val(1);

                            } else {
                                $('#otp_time_left').show();
                                $('#otp_time_left').text('Wrong OTP given.');
                                $('#otp_time_left').css('color', 'red');
                            }
                            // console.log(res);
                        },
                        error: function (err) {
                            $('#otp_time_left').show();
                            $('#otp_time_left').text('Wrong OTP given.');
                            $('#otp_time_left').css('color', 'red');
                        }
                    });
                });
            });
        </script>
        <script>
            var get_url = $('#base_url').val();

            setInterval(function() {

                // show report by ajax
                $.ajax({
                    type: 'get',
                    url: get_url+'/ajax/get-report-user',
                    async: true,
                    beforeSend: function () {
                        $("body").css("cursor", "progress");
                    },
                    success: function (response) {

                        $('#custom-notification').empty();
                        $('#custom-notification').html(response.html);

                    },
                    complete: function (response) {
                        $("body").css("cursor", "default");
                    },
                    error: function(response){
                        $("body").css("cursor", "default");
                    }
                });
                // $(".custom-social-proof").show();
                $(".custom-social-proof").stop().slideToggle("slow");
            }, 10000);
            $(".custom-close").click(function() {
            $(".custom-social-proof").stop().slideToggle("slow");
            });
        </script>
        <script>
            $(document).ready(function() {
            $("#pickAboveMail").change(function() {
                    if(this.checked) {
                        var mail =  $('#email').val();
                    $("#recipient_email").val(mail);
                    }else{
                        $("#recipient_email").val("");
                    }
                });
            });


        </script>
         <script>
            document.onreadystatechange = function() {
                getReady();
            };

            function getReady(){
                $("#submit_frm").removeAttr("disabled");
                $('#submit_frm').text('Submit');

                if (document.readyState !== "complete") {
                    document.querySelector("body").style.visibility = "hidden";
                    document.querySelector("#loader").style.visibility = "visible";
                } else {
                    document.querySelector("#loader").style.display = "none";
                    document.querySelector("body").style.visibility = "visible";
                }
            }
        </script>
    </body>
</html>
