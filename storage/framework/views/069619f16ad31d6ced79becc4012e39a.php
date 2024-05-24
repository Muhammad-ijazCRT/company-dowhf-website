<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Lead')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Lead')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Lead')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('lead.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        data-bs-original-title="<?php echo e(__('Kanban View')); ?>">
        <i class="ti ti-layout-kanban text-white"></i>
    </a>
    <?php if(\Auth::user()->type == 'company'): ?>
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-url="<?php echo e(route('lead.create')); ?>" data-bs-whatever="<?php echo e(__('Create New Lead')); ?>"
            data-bs-original-title="<?php echo e(__('Create New Lead')); ?>">
            <i data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" class="ti ti-plus text-white"></i>
        </a>
    <?php endif; ?>
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
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Subject')); ?></th>
                                <th><?php echo e(__('Stage')); ?></th>
                                <th><?php echo e(__('Users')); ?></th>
                                <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($leads) > 0): ?>
                                <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($lead->name); ?></td>
                                        <td><?php echo e($lead->subject); ?></td>
                                        <td><?php echo e(!empty($lead->stage) ? $lead->stage->name : ''); ?></td>
                                        <td>
                                            <div class="user-group">
                                                <?php $__currentLoopData = $lead->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <img <?php if(!empty($user->avatar)): ?> src="<?php echo e(asset('/storage/uploads/avatar/' . $user->avatar)); ?>" <?php else: ?> avatar="<?php echo e($user->name); ?>" <?php endif; ?>
                                                        class="" data-bs-toggle="tooltip"
                                                        title="<?php echo e($user->name); ?>">
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </td>
                                        <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                                            <td class="text-right">
                                                <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="<?php echo e(route('lead.show', \Crypt::encrypt($lead->id))); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                            data-url="#" data-bs-whatever="<?php echo e(__('View Lead')); ?>"
                                                            data-bs-toggle="tooltip" title="View Lead"
                                                            data-bs-original-title="<?php echo e(__('View Lead')); ?>"> <span
                                                                class="text-white"> <i class="ti ti-eye"></i></span></a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if(\Auth::user()->type == 'company'): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="#"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                            data-url="<?php echo e(route('lead.edit', $lead->id)); ?>"
                                                            data-bs-whatever="<?php echo e(__('Edit Lead')); ?>"
                                                            data-bs-toggle="tooltip" title="Edit Lead"
                                                            data-bs-original-title="<?php echo e(__('Edit Lead')); ?>" data-size="lg">
                                                            <span class="text-white"> <i class="ti ti-edit"></i></span></a>
                                                    </div>

                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['lead.destroy', $lead->id],
                                                            'id' => 'delete-form-' . $lead->id,
                                                        ]); ?>

                                                        <a href="#!"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center show_confirm m-2">
                                                            <i class="ti ti-trash text-white" data-bs-toggle="tooltip"
                                                                data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr class="font-style">
                                    <td colspan="6" class="text-center"><?php echo e(__('No data available in table')); ?></td>
                                </tr>
                            <?php endif; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/lead/grid.blade.php ENDPATH**/ ?>