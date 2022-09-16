@extends('layouts.app')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b> @lang('web.add_doctor')</b></h3>
                <a class="btn btn-primary  btn-sm" href="{{ route('admin.doctor.index') }}"><i class="fas fa-chevron-left"></i>@lang('web.go_back')</a>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="admin-form" action=" {{ route('admin.doctor.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">@lang('web.name') <span style="color:red;">*</span></label>
                            <input type="text" name="name" class="form-control item-name" required>
                            @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">@lang('web.email') <span style="color:red;">*</span></label>
                            <input type="email" name="email" class="form-control item-name" required>
                            @error('email')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">@lang('web.specialties') <span style="color:red;">*</span></label>
                            <input type="text" name="specialties" class="form-control" required>
                            @error('specialties')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">@lang('web.password') <span style="color:red;">*</span></label>
                            <input type="password" name="password" class="form-control" required>
                            @error('password')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">@lang('web.avatar') (@lang('web.doctor_image'))</label>
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
