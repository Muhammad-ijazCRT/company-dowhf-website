<?php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
    // $profile=asset(Storage::url('uploads/avatar'));
?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Project')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Project')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Project')); ?></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('All Project')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('project.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        data-bs-original-title="<?php echo e(__('List View')); ?>">
        <i class="ti ti-list text-white"></i>
    </a>

    <?php if(\Auth::user()->type == 'company'): ?>
        <a href="<?php echo e(route('project.create')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
            data-bs-whatever="<?php echo e(__('Create New Project')); ?>" data-bs-toggle="tooltip"
            data-bs-original-title="<?php echo e(__('Create')); ?>"> <i class="ti ti-plus text-white"></i></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $percentages = 0;
                $total = count($project->tasks);

                if ($total != 0) {
                    $percentages = $project->completedTask($stage_id) / ($total / 100);
                }
            ?>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="card hover-shadow-lg">
                    <div class="card-header border-0 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0" data-bs-toggle="tooltip"
                                    data-bs-original-title="<?php echo e(__('Start Date ')); ?>">
                                    <?php echo e(\Auth::user()->dateFormat($project->start_date)); ?></h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <h6 class="mb-0" data-bs-toggle="tooltip"
                                        data-bs-original-title="<?php echo e(__('Due Date ')); ?>">
                                        <?php echo e(\Auth::user()->dateFormat($project->due_date)); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <a href="#" class="avatar rounded-circle avatar-lg hover-translate-y-n3">
                            <div class="progress-circle progress-sm" id="progress-circle-1"
                                data-progress="<?php echo e($percentages); ?>" data-text="<?php echo e($percentages); ?>%" data-color="info">
                            </div>
                        </a>
                        <h5 class=" my-4">
                            <a href="<?php echo e(route('project.show', \Crypt::encrypt($project->id))); ?>"
                                class="text-dark"><?php echo e($project->title); ?></a>
                        </h5>
                        <div class="avatar-group hover-avatar-ungroup mb-3">
                            <?php $__currentLoopData = $project->projectUser(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="#" class="user-group1">
                                    <img <?php if(!empty($projectUser->avatar)): ?> src="<?php echo e(asset('/storage/uploads/avatar/' . $projectUser->avatar)); ?>" <?php else: ?> avatar="<?php echo e($projectUser->name); ?>" <?php endif; ?>
                                        class="" data-bs-toggle="tooltip" title="<?php echo e($projectUser->name); ?>">
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <span class="clearfix"></span>
                        <?php if($project->status == 'not_started'): ?>
                            <span class="badge fix_badges bg-primary p-2 px-3 rounded"><?php echo e(__('Not Started')); ?></span>
                        <?php elseif($project->status == 'in_progress'): ?>
                            <span class="badge fix_badges bg-success p-2 px-3 rounded"><?php echo e(__('In Progress')); ?></span>
                        <?php elseif($project->status == 'on_hold'): ?>
                            <span class="badge fix_badges bg-info p-2 px-3 rounded"><?php echo e(__('On Hold')); ?></span>
                        <?php elseif($project->status == 'canceled'): ?>
                            <span class="badge fix_badges bg-danger p-2 px-3 rounded"><?php echo e(__('Canceled')); ?></span>
                        <?php elseif($project->status == 'finished'): ?>
                            <span class="badge fix_badges bg-warning p-2 px-3 rounded"><?php echo e(__('Finished')); ?></span>
                        <?php endif; ?>

                    </div>
                    <?php if(\Auth::user()->type == 'company'): ?>
                        <div class="card-footer">
                            <div class="actions d-flex justify-content-between px-4">

                                <a href="#" class="btn btn-sm action-btn bg-secondary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-url="<?php echo e(route('project.copy', [$project->id])); ?>"
                                    data-bs-whatever="<?php echo e(__('Create New Item')); ?>"> <span class="text-white">
                                        <i class="ti ti-copy text-white" data-bs-toggle="tooltip"
                                            data-bs-original-title="<?php echo e(__('Duplicate')); ?>"></i></span>
                                </a>

                                <div class="action-btn bg-info ms-2">
                                    <a href="<?php echo e(route('project.edit', \Crypt::encrypt($project->id))); ?>"
                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                        data-bs-whatever="<?php echo e(__('Edit Project')); ?>" data-bs-toggle="tooltip"
                                        data-bs-original-title="<?php echo e(__('Edit')); ?>"> <span class="text-white"> <i
                                                class="ti ti-edit"></i></span></a>
                                </div>
                                <div class="action-btn bg-warning ms-2">
                                    <a href="<?php echo e(route('project.show', \Crypt::encrypt($project->id))); ?>"
                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                        data-bs-whatever="<?php echo e(__('View Project')); ?>" data-bs-toggle="tooltip"
                                        data-bs-original-title="<?php echo e(__('View')); ?>"> <span class="text-white"> <i
                                                class="ti ti-eye"></i></span></a>
                                </div>

                                <div class="action-btn bg-danger ms-2">
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['project.destroy', $project->id]]); ?>

                                    <a href="#!" class="mx-3 btn btn-sm d-flex align-items-center show_confirm">
                                        <i class="ti ti-trash text-white" data-bs-toggle="tooltip"
                                            data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                    </a>
                                    <?php echo Form::close(); ?>

                                </div>


                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-md-12 text-center">
                <h4><?php echo e(__('No data available')); ?></h4>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/project/grid.blade.php ENDPATH**/ ?>