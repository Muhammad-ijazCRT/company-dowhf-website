<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Verification')); ?>

<?php $__env->stopSection(); ?>
<?php
    $footer_text = isset(\App\Models\Utility::settings()['footer_text']) ? \App\Models\Utility::settings()['footer_text'] : '';
    \App\Models\Utility::setCaptchaConfig();

    if (empty($lang)) {
        $lang = Utility::getValByName('default_language');
    }

    \App::setLocale($lang);
?>
<?php $__env->startPush('custom-scripts'); ?>
    <?php if(\App\Models\Utility::getValByName('recaptcha_module') == 'yes'): ?>
        <?php echo NoCaptcha::renderJs(); ?>

    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php
    use App\Models\Utility;
    $languages = App\Models\Utility::languages();
?>


<?php $__env->startSection('language'); ?>
    <?php $__currentLoopData = Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('verification.notice', $code)); ?>" tabindex="0" class="dropdown-item <?php echo e($code == $lang ? 'active' : ''); ?>">
            <span><?php echo e(ucFirst($language)); ?></span>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div>
            <h2 class="mb-3 f-w-600"><?php echo e(__('Email Verification')); ?></h2>
        </div>
        <?php if(session('status') == 'verification-link-sent'): ?>
            <div class="mb-4 font-medium text-sm text-green-600 text-primary">
                <?php echo e(__('A new verification link has been sent to the email address you provided during registration.')); ?>

            </div>
        <?php endif; ?>
        <div class="mb-4 text-sm text-gray-600">
            <?php echo e(__('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?>

        </div>
        <div class="custom-login-form">
            <div class="mt-4 flex items-center justify-between">
                <div class="row">
                    <div class="col-auto">
                        <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary btn-sm"> <?php echo e(__('Resend Verification Email')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-auto">
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm"> <?php echo e(__('Logout')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/auth/verify.blade.php ENDPATH**/ ?>