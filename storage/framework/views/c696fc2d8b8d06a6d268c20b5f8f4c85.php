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
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('All Project')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('project.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        data-bs-original-title="<?php echo e(__('Grid View')); ?>">
        <i class="ti ti-layout-grid text-white"></i>
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
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <!-- <h5></h5> -->
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th scope="col" class="sort" data-sort="name"><?php echo e(__('Title')); ?></th>
                                <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Budget')); ?></th>
                                <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?></th>
                                <th scope="col"><?php echo e(__('Users')); ?></th>
                                <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Completion')); ?></th>
                                <th scope="col" class="text-right"><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $percentages = 0;
                                    $total = count($project->tasks);
                                    // $total = 0;
                                    if ($total != 0) {
                                        $percentages = round($project->completedTask($stage_id) / ($total / 100));
                                    }
                                ?>
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <a href="<?php echo e(route('project.show', \Crypt::encrypt($project->id))); ?>"
                                                    class="name mb-0 h6 text-sm"><?php echo e($project->title); ?></a>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        <?php echo e(\Auth::user()->priceFormat($project->price)); ?>

                                    </td>
                                    <td>
                                        <?php if($project->status == 'not_started'): ?>
                                            <span class="badge fix_badges bg-primary p-1 px-3 rounded">
                                                <i class="bg-primary"></i>
                                                <span class="status"><?php echo e(__('Not Started')); ?></span>
                                            </span>
                                        <?php elseif($project->status == 'in_progress'): ?>
                                            <span class="badge fix_badges bg-success p-1 px-3 rounded">
                                                <i class="bg-success"></i>
                                                <span class="status"><?php echo e(__('In Progress')); ?></span>
                                            </span>
                                        <?php elseif($project->status == 'on_hold'): ?>
                                            <span class="badge fix_badges bg-info p-1 px-3 rounded">
                                                <i class="bg-info"></i>
                                                <span class="status"><?php echo e(__('On Hold')); ?></span>
                                            </span>
                                        <?php elseif($project->status == 'canceled'): ?>
                                            <span class="badge fix_badges bg-danger p-1 px-3 rounded">
                                                <i class="bg-danger"></i>
                                                <span class="status"><?php echo e(__('Canceled')); ?></span>
                                            </span>
                                        <?php elseif($project->status == 'finished'): ?>
                                            <span class="badge fix_badges bg-warning p-1 px-3 rounded">
                                                <i class="bg-warning"></i>
                                                <span class="status"><?php echo e(__('Finished')); ?></span>
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>

                                        <div class="user-group">
                                            <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- <a href="#" class="avatar rounded-circle avatar-sm"> -->
                                                <img <?php if(!empty($projectUser->avatar)): ?> src="<?php echo e($profile . $projectUser->avatar); ?>" <?php else: ?> avatar="<?php echo e($projectUser->name); ?>" <?php endif; ?>
                                                    class="" data-bs-toggle="tooltip"
                                                    title="<?php echo e($projectUser->name); ?>">
                                                <!-- </a> -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2"><?php echo e($percentages); ?>%</span>
                                            <div>
                                                <div class="progress" style="width: 100px;">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        aria-valuenow="<?php echo e($percentages); ?>" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: <?php echo e($percentages); ?>%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        
                                        <a href="#" class="btn btn-sm action-btn bg-secondary ms-2"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-url="<?php echo e(route('project.copy', [$project->id])); ?>"
                                            data-bs-whatever="<?php echo e(__('Create New Item')); ?>"> <span class="text-white">
                                                <i class="ti ti-copy text-white" data-bs-toggle="tooltip"
                                                    data-bs-original-title="<?php echo e(__('Duplicate Project')); ?>"></i></span>
                                        </a>

                                        <?php if(\Auth::user()->type == 'company'): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('project.edit', \Crypt::encrypt($project->id))); ?>"
                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                    data-bs-whatever="<?php echo e(__('Edit Project')); ?>" data-bs-toggle="tooltip"
                                                    data-bs-original-title="<?php echo e(__('Edit')); ?>"> <span class="text-white">
                                                        <i class="ti ti-edit"></i></span></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="action-btn bg-warning ms-2">
                                            <a href="<?php echo e(route('project.show', \Crypt::encrypt($project->id))); ?>"
                                                class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                data-bs-whatever="<?php echo e(__('View Project')); ?>" data-bs-toggle="tooltip"
                                                data-bs-original-title="<?php echo e(__('View')); ?>"> <span class="text-white"> <i
                                                        class="ti ti-eye"></i></span></a>
                                        </div>



                                        <?php if(\Auth::user()->type == 'company'): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['project.destroy', $project->id]]); ?>

                                                <a href="#!"
                                                    class="mx-3 btn btn-sm d-flex align-items-center show_confirm">
                                                    <i class="ti ti-trash text-white" data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                </a>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/project/index.blade.php ENDPATH**/ ?>