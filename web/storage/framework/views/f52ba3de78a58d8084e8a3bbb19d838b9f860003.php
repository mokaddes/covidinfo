
<?php $__env->startSection('content'); ?>



<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>Settings</b></h3>
            </div>
        </div>
    </div>
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <form class="admin-form" action="#" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="nav flex-column m-3 nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active show" data-toggle="pill" href="#basic">Basic Information</a>
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
                                                <label for="title">App Name <span style="color:red;">*</span></label>
                                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Website Title" value="PATV">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="media" class="tab-pane"><br>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <ul class="nav nav-pills nav-justified nav-secondary nav-pills-no-bd">
                                                <li class="nav-item submenu">
                                                    <a class="nav-link active show" data-toggle="pill" href="#logo">Logo</a>
                                                </li>
                                                <li class="nav-item submenu">
                                                    <a class="nav-link" data-toggle="pill" href="#favicon">Favicon</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="logo" class="container tab-pane active show"><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12 ">
                                                            <div class="form-group">
                                                                <label for="name">Current Image</label>
                                                                <div class="col-lg-12 pb-1">
                                                                    <img class="admin-setting-img" src="<?php echo e(asset('back/logo.png')); ?>" style="width:150px;" alt="No Image Found">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Upload Logo</label>
                                                                <input type="file" accept="image/*" class="upload-photo dropify" name="logo" id="file-input-now" data-height="80" data-width="150">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div id="favicon" class="container tab-pane"><br>
                                                    <div class="row justify-content-center">

                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="name">Current Image</label>
                                                                <div class="col-lg-12 pb-1">
                                                                    <img class="admin-setting-img my-mw-100" src="<?php echo e(asset('back/logo.png')); ?>" style="width:80px;" alt="No Image Found">
                                                                </div>
                                                            </div>

                                                            <div class="form-group position-relative ">
                                                                <label>Upload Favicon</label>
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
                                            <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                                            <grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>

                                            <div class="form-group">
                                                <label for="meta_keywords">Site Meta Keywords <span style="color:red;">*</span></label>
                                                <tags class="tagify tags">
                                                    <tag title="Lorem" contenteditable="false" spellcheck="false" value="Lorem" class="tagify--noAnim">
                                                        <x title=""></x>
                                                        <div><span class="tagify__tag-text">Lorem</span></div>
                                                    </tag>
                                                    <div contenteditable="" data-placeholder="Site Meta Keywords" class="tagify__input"></div>
                                                </tags>
                                                <input type="text" name="meta_keywords" class="tags" id="meta_keywords" placeholder="Site Meta Keywords" value="Lorem,ipsum,dolor,amet">
                                            </div>
                                            <div class="form-group">
                                                <label for="meta_description">Site Meta Description <span style="color:red;">*</span></label>
                                                <textarea name="meta_description" id="meta_description" class="form-control" rows="5" placeholder="Enter Site Meta Description" spellcheck="false"></textarea>
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
                                                                <label for="copy_right">Copyright <span style="color:red;">*</span></label>
                                                                <textarea name="copy_right" id="copy_right" class="form-control" rows="3" placeholder="Copyright">PATV All rights reserved.</textarea>
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
                            <button type="submit" class="btn btn-secondary ">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\covidinfo\web\resources\views/setting/index.blade.php ENDPATH**/ ?>