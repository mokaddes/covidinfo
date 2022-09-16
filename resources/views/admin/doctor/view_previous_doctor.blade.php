 @extends('layouts.app')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>@lang('web.previous_doctor')</b></h3>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <div> {{$message}} </div>
            </div>
            @endif
            <div class="gd-responsive-table">
                <table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>@lang('web.name')</th>
                            <th>@lang('web.email')</th>
                            <th>@lang('web.avatar')</th>
                            <th>@lang('web.specialties')</th>
                        </tr>
                    </thead>

                    <tbody>
                         @foreach ($doctors as $k => $doctor)
                         <tr>
                            <td>{{ $k+1 }}</td>
                            <td> {{ $doctor->name }} </td>
                            <td> {{ $doctor->email }} </td>
                            <td><img src="{{ asset($doctor->avatar ?? 'frontend/assets/images/doctor/doctor.jpg') }}" width="60" alt="image"></td>
                            <td>
                                @if($doctor->specialties)
                                    {{ $doctor->specialties }}
                                @else
                                    <span class="badge badge-info"><strong>N/A</strong></span>
                                @endif

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
