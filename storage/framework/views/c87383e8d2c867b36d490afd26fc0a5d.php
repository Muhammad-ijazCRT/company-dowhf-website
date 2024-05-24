<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="3jV7FdKgwAzpJzrKzKJHQ0MoT062gsR3lPP6phSl" />
    
    <?php echo $__env->make('frontend.layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
    <title><?php echo $__env->yieldContent('title'); ?> | DOWHF Tech Solutions</title>

    
    <?php echo $__env->yieldContent('customStyle'); ?>

</head>

<body data-new-gr-c-s-check-loaded="14.1172.0" data-gr-ext-installed="" cz-shortcut-listen="true">
    
    <?php if(View::hasSection('indexHeader')): ?>
        <?php echo $__env->yieldContent('indexHeader'); ?>
    <?php else: ?>
        <?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <?php echo $__env->make('frontend.layout.feedback', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->yieldContent('MainContent'); ?>

    <!-- Footer -->
    <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--Scripts -->
    <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\crmgo\resources\views/frontend/layout.blade.php ENDPATH**/ ?>