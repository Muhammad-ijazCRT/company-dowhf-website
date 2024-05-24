<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Project Create')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Project Create')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('project.index')); ?>"><?php echo e(__('Project')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Create')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(['url' => 'project', 'class' => 'mt-4'])); ?>

    <div class="card">
        <div class="card-body">
            <?php
                $plansettings = App\Models\Utility::plansettings();
            ?>
            <div class="row">
                <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
                    <div class="text-end">
                        <a href="#" data-size="lg" data-ajax-popup-over="true"
                            data-url="<?php echo e(route('generate', ['project'])); ?>" data-bs-placement="top"
                            title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate')); ?>" float-end>
                            <span class="btn btn-primary btn-sm"> <i class="fas fa-robot">
                                    <?php echo e(__('Generate With AI')); ?></span></i>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('title', __('Project Title'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Project Title')])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('category', __('Category'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::select('category', $categories, '', ['class' => 'form-control multi-select'])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('price', __('Price'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::number('price', null, ['class' => 'form-control', 'required' => 'required', 'stage' => '0.01', 'placeholder' => __('Price')])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('start_date', __('Start Date'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::date('start_date', new \DateTime(), ['class' => 'form-control', 'required' => 'required'])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('due_date', __('Due Date'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::date('due_date', new \DateTime(), ['class' => 'form-control', 'required' => 'required'])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('lead', __('Lead'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::select('lead', $leads, null, ['class' => 'form-control multi-select'])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('client', __('Client'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::select('client', $clients, '', ['class' => 'form-control multi-select'])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('employee', __('Employee'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::select('employee[]', $employees, null, ['class' => 'form-control multi-select', 'id' => 'choices-multiple', 'multiple' => '', 'required' => 'required'])); ?>


                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::select('status', $projectStatus, null, ['class' => 'form-control multi-select', 'required' => 'required'])); ?>

                </div>
                <div class="form-group col-md-12">
                    <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2', 'placeholder' => __('Description')])); ?>

                </div>
                <div class="modal-footer pr-0">
                    <input type="button" value="<?php echo e(__('Close')); ?>" onclick="location.href = '<?php echo e(route("project.index")); ?>';" class="btn btn-light">
                    <?php echo e(Form::submit(__('Create'), ['class' => 'btn  btn-primary'])); ?>

                </div>
            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/project/create.blade.php ENDPATH**/ ?>