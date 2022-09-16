<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, maximum-scale=1, user-scalable=0" />

        <link rel="icon" type="image/png"  href="{{ asset($websetting->favicon ?? 'no image') }}">
        <title>{{$websetting->app_name ?? 'covidinfo'}}</title>
        <meta name="description" content="{{$websetting->description ?? 'covid info, covid report, aefi, vaccine, etc'}}" />
        <meta name="keywords" content="{{$websetting->keywords ?? 'covid info, covid report, aefi, vaccine, etc'}}" />
        <meta name="robots" content="index,follow">
        <meta name="Developer" content="Md. Maidul Islam, Md. Rony" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href=""/>
        <!-- Fonts and icons -->
        <script src="{{ asset('back/js/plugin/webfont/webfont.min.js') }}"></script>
        <script id="setFont" data-src="{{ asset('/back/css/fonts.css') }}" src="{{ asset('back/js/plugin/webfont/setfont.js') }}"></script>
        <!-- CSS Files -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('back/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('back/css/select2.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
        <link rel="stylesheet" href="{{ asset('back/css/azzara.min.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify/dist/tagify.css">
        <link rel="stylesheet" href="{{ asset('back/css/editor.css') }}">
        <link rel="stylesheet" href="{{ asset('back/css/bootstrap-iconpicker.css') }}">
        <link rel="stylesheet" href="{{ asset('back/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
        <link rel="stylesheet" href="{{ asset('back/js/plugin/codemirror/codemirror.css') }}">
        <link rel="stylesheet" href="{{ asset('back/js/plugin/codemirror/monokai.css') }}">
        <input type="hidden" name="base_url" id="base_url" value="{{url('/')}}">
        @php
            $websetting = DB::table('web_settings')->first();
        @endphp

        @stack('header_script')

        <link rel="stylesheet" href="{{ asset('back/css/custom.css') }}">
        <style>
            .dropify-wrapper {
                border: 1px solid #EEE;
            }

            .dropify-wrapper:hover {
                background: #efefef !important;
            }

            .sidebar .nav-collapse li.active > a {
                font-weight: 600;
                background: rgba(0, 0, 0, .05);
            }
            .badge {
                margin-bottom: 5px;
            }

        </style>

    </head>
    <body>
        <?php
            $langs = \Config::get('static_array.lang');
            $setting = DB::table('web_settings')->first();
        ?>
        <div class="wrapper">
            <div class="main-header ">
                <!-- Logo Header -->
                <div class="logo-header">
                    <a href="" class="logo">
                        <img src="{{ asset($setting->logo) }}" alt="TERAPEE" class="navbar-brand">
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fa fa-bars"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="navbar-minimize">
                        <button class="btn btn-minimize ">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>
                <!-- End Logo Header -->
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-expand-lg">
                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                            <!-- <li class="nav-item mr-4">
                                <a class="btn btn-sm btn-primary py-1 text-white" title="website" href="#" target="_blank">
                                    <b> View Website</b>
                                </a>
                            </li> -->
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownLang" role="button"
                                data-toggle="dropdown"
                                aria-expanded="false">{{ $langs[app()->getLocale()] ?? 'B.Melayu' }}</a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownLang">
                                    @if($langs)
                                        @foreach($langs as $ke => $lang )
                                            <li>
                                                <a class="dropdown-item" href="{{ route('changelang',$ke) }}">{{ $lang }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="nav-item dropdown hidden-caret submenu">
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown"
                                href="https://localhost/farahtech/app/admin" aria-expanded="true">
                                    <div class="avatar-sm avatar avatar-sm">
                                        <img
                                            src="{{ asset(Auth()->user()->avatar ?? 'frontend/assets/images/profile/profile.png') }}"
                                            alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg">
                                                <img src="{{ asset(Auth()->user()->avatar ?? 'frontend/assets/images/profile/profile.png') }}"
                                                    class="avatar-img rounded">
                                            </div>
                                            <div class="u-text">
                                                <h4>{{ Auth()->user()->name ?? '' }}</h4>
                                                <p class="text-muted">{{ Auth()->user()->email ?? '' }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">Update Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('change.password') }}">Change Password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="sidebar-background"></div>
                <div class="sidebar-wrapper scrollbar-inner">
                    <div class="sidebar-content">
                        <div class="user">
                            <div class="avatar-sm float-left mr-2">
                                <img src="{{ asset(Auth()->user()->avatar ?? 'frontend/assets/images/profile/profile.png') }}"
                                    alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        {{ Auth()->user()->name ?? '' }}
                                        <span class="user-level">{{ Auth()->user()->email ?? '' }}</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <ul class="nav">
                            @if(Auth()->user()->role == 1 || Auth()->user()->role == 0)
                                <li class="nav-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
                                    <a href="{{ route('admin.home') }}">
                                        <i class="fas fa-home"></i>
                                        <p>@lang('web.dashboard')</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('admin.doctor.index') ? 'active' : '' }}">
                                    <a href="{{ route('admin.doctor.index') }}">
                                        <i class="fas fa-user-md"></i>
                                        <p>@lang('web.doctor')</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('admin.patient.index') ? 'active' : '' }}">
                                    <a href="{{ route('admin.patient.index') }}">
                                        <i class="fas fa-users"></i>
                                        <p>@lang('web.patient')</p>
                                    </a>
                                </li>
                                @if(Auth()->user()->role == 0)
                                    <li class="nav-item {{ request()->routeIs('admin.user.index') ? 'active' : '' }}">
                                        <a href="{{ route('admin.user.index') }}">
                                            <i class="fas fa-user"></i>
                                            <p>User Role</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="collapse" href="#setting" class="collapsed" aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                            <p>@lang('web.settings')</p>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="setting">
                                            <ul class="nav nav-collapse">
                                                <li class="{{ request()->routeIs('admin.site.setting') ? 'active' : '' }}">
                                                    <a class="sub-link" href="{{ route('admin.site.setting') }}">
                                                        <span class="sub-item">@lang('web.general_settings')</span>
                                                    </a>
                                                </li>
                                                <li class="{{ request()->routeIs('admin.email.setting') ? 'active' : '' }}">
                                                    <a class="sub-link" href="{{ route('admin.email.setting') }}">
                                                        <span class="sub-item">@lang('web.email_settings') </span>
                                                    </a>
                                                </li>
                                                <li class="{{ request()->routeIs('admin.privacy_policy') ? 'active' : '' }}">
                                                    <a class="sub-link" href="{{ route('admin.privacy_policy') }}">
                                                        <span class="sub-item">@lang('web.privacy_policy') </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endif
                            @elseif(Auth()->user()->role == 2)
                                <li class="nav-item {{ request()->routeIs('doctor.patient.index') ? 'active' : '' }}">
                                    <a href="{{ route('doctor.patient.index') }}">
                                        <i class="fas fa-user"></i>
                                        <p>@lang('web.my_patient')</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('doctor.oldpatient.index') ? 'active' : '' }}">
                                    <a href="{{ route('doctor.oldpatient.index') }}">
                                        <i class="fas fa-users"></i>
                                        <p>@lang('web.oldpatient')</p>
                                    </a>
                                </li>
                            @elseif(Auth()->user()->role == 3)
                                <li class="nav-item {{ request()->routeIs('patient.home') ? 'active' : '' }}">
                                    <a href="{{ route('patient.home') }}">
                                        <i class="far fa-chart-bar"></i>
                                        <p>Your Report</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                                    <a href="{{ route('profile.index') }}">
                                        <i class="fas fa-home"></i>
                                        <p>@lang('web.profile')</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->
            <div class="main-panel">
                <!-- main content -->
                <div class="content">
                    <div class="page-inner">
                        @yield('content')


                        <!-- footer copyright -->
                        <p class="text-center">&copy; <?php echo date("Y"); ?> {{ $websetting->footer }}</p>
                    </div>
                </div>
            </div>

        </div>




        <script>
                                    var mainbs = {
                "is_announcement": 1,
                "announcement_delay": "1.00",
                "overlay": null
            };
        </script>
        <!--   Core JS Files   -->
        <script src="{{ asset('back/js/core/jquery.3.6.0.min.js') }}"></script>
        <script src="{{ asset('back/js/select2.min.js') }}"></script>
        <script src="{{ asset('back/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('back/js/core/bootstrap.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js"></script>
        <!-- jQuery UI -->
        <script src="{{ asset('back/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('back/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
        <script src="{{ asset('back/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('back/js/plugin/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('back/js/plugin/chart.min.js') }}"></script>
        <!-- jQuery Scrollbar -->
        <script src="{{ asset('back/js/sortable.js') }}"></script>
        <script src="{{ asset('back/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('back/js/jscolor.js') }}"></script>
        <!-- Moment JS -->
        <script src="{{ asset('back/js/plugin/moment/moment.min.js') }}"></script>
        <!-- Bootstrap Notify -->
        <script src="{{ asset('back/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <!-- Editor -->
        <script src="{{ asset('back/js/plugin/editor.js') }}"></script>
        <script src="{{ asset('back/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
        <!-- Tagify -->
        <script src="{{ asset('back/js/tagify.js') }}"></script>
        <!-- Icon Picker -->
        <script src="{{ asset('back/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
        <script src="{{ asset('back/js/plugin/codemirror/codemirror.js') }}"></script>
        <script src="{{ asset('back/js/plugin/codemirror/css.js') }}"></script>
        <script src="{{ asset('back/js/ready.min.js') }}"></script>
        <script src="{{ asset('back/js/custom.js') }}"></script>
        @stack('footer_script');
        <script>
            $(document).on("click", "#delete", function (e) {
                e.preventDefault();
                var link = $(this).attr("href");
                swal({
                    title: "@lang('web.delete_title')",
                    text: "@lang('web.delete_text')",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    }
                })
            })
            // ajax request to change doctor
            //editor omit hasan
            // const allReportStatusEl = $('[name=report_status]')
            // const alDoctorIdEl = $('[name=doctor_id]')
            var msg = '<div class="form-control text-success">Successfully updated</div>'
            $('[name=report_status], [name=doctor_id]').change(function (e) {
                const closestTr = $(e.target).parents('tr');
                // extract required data
                const reportId = closestTr.find('[name=report_id]').val();
                const doctorId = closestTr.find('[name=doctor_id]').val();
                const reportStatus = closestTr.find('[name=report_status]').val();
                if (confirm('Are you sure?')) {
                    updateReport(reportId, doctorId, reportStatus);
                } else {
                    return false;
                }
            })
            const updateReport = (reportId, doctorId, reportStatus) => {
                console.log({reportId, doctorId, reportStatus});
                $("body").css("cursor", "progress");
                axios.post("{{ route('patient-report-update-ajax') }}", {
                    report_status: reportStatus,
                    doctor_id: doctorId,
                    user_id: reportId,
                })
                .then(res => {
                    document.getElementById('success_patient').innerHTML = msg;
                    $("body").css("cursor", "default");
                    // location.reload();
                    // console.log(res);
                })
                .catch(err => {
                    $("body").css("cursor", "default");
                    // console.log(err);
                    // location.reload();
                })
            }
        </script>
    </body>
</html>
