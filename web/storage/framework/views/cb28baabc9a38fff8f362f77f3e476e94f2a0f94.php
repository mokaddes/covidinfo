

<?php $__env->startSection('content'); ?>

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>Update Profile</b></h3>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                        	<h5>Current Image</h5>
                        	<img src="https://localhost/farahtech/app/assets/images/1643995025author-bio.jpg" class="rounded" width="120" alt="image">
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Upload Image</label>
                            <input type="file" class="dropify" id="input-file-now" data-height="100">
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="" class="form-control item-name" value="Admin">
                        </div>

                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" name="" class="form-control item-name" value="admin@gmail.com">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\covidinfo\web\resources\views/profile/index.blade.php ENDPATH**/ ?>