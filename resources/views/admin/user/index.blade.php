@extends('layouts.app')
@section('content')
<!-- Start of Main Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>User List</b></h3>
                <a class="btn btn-primary  btn-sm" href="{{ route('admin.user.create') }}"><i class="fas fa-plus"></i>Add User</a>
            </div>
        </div>
    </div>
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="" id="success_patient"></div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <div> {{$message}} </div>
        </div>
        @endif
        <div class="card-body">
            <div class="gd-responsive-table">
                <table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Role</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $key=>$row)
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                 @if($row->avatar)
                                    <img src="{{ asset($row->avatar) }}" width="120" alt="">
                                 @else
                                    N/A
                                 @endif
                            </td>
                            <td>
                                @if($row->role == '0')
                                    <span class="badge badge-primary">SuperAdmin</span>
                                @else
                                    <span class="badge badge-success">Admin</span>
                                @endif
                            </td>
                            <td>{{ $row->phone_number }}</td>
                            <td class="text-center">
                                <div class="action-list">
                                    <a class="btn btn-secondary btn-sm" title="edit" href="{{ route('admin.user.edit', $row->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" title="delete" id="delete" href="{{ route('admin.user.destroy', $row->id) }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
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