@extends('layouts.app')
@push('header_script')
 <link href="{{ asset('back/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
 <style>
    .btn.btn-secondary i {color: #fff;}
    .icon-big {
        color: #fff;
        border-radius: 3px;
    }
    .col-icon i {
        color: #fff !important;
    }
    .col-icon .bg-secondary {
        background: #3f51b5 !important;
    }
    .col-icon .bg-light {
    background: #009688 !important;
}
.col-icon .bg-warning {
    background: #4caf50 !important;
}
</style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <h3 class="mb-0 px-3 py-4"><b>@lang('web.dashboard')</b></h3>
    </div>
    <!-- Content Row -->
    <div class="row dashboard_card">
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center bg-primary bubble-shadow-small">
                                <i class="fas fa-user-md"></i>
                            </div>
                        </div>
                        <div class="col col-stats col-sm-12 ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>@lang('web.total_doctor')</b></p>
                                <h4 class="card-title">{{ count($doctors) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center bg-secondary bubble-shadow-small">
                                <i class="fas fa-user-md"></i>
                            </div>
                        </div>
                        <div class="col col-stats col-sm-12 ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>@lang('web.total_attended')</b></p>
                                <h4 class="card-title">{{$attendend}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-12 col-md-4 col-xl-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center bg-success bubble-shadow-small">
                                <i class="fas fa-user-md"></i>
                            </div>
                        </div>
                        <div class="col col-stats col-sm-12 ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>@lang('web.total_aefi')</b></p>
                                <h4 class="card-title">50</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center bg-dark bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats col-sm-12 ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>@lang('web.total_patients')</b></p>
                                <h4 class="card-title">{{ count($patients) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center bg-danger bubble-shadow-small">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                        <div class="col col-stats col-sm-12 ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>@lang('web.total_covid_reports')</b></p>
                                <h4 class="card-title">{{ count($covid_reports) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-xl-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center bg-warning bubble-shadow-small">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                        <div class="col col-stats col-sm-12 ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>@lang('web.last_7days_report')</b></p>
                                <h4 class="card-title">{{ count($LastSevendays) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center bg-info bubble-shadow-small">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                        <div class="col col-stats col-sm-12 ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>@lang('web.total_dead')</b></p>
                                <h4 class="card-title">{{$dead}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center bg-light bubble-shadow-small">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                        <div class="col col-stats col-sm-12 ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>@lang('web.under_treatments')</b></p>
                                <h4 class="card-title">{{$under_treatment}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-flush h-xl-100">
            <!--begin::Header-->
            <div class="card-header d-flex pt-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">Report Strategy</span>
                    <span class="text-gray-400 mt-1 fw-bold fs-6">Reports of all status</span>
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <ul class="nav" id="kt_chart_widget_11_tabs">
                        <li class="nav-item">
{{--                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_11_tab_2" href="#kt_chart_widget_11_tab_content_2">2021</a>--}}
                        </li>
                        <li class="nav-item">
{{--                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1 active" data-bs-toggle="tab" id="kt_chart_widget_11_tab_3" href="#kt_chart_widget_11_tab_content_3">Month</a>--}}
{{--                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1 active" data-bs-toggle="tab" id="kt_chart_widget_11_tab_3" href="#kt_chart_widget_11_tab_content_3">&nbsp;</a>--}}
                        </li>
                    </ul>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::Tab content-->
                <div class="tab-content">
                    <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_2" role="tabpanel">
                        <!--begin::Statistics-->
                        <div class="mb-2">
                            <!--begin::Statistics-->
                            <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1">3,492</span>
                            <!--end::Statistics-->
                            <!--begin::Description-->
                            <span class="fs-6 fw-bold text-gray-400">Reports in previous year</span>
                            <!--end::Description-->
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Chart-->
                        <div id="kt_chart_widget_11_chart_2" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade active show" id="kt_chart_widget_11_tab_content_3" role="tabpanel">
                        <!--begin::Statistics-->
                        <div class="mb-2">
                            <!--begin::Statistics-->
                            <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1">{{ $report_sum ?? 0 }}</span>
                            <!--end::Statistics-->
                            <!--begin::Description-->
                            <span class="fs-6 fw-bold text-gray-400">Reports graph</span>
                            <!--end::Description-->
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Chart-->
{{--                        <div id="kt_chart_widget_11_chart_3" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>--}}
                        <canvas id="myChart"></canvas>
                        <!--end::Chart-->
                    </div>
                    <!--end::Tab pane-->
                </div>
                <!--end::Tab content-->
            </div>
            <!--end::Body-->
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">@lang('web.recent_covid_report')
                        <a href="{{ route('admin.patient.index') }}"> <button class="float-right btn btn-info" style="float: right">View All</button></a>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="card-body">
                        <div class="gd-responsive-table">
                            <table class="table table-bordered table-striped" id="recent-orders" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>@lang('web.name')</th>
                                        <th>@lang('web.email')</th>
                                        <th>@lang('web.avatar')</th>
                                        <th>@lang('web.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recent_report as $key=>$patient)
                                    @if ($patient->role == 3)
                                    <tr>
                                        <td class="text-center">{{$key+1}}</td>
                                        <td>{{$patient->name}}</td>
                                        <td>{{$patient->email}}</td>
                                        <td>
                                            <img src="{{ asset($patient->avatar ?? 'frontend/assets/images/patient/patient.jpg') }}" width="50" alt="image">
                                        </td>
                                        <td class="text-center">
                                            <div class="action-list">
                                                <a class="btn btn-primary btn-sm" title="view" href="{{ route('admin.patient.report.view', $patient->id) }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if (Auth::user()->role == 0)
                                                    <a class="btn btn-secondary btn-sm" title="edit" href="{{ route('admin.patient.edit', $patient->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" title="delete" id="delete1" href=" {{ URL::to('/patients/delete/'.$patient->id) }} }} ">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('footer_script')
    <script src="{{ asset('back/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('back/js/scripts.bundle.js') }}"></script>
{{--    <script src="{{ asset('back/js/widgets.bundle.js') }}"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, "rgb(238,0,0)");
        gradient.addColorStop(1, "rgba(255,143,143,0.3)");

        const date = new Date();
        const month = date.toLocaleDateString('default', {month: 'long'});
        const labels = {!! $graph_label !!};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Daily Report',
                fill: true,
                backgroundColor: gradient,
                pointBackgroundColor: "#f4f4f4",
                borderColor: 'rgb(255,0,56)',
                data: {{ $graph }},
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                scales: {

                }
            }
        };

        const myChart = new Chart(
            ctx,
            config
        );
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        jQuery.noConflict();
        $(document).on("click", "#delete1", function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link;
                            // swal.fire(
                            // 'Deleted!',
                            // 'Your file has been deleted.',
                            // 'success'
                            // )
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swal.fire(
                            'Cancelled',
                            'Your Data is safe :)',
                            'error'
                            )
                        }
                    });
                });
    </script>
@endpush

@endsection
