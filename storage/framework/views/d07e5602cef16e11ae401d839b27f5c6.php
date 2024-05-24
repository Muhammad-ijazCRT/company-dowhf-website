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
    <?php echo e(__('Client Edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> <?php echo e(\Auth::user()->clientIdFormat($client->client_id)); ?>

            <?php echo e(__('Edit')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('client.index')); ?>"><?php echo e(__('Client')); ?></a></li>
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
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div id="useradd-1" class="card">
                        <?php echo e(Form::model($client, ['route' => ['client.personal.update', $client->user_id], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

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

                                            <?php echo e(Form::text('name', $user->name, ['class' => 'form-control font-style', 'placeholder' => 'Enter Name'])); ?>

                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-name" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('mobile', __('Mobile'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('mobile', $client->mobile, ['class' => 'form-control', 'placeholder' => 'Enter Mobile'])); ?>

                                            <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-mobile" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('address_1', __('Address 1'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::textarea('address_1', $client->address_1, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Enter Address'])); ?>

                                            <?php $__errorArgs = ['address_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-address_1" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('address_2', __('Address 2'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::textarea('address_2', $client->address_2, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Enter Address'])); ?>

                                            <?php $__errorArgs = ['address_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-address_2" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <?php echo e(Form::label('city', __('City'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('city', $client->city, ['class' => 'form-control', 'placeholder' => 'Enter City'])); ?>

                                            <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-city" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo e(Form::label('state', __('State'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('state', $client->state, ['class' => 'form-control', 'placeholder' => 'Enter State'])); ?>

                                        <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-state" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo e(Form::label('country', __('Country'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('country', $client->country, ['class' => 'form-control', 'placeholder' => 'Enter Country'])); ?>

                                        <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-country" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo e(Form::label('zip_code', __('Zip Code'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('zip_code', $client->zip_code, ['class' => 'form-control', 'placeholder' => 'Enter Zip Code'])); ?>

                                        <?php $__errorArgs = ['zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-zip_code" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <?php echo e(Form::label('zip_code', __('Avatar'), ['class' => 'form-label'])); ?>

                                        <div class="card bg-gradient-primary hover-shadow-lg border-0">
                                            <div class="card-body py-3">
                                                <div class="row row-grid align-items-center">
                                                    <div class="col-lg-8">
                                                        <div class="media align-items-center">
                                                            <a href="#" class="avatar avatar-lg rounded-circle mr-3">
                                                                <img <?php if(!empty($user->avatar)): ?> src="<?php echo e($profile . '/' . $user->avatar); ?>" <?php else: ?> avatar="<?php echo e($user->name); ?>" <?php endif; ?>
                                                                    class="avatar  rounded-circle avatar-lg">
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
                                    <div class="modal-footer">
                                        <?php echo e(Form::submit(__('Update'), ['class' => 'btn btn-primary d-flex align-items-center'])); ?>

                                    </div>


                                </div>
                            </form>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    <div id="useradd-2" class="card">
                        <?php echo e(Form::model($client, ['route' => ['client.update.company', $client->user_id], 'method' => 'post'])); ?>

                        <div class="card-header">
                            <h5><?php echo e(__('Company Info')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Edit details about your company information')); ?></small>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <?php echo Form::label('clt_id', __('Client ID'), ['class' => 'form-label']); ?>

                                            <?php echo Form::text('clt_id', \Auth::user()->clientIdFormat($client->client_id), [
                                                'class' => 'form-control',
                                                'readonly',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('company_name', __('Company Name'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('company_name', $client->company_name, ['class' => 'form-control', 'placeholder' => 'Enter  Company Name'])); ?>

                                            <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-company_name" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('website', __('Website'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('website', $client->website, ['class' => 'form-control', 'placeholder' => 'Enter Website'])); ?>

                                            <?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-website" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('tax_number', __('Tax Number'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('tax_number', $client->tax_number, ['class' => 'form-control', 'placeholder' => 'Enter Tax Number'])); ?>

                                            <?php $__errorArgs = ['tax_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-tax_number" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong> 
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::textarea('notes', $client->notes, ['class' => 'form-control', 'placeholder' => 'Enter Notes', 'rows' => '3'])); ?>

                                            <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-notes" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/client/edit.blade.php ENDPATH**/ ?>