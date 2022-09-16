@extends('layouts.app')
@push('header_script')
<style>
    .note-editor.note-frame .note-editing-area .note-editable{
        height: 150px;
    }
</style>
@endpush
@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>@lang('web.privacy_policy')</b></h3>
            </div>
        </div>
    </div>
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body ">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <div> {{$message}} </div>
            </div>
            @endif
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('privacy_policy.update', $data->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ $data->title }}"  class="form-control" required>
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Details <span class="text-danger">*</span></label>
                            <textarea name="details" class="form-control text-editor" rows="5" required>
                                {!! $data->details !!}
                            </textarea>
                            @error('details')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
