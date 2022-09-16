@extends('layouts.app')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>@lang('web.edit_patient')</b></h3>
                <a class="btn btn-primary  btn-sm" href="{{ route('admin.patient.index') }}"><i class="fas fa-chevron-left"></i>@lang('web.go_back')</a>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="admin-form" action=" {{ route('admin.patient.update', $patient->id) }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">@lang('web.name') *</label>
                            <input type="text" name="name" class="form-control item-name" id="name" value=" {{ $patient->name }} ">
                            @error('name')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">@lang('web.email') *</label>
                            <input type="text" name="email" class="form-control" id="email" value=" {{ $patient->email }} ">
                            @error('email')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number <span style="color:red;">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+60</span>
                                </div>
                                <input type="number" id="phone_number" value="{{ substr($patient->phone_number ?? '', 3) }}" name="phone_number" class="form-control item-name" required>
                            </div>
                            @error('phone_number')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>@lang('web.change_pass')</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>

                        <div class="form-group">
                            <h5>@lang('web.current_avatar')</h5>
                            <img src="{{ asset($patient->avatar ?? 'frontend/assets/images/patient/patient.jpg' ) }}" width="60" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">@lang('web.add_new_avatar') (@lang('web.patient_image'))</label>
                            <input type="file" name="avatar" accept="image/*" class="upload-photo dropify" name="favicon" id="file-input-now" data-height="80" data-width="150">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary ">@lang('web.submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

@push('footer_script')
<script>
    $(document).ready(function() {
        // input file image
        $('.dropify').dropify();
    })
</script>
@endpush

@endsection
