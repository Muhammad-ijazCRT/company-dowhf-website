<?php
$footer_text = isset(\App\Models\Utility::settings()['footer_text']) ? \App\Models\Utility::settings()['footer_text'] : '';
\App\Models\Utility::setCaptchaConfig();

?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
<?php if(\App\Models\Utility::getValByName('recaptcha_module') == 'yes'): ?>
        <?php echo NoCaptcha::renderJs(); ?>

<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('language'); ?>
    <?php $__currentLoopData = Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('register',$code)); ?>" tabindex="0" class="dropdown-item <?php echo e($code == $lang ? 'active':''); ?>">
        <span><?php echo e(ucFirst($language)); ?></span>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div>
            <h2 class="mb-3 f-w-600"><?php echo e(__('Register')); ?></h2>
        </div>
        <?php if(session('status')): ?>
            <div class="mb-4 font-medium text-lg text-green-600 text-danger">
                <?php echo e(__('Email SMTP settings does not configured so please contact to your site admin.')); ?>

            </div>
        <?php endif; ?>
        <div class="custom-login-form">
            <?php echo e(Form::open(['route' => 'register', 'method' => 'post', 'id' => 'loginForm'])); ?>

                <div class="form-group mb-3">
                    <label class="form-label d-flex"><?php echo e(__('Full Name')); ?></label>
                    <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Username')])); ?>

                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error invalid-name text-danger" role="alert">
                        <small><?php echo e($message); ?></small>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label d-flex"><?php echo e(__('Email')); ?></label>
                    <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Email address')])); ?>

                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error invalid-email text-danger" role="alert">
                        <small><?php echo e($message); ?></small>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label d-flex"><?php echo e(__('Password')); ?></label>
                    <?php echo e(Form::password('password', ['class' => 'form-control', 'id' => 'input-password', 'placeholder' => __('Password')])); ?>

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error invalid-password text-danger" role="alert">
                        <small><?php echo e($message); ?></small>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-control-label d-flex"><?php echo e(__('Confirm password')); ?></label>
                    <?php echo e(Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'confirm-input-password', 'placeholder' => __('Confirm Password')])); ?>


                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-password_confirmation text-danger" role="alert">
                            <small><?php echo e($message); ?></small>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <input type="hidden" name="used_referral_code" value="<?php echo e(request()->input('ref_id')); ?>">


                <?php if(\App\Models\Utility::getValByName('recaptcha_module') == 'yes'): ?>
						<div class="form-group mb-4">
							<?php echo NoCaptcha::display(); ?>

							<?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<span class="error small text-danger" role="alert">
									<small><?php echo e($message); ?></small>
								</span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>
					<?php endif; ?>
                <div class="d-grid">
                <button class="btn btn-primary mt-2">
                    <?php echo e(__('Register')); ?>

                </button>
                </div>
            <?php echo e(Form::close()); ?>


            <?php if(\App\Models\Utility::getValByName('SIGNUP') == 'on'): ?>
                <p class="my-4 text-center"><?php echo e(__('Already have an account?')); ?> <a href="<?php echo e(url('login/'."$lang")); ?>" tabindex="0"><?php echo e(__('Login')); ?></a></p>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/auth/register.blade.php ENDPATH**/ ?>