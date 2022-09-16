@extends('layouts.app')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>Update Profile</b></h3>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <div> {{$message}} </div>
            </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Current profile image</h5>
                            <img src="{{ asset(Auth()->user()->avatar ?? 'frontend/assets/images/profile/profile.png') }}" class="rounded img-thumbnail" width="100" alt="image">
                        </div>

                        <div class="form-group">
                            <label for="name">Add new profile image</label>
                            <input type="file" name="avatar" class="dropify" id="input-file-now" data-height="100">
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control item-name" value="{{ auth()->user()->name }}">
                            @error('name')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" readonly name="email" class="form-control item-name" value="{{ auth()->user()->email }}">
                            @error('email')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+60</span>
                                </div>
                                <input type="number" id="phone_number" value="{{ substr(auth()->user()->phone_number, 3) }}" name="phone_number" class="form-control item-name" required {{ auth()->user()->role == 3 ? 'readonly' : ''  }}>
                            </div>
                            @error('phone_number')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Update Profile</button>
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
