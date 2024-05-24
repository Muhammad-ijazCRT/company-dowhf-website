<?php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Employee Edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> <?php echo e(__('Employee Edit')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('employee.index')); ?>"><?php echo e(__('Employee')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e($user->name); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Personal Info')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-2"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Company Info')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-3"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Bank Info')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div id="useradd-1" class="card">
                        <?php echo e(Form::model($employee, ['route' => ['employee.personal.update', $employee->user_id], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="card-header">
                            <h5><?php echo e(__('Personal Info')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Edit details about your personal information')); ?></small>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Name'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('mobile', __('Mobile'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::number('mobile', $employee->mobile, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Mobile'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('emergency_contact', __('Emergency Contact'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('emergency_contact', $employee->emergency_contact, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Emergency Contact'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo Form::label('dob', __('Date of Birth'), ['class' => 'form-label']); ?>

                                            <?php echo Form::date('dob', null, ['class' => 'form-control', 'required' => 'required']); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <?php echo Form::label('gender', __('Gender'), ['class' => 'form-label']); ?>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            value="Male" id="customCheckinlh1"
                                                            <?php echo e($employee->gender == 'Male' ? 'checked' : 'checked'); ?>>
                                                        <label class="form-check-label" for="customCheckinlh1">
                                                            <?php echo e(__('Male')); ?>

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            value="Female" id="customCheckinlh2"
                                                            <?php echo e($employee->gender == 'Female' ? 'checked' : ''); ?>>
                                                        <label class="form-check-label" for="customCheckinlh2">
                                                            <?php echo e(__('Female')); ?>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card bg-gradient-primary hover-shadow-lg border-0">
                                            <div class="card-body py-3">
                                                <div class="row row-grid align-items-center">
                                                    <div class="col-lg-8">
                                                        <div class="media align-items-center">
                                                            <a href="#" class="avatar avatar-lg rounded-circle mr-3">
                                                                <img <?php if(!empty($user->avatar)): ?> src="<?php echo e($profile . '/' . $user->avatar); ?>" <?php else: ?> avatar="<?php echo e($user->name); ?>" <?php endif; ?>
                                                                    class="avatar  rounded-circle avatar-lg"
                                                                    style="width:60px">
                                                            </a>
                                                            <div class="media-body ms-3">
                                                                <h5 class="text-dark mb-2"><?php echo e($user->name); ?></h5>
                                                                <div>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control"
                                                                            id="file-1" name="profile"
                                                                            aria-describedby="inputGroupFileAddon04"
                                                                            aria-label="Upload"
                                                                            data-multiple-caption="{count} files selected"
                                                                            multiple />
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('address', __('Address'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::textarea('address', $employee->address, ['class' => 'form-control', 'required' => 'required', 'rows' => '3'])); ?>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php echo e(Form::submit(__('Update'), ['class' => 'btn btn-primary d-flex align-items-center'])); ?>

                                    </div>


                                </div>
                            </form>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>



                    <div id="useradd-2" class="card">
                        <?php echo e(Form::model($employee, ['route' => ['employee.company.update', $employee->user_id], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="card-header">
                            <h5><?php echo e(__('Company Info')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Edit details about your company information')); ?></small>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <?php echo Form::label('emp_id', __('Employee ID'), ['class' => 'form-label']); ?>

                                            <?php echo Form::text('emp_id', $employeesId, ['class' => 'form-control', 'readonly']); ?>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('branch_id', __('Branch'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::select('branch_id', $branches, null, ['class' => 'form-control select', 'required' => 'required', 'id' => 'branch_id'])); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('department_id', __('Department'), ['class' => 'form-label', 'placeholder' => 'Select Department'])); ?>

                                        <select class=" select form-control " id="department_id" name="department_id"
                                            required="required">
                                            <option value=""><?php echo e(__('Select any Department')); ?></option>
                                            <?php $__currentLoopData = $departmentData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>"
                                                    <?php echo e($key == $employee->department ? 'selected' : ''); ?>>
                                                    <?php echo e($val); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('designation_id', __('Designation'), ['class' => 'form-label'])); ?>

                                        <select class="select form-control " id="designation_id" name="designation_id"
                                            required="required"></select>
                                    </div>

                                    <div class="col-sm-6">
                                        <div cla`s="form-group">
                                            <?php echo Form::label('joining_date', __('Date of Joining'), ['class' => 'form-label']); ?>

                                            <?php echo Form::date('joining_date', null, ['class' => 'form-control', 'required' => 'required']); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo Form::label('exit_date', __('Date of Exit'), ['class' => 'form-label']); ?>

                                            <?php echo Form::date('exit_date', !empty($employee->exit_date) ? null : '', [
                                                'class' => 'form-control',
                                                'required' => 'required',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <?php echo e(Form::label('salary_type', __('Salary Type'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::select('salary_type', $salaryType, null, ['class' => 'form-control multi-select'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo Form::label('salary', __('Salary'), ['class' => 'form-label']); ?>

                                            <?php echo Form::number('salary', null, ['class' => 'form-control']); ?>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php echo e(Form::submit(__('Update'), ['class' => 'btn btn-primary d-flex align-items-center'])); ?>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>



                    <div id="useradd-3" class="card">
                        <?php echo e(Form::model($employee, ['route' => ['employee.bank.update', $employee->user_id], 'method' => 'post'])); ?>

                        <div class="card-header">
                            <h5><?php echo e(__('Bank Info')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Edit details about your bank information')); ?></small>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo Form::label('account_holder_name', __('Account Holder Name'), ['class' => 'form-label']); ?>

                                            <?php echo Form::text('account_holder_name', null, [
                                                'class' => 'form-control',
                                                'required',
                                                'placeholder' => 'Account Holder Name',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('account_number', __('Account Number'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::text('account_number', null, [
                                                'class' => 'form-control',
                                                'required',
                                                'placeholder' => 'Account Number',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('bank_name', __('Bank Name'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::text('bank_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Bank Name']); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo Form::label('bank_identifier_code', __('Bank Identifier Code'), ['class' => 'form-label']); ?>

                                            <?php echo Form::text('bank_identifier_code', null, [
                                                'class' => 'form-control',
                                                'required',
                                                'placeholder' => 'Bank Identifier Code',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <?php echo Form::label('branch_location', __('Branch Location'), ['class' => 'form-label']); ?>

                                            <?php echo Form::text('branch_location', null, [
                                                'class' => 'form-control',
                                                'required',
                                                'placeholder' => 'Branch Location',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php echo e(Form::submit(__('Update'), ['class' => 'btn btn-primary d-flex align-items-center'])); ?>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script type="text/javascript">
        $(document).on('change', '#branch_id', function() {
            var branch_id = $(this).val();
            getDepartment(branch_id);
        });

        function getDepartment(branch_id) {
            var data = {
                "branch_id": branch_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            }

            $.ajax({
                url: '<?php echo e(route('employee.getdepartment')); ?>',
                method: 'POST',
                data: data,
                success: function(data) {
                    $('#department_id').empty();
                    $('#department_id').append(
                        '<option value="" disabled><?php echo e(__('Select any Department')); ?></option>');

                    $.each(data, function(key, value) {
                        $('#department_id').append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                    $('#department_id').val('');
                }
            });
        }
    </script>
    <script type="text/javascript">
        function getDesignation(did) {
            $.ajax({
                url: '<?php echo e(route('employee.json')); ?>',
                type: 'POST',
                data: {
                    "department_id": did,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    $('#designation_id').empty();
                    $('#designation_id').append(
                        '<option value=""><?php echo e(__('Select any Designation')); ?></option>');

                    $.each(data, function(key, value) {
                        var select = '';
                        if (key == '<?php echo e($employee->designation); ?>') {
                            select = 'selected';
                        }

                        $('#designation_id').append('<option value="' + key + '"  ' + select + '>' +
                            value + '</option>');
                    });
                }
            });
        }

        $(document).ready(function() {
            var d_id = $('#department_id').val();
            var designation_id = '<?php echo e($employee->designation); ?>';
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department_id]', function() {
            var department_id = $(this).val();
            getDesignation(department_id);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/employee/edit.blade.php ENDPATH**/ ?>