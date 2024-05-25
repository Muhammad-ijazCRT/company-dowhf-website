


<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Clients-Contacted Us')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Clients - Contacted Us')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Contacted Us')); ?></li>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card hover-shadow-lg">
                    <div class="card-header border-0 pb-0 pt-2 px-3">
                        <div class="row">
                            <div class="col-6 text-start">
                                <span class="badge bg-primary p-2 px-3 rounded">
                                    Contact US
                                </span>
                            </div>
                            <div class="col-6 text-end">
                                <div class="dropdown action-item">
                                    <a href="#" class="action-item" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        
                                        <a href="#" class="dropdown-item">
                                            <i class="ti ti-edit"></i> Edit
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            
                                            <i class="ti ti-eye"></i> View
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center client-box">
                        
                        <h5 class="h6 mt-4 mb-0"><?php echo e($contact->client_name); ?></h5>
                        <a href="mailto:<?php echo e($contact->email); ?>" class="text-sm text-muted mb-3"><?php echo e($contact->email); ?></a>
                        <p class="card-text mt-2"><strong>Message:</strong> <?php echo e($contact->message); ?></p>
                        <p class="card-text"><strong>Budget:</strong> <?php echo e($contact->budget); ?></p>
                        <p class="card-text"><strong>NDA Agreement:</strong> <?php echo e($contact->nda_agreement); ?></p>
                        <p class="card-text"><strong>Document:</strong> <?php echo e($contact->document); ?></p>
                        <p class="card-text"><strong>Purpose:</strong></p>
                        <?php $__currentLoopData = json_decode($contact->purpose); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purpose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge bg-primary"><?php echo e($purpose); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <p class="card-text mt-2"><strong>Services:</strong></p>
                        <?php $__currentLoopData = json_decode($contact->services); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge bg-success"><?php echo e($service); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="<?php echo e(route('contact-us.create')); ?>" class="btn-addnew-project">
                <div class="bg-primary proj-add-icon">
                    <i class="ti ti-plus"></i>
                </div>
                <h6 class="mt-4 mb-2"><?php echo e(__('New Contact')); ?></h6>
                <p class="text-muted text-center"><?php echo e(__('Click here to add new contact')); ?></p>
            </a>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\github\company-dowhf-website\resources\views/frontend/contact/index.blade.php ENDPATH**/ ?>