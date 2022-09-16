@extends('layouts.app')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>@lang('web.update_template')</b></h3>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <form class="admin-form" action="{{ route('email.update', $data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="subject">@lang('web.subject') <span class="text-danger">*</span></label>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter Subject" value="{{ $data->subject }}" required>
                        </div>
                        <div class="form-group">
                            <label for="body">@lang('web.body') <span class="text-danger">*</span></label>
                            <textarea name="body" id="body" class="form-control " rows="5" placeholder="Enter Email Body" required>{!! $data->body !!}</textarea>
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