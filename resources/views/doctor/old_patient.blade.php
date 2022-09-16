@extends('layouts.app')
@section('content')

<?php

$report_status = Config::get('static_array.report_status');

?>

<!-- Start of Main Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>@lang('web.old_patient_report_list')</b><span class="badge badge-info">{{count($patients)}}</span></h3>
            </div>
        </div>
    </div>
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="" id="success_patient"></div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <div> {{$message}} </div>

        </div>
        @endif
        <div class="card-body">
            <div class="gd-responsive-table">
                <table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>@lang('web.patient_name')</th>
                            <th>@lang('web.patient_email')</th>
                            <th>@lang('web.patient_photo')</th>
                            <th>@lang('web.patient_status')</th>
                            <th>@lang('web.doctor_name')</th>
                            <th>@lang('web.action')</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr>
                            <td class="text-center">{{++$i}}</td>
                            <td>{{$patient->name}}</td>
                            <td>{{$patient->email}}</td>
                            <td>
                                <img src="{{ asset($patient->avatar ?? 'frontend/assets/images/patient/patient.jpg') }}" width="50" alt="image">
                            </td>

                            <td>

                                @if($patient->status == 1)
                                Active
                                @else
                                 Inactive
                                @endif

                            </td>
                            <td>
                                {{ $patient->doctor_name }}
                            </td>

                            <td class="text-center">
                                <div class="action-list">
                                    <a class="btn btn-primary btn-sm" title="view"
                                        href="{{ route('doctor.patient.report.view', $patient->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    {{-- <a class="btn btn-secondary btn-sm" title="edit" href="{{ route('patient.edit', $patient->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" title="delete" id="delete"
                                        href=" {{ URL::to('/patients/delete/'.$patient->id) }} }} ">
                                        <i class="fas fa-trash-alt"></i>
                                    </a> --}}
                                </div>
                            </td>
                        </tr>


                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

</div>

@endsection
