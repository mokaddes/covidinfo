@extends('layouts.app')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>@lang('web.update_template')</b></h3>
                <a class="btn btn-primary  btn-sm" href="{{ route('admin.email.setting') }}"><i class="fas fa-chevron-left"></i> Go Back</a>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <form class="admin-form" action="{{ route('admin.email.update', $data->id) }}" method="POST">
                        @csrf
                        <h3>Template : {{ $data->type ?? '' }}</h3>
                        <div class="form-group">
                            <label for="subject">@lang('web.subject') <span class="text-danger">*</span></label>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter Subject" value="{{ $data->subject }}" required>
                        </div>
                        <div class="form-group">
                            <label for="body">@lang('web.body') <span class="text-danger">*</span></label>
                            <textarea name="body" id="body" class="form-control " rows="5" placeholder="Enter Email Body" required>{!! $data->body !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="subject">@lang('web.status') <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" required>
                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0"  {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">@lang('web.subject')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

@endsection
