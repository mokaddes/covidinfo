@extends('layouts.app')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>Create User</b></h3>
                <a class="btn btn-primary  btn-sm" href="{{ route('admin.user.create') }}"><i class="fas fa-plus"></i>Add User</a>
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
                    <form action="{{ route('admin.user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control item-name" required>
                            @error('name')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" name="email" class="form-control item-name" required>
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
                                <input type="number" id="phone_number" name="phone_number" class="form-control item-name" required>
                            </div>
                            @error('phone_number')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-control" required>
                                <option value="" class="d-none">Select Role</option>
                                <option value="0">Super admin</option>
                                <option value="1">Admin</option>
                            </select>
                            @error('role')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" id="password" name="password" class="form-control item-name" required>
                            </div>
                            @error('password')
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
@push('footer_script')
    <script>
        $(document).ready(function() {
            // input file image
            $('.dropify').dropify();
        })
    </script>
@endpush

@endsection
