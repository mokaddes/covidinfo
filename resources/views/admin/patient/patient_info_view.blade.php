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
                    <div class="col-12">
                        <div class="row no-gutters">
                            <div class="col-xl-2">
                                <img src="{{ asset($patient->avatar ?? 'frontend/assets/images/patient/patient.jpg') }}" width="90" class="rounded img-thumbnail" alt="Avatar">
                            </div>
                            <div class="col-xl-10">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label class="from-label">@lang('web.status') :@if (isset($patient->report_status)) {{ $report_status[$patient->report_status] ?? '' }} @endif</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                        <label class="from-label">@lang('web.doctor') : {{ $patient->doctor_name ?? '' }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(isset($remarks) && count($remarks) > 0 )
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="from-label">@lang('web.remarks') : {{ $patient->remarks ?? '' }} </label>
                                        </div>
                                        <table class="table table-bodered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Treatment By</th>
                                                    <th>Treatment At</th>
                                                    <th>Treatment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($remarks as $key => $row )
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $row->remark_by_name }}</td>
                                                    <td>{{ date('d M, Y',strtotime($row->created_at)) }}</td>
                                                    <td>{{ $row->details }}</td>
                                                </tr>

                                                @endforeach
                                                
                                            </tbody>
                                           
                                        </table>
                                    </div>
                                    @endif 

                                    <div class="col-12">
                                        <div class="form-group">
                                            <a class="btn-sm btn-primary" href="{{ route('view.previous.doctor', $patient->id ?? '') }}">View Doctor</a>
                                            {{-- <button class="btn-sm btn-info">Print</button> --}}
                                            <a onclick="printDiv()" class="btn-sm btn-info print" href="">Print</a>
                                            <a href="" class="btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter">Remarks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <hr>
            <div id="divprint" class="row no-gutters mt-2">
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

                        {{--
                            @if ($previous_disease)
                            @if(isset($previous_disease) && count($previous_disease) > 0 )
                                @foreach($previous_disease as $key => $previous_dis)
                                    <span class="badge badge-info">{{ $previous_dis->name }}</span>
                                @endforeach
                            @endif

                        @else
                            <span class="badge badge-danger">Not Available</span>
                        @endif --}}
                    </div>
                    <div class="form-group">
                        <h4>@lang('web.covid_side_effect_id'):</h4>
                        {{-- @if($covid_side_effect_id)
                            @if(isset($covid_side_effects) && count($covid_side_effects) > 0 )
                                @foreach($covid_side_effects as $key => $covid_side_effect)
                                    <span class="badge badge-info">{{$covid_side_effect->name}}</span>
                                @endforeach
                            @endif
                        @endif --}}
                    </div>
                    @if (isset($patient))
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
                @endif
            </div>
           
        </div>
</div>



 {{-- Remarks Modal --}}
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Set threatments</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.patient.remarks') }}" method="POST">
                @csrf
                <input type="hidden" name="covideffect_id" value="{{ $patient->id }}"/>
                <div class="form-group">
                    <input type="hidden" name="id" value="{{-- $patient->id --}}">
                    <label for="remarks" class="control-label">Threatments</label>
                    <textarea type="text" name="remarks" id="" class="form-control" ></textarea>
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
            </form>
      </div>
    </div>
  </div>
    <script>
        function printDiv() {
            var divContents = document.getElementById("divprint").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > <h1 style="color:green"> Patient Report </h1> <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection
