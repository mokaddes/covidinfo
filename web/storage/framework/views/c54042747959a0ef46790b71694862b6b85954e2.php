

<?php $__env->startSection('content'); ?>

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>Patient Info</b></h3>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="card-header">
                <img src="https://localhost/farahtech/app/assets/images/1643995025author-bio.jpg" width="100" class="rounded" alt="Avatar">
            </div>
            <div class="row no-gutters">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" value="name" readonly="">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" value="email@gmail.com" readonly="">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" value="bangladesh" readonly="">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" value="015487548" readonly="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\covidinfo\web\resources\views/patient/patient_info.blade.php ENDPATH**/ ?>