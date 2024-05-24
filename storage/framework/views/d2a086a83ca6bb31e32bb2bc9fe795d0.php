<?php
$footer_text = isset(\App\Models\Utility::settings()['footer_text']) ? \App\Models\Utility::settings()['footer_text'] : '';
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Forgot Password')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Forgot Password')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('language'); ?>
    <?php $__currentLoopData = Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('password.request',$code)); ?>" tabindex="0" class="dropdown-item <?php echo e($code == $lang ? 'active':''); ?>">
        <span><?php echo e(ucFirst($language)); ?></span>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div>
            <h2 class="mb-3 f-w-600"><?php echo e(__('Forgot Password')); ?></h2>
        </div>
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <div class="custom-login-form">
            <?php echo e(Form::open(array('route'=>'password.email','method'=>'post','id'=>'loginForm'))); ?>

                <div class="">
                    <div class="form-group mb-3">
                        <label class="form-label"><?php echo e(__('Email')); ?></label>
                        <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))); ?>

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>
                    <div class="d-grid">
                        <?php echo e(Form::submit(__('Reset Password'),array('class'=>'btn btn-primary btn-block mt-2','id'=>'saveBtn'))); ?>

                    </div>
                    <?php echo e(Form::close()); ?>

                    <?php if(Utility::getValByName('SIGNUP') == 'on'): ?>
                        <!-- <p class="my-4 text-center"><?php echo e(__('Not registered?')); ?>

                                <a href="<?php echo e(route('register',$lang)); ?>" class="my-4 text-primary"><?php echo e(__('Create account')); ?></a>
                        </p> -->
                    <?php endif; ?>
                    <p class="my-4 text-center"><?php echo e(__('Back to ')); ?>

                        <a href="<?php echo e(route('login',$lang)); ?>" class="my-4 text-primary"><?php echo e(__('Login')); ?></a>
                    </p>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>