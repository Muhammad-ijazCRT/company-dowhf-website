<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacted Us Mail</title>
</head>
<body>
<div class="col-lg-3 col-sm-6 mb-4">
    <div class="card hover-shadow-lg">
        <div class="card-header border-0 pb-0 pt-2 px-3">
            <span class="badge bg-primary p-2 px-3 rounded">
                Contact US
            </span>
        </div>
        <div class="card-body text-center client-box">
            <h5 class="h6 mt-4 mb-0"><?php echo e($details['client_name']); ?></h5>
            <a href="mailto:<?php echo e($details['email']); ?>" class="text-sm text-muted mb-3"><?php echo e($details['email']); ?></a>
            <p class="card-text mt-2"><strong>Message:</strong> <?php echo e($details['message']); ?></p>
            <p class="card-text"><strong>Budget:</strong> <?php echo e($details['budget']); ?></p>
            <p class="card-text"><strong>NDA Agreement:</strong> <?php echo e($details['nda_agreement']); ?></p>
            <p class="card-text"><strong>Document:</strong> <?php echo e($details['document']); ?></p>
            <p class="card-text"><strong>Purpose:</strong></p>
            <?php $__currentLoopData = json_decode($details['purpose']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purpose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="badge bg-primary"><?php echo e($purpose); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p class="card-text mt-2"><strong>Services:</strong></p>
            <?php $__currentLoopData = json_decode($details['services']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="badge bg-success"><?php echo e($service); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
    
</body>
</html>
<?php /**PATH C:\xampp\htdocs\crmgo\resources\views/email/contactus.blade.php ENDPATH**/ ?>