

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Email Compaign')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> <?php echo e(__('Run Email Compaign')); ?></h5>
    </div>
    <style>
        .select-items {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-top: 5px;
        }
        .select-items span {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            display: inline-block;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('emailCompaign')); ?>"><?php echo e(__('Email Compaign')); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row justify-content-center align-content-center ">
                <div class="col-xl-9">
                    <form action="<?php echo e(route('runCompaign')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    

                                    <label for="email-input" class="form-label">Select or Enter Emails</label>
                <input type="text" id="email-input" class="form-control" list="email-options" placeholder="Select or enter emails">
                <datalist id="email-options">
                    <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($email->email); ?>"><?php echo e($email->email); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </datalist>
                <input type="hidden" name="selected_emails" id="selected-emails">
                <div class="select-items" id="select-items"></div>

                                    

                                    </div> 
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label" for="c_email">Subject<span class="steric">*</span></label>
                                <input class="form-control" type="email" id="c_email" name="name" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea3">Message<span class="steric">*</span></label>
                                <textarea class="form-control" id="exampleFormControlTextarea3" name="message" rows="7"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary d-flex align-items-center">Run
                                    Compaign!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email-input');
            const selectedEmailsInput = document.getElementById('selected-emails');
            const selectItemsContainer = document.getElementById('select-items');

            emailInput.addEventListener('change', function () {
                const email = emailInput.value.trim();

                if (email && !selectedEmailsInput.value.split(',').includes(email)) {
                    // Add to the hidden input value
                    if (selectedEmailsInput.value) {
                        selectedEmailsInput.value += `,${email}`;
                    } else {
                        selectedEmailsInput.value = email;
                    }

                    // Add to the display container
                    const emailSpan = document.createElement('span');
                    emailSpan.textContent = email;
                    selectItemsContainer.appendChild(emailSpan);
                }

                // Clear the input field
                emailInput.value = '';
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\github\company-dowhf-website\resources\views/email-compaign/index.blade.php ENDPATH**/ ?>