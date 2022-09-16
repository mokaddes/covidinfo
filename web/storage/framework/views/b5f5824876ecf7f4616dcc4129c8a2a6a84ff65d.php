

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

        <div class="card mb-4">
            <h3 class="mb-0 px-3 py-4"><b>Dashboard</b></h3>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="mb-0"><b>Total Doctors</b></p>
                                    <h4 class="card-title">50</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="mb-0"><b>Total Patients</b></p>
                                    <h4 class="card-title">999</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-danger bubble-shadow-small">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="mb-0"><b>Total Covid Reports</b></p>
                                    <h4 class="card-title">5</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="far fa-chart-bar"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="mb-0"><b>Total Covid Reports</b></p>
                                    <h4 class="card-title">1</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Recent Covid Reports
                 <a href="<?php echo e(route('patient.index')); ?>"> <button class="float-right btn btn-info">View All</button></a>
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="card-body">
                      <div class="gd-responsive-table">
                          <table class="table table-bordered table-striped" id="recent-orders" width="100%" cellspacing="0">
                          <thead>
                                 <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th>Date</th>
                                </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>01</td>
                                  <td>Name</td>
                                  <td>info@gmail.com</td>
                                  <td>Avatar</td>
                                  <td>01/01/2022</td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                </div>
             </div>
         </div>
      </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\covidinfo\web\resources\views/home.blade.php ENDPATH**/ ?>