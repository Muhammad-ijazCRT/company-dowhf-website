<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>

<?php
	$footer_text=isset(\App\Models\Utility::settings()['footer_text']) ? \App\Models\Utility::settings()['footer_text'] : '';
	\App\Models\Utility::setCaptchaConfig();
	// $SITE_RTL = Cookie::get('SITE_RTL');
    // if ($SITE_RTL == '') {
    //     $SITE_RTL == 'off';
    // }
?>
<?php $__env->startPush('custom-scripts'); ?>
<?php if(\App\Models\Utility::getValByName('recaptcha_module') == 'yes'): ?>
<?php echo NoCaptcha::renderJs(); ?>

<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('language'); ?>
	<?php $__currentLoopData = Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a href="<?php echo e(route('login',$code)); ?>" tabindex="0" class="dropdown-item <?php echo e($code == $lang ? 'active':''); ?>">
			<span><?php echo e(ucFirst($language)); ?></span>
		</a>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- [ auth-signup ] start -->
		<div class="card-body">
			<div>
				<h2 class="mb-3 f-w-600"><?php echo e(__('Login')); ?></h2>
			</div>
            <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>
			<div class="custom-login-form">
				<form method="POST" action="<?php echo e(route('login')); ?>" class="needs-validation" novalidate="">
				<?php echo csrf_field(); ?>
					<div class="form-group mb-3">
						<label class="form-label"><?php echo e(__('Email')); ?></label>
						<input id="email" type="email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
							name="email" placeholder="<?php echo e(__('Enter your email')); ?>"
							required autofocus>
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
					<div class="form-group mb-3 pss-field">
						<label class="form-label"><?php echo e(__('Password')); ?></label>
						<input id="password" type="password" class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="<?php echo e(__('Password')); ?>" required>
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
					<div class="form-group mb-4">
						<div class="d-flex flex-wrap align-items-center justify-content-between">
							<?php if(Route::has('password.request')): ?>
								<span>
									<a href="<?php echo e(route('password.request', $lang)); ?>" tabindex="0"><?php echo e(__('Forgot Your Password?')); ?></a>
								</span>
							<?php endif; ?>
						</div>
					</div>
					<?php if(\App\Models\Utility::getValByName('recaptcha_module') == 'yes'): ?>
						<div class="form-group mb-4">
							<?php echo NoCaptcha::display(); ?>

							<?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<span class="error small text-danger" role="alert">
									<strong><?php echo e($message); ?></strong>
								</span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>
					<?php endif; ?>
					<div class="d-grid">
						<button class="btn btn-primary mt-2" type="submit">
							<?php echo e(__('Login')); ?>

						</button>
					</div>
				</form>
				<?php if(Utility::getValByName('SIGNUP')=='on'): ?>
					<p class="my-4 text-center"><?php echo e(__("Don't have an account?")); ?>

						<a href="<?php echo e(route('register',$lang)); ?>" tabindex="0"><?php echo e(__('Register')); ?></a>
					</p>
				<?php endif; ?>
			</div>
		</div>
<!-- [ auth-signup ] end -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\github\company-dowhf-website\resources\views/auth/login.blade.php ENDPATH**/ ?>