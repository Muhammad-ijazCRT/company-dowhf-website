<?php $__env->startPush('script-page'); ?>
    <script>

(function () {
        var options = {
            chart: {
                height: 150,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2,
                curve: 'smooth'
            },
            series: [{
                name: "<?php echo e(__('Order')); ?>",
                data: <?php echo json_encode($chartData['data']); ?>

            },],
            xaxis: {
                categories: <?php echo json_encode($chartData['label']); ?>,
            },
            colors: ['#ffa21d', '#FF3A6E'],

            grid: {
                strokeDashArray: 4,
            },
            legend: {
                show: false,
            },
            // markers: {
            //     size: 4,
            //     colors: ['#ffa21d', '#FF3A6E'],
            //     opacity: 0.9,
            //     strokeWidth: 2,
            //     hover: {
            //         size: 7,
            //     }
            // },
            yaxis: {
                tickAmount: 3,
                min: 10,
                max: 70,
            }
        };
        var chart = new ApexCharts(document.querySelector("#traffic-chart"), options);
        chart.render();
    })();


       
       
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Dashboard')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <!-- <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Dashboard')); ?></li> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xxl-7">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="theme-avtar bg-primary">
                                        <i class="ti ti-user-plus"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"> <?php echo e(__('Total Users')); ?> : <span class="text-dark"><?php echo e($user->total_user); ?></span></p>
                                    <h6 class="mb-3"><?php echo e(__('Paid Users')); ?></h6>
                                    <h3 class="mb-0"><?php echo e($user['total_paid_user']); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="theme-avtar bg-warning">
                                        <i class="ti ti-shopping-cart"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"> <?php echo e(__('Total Orders')); ?> : <span class="text-dark"><?php echo e($user->total_orders); ?></span></p>
                                    <h6 class="mb-3"><?php echo e(__('Total Order Amount')); ?></h6>
                                    <h3 class="mb-0"><?php echo e(env('CURRENCY_SYMBOL').$user['total_orders_price']); ?></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="theme-avtar bg-secondary">
                                        <i class="ti ti-folders"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"> <?php echo e(__('Total Plans')); ?> : <span class="text-dark"><?php echo e(env('CURRENCY_SYMBOL').$user['total_orders_price']); ?></span></p>
                                    <h6 class="mb-3"><?php echo e(__('Most Purchase Plan')); ?></h6>
                                    <h3 class="mb-0"><?php echo e($user['most_purchese_plan']); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-5">
                    <div class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Recent Order')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div id="traffic-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/dashboard/super_admin.blade.php ENDPATH**/ ?>