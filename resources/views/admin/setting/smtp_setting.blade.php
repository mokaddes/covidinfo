@extends('layouts.app')
@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>@lang('web.email')</b></h3>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="container pl-0 pr-0 ml-0 mr-0 w-100 mw-100">
                            <div id="tabs">
                                <ul class="nav nav-pills nav-secondary nav-justified mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#conf">@lang('web.configuration')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#template">@lang('web.template')</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="conf" class="container tab-pane active"><br>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <form class="admin-form" action="{{ route('admin.smtp.setting.update', $smtp->id) }}" method="POST">
                                                    @csrf
                                                    <div class="form-group ">
                                                        <label for="email_host">@lang('web.smtp_driver')</label>
                                                        <input type="text" class="form-control " id="email_driver" name="email_driver" placeholder="Enter SMTP Driver" value="{{ $smtp->email_driver }}" required>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="email_host">@lang('web.smtp_host')</label>
                                                        <input type="text" class="form-control " id="email_host" name="email_host" placeholder="Enter SMTP Host" value="{{ $smtp->email_host }}" required>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="email_port">@lang('web.smtp_port')</label>
                                                        <input type="text" class="form-control " id="email_port" name="email_port" placeholder="Enter SMTP Port" value="{{ $smtp->email_port }}" required>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="email_encryption">@lang('web.smtp_encryption')</label>
                                                        <input type="text" class="form-control " id="email_encryption" name="email_encryption" placeholder="Enter SMTP Encryption" value="{{ $smtp->email_encryption }}" required>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="email_user">@lang('web.smtp_username')</label>
                                                        <input type="text" class="form-control " id="email_user" name="email_user" placeholder="Enter SMTP Username" value="{{ $smtp->email_user }}" required>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="email_pass">@lang('web.smtp_pass')</label>
                                                        <input type="text" class="form-control " id="email_pass" name="email_pass" placeholder="Enter SMTP Password" value="{{ $smtp->email_pass }}" required>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="email_from">@lang('web.email_form')</label>
                                                        <input type="text" class="form-control " id="email_from" name="email_from" placeholder="Enter Email From" value="{{ $smtp->email_from }}" required>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="email_from_name">@lang('web.email_form_name')</label>
                                                        <input type="text" class="form-control " id="email_from_name" name="email_from_name" placeholder="Enter Email From Name" value="{{ $smtp->email_from_name }}" required>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="contact_email">@lang('web.contact_email')</label>
                                                        <input type="text" class="form-control " id="contact_email" name="contact_email" placeholder="Enter Contact Email" value="{{ $smtp->contact_email }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-secondary">@lang('web.submit')</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="template" class="tab-pane"><br>

                                        <!-- DataTales -->
                                        <div class="card shadow mb-1">
                                            <div class="card-body">

                                                <div class="gd-responsive-table">
                                                    <div id="admin-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-bordered table-striped dataTable no-footer" id="admin-table" width="100%" cellspacing="0" role="grid" aria-describedby="admin-table_info" style="width: 100%;">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th width="20%" class="sorting_disabled" rowspan="1" colspan="1" >@lang('web.type')</th>
                                                                            <th width="20%" class="sorting_disabled" rowspan="1" colspan="1" >@lang('web.subject')</th>
                                                                            <th width="40%" class="sorting_disabled" rowspan="1" colspan="1" >@lang('web.body')</th>
                                                                            <th width="5%" class="sorting_disabled" rowspan="1" colspan="1" >@lang('web.for')</th>
                                                                            <th width="5%" class="sorting_disabled" rowspan="1" colspan="1" >@lang('web.status')</th>
                                                                            <th width="10%" class="sorting_disabled" rowspan="1" colspan="1" >@lang('web.action')</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($email_template as $row)
                                                                        <tr role="row" class="even">
                                                                            <td>{{ $row->type }}</td>
                                                                            <td>{{ $row->subject }}</td>
                                                                            <td>{{ $row->body }}</td>
                                                                            <td>{{ $row->temp_for }}</td>
                                                                            <td>{{ $row->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                                            <td>
                                                                                <div class="action-list text-center">
                                                                                    <a class="btn btn-secondary btn-sm" href="{{ route('admin.email.edit', $row->id) }}">
                                                                                        <i class="fas fa-edit"></i> Edit
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
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
