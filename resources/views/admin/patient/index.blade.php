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
                <h3 class="mb-0 bc-title"><b>@lang('web.patient_report_list')</b></h3>
                <a class="btn btn-primary  btn-sm" href="{{ route('admin.patient.create') }}"><i class="fas fa-plus"></i>@lang('web.add_patient')</a>
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
                            <th>@lang('web.name')</th>
                            <th>@lang('web.email')</th>
                            <th>@lang('web.avatar')</th>
                            <th>@lang('web.status')</th>
                            <th>@lang('web.doctor')</th>
                            <th>@lang('web.action')</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        @if ($patient->role == 3)
                        <tr>
                            <td  class="text-center">{{++$i}}</td>
                            <td>{{$patient->name}}</td>
                            <td>{{$patient->email}}</td>
                            <td>
                                <img src="{{ asset($patient->avatar ?? 'frontend/assets/images/patient/patient.jpg') }}" width="50" alt="image">
                            </td>

                            <td>
                                <select name="report_status" class="form-control">
                                    <option value="" style="display:none;">Select</option>
                                    @if(isset($report_status) && count($report_status) > 0 )
                                        @foreach($report_status as $key => $status)
                                            <option value="{{ $key }}" {{ $patient->report_status == $key ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    @endif


                                </select>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="hidden" value="{{$patient->id}}" name="report_id">
                                    <select name="doctor_id" class="form-control">
                                        <option value="" style="display:none;">Select Doctors</option>
                                        @foreach($doctors as $row)
                                            <option value="{{ $row->id }}" {{ $patient->doctor_id == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            
                                <td  class="text-center">
                                <div class="action-list">
                                    <a class="btn btn-primary btn-sm" title="view" href="{{ route('admin.patient.report.view', $patient->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if (Auth::user()->role == 0)
                                        <a class="btn btn-secondary btn-sm" title="update credantial" href="{{ route('admin.patient.edit', $patient->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a class="btn btn-success btn-sm" title="update report" href="{{ route('patient.report.edit', $patient->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a class="btn btn-danger btn-sm" title="delete" id="delete" href=" {{ URL::to('/patients/delete/'.$patient->id) }} ">
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

@endsection
