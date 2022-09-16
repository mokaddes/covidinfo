<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Covidinfo - Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" type="image/x-icon" href="" />

    <!-- Fonts and icons -->
    <script src="<?php echo e(asset('back/js/plugin/webfont/webfont.min.js')); ?>"></script>
    <script id="setFont" src="<?php echo e(asset('back/js/plugin/webfont/setfont.js')); ?>"></script>

    <!-- CSS Files -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('back/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('back/css/select2.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <link rel="stylesheet" href="<?php echo e(asset('back/css/azzara.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('back/css/tagify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('back/css/editor.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('back/css/bootstrap-iconpicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('back/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="<?php echo e(asset('back/js/plugin/codemirror/codemirror.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('back/js/plugin/codemirror/monokai.css')); ?>">



    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('back/css/custom.css')); ?>">
    <style>
        .dropify-wrapper {
            border: 1px solid #EEE;
        }

        .dropify-wrapper:hover {
            background: #efefef !important;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="main-header ">
            <!-- Logo Header -->
            <div class="logo-header">

                <a href="" class="logo">
                    <img src="<?php echo e(asset('back/fav.png')); ?>" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize ">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <!-- <li class="nav-item mr-4">
                            <a class="btn btn-sm btn-primary py-1 text-white" title="website" href="#" target="_blank">
                                <b> View Website</b>
                            </a>
                        </li> -->
                        <li class="nav-item dropdown hidden-caret submenu">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="https://localhost/farahtech/app/admin" aria-expanded="true">
                                <div class="avatar-sm avatar avatar-sm">
                                    <img src="https://localhost/farahtech/app/assets/images/1643995025author-bio.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="https://localhost/farahtech/app/assets/images/1643995025author-bio.jpg" alt="image profile" class="avatar-img rounded"></div>

                                        <div class="u-text">
                                            <h4>Admin</h4>
                                            <p class="text-muted">admin@gmail.com</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo e(route('profile.index')); ?>">Update Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo e(route('change.password')); ?>">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar">

            <div class="sidebar-background"></div>
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="https://localhost/farahtech/app/assets/images/1643995025author-bio.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    Admin
                                    <span class="user-level">Administrator</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <ul class="nav">
                        <li class="nav-item <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('home')); ?>">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->routeIs('doctor.index') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('doctor.index')); ?>">
                                <i class="fas fa-random"></i>
                                <p>Doctor</p>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->routeIs('patient.index') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('patient.index')); ?>">
                                <i class="fas fa-tasks"></i>
                                <p>Patient</p>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->routeIs('site.setting') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('site.setting')); ?>">
                                <i class="fas fa-cogs"></i>
                                <p>Site Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>

    </div>
    <script>
        var mainbs = {
            "is_announcement": 1,
            "announcement_delay": "1.00",
            "overlay": null
        };
    </script>
    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('back/js/core/jquery.3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/js/core/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/js/core/bootstrap.min.js')); ?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo e(asset('back/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')); ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo e(asset('back/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>

    <!-- Moment JS -->
    <script src="<?php echo e(asset('back/js/plugin/moment/moment.min.js')); ?>"></script>

    <!-- Bootstrap Notify -->
    <script src="<?php echo e(asset('back/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>

    <!-- Editor -->
    <script src="<?php echo e(asset('back/js/plugin/editor.js')); ?>"></script>
    <script src="<?php echo e(asset('back/js/plugin/datepicker/bootstrap-datetimepicker.min.js')); ?>"></script>

    <!-- Tagify -->
    <script src="<?php echo e(asset('back/js/tagify.js')); ?>"></script>

    <!-- Icon Picker -->
    <script src="<?php echo e(asset('back/js/bootstrap-iconpicker.bundle.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <!-- Azzara JS -->


    <script src="<?php echo e(asset('back/js/plugin/codemirror/codemirror.js')); ?>"></script>
    <script src="<?php echo e(asset('back/js/plugin/codemirror/css.js')); ?>"></script>

    <script src="<?php echo e(asset('back/js/ready.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            // input file image
            $('.dropify').dropify();
        })
    </script>
    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    }
                })
        })
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\covidinfo\web\resources\views/layouts/app.blade.php ENDPATH**/ ?>