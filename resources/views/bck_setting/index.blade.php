@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js"></script>

<style>
    .tag_input .bootstrap-tagsinput {
        width: 100%;
        border: 1px solid #EEE;
        border-radius: 1px;
        box-shadow: none;
        min-height: 37px;
    }

    .tag_input .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: black;
        background: #DDD;
        padding: 0px 7px;
        border-radius: 4px;
        font-size: 13px;
    }
</style>
<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>@lang('web.settings')</b></h3>
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
            <form class="admin-form" action="{{ route('admin.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="nav flex-column m-3 nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active show" data-toggle="pill" href="#basic">@lang('web.basic_info')</a>
                            <a class="nav-link" data-toggle="pill" href="#media">Media</a>
                            <a class="nav-link" data-toggle="pill" href="#seo">Seo</a>
                            <a class="nav-link" data-toggle="pill" href="#footer">Footer</a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div id="tabs">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="basic" class="tab-pane active show"><br>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="app_name">@lang('web.app_name') <span style="color:red;">*</span></label>
                                                <input type="text" name="app_name" class="form-control" id="app_name" placeholder="Enter Website Title" value="{{ $setting->app_name }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="media" class="tab-pane"><br>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <ul class="nav nav-pills nav-justified nav-secondary nav-pills-no-bd">
                                                <li class="nav-item submenu">
                                                    <a class="nav-link active show" data-toggle="pill" href="#logo">@lang('web.logo')</a>
                                                </li>
                                                <li class="nav-item submenu">
                                                    <a class="nav-link" data-toggle="pill" href="#favicon">@lang('web.favicon')</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="logo" class="container tab-pane active show"><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12 ">
                                                            <div class="form-group">
                                                                <label for="name">@lang('web.current_image')</label>
                                                                <div class="col-lg-12 pb-1">
                                                                    <img class="admin-setting-img" name="logo" src="{{ asset($setting->logo) }}" style="width:150px;" alt="No Image Found">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>@lang('web.upload_logo')</label>
                                                                <input type="file" accept="image/*" class="upload-photo dropify" name="logo" id="file-input-now" data-height="80" data-width="150">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div id="favicon" class="container tab-pane"><br>
                                                    <div class="row justify-content-center">

                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="name">@lang('web.current_image')</label>
                                                                <div class="col-lg-12 pb-1">
                                                                    <img class="admin-setting-img my-mw-100" src="{{ asset($setting->favicon) }}" style="width:80px;" alt="No Image Found">
                                                                </div>
                                                            </div>

                                                            <div class="form-group position-relative ">
                                                                <label>@lang('web.upload_fav')</label>
                                                                <input type="file" accept="image/*" class="upload-photo dropify" name="favicon" id="file-input-now" data-height="80" data-width="150">
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="seo" class="tab-pane"><br>

                                    <div class="row justify-content-center">

                                        <div class="col-lg-8">
                                            <div class="form-group tag_input">
                                                <label for="meta_keywords">@lang('web.site_meta_keywords') <span style="color:red;">*</span></label>
                                                <input type="text" data-role="tagsinput" value="{{ $setting->keywords }}" name="keywords" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">@lang('web.site_meta_des') <span style="color:red;">*</span></label>
                                                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Site Meta Description" spellcheck="false" required>{{ $setting->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="footer" class="tab-pane"><br>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="tab-content">
                                                <div id="footer_basic" class="container tab-pane active"><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="footer">@lang('web.copyright') <span style="color:red;">*</span></label>
                                                                <textarea name="footer" id="footer" class="form-control" rows="3" placeholder="Copyright" required>{{ $setting->footer }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary ">@lang('web.submit')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

</div>
@endsection
