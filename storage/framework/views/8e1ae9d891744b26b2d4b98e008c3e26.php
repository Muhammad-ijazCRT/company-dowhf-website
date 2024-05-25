<?php
    $users = \Auth::user();
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
    $logo = \App\Models\Utility::get_file('uploads/avatar/');

    // $logo = asset(Storage::url('uploads/logo/'));
    $currantLang = $users->currentLanguage();
    if ($currantLang == null) {
        $currantLang = 'en';
    }
    $languages = Utility::languages();
    $LangName = \App\Models\Languages::where('code', $currantLang)->first();
    // dd($LangName);
    if (\Auth::user()->type == 'employee' && \Auth::user()->type != 'super admin') {
        $userTask = App\Models\ProjectTask::where('assign_to', \Auth::user()->id)
            ->where('time_tracking', 1)
            ->first();
    } elseif (\Auth::user()->type != 'super admin') {
        $userTask = App\Models\ProjectTask::where('time_tracking', 1)
            ->where('created_by', \Auth::user()->id)
            ->first();
    }
    $unseenCounter = App\Models\ChMessage::where('to_id', Auth::user()->id)
        ->where('seen', 0)
        ->count();
?>
<?php if(!empty($userTask)): ?>
    <?php
        $lastTime = App\Models\ProjectTaskTimer::where('task_id', $userTask->id)
            ->orderBy('id', 'desc')
            ->first();
    ?>
    <script>
        TrackerTimer("<?php echo e($lastTime->start_time); ?>");
        $('.start-task').html("<?php echo e($userTask->title); ?>");
    </script>
<?php endif; ?>
<?php if(isset($settings['cust_theme_bg']) && $settings['cust_theme_bg'] == 'on'): ?>
    <header class="dash-header transprent-bg">
    <?php else: ?>
        <header class="dash-header">
<?php endif; ?>
<div class="header-wrapper">
    <div class="me-auto dash-mob-drp">
        <ul class="list-unstyled">
            <li class="dash-h-item mob-hamburger">
                <a href="#!" class="dash-head-link" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner">
                            </div>
                        </div>
                    </div>
                </a>
            </li>

            <li class="dropdown dash-h-item drp-company">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">

                    <img class="theme-avtar"
                        src="<?php echo e(!empty(\Auth::user()->avatar) ? $logo . \Auth::user()->avatar : $logo . '/avatar-1.jpg'); ?>"
                        class="header-avtar" width="50">

                    <span class="hide-mob ms-2"><?php echo e($users->name); ?></span>
                    <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown">

                    <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span><?php echo e(__('Profile')); ?></span>
                    </a>

                    <a href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                        class="dropdown-item">
                        <i class="ti ti-power"></i>
                        <span><?php echo e(__('Logout')); ?></span>
                    </a>
                    <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </li>

        </ul>
    </div>
    <div class="ms-auto">
        <ul class="list-unstyled">
            <?php if (is_impersonating($guard = null)) : ?>
                <li class="dropdown dash-h-item drp-company">
                    <a class="btn btn-danger btn-sm me-3" href="<?php echo e(route('exit.company')); ?>"><i class="ti ti-ban"></i>
                        <?php echo e(__('Exit Admin Login')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                <li class="dash-h-item <?php echo e(!empty($userTask) ? 'mt-3' : ''); ?>">

                    <div class="col-auto">
                        <p class="start-task"></p>
                    </div>
                    <?php if(empty($userTask)): ?>
                        <a class="dash-head-link me-0" href="<?php echo e(route('project.all.task.kanban')); ?>">
                            <i class="ti ti-subtask"></i>
                            <span class="sr-only"></span>
                        </a>
                    <?php else: ?>
                        <a class="dash-head-link me-0" style= "margin-top: -17px;"
                            href="<?php echo e(route('project.all.task.kanban')); ?>">
                            <i class="ti ti-subtask"></i>
                            <span class="sr-only"></span>
                        </a>
                    <?php endif; ?>
                    <div class="col-auto" style= "margin-top: -17px;">
                        <div class="timer-counter"></div>
                    </div>
                </li>
            <?php endif; ?>


            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee' || \Auth::user()->type == 'client'): ?>
                <li class="dropdown dash-h-item drp-notification">
                    <a class="dash-head-link arrow-none me-0" href="<?php echo e(url('chats')); ?>" aria-haspopup="false"
                        aria-expanded="false">
                        <i class="ti ti-brand-hipchat"></i>
                        <span
                            class="bg-danger dash-h-badge message-toggle-msg message-counter custom_messanger_counter beep">
                            <?php echo e($unseenCounter); ?><span class="sr-only"></span></span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="dropdown dash-h-item drp-language">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ti ti-world nocolor"></i>
                      <span class="drp-text hide-mob"><?php echo e(Str::upper($LangName->fullName)); ?></span>
                    <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('change.language', $code)); ?>"
                            class="dropdown-item <?php echo e($currantLang == $code ? 'text-primary' : ''); ?>">
                            <span><?php echo e(Str::upper($lang)); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(\Auth::user()->type == 'super admin'): ?>
                        <div class="dropdown-divider m-0"></div>
                        <a href="#" data-size="md" data-url="<?php echo e(route('create.language')); ?>"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="<?php echo e(__('Create New Language')); ?>" class="dropdown-item text-primary">
                            <?php echo e(__('Create Language')); ?>

                        </a>
                        <div class="dropdown-divider m-0"></div>
                        <a href="<?php echo e(route('manage.language', [$currantLang])); ?>" class="dropdown-item text-primary">
                            <span> <?php echo e(__('Manage Language')); ?></span>
                        </a>
                    <?php endif; ?>

                </div>
            </li>
        </ul>
    </div>
</div>
</header>
<?php /**PATH C:\xampp\htdocs\github\company-dowhf-website\resources\views/partials/admin/header.blade.php ENDPATH**/ ?>