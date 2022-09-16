

<?php $__env->startSection('content'); ?>

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>Edit Patient</b></h3>
                <a class="btn btn-primary  btn-sm" href="<?php echo e(route('patient.index')); ?>"><i class="fas fa-chevron-left"></i>Go Back</a>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="admin-form" action="#" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                    
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" name="" class="form-control item-name" id="name" placeholder="Enter Name" value="">
                        </div>

                        <div class="form-group">
                            <label for="slug">Specialties *</label>
                            <input type="text" name="" class="form-control" id="" placeholder="Specialties" value="">
                        </div>

                        <div class="form-group">
                            <label for="name">Image *</label>
                            <input type="file" class="dropify" id="input-file-now" data-height="100">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary ">Submit</button>
                        </div>

                        <div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\covidinfo\web\resources\views/patient/edit.blade.php ENDPATH**/ ?>