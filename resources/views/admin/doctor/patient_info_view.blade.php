@extends('layouts.app')
@section('content')
<style>
    .form-group {
        border: 1px solid #f5f5f5;
        margin: 3px;
    }

    .report_form_data h4 {
        font-size: 14px;
        font-weight: 700;
        color: #575757;
    }
</style>


<?php

$report_status = Config::get('static_array.report_status');

?>


<!-- Start of Main Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>@lang('web.covid_report_info')</b></h3>
                <a class="btn btn-primary  btn-sm" href="{{ route('admin.patient.index') }}"><i class="fas fa-chevron-left"></i> @lang('web.go_back')</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <div> {{$message}} </div>

    </div>
    @endif
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body report_form_data">
            <form action="{{route('patientreport.update')}}" method="post">
                @csrf
                <!-- Nested Row within Card Body -->
                <div class="row no-gutters">
                    <div class="col-sm-7">
                        <div class="row no-gutters">
                            <div class="col-lg-3">
                                <img src="{{ asset($patient->avatar ?? 'frontend/assets/images/patient/patient.jpg') }}" width="90" class="rounded img-thumbnail" alt="Avatar">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label class="from-label">@lang('web.status') : {{ $report_status[$patient->report_status] ?? '' }}</label>
                                    {{-- <select name="report_status" class="form-control" required>
                                        <option value="1" @if(!empty($patient->report_status)) @php if ($patient->report_status == 1) { echo "selected"; } @endphp @endif>Attended</option>
                                        <option value="2" @if(!empty($patient->report_status)) @php if ($patient->report_status == 2) { echo "selected"; } @endphp @endif>Under treatments</option>
                                        <option value="3" @if(!empty($patient->report_status)) @php if ($patient->report_status == 3) { echo "selected"; } @endphp @endif>Victim dead</option>
                                        <option value="4" @if(!empty($patient->report_status)) @php if ($patient->report_status == 4) { echo "selected"; } @endphp @endif>Give some medicine</option>
                                        <option value="5" @if(!empty($patient->report_status)) @php if ($patient->report_status == 5) { echo "selected"; } @endphp @endif>Problem solve</option>
                                    </select> --}}
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                        <label class="from-label">@lang('web.doctor') : {{ $patient->doctor_name }}</label>
                                        {{-- <select name="doctor_id" class="form-control" required>
                                        <option value="" style="display:none;">Select Doctors</option>
                                        @foreach($doctors as $row)
                                            <option value="{{ $row->id }}" @if(!empty($patient->doctor_id)) @php if ($patient->doctor_id == $row->id) { echo "selected"; } @endphp @endif>{{ $row->name }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-5">
                        <div class="form-group">
                            <label class="form-lable">@lang('web.remarks')</label>
                            <textarea name="remarks" class="form-control mb-4" cols="30" rows="3" >{!! $patient->remarks ?? '' !!}</textarea>
                            <input type="hidden" name="user_id" value="{{$patient->user_id}}" class="form-control mb-4" />
                            <button type="submit" class="btn btn-info">@lang('web.update')</button>
                        </div>
                    </div> --}}
                </div>
            </form>
            <hr>
            <div class="row no-gutters mt-2">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <h4>@lang('web.on_behalf'):</h4>
                        <span class="badge badge-info">{{$patient->on_behalf ?? ''}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.on_behalf_relation'):</h4>
                        <span class="badge badge-info">{{$patient->on_behalf_relation ?? ''}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.recipient_name'):</h4>
                        <span class="badge badge-info">{{$patient->recipient_name ?? ''}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.age'):</h4>
                        <span class="badge badge-info">{{$patient->age ?? ''}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.gender'):</h4>
                        <span class="badge badge-info">{{$patient->gender ?? ''}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.profession'):</h4>
                        <span class="badge badge-info">{{$patient->profession ?? ''}}</span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <h4>@lang('web.previous_disease'):</h4>
                        @if ($patient->previous_disease)
                            @if(isset($previous_disease) && count($previous_disease) > 0 )
                                @foreach($previous_disease as $key => $previous_dis)

                                    <span class="badge badge-info">{{ $previous_dis->name }}</span>
                                @endforeach
                            @endif
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.covid_side_effect_id'):</h4>
                        @if($patient->covid_side_effect_id)
                            @if(isset($covid_side_effects) && count($covid_side_effects) > 0 )
                                @foreach($covid_side_effects as $key => $covid_side_effect)
                                    <span class="badge badge-info">{{$covid_side_effect->name}}</span>
                                @endforeach
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.nation'):</h4>
                        <span class="badge badge-info">{{$patient->nation}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.vaccine_type'):</h4>
                        <span class="badge badge-info">{{$patient->vaccine_type}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.vaccine_date'):</h4>
                        <span class="badge badge-info">{{$patient->vaccine_date}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.vaccine_location'):</h4>
                        <span class="badge badge-info">{{$patient->vaccine_location}}</span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <h4>@lang('web.vaccine_batch'):</h4>
                        <span class="badge badge-info">{{ $patient->vaccine_batch}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.complaints'):</h4>
                        <span class="badge badge-info">{{$patient->complaints}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.symptoms'):</h4>
                        <span class="badge badge-info">{{$patient->symptoms}}</span>
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.other_effect'):</h4>
                        @if ($patient->other_effect)
                        <span class="badge badge-info">{{$patient->other_effect}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.affect_quality'):</h4>
                        @if ($patient->affect_quality)
                        <span class="badge badge-info">{{$patient->affect_quality}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.hospitalized'):</h4>
                        @if ($patient->hospitalized)
                        <span class="badge badge-info">{{$patient->hospitalized}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <h4>@lang('web.ward_type'):</h4>
                        @if ($patient->ward_type)
                        <span class="badge badge-info">{{$patient->ward_type}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.hospitalized_duration'):</h4>
                        @if ($patient->hospitalized_duration)
                        <span class="badge badge-info">{{$patient->hospitalized_duration}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.hospital_name'):</h4>
                        @if ($patient->hospital_name)
                        <span class="badge badge-info">{{$patient->hospital_name}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.effect_duration'):</h4>
                        @if ($patient->effect_duration)
                        <span class="badge badge-info">{{$patient->effect_duration}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.present_status'):</h4>
                        @if ($patient->present_status)
                        <span class="badge badge-info">{{$patient->present_status}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.diagnosis'):</h4>
                        @if ($patient->diagnosis)
                        <span class="badge badge-info">{{$patient->diagnosis}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <h4>@lang('web.effect_confirm'):</h4>
                        @if ($patient->effect_confirm)
                        <span class="badge badge-info">{{$patient->effect_confirm}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.report'):</h4>
                        <span class="badge badge-info">{{$patient->report}}</span>
                        @if ($patient->report)
                        <span class="badge badge-info">{{$patient->report}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif

                    </div>
                    <div class="form-group">
                        <h4>@lang('web.npra'):</h4>
                        @if ($patient->npra)
                        <span class="badge badge-info">{{$patient->npra}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.contact'):</h4>
                        @if ($patient->contact)
                        <span class="badge badge-info">{{$patient->contact}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.comments'):</h4>
                        @if ($patient->comments)
                        <span class="badge badge-info">{{$patient->comments}}</span>
                        @else
                        <span class="badge badge-danger">Not Available</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.file'):</h4>
                        @if ($patient->file)
                        <img src="{{ asset($patient->file) }}" class="img-thumbnail" width="100" alt="avatar">
                        @else
                        <span class="badge badge-danger">No File</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
