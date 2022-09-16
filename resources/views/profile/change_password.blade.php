@extends('layouts.app')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>Change Password</b></h3>
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
            @if ($message = Session::get('error'))
            <div class="alert alert-success">
                <div> {{$message}} </div>
            </div>
            @endif
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('update.password') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Current Password <span class="text-danger">*</span></label>
                            <input type="password" name="old_password" class="form-control item-name" required>
                            @error('old_password')
                            <div class="text text-danger">{{ 'The password field is required.' }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">New Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control item-name" required>
                            @error('password')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Re-Type New Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control item-name">
                            @error('password_confirmation')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

@endsection