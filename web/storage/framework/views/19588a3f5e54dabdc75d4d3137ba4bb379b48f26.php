

<?php $__env->startSection('content'); ?>

<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>Patient Report List</b></h3>
                <a class="btn btn-primary  btn-sm" href="<?php echo e(route('patient.create')); ?>"><i class="fas fa-plus"></i> Add Patient</a>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="gd-responsive-table">
                <table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($patient->role != 1 && $patient->role != 2): ?>
                        <tr>

                            <td><?php echo e(++$i); ?></td>
                            <td><?php echo e($patient->name); ?></td>
                            <td><?php echo e($patient->email); ?></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="action-list">
                                    <a class="btn btn-primary btn-sm" title="view" href="<?php echo e(route('patient.report.view')); ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-secondary btn-sm" title="edit" href="<?php echo e(route('patient.edit')); ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" title="delete" id="delete" href="#">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\covidinfo\web\resources\views/patient/index.blade.php ENDPATH**/ ?>