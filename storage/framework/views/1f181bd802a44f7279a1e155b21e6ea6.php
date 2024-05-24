<!-- resources/views/emails/contact.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us Message</title>
</head>
<body>
    <p><strong>Name:</strong> <?php echo e($details['client_name']); ?></p>
    <p><strong>Email:</strong> <?php echo e($details['email']); ?></p>
    <p><strong>Purpose:</strong> <?php echo e($details['purpose']); ?></p>
    <p><strong>Services:</strong> <?php echo e($details['services']); ?></p>
    <p><strong>Budget:</strong> <?php echo e($details['budget']); ?></p>
    <p><strong>Message:</strong> <?php echo e($details['message']); ?></p>
    <p><strong>NDA Agreement:</strong> <?php echo e($details['nda_agreement'] ? 'Yes' : 'No'); ?></p>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\crmgo\resources\views/email/testmai.blade.php ENDPATH**/ ?>