<?php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
    // $profile=asset(Storage::url('uploads/avatar'));
?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Employee')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Employee')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Employee')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if(\Auth::user()->type == 'company'): ?>
        <a href="<?php echo e(route('user.userlog')); ?>" class="btn btn-primary btn-sm <?php echo e(Request::segment(1) == 'user'); ?>"
            data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Employee Logs History')); ?>">
            <i class="ti ti-user-check"></i>
        </a>
    <?php endif; ?>

    <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-url="<?php echo e(route('employee.file.import')); ?>" data-bs-whatever="<?php echo e(__('Import CSV file')); ?>"> <span
            class="text-white">
            <i class="ti ti-file-import" data-bs-toggle="tooltip"
                data-bs-original-title="<?php echo e(__('Import item CSV file')); ?>"></i>
    </a>

    <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-url="<?php echo e(route('employee.create')); ?>" data-bs-whatever="<?php echo e(__('Create New Employee')); ?>">
        <i class="ti ti-plus text-white" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Create')); ?>"></i>
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="collapse <?php echo e(isset($_GET['department']) ? 'show' : ''); ?>" id="collapseExample">
                <div class="card card-body">
                    <?php echo e(Form::open(['url' => 'employee', 'method' => 'get'])); ?>

                    <div class="row filter-css">
                        <div class="col-md-2">
                            <?php echo e(Form::select('department', $department, isset($_GET['department']) ? $_GET['department'] : '', [
                                'class' => 'form-control',
                                'data-toggle' => 'select',
                            ])); ?>

                        </div>
                        <div class="col-md-2">
                            <?php echo e(Form::select('designation', $designation, isset($_GET['designation']) ? $_GET['designation'] : '', [
                                'class' => 'form-control',
                                'data-toggle' => 'select',
                            ])); ?>

                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-xs btn-primary btn-icon-only rounded-circle"
                                data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                    class="ti ti-search"></i></button>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo e(route('employee.index')); ?>" data-toggle="tooltip" data-title="<?php echo e(__('Reset')); ?>"
                                class="btn btn-xs btn-danger btn-icon-only rounded-circle"><i class="ti ti-trash"></i></a>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6">
                <div class="card hover-shadow-lg">
                    <div class="card-header border-0 pb-0 pt-2 px-3">
                        <div class="row">
                            <div class="col-6 text-right">
                                <span class="badge bg-primary p-2 px-3 rounded">
                                    <?php echo e(\Auth::user()->employeeIdFormat(!empty($employee->employeeDetail) ? $employee->employeeDetail->employee_id : '')); ?>

                                </span>
                            </div>
                            <div class="col-6  text-end">
                                <div class="actions">
                                    <?php if($employee->is_disable == 1): ?>
                                        <?php if($employee->is_active == 1 && (\Auth::user()->id == $employee->id || \Auth::user()->type == 'company')): ?>
                                            <div class="dropdown action-item">
                                                <a href="#" class="action-item " data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a href="<?php echo e(route('employee.edit', \Crypt::encrypt($employee->id))); ?>"
                                                        class="dropdown-item" data-bs-whatever="<?php echo e(__('Edit Employee')); ?>">
                                                        <i class="ti ti-edit"> </i> <?php echo e(__('Edit')); ?></a>


                                                    <a href="<?php echo e(route('employee.show', \Crypt::encrypt($employee->id))); ?>"
                                                        class="dropdown-item" data-bs-whatever="<?php echo e(__('View Employee')); ?>">
                                                        <i class="ti ti-eye"></i> <?php echo e(__('View')); ?></a>


                                                    <a href="#"
                                                        data-url="<?php echo e(route('employee.reset', \Crypt::encrypt($employee->id))); ?>"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        class="dropdown-item"
                                                        data-bs-whatever="<?php echo e(__('Reset Password')); ?>">
                                                        <i class="ti ti-lock"> </i> <?php echo e(__('Reset Password')); ?>

                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['employee.destroy', $employee->id]]); ?>

                                                    <a href="#!" class=" show_confirm dropdown-item">
                                                        <i class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

                                                    </a>
                                                    <?php echo Form::close(); ?>

                                                    <?php if($employee->is_enable_login == 1): ?>
                                                        <a href="<?php echo e(route('employee.login', \Crypt::encrypt($employee->id))); ?>"
                                                            class="dropdown-item">
                                                            <i class="ti ti-road-sign"></i>
                                                            <span class="text-danger"> <?php echo e(__('Login Disable')); ?></span>
                                                        </a>
                                                    <?php elseif($employee->is_enable_login == 0 && $employee->password == null): ?>
                                                        <a href="#"
                                                            data-url="<?php echo e(route('employee.reset', \Crypt::encrypt($employee->id))); ?>"
                                                            data-ajax-popup="true" data-size="md"
                                                            class="dropdown-item login_enable"
                                                            data-title="<?php echo e(__('New Password')); ?>" class="dropdown-item">
                                                            <i class="ti ti-road-sign"></i>
                                                            <span class="text-success"> <?php echo e(__('Login Enable')); ?></span>
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('employee.login', \Crypt::encrypt($employee->id))); ?>"
                                                            class="dropdown-item">
                                                            <i class="ti ti-road-sign"></i>
                                                            <span class="text-success"> <?php echo e(__('Login Enable')); ?></span>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="actions d-flex justify-content-between px-4">
                                                <a href="#" data-toggle="tooltip"
                                                    data-original-title="<?php echo e(__('Lock')); ?>"
                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                    <i class="fas fa-lock"></i>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div>
                                            <i class="ti ti-lock"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center client-box">
                        <div class="avatar-parent-child">
                            <img <?php if(!empty($employee->avatar)): ?> src="<?php echo e($profile . '/' . $employee->avatar); ?>" <?php else: ?>
                    avatar="<?php echo e($employee->name); ?>" <?php endif; ?>
                                class="avatar rounded-circle avatar-lg" style="width:80px;">
                            <!-- <img <?php if(!empty($employee->avatar)): ?> src="<?php echo e($profile . '/' . $employee->avatar); ?>" <?php else: ?>
                        avatar="<?php echo e($employee->name); ?>" <?php endif; ?> class="avatar rounded-circle avatar-lg" width="130px"> -->
                        </div>
                        <h5 class="h6 mt-4 mb-0"><?php echo e($employee->name); ?></h5>
                        <a href="#" class="text-sm text-muted mb-3"><?php echo e($employee->email); ?></a>
                    </div>

                    <div class="card-footer">
                        <div class="row justify-content-between align-items-center">
                            <div class="col text-center">
                                <span
                                    class="d-block h6 mb-0"><?php echo e(!empty($employee->department_name) ? $employee->department_name : '-'); ?></span>
                                <span class="d-block text-sm text-muted"><?php echo e(__('Department')); ?></span>
                            </div>
                            <div class="col text-center">
                                <span
                                    class="d-block h6 mb-0"><?php echo e(!empty($employee->designation_name) ? $employee->designation_name : '-'); ?></span>
                                <span class="d-block text-sm text-muted"><?php echo e(__('Designation')); ?></span>
                            </div>
                        </div>

                        <div class="row justify-content-between align-items-center mt-3">
                            <div class="col text-center">
                                <span
                                    class="d-block h6 mb-0"><?php echo e(!empty($employee->employeeDetail) && !empty($employee->employeeDetail->joining_date)
                                        ? \Auth::user()->dateFormat($employee->employeeDetail->joining_date)
                                        : '-'); ?></span>
                                <span class="d-block text-sm text-muted"><?php echo e(__('Date of Joining')); ?></span>
                            </div>
                            <div class="col text-center">
                                <span
                                    class="d-block h6 mb-0"><?php echo e(!empty($employee->employeeDetail) ? \Auth::user()->priceFormat($employee->employeeDetail->salary) : '-'); ?></span>
                                <span class="d-block text-sm text-muted"><?php echo e(__('Salary')); ?></span>
                            </div>
                        </div>

                        <?php if($employee->lastlogin): ?>
                            <div class="row justify-content-between align-items-center mt-3">
                                <div class="col text-center">
                                    <span class="d-block h6 mb-0" data-bs-toggle="tooltip"
                                        data-bs-original-title="<?php echo e(__('Last Login')); ?>"><?php echo e($employee->lastlogin); ?></span>

                                </div>
                            </div>
                        <?php else: ?>
                            <div class="row justify-content-between align-items-center mt-4">
                                <div class="col text-center">
                                    <span class="d-block h6 mb-2" data-bs-toggle="tooltip"
                                        data-bs-original-title="<?php echo e(__('Last Login')); ?>"><?php echo e($employee->lastlogin); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="#" class="btn-addnew-project " data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-url="<?php echo e(route('employee.create')); ?>" data-size="lg"
                data-bs-whatever="<?php echo e(__('Create New Employee')); ?>">
                <div class="bg-primary proj-add-icon">
                    <i class="ti ti-plus"></i>
                </div>
                <h6 class="mt-4 mb-2"><?php echo e(__('New Employee')); ?></h6>
                <p class="text-muted text-center"><?php echo e(__('Click here to add new employee')); ?></p>
            </a>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '#password_switch', function() {
            if ($(this).is(':checked')) {
                $('.ps_div').removeClass('d-none');
                $('#password').attr("required", true);

            } else {
                $('.ps_div').addClass('d-none');
                $('#password').val(null);
                $('#password').removeAttr("required");
            }
        });
        $(document).on('click', '.login_enable', function() {
            setTimeout(function() {
                $('.modal-body').append($('<input>', {
                    type: 'hidden',
                    val: 'true',
                    name: 'login_enable'
                }));
            }, 2000);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/employee/index.blade.php ENDPATH**/ ?>