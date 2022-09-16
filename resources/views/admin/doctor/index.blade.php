@extends('layouts.app')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>@lang('web.doctor_list')</b></h3>
                <a class="btn btn-primary  btn-sm" href="{{ route('admin.doctor.create') }}"><i class="fas fa-plus"></i> @lang('web.add_doctor')</a>
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
                            <th>@lang('web.action')</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($doctors as $doctor)
                        @if ($doctor->role == 2)
                        <tr>
                            <td  class="text-center">{{++$i}}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>
                                <img src="{{ asset($doctor->avatar ?? 'frontend/assets/images/doctor/doctor.jpg') }}" width="60" alt="image">
                            </td>
                            <td>
                                @if($doctor->specialties)
                                {{ $doctor->specialties }}
                                @else
                                <span class="badge badge-info"><strong>N/A</strong></span>
                                @endif

                            </td>
                           
                           @if(Auth()->user()->role == 0)
                                <td class="text-center">
                                    <div class="action-list">
                                        <a class="btn btn-secondary btn-sm" title="edit" href="{{ route('admin.doctor.edit', $doctor->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" title="delete" id="delete" href="{{ URL::to('/doctors/delete/'.$doctor->id) }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            @else 
                                <td>N/A</td>
                            @endif
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
