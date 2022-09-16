@extends('layouts.app')

@section('content')


<?php

$report_status = Config::get('static_array.report_status');

?>


<div class="container-fluid">

    <div class="card mb-4">
        <h3 class="mb-0 px-3 py-4"><b>@lang('web.dashboard')</b></h3>
    </div>
    <!-- Content Row -->


    <div class="row">
        <div class="col-md-12">
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
                                            <label class="from-label">@lang('web.status')  : {{ $patient->report_status ?? 'New' }}</label>

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="form-group">
                                                <label class="from-label">@lang('web.doctor') : {{ $patient->doctor_name ?? 'Not Assigned' }}</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <span class="badge badge-info">@if(isset($patient->on_behalf_relation)) @lang('web.'.$patient->on_behalf_relation) @endif</span>
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
                                <span class="badge badge-info">@if($patient->gender) @lang('web.'.$patient->gender) @endif</span>
                            </div>
                            <div class="form-group">
                                <h4>@lang('web.profession'):</h4>
                                <span class="badge badge-info">@if($patient->profession) @lang('web.'.$patient->profession) @endif</span>
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
                                @if($patient->nation)
                                <span class="badge badge-info">@lang('web.'.$patient->nation)</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <h4>@lang('web.vaccine_type'):</h4>
                                @if($patient->vaccine_type)
                                <span class="badge badge-info">@lang('web.'.$patient->vaccine_type)</span>
                                @endif
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
                                @if($patient->complaints)
                                    <span class="badge badge-info">@lang('web.'.$patient->complaints)</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <h4>@lang('web.symptoms'):</h4>
                                @if($patient->symptoms)
                                    <span class="badge badge-info">@lang('web.'.$patient->symptoms)</span>
                                @endif
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
                                <span class="badge badge-info">@lang('web.'.$patient->affect_quality)</span>
                                @else
                                <span class="badge badge-danger">Not Available</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <h4>@lang('web.hospitalized'):</h4>
                                @if ($patient->hospitalized)
                                <span class="badge badge-info">@lang('web.'.$patient->hospitalized)</span>
                                @else
                                <span class="badge badge-danger">Not Available</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <h4>@lang('web.ward_type'):</h4>
                                @if ($patient->ward_type)
                                <span class="badge badge-info">@lang('web.'.$patient->ward_type)</span>
                                @else
                                <span class="badge badge-danger">Not Available</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <h4>@lang('web.hospitalized_duration'):</h4>
                                @if ($patient->hospitalized_duration)
                                    <span class="badge badge-info">@lang('web.'.$patient->hospitalized_duration)</span>
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
                                @if($patient->effect_duration)
                                <span class="badge badge-info">@lang('web.'.$patient->effect_duration)</span>
                                @else
                                <span class="badge badge-danger">Not Available</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <h4>@lang('web.present_status'):</h4>
                                @if ($patient->present_status)
                                    <span class="badge badge-info">@lang('web.'.$patient->present_status)</span>
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
                                <span class="badge badge-info">@lang('web.'.$patient->effect_confirm)</span>
                                @else
                                <span class="badge badge-danger">Not Available</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <h4>@lang('web.report'):</h4>
                                @if ($patient->report)
                                <span class="badge badge-info">@lang('web.'.$patient->report)</span>
                                @else
                                <span class="badge badge-danger">Not Available</span>
                                @endif

                            </div>
                            <div class="form-group">
                                <h4>@lang('web.npra'):</h4>
                                @if ($patient->npra)
                                <span class="badge badge-info">@lang('web.'.$patient->npra)</span>
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
</div>


@endsection
