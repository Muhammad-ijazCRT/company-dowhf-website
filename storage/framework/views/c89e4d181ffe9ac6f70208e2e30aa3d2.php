<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Develoepr</title>
</head>
<body>
<div class="col-lg-3 col-sm-6 mb-4">
    <div class="card hover-shadow-lg">
        <div class="card-header border-0 pb-0 pt-2 px-3">
            <span class="badge bg-primary p-2 px-3 rounded">
                dowhf - Your Developer 
            </span>
        </div>
        <div class="card-body text-center client-box">
            <h5 class="h6 mt-4 mb-0"><?php echo e($details['subject']); ?></h5>
            <a href="mailto:<?php echo e($details['email']); ?>" class="text-sm text-muted mb-3"><?php echo e($details['email']); ?></a>
            <p class="card-text mt-2"><strong>Message:</strong> <?php echo e($details['message']); ?></p>
        </div>
    </div>
</div>
    
</body>
</html>
<?php /**PATH C:\xampp\htdocs\github\company-dowhf-website\resources\views/email/emailcompaign.blade.php ENDPATH**/ ?>