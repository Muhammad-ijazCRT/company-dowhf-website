<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php
$profile=\App\Models\Utility::get_file('uploads/avatar/');
?>
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
    <?php if(\Auth::user()->type=='company'): ?>
        <div class="row">
            <?php if($data['pipelines']<=0): ?>
                <div class="col-3">
                    <div class="alert alert-danger">
                        <?php echo e(__('Please add constant pipeline.')); ?> <a href="<?php echo e(route('pipeline.index')); ?>"><b class="text-white"><?php echo e(__('click here')); ?></b></a>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($data['leadStages']<=0): ?>
                <div class="col-3">
                    <div class="alert alert-danger">
                        <?php echo e(__('Please add constant lead stage.')); ?> <a href="<?php echo e(route('leadStage.index')); ?>"><b class="text-white"><?php echo e(__('click here')); ?></b></a>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($data['dealStages']<=0): ?>
                <div class="col-3">
                    <div class="alert alert-danger">
                        <?php echo e(__('Please add constant deal stage.')); ?> <a href="<?php echo e(route('dealStage.index')); ?>"><b class="text-white"><?php echo e(__('click here')); ?></b></a>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($data['projectStages']<=0): ?>
                <div class="col-3">
                    <div class="alert alert-danger">
                        <?php echo e(__('Please add constant project stage.')); ?> <a href="<?php echo e(route('projectStage.index')); ?>"><b class="text-white"><?php echo e(__('click here')); ?></b></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <!-- [ sample-page ] start -->
        <?php if(\Auth::user()->type=='company'): ?>
            <div class="col-lg-4 col-md-6 dashboard-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="theme-avtar bg-warning">
                                        <i class="ti ti-click"></i>
                                    </div>
                                    <div class="ms-3">
                                        <small class="text-muted"><?php echo e(__('Total')); ?></small>
                                        <h6 class="m-0"><?php echo e(__('Clients')); ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <h4 class="m-0"><?php echo e($data['totalClient']); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\Auth::user()->type=='company'): ?>
                <div class="col-lg-4 col-md-6 dashboard-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mb-3 mb-sm-0">
                                    <div class="d-flex align-items-center">
                                        <div class="theme-avtar bg-success">
                                            <i class="ti ti-users"></i>
                                        </div>
                                        <div class="ms-3">
                                            <small class="text-muted"><?php echo e(__('Total')); ?></small>
                                            <h6 class="m-0"><?php echo e(__('Employees')); ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end">
                                    <h4 class="m-0"><?php echo e($data['totalEmployee']); ?></h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endif; ?>
        <?php if(\Auth::user()->type=='company' || \Auth::user()->type=='client' || \Auth::user()->type=='employee'): ?>
            <div class="col-lg-4 col-md-12 dashboard-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="theme-avtar bg-danger">
                                        <i class="ti ti-list-check"></i>
                                    </div>
                                    <div class="ms-3">
                                        <small class="text-muted"><?php echo e(__('Total')); ?></small>
                                        <h6 class="m-0"><?php echo e(__('Projects')); ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <h4 class="m-0"><?php echo e($data['totalProject']); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\Auth::user()->type=='company' || \Auth::user()->type=='client'): ?>
            <div class="col-lg-4 col-md-12 dashboard-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="theme-avtar bg-secondary">
                                        <i class="ti ti-layout-2"></i>
                                    </div>
                                    <div class="ms-3">
                                        <small class="text-muted"><?php echo e(__('Total')); ?></small>
                                        <h6 class="m-0"><?php echo e(__('Estimation')); ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <h4 class="m-0"><?php echo e($data['totalEstimation']); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\Auth::user()->type=='company' || \Auth::user()->type=='client'): ?>
            <div class="col-lg-4 col-md-12 dashboard-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="theme-avtar bg-info">
                                        <i class="ti ti-file-invoice"></i>
                                    </div>
                                    <div class="ms-3">
                                        <small class="text-muted"><?php echo e(__('Total')); ?></small>
                                        <h6 class="m-0"><?php echo e(__('Invoices')); ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <h4 class="m-0"><?php echo e($data['totalInvoice']); ?></h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\Auth::user()->type=='company' || \Auth::user()->type=='employee'): ?>
        <div class="col-lg-4 col-md-12 dashboard-card">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-dark">
                                    <i class="ti ti-report-money"></i>
                                </div>
                                <div class="ms-3">
                                    <small class="text-muted"><?php echo e(__('Total')); ?></small>
                                    <h6 class="m-0"><?php echo e(__('Lead')); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h4 class="m-0"><?php echo e($data['totalLead']); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(\Auth::user()->type=='company' || \Auth::user()->type=='client'): ?>
            <div class="col-lg-4 col-sm-6 dashboard-card">
                <div class="card card-fluid">
                    <div class="card-body">
                        <div class="col-lg-12 text-center">
                            <h5 class="mb-4"><?php echo e(__('Estimation Overview')); ?></h5>
                        </div>
                        <div class="progress">
                            <?php $__currentLoopData = $data['estimationOverview']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estimation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="progress-bar bg-<?php echo e($data['estimateOverviewColor'][$estimation['status']]); ?>" role="progressbar" style="width: <?php echo e($estimation['percentage']); ?>%" aria-valuenow="<?php echo e($estimation['percentage']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="row mt-3">
                            <?php $__empty_1 = true; $__currentLoopData = $data['estimationOverview']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estimation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-md-6">
                                    <span class="text-sm text-<?php echo e($data['estimateOverviewColor'][$estimation['status']]); ?>">●</span>
                                    <small><?php echo e($estimation['total']); ?> <?php echo e(__($estimation['status'])); ?> (<a href="#" class="text-sm text-muted"><?php echo e(number_format($estimation['percentage'],'2')); ?>%</a>)</small>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-md-12 text-center">
                                <div class="mt-3">
                                    <h6><?php echo e(__('Estimation record not found')); ?></h6>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 dashboard-card">
                <div class="card card-fluid">
                    <div class="card-body">
                        <div class="col-lg-12 text-center">
                            <h5 class="mb-4"><?php echo e(__('Invoice Overview')); ?></h5>
                        </div>
                        <div class="progress">
                            <?php $__currentLoopData = $data['invoiceOverview']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="progress-bar bg-<?php echo e($data['invoiceOverviewColor'][$invoice['status']]); ?>" role="progressbar" style="width: <?php echo e($invoice['percentage']); ?>%" aria-valuenow="<?php echo e($invoice['percentage']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="row mt-3">
                            <?php $__empty_1 = true; $__currentLoopData = $data['invoiceOverview']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-md-6">
                                    <span class="text-sm text-<?php echo e($data['invoiceOverviewColor'][$invoice['status']]); ?>">●</span>
                                    <small><?php echo e($invoice['total']); ?> <?php echo e(__($invoice['status'])); ?> (<a href="#" class="text-sm text-muted"><?php echo e(number_format($invoice['percentage'],'2')); ?>%</a>)</small>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-md-12 text-center">
                                <div class="mt-3">
                                    <h6><?php echo e(__('Invoice record not found')); ?></h6>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\Auth::user()->type=='company' || \Auth::user()->type=='client'): ?>

            <div class="<?php echo e((\Auth::user()->type=='employee')?'col-xl-6 col-md-6':'col-xl-4 col-md-6'); ?> dashboard-card">
                <div class="card card-fluid">
                    <div class="card-body">
                        <div class="col-lg-12 text-center">
                            <h5 class="mb-4"><?php echo e(__('Project Overview')); ?></h5>
                        </div>
                        <div class="progress">
                            <?php $__currentLoopData = $data['projects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="progress-bar bg-<?php echo e($data['projectStatusColor'][$k]); ?>" role="progressbar" style="width: <?php echo e($project['percentage']); ?>%" aria-valuenow="<?php echo e($project['percentage']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="row mt-3">
                            <?php $__empty_1 = true; $__currentLoopData = $data['projects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-md-6">
                                    <span class="text-sm text-<?php echo e($data['projectStatusColor'][$k]); ?>">●</span>
                                    <small><?php echo e(__($project['status'])); ?> (<a href="#" class="text-sm text-muted"><?php echo e(number_format($project['percentage'],'2')); ?>%</a>)</small>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-md-12 text-center">
                                <div class="mt-3">
                                    <h6><?php echo e(__('Project record not found')); ?></h6>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\Auth::user()->type=='employee'): ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('Mark Attendance')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 float-right border-right">
                                <?php echo e(Form::open(array('route'=>array('employee.attendance'),'method'=>'post'))); ?>

                                <?php if(empty($data['employeeAttendance']) || $data['employeeAttendance']->clock_out != '00:00:00'): ?>
                                    <?php echo e(Form::submit(__('CLOCK IN'),array('class'=>'btn btn-success btn-sm','name'=>'in','value'=>'0','id'=>'clock_in'))); ?>

                                <?php else: ?>
                                    <?php echo e(Form::submit(__('CLOCK IN'),array('class'=>'btn btn-success btn-sm disabled','disabled','name'=>'in','value'=>'0','id'=>'clock_in'))); ?>

                                <?php endif; ?>
                                <?php echo e(Form::close()); ?>

                            </div>
                            <div class="col-md-6 float-left">
                                <?php if(!empty($data['employeeAttendance']) && $data['employeeAttendance']->clock_out == '00:00:00'): ?>
                                    <?php echo e(Form::model($data['employeeAttendance'],array('route'=>array('attendance.update',$data['employeeAttendance']->id),'method' => 'PUT'))); ?>

                                    <?php echo e(Form::submit(__('CLOCK OUT'),array('class'=>'btn btn-danger btn-sm','name'=>'out','value'=>'1','id'=>'clock_out'))); ?>

                                <?php else: ?>
                                    <?php echo e(Form::submit(__('CLOCK OUT'),array('class'=>'btn btn-danger btn-sm disabled','name'=>'out','disabled','value'=>'1','id'=>'clock_out'))); ?>

                                <?php endif; ?>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(\Auth::user()->type=='company' || \Auth::user()->type=='client' ): ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('Top Due Payment')); ?></h5>
                    </div>
                    <div class="card-body">

                            <div class="table-responsive">

                                    <table class="table">
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $data['topDueInvoice']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="avatar rounded-circle">
                                                                <img alt="" <?php if(!empty($invoice->clients) && !empty($invoice->clients->avatar)): ?>
                                                                src="<?php echo e($profile.'/'.$invoice->clients->avatar); ?>" <?php else: ?>  avatar="<?php echo e(!empty($invoice->clients)?$invoice->clients->name:''); ?>" <?php endif; ?> class="wid-25">
                                                            </a>


                                                            <div class="ms-3">
                                                                <small class="text-muted"><?php echo e(\Auth::user()->invoiceNumberFormat($invoice->invoice_id)); ?></small>
                                                                <h6 class="m-0"><?php echo e(__('Due Amount : ')); ?> <?php echo e(\Auth::user()->priceFormat($invoice->getDue())); ?></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td width="15%">
                                                        <small class="text-muted"><?php echo e(__('Due Date')); ?></small>
                                                        <h6 class="m-0"><?php echo e(\Auth::user()->dateFormat($invoice->due_date)); ?></h6>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="action-btn bg-warning ms-2">
                                                            <a href="<?php echo e(route('invoice.show',\Crypt::encrypt($invoice->id))); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                <i class="ti ti-eye text-white" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('View')); ?>" ></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <div class="col-md-12 text-center">
                                                    <div class="mt-3">
                                                        <h6><?php echo e(__('Payment record not found')); ?></h6>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                            </div>

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(\Auth::user()->type=='company' || \Auth::user()->type=='client' || \Auth::user()->type=='employee'): ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('Top Due Project')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $data['topDueProject']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td width="40%">
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-3">
                                                        <small class="text-muted"><?php echo e($project->dueTask()); ?> <?php echo e(__('Task Remain')); ?></small>
                                                        <h6 class="m-0"><?php echo e($project->title); ?> </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <small class="text-muted"><?php echo e(__('Due Date')); ?></small>
                                                <h6 class="m-0"><?php echo e(\Auth::user()->dateFormat($project->due_date)); ?></h6>
                                            </td>
                                            <td class="text-end">
                                                <div class="action-btn bg-warning ms-2">
                                                    <a href="<?php echo e(route('project.show',\Crypt::encrypt($project->id))); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                        <i class="ti ti-eye text-white" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('View')); ?>" ></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="col-md-12 text-center">
                                            <div class="mt-3">
                                                <h6><?php echo e(__('Project record not found')); ?></h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('Top Due Task')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $data['topDueTask']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topDueTask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td width="40%">
                                                <div class="d-flex align-items-center">

                                                    <div class="ms-3">
                                                        <h6 class="m-0"><?php echo e($topDueTask->title); ?></h6>
                                                        <small class="text-muted"><?php echo e(__('Assign to')); ?> <?php echo e(!empty($topDueTask->taskUser)?$topDueTask->taskUser->name  :''); ?></a></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <small class="text-muted"><?php echo e(__('Project Title')); ?></small>
                                                <h6 class="m-0"><?php echo e($topDueTask->project_id); ?></h6>
                                            </td>
                                            <td>
                                                <small class="text-muted"><?php echo e(__('Due Date')); ?></small>
                                                <h6 class="m-0"><?php echo e(\Auth::user()->dateFormat($topDueTask->due_date)); ?></h6>
                                            </td>
                                            <td class="text-end">
                                                <div class="action-btn bg-warning ms-2">
                                                    <a href="<?php echo e(route('project.show',\Crypt::encrypt($topDueTask->project_id))); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                        <i class="ti ti-eye text-white" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('View')); ?>" ></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="col-md-12 text-center">
                                            <div class="mt-3">
                                                <h6><?php echo e(__('Task record not found')); ?></h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(\Auth::user()->type=='company' || \Auth::user()->type == 'employee'): ?>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Meeting Schedule')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $data['topMeeting']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="ms-3">
                                                    <h6 class="m-0"><?php echo e($meeting->title); ?></h6>
                                                    <small class="text-muted"><?php echo e($meeting->notes); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <small class="text-muted"><?php echo e(__('Meetign Date : ')); ?></small>
                                            <h6 class="m-0"><?php echo e($meeting->date.' '.$meeting->time); ?></h6>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="col-md-12 text-center">
                                        <div class="mt-3">
                                            <h6><?php echo e(__('Meeting schedule not found')); ?></h6>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(\Auth::user()->type=='company' || \Auth::user()->type == 'employee'): ?>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('This Week Event')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $data['thisWeekEvent']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo e(asset('assets/images/pages/flag.svg')); ?>" class="wid-25"
                                                        alt="images">
                                                    <div class="ms-3">
                                                        <h6 class="m-0"><?php echo e($event->name); ?></h6>
                                                        <small class="text-muted"><?php echo e($event->description); ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <small class="text-muted"><?php echo e(__('Start Date')); ?></small>
                                                <h6 class="m-0"><?php echo e($event->start_date.' '.$event->start_time); ?></h6>
                                            </td>
                                            <td class="text-end">
                                                <small class="text-muted"><?php echo e(__('End Date')); ?></small>
                                                <h6 class="m-0"><?php echo e($event->end_date.' '.$event->end_time); ?></h6>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="col-md-12 text-center">
                                            <div class="mt-3">
                                                <h6><?php echo e(__('Event not found')); ?></h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(\Auth::user()->type=='company'): ?>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('New Support')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $data['newTickets']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td width="40%">
                                                <div class="d-flex align-items-center">
                                                    <img alt="" class="avatar rounded-circle wid-25"  <?php if(!empty($ticket->createdBy)): ?> src="<?php echo e(asset(Storage::url('uploads/avatar')).'/'.$ticket->createdBy->avatar); ?>" <?php else: ?>  avatar="<?php echo e(!empty($ticket->createdBy)?$ticket->createdBy->name:''); ?>" <?php endif; ?>>

                                                    <div class="ms-3">
                                                        <h6 class="m-0"><?php echo e(!empty($ticket->createdBy)?$ticket->createdBy->name:''); ?></h6>
                                                        <small class="text-muted"><?php echo e($ticket->subject); ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <small class="text-muted"><?php echo e(__('Support Date')); ?></small>
                                                <h6 class="m-0"><?php echo e(\Auth::user()->dateFormat($ticket->created_at)); ?></h6>
                                            </td>
                                            <td width="20%">


                                                <small class="text-muted"><?php echo e(__('Priority')); ?></small>
                                                <h6 class="m-0">
                                                    <?php if($ticket->priority == 0): ?>
                                                        <span data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Priority')); ?>" class="text-capitalize badge badge-primary rounded-pill badge-sm">   <?php echo e(__(\App\Models\Support::$priority[$ticket->priority])); ?></span>
                                                    <?php elseif($ticket->priority == 1): ?>
                                                        <span data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Priority')); ?>" class="text-capitalize badge badge-info rounded-pill badge-sm">   <?php echo e(__(\App\Models\Support::$priority[$ticket->priority])); ?></span>
                                                    <?php elseif($ticket->priority == 2): ?>
                                                        <span data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Priority')); ?>" class="text-capitalize badge badge-warning rounded-pill badge-sm">   <?php echo e(__(\App\Models\Support::$priority[$ticket->priority])); ?></span>
                                                    <?php elseif($ticket->priority == 3): ?>
                                                        <span data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Priority')); ?>" class="text-capitalize badge badge-danger rounded-pill badge-sm">   <?php echo e(__(\App\Models\Support::$priority[$ticket->priority])); ?></span>
                                                    <?php endif; ?>
                                                </h6>
                                            </td>
                                            <td>
                                                <div class="action-btn bg-warning ms-2">
                                                    <a href="<?php echo e(route('support.reply',\Crypt::encrypt($ticket->id))); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                        <i class="ti ti-eye text-white" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('View')); ?>" ></i>
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="col-md-12 text-center">
                                            <div class="mt-3">
                                                <h6><?php echo e(__('New support record not found')); ?></h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php if(\Auth::user()->type=='company' || \Auth::user()->type =='client'): ?>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Contracts Expiring Soon')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $data['contractExpirySoon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img alt="" <?php if(!empty($contract->clients) && !empty($contract->clients->avatar)): ?> src="<?php echo e($profile.'/'.$contract->clients->avatar); ?>" <?php else: ?>  avatar="<?php echo e(!empty($contract->clients)?$contract->clients->name:''); ?>" <?php endif; ?> class="wid-25">
                                                <div class="ms-3">
                                                    <h6 class="m-0"><?php echo e(!empty($contract->clients)?$contract->clients->name:'--'); ?></h6>
                                                    <small class="text-muted"><?php echo e($contract->subject); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <small class="text-muted"><?php echo e(__('Type')); ?></small>
                                            <h6 class="m-0"><?php echo e(!empty($contract->types)?$contract->types->name:'--'); ?></h6>
                                        </td>
                                        <td>
                                            <small class="text-muted"><?php echo e(__('Value')); ?></small>
                                            <h6 class="m-0"><?php echo e(\Auth::user()->priceFormat($contract->value)); ?></h6>
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="col-md-12 text-center">
                                        <div class="mt-3">
                                            <h6><?php echo e(__('Payment record not found')); ?></h6>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(\Auth::user()->type=='company'): ?>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Client')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $data['newClients']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img alt="" <?php if(!empty($client->avatar) && !empty($client->avatar)): ?> src="<?php echo e($profile.'/'.$client->avatar); ?>"
                                                <?php else: ?>  avatar="<?php echo e(!empty($client->name)?$client->name:''); ?>" <?php endif; ?> class="wid-25">

                                                <div class="ms-3">
                                                    <h6 class="m-0"><?php echo e($client->name); ?></h6>
                                                    <small class="text-muted"><?php echo e($client->email); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <small class="text-muted"><?php echo e(__('Created Date')); ?></small>
                                            <h6 class="m-0"><?php echo e(\Auth::user()->dateFormat($client->created_at)); ?></h6>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="col-md-12 text-center">
                                            <div class="mt-3">
                                                <h6><?php echo e(__('Client record not found')); ?></h6>
                                            </div>
                                        </div>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(\Auth::user()->type=='company'): ?>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                     <h5 ><?php echo e(__('Storage Status')); ?> <small>(<?php echo e($users->storage_limit . 'MB'); ?> / <?php echo e($plan->storage_limit . 'MB'); ?>)</small></h5>
                </div>
                <div class="card shadow-none mb-0">
                    <div class="card-body border rounded  p-3">
                        <div id="device-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

        <div class="card">
            <div class="card-header" style ="margin-left: -12px;">
                <h5><?php echo e(__('Goals')); ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php $__currentLoopData = $data['goals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $data       = $goal->target($goal->goal_type,$goal->from,$goal->to,$goal->amount);
                            $total      = $data['total'];
                            $percentage = $data['percentage'];
                        ?>
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0"> <?php echo e($goal->name); ?></h6>
                                </div>
                                <div class="card-body ">
                                    <div class="flex-fill text-limit">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="progress-text mb-1 text-sm d-block text-limit"><?php echo e(\Auth::user()->priceFormat($total).' of '. \Auth::user()->priceFormat($goal->amount)); ?></h6>
                                            </div>
                                            <div class="col-auto text-end">
                                                <?php echo e(number_format($percentage, 2, '.', '')); ?>%
                                            </div>
                                        </div>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo e(number_format($percentage , 2, '.', '')); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e(number_format($percentage , 2, '.', '')); ?>%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer py-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="form-control-label"><?php echo e(__('Type')); ?>:</span>
                                                </div>
                                                <div class="col text-end">
                                                    <?php echo e(__(\App\Models\Goal::$goalType[$goal->goal_type])); ?>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <span class="form-control-label"><?php echo e(__('Duration')); ?>:</span>
                                                </div>
                                                <div class="col-auto text-end">
                                                    <?php echo e($goal->from .' To '.$goal->to); ?>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
<?php if(\Auth::user()->type == 'company'): ?>

<script>
(function () {
    var options = {
        series: [<?php echo e($storage_limit); ?>],
        chart: {
            height: 350,
            type: 'radialBar',
            offsetY: -20,
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            radialBar: {
                startAngle: -90,
                endAngle: 90,
                track: {
                    background: "#e7e7e7",
                    strokeWidth: '97%',
                    margin: 5, // margin is in pixels
                },
                dataLabels: {
                    name: {
                        show: true
                    },
                    value: {
                        offsetY: -50,
                        fontSize: '20px'
                    }
                }
            }
        },
        grid: {
            padding: {
                top: -10
            }
        },
        colors: ["#6FD943"],
        labels: ['Used'],
    };
    var chart = new ApexCharts(document.querySelector("#device-chart"), options);
    chart.render();
})();
</script>

<?php endif; ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\github\company-dowhf-website\resources\views/dashboard/index.blade.php ENDPATH**/ ?>