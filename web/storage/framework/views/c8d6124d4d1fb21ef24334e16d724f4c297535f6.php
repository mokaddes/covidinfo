<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../">
    <title>PATV - Register</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="<?php echo e(asset('back/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('back/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
        .invalid-feedback {
            display: block !important;
        }
    </style>
</head>

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <div class="mb-1">
            <img style="width:180px;" alt="Logo" src="<?php echo e(asset('back/logo.png')); ?>" />
        </div>
        <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-10 text-center">
                    <h1 class="text-dark mb-3">Create an Account</h1>
                    <div class="text-gray-400 fw-bold fs-4">Already have an account?
                        <a href="<?php echo e(route('login')); ?>" class="link-primary fw-bolder">Sign in here</a>
                    </div>
                </div>
                <div class="row fv-row mb-7 fv-plugins-icon-container">
                    <div class="col-12">
                        <label class="form-label fw-bolder text-dark fs-6">Name</label>
                        <input class="form-control form-control-lg form-control-solid <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" autocomplete="off">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <label class="form-label fw-bolder text-dark fs-6">Email</label>
                    <input class="form-control  form-control-lg form-control-solid <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" autocomplete="off">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                    <div class="mb-1">
                        <label class="form-label fw-bolder text-dark fs-6">Password</label>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" id="password" name="password" autocomplete="off">
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="fv-row mb-5 fv-plugins-icon-container">
                    <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                    <input class="form-control form-control-lg form-control-solid" type="password" id="password-confirm" name="password_confirmation" autocomplete="off">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="text-center">
                    <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                        <span class="indicator-label">Register</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo e(asset('back/plugins/global/plugins.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('back/js/scripts.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('back/js/custom/authentication/sign-in/general.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\covidinfo\web\resources\views/auth/register.blade.php ENDPATH**/ ?>