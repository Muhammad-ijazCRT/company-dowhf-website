<?php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
    $file = \App\Models\Utility::get_file('uploads/files/');
    $feedback = \App\Models\Utility::get_file('uploads/avatar/');

    // $profile = asset(Storage::url('uploads/avatar/'));

?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Project Detail')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('pre-purpose-css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/frappe-gantt.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/dragula.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('pre-purpose-script-page'); ?>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>

    <script>
        const month_names = {
            "en": [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ],
            "en": [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ],
        };
    </script>
    <script src="<?php echo e(asset('assets/js/plugins/dragula.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/frappe-gantt.js')); ?>"></script>
    <script>
        ! function(a) {
            "use strict";
            var t = function() {
                this.$body = a("body")
            };
            t.prototype.init = function() {
                a('[data-plugin="dragula"]').each(function() {
                    var t = a(this).data("containers"),
                        n = [];
                    if (t)
                        for (var i = 0; i < t.length; i++) n.push(a("#" + t[i])[0]);
                    else n = [a(this)[0]];
                    var r = a(this).data("handleclass");
                    r ? dragula(n, {
                        moves: function(a, t, n) {
                            return n.classList.contains(r)
                        }
                    }) : dragula(n).on('drop', function(el, target, source, sibling) {

                        var order = [];
                        $("#" + target.id + " > div").each(function() {
                            order[$(this).index()] = $(this).attr('data-id');
                        });

                        var id = $(el).attr('data-id');

                        var old_status = $("#" + source.id).data('status');
                        var new_status = $("#" + target.id).data('status');
                        var stage_id = $(target).attr('data-id');

                        $("#" + source.id).parent().find('.count').text($("#" + source.id + " > div")
                            .length);
                        $("#" + target.id).parent().find('.count').text($("#" + target.id + " > div")
                            .length);

                        $.ajax({
                            url: '<?php echo e(route('project.task.order')); ?>',
                            type: 'POST',
                            data: {
                                task_id: id,
                                stage_id: stage_id,
                                order: order,
                                old_status: old_status,
                                new_status: new_status,
                                "_token": $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                toastrs('Success', 'Task successfully updated', 'success');
                            },
                            error: function(data) {
                                data = data.responseJSON;
                                toastrs('<?php echo e(__('Error')); ?>', data.error, 'error')
                            }
                        });
                    });
                })
            }, a.Dragula = new t, a.Dragula.Constructor = t
        }(window.jQuery),
        function(a) {
            "use strict";

            a.Dragula.init()

        }(window.jQuery);
    </script>

    <script>
        $(document).on("click", ".status", function() {
            var status = $(this).attr('data-id');
            var url = $(this).attr('data-url');

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    status: status,
                    "_token": $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#change-project-status').submit();
                    location.reload();
                }
            });
        });
    </script>

    <script>
        var tasks = JSON.parse('<?php echo addslashes(json_encode($ganttTasks)); ?>');

        var gantt = new Gantt('#gantt', tasks, {

            custom_popup_html: function(task) {
                var status_class = 'success';
                if (task.custom_class == 'medium') {
                    status_class = 'info'
                } else if (task.custom_class == 'high') {
                    status_class = 'danger'
                }
                return `<div class="details-container">
                                <div class="title">${task.name} <span class="badge badge-${status_class} float-right">${task.extra.priority}</span></div>
                                <div class="subtitle">

                                    <b><?php echo e(__('Stage')); ?> : </b> ${task.extra.stage}<br>
                                    <b><?php echo e(__('Duration')); ?> : </b> ${task.extra.duration}<br>
                                    <b><?php echo e(__('Description')); ?> : </b> ${task.extra.description}

                                </div>
                            </div>
                          `;
            },
            on_click: function(task) {},
            on_date_change: function(task, start, end) {
                task_id = task.id;
                start = moment(start);
                end = moment(end);
                $.ajax({
                    url: "<?php echo e(route('project.gantt.post', $project->id)); ?>",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        start: start.format('YYYY-MM-DD HH:mm:ss'),
                        end: end.format('YYYY-MM-DD HH:mm:ss'),
                        task_id: task_id,
                    },
                    type: 'POST',
                    success: function(data) {

                    },

                    error: function(data) {
                        toastrs('Error', '<?php echo e(__('Some Thing Is Wrong!')); ?>', 'error');
                    }
                });
            },
        });

        gantt.change_view_mode('Week');

        $(document).on("click", ".gantt-chart-mode", function() {

            var mode = $(this).data('value');
            $('.gantt-chart-mode').removeClass('active');
            $(this).addClass('active');
            gantt.change_view_mode(mode)
        });
    </script>

    <script>
        $('.cp_link').on('click', function() {
            // console.log("hii");
            var value = $(this).attr('data-link');
            var $temp = $("<input>");

            $("body").append($temp);
            $temp.val(value).select();
            document.execCommand("copy");
            $temp.remove();
            toastrs('Success', '<?php echo e(__('Link Copy on Clipboard1')); ?>', 'success');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Project Detail')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('project.index')); ?>"><?php echo e(__('Project')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e($project->title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>

    <div class="col-auto d-flex">
        <?php if(\Auth::user()->type == 'company'): ?>
            <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                <a href="#" data-size="md" data-url="<?php echo e(route('project.copylink.setting.create', $project->id)); ?>"
                    data-bs-target="#exampleModal" data-bs-toggle="modal" data-bs-toggle="tooltip"
                    data-bs-title="<?php echo e(__('Shared Project Settings')); ?>" class="btn btn-sm btn-primary btn-icon-only m-1"
                    data-bs-whatever="<?php echo e(__('Shared Project Settings')); ?>">
                    <i class="ti ti-share"></i>
                </a>
            </p>
        <?php endif; ?>

        <?php if(\Auth::user()->type == 'company'): ?>
            <a href="<?php echo e(route('project.edit', \Crypt::encrypt($project->id))); ?>" class="btn btn-sm btn-info  btn-icon m-1"
                data-bs-whatever="<?php echo e(__('Edit Project')); ?>" data-bs-toggle="tooltip"
                data-bs-original-title="<?php echo e(__('Edit')); ?>"> <span class="text-white"> <i
                        class="ti ti-edit"></i></span></a>


            <?php echo Form::open(['method' => 'DELETE', 'route' => ['project.destroy', $project->id]]); ?>

            <a href="#!" class="btn btn-sm btn-danger btn-icon m-1 show_confirm">
                <i class="ti ti-trash text-white"></i>
            </a>
            <?php echo Form::close(); ?>

        <?php endif; ?>
        <?php if(\Auth::user()->type == 'company'): ?>
            <?php if($projectStatus): ?>
                <div class="btn-group">
                    <button class="btn btn-sm bg-primary text-white btn-icon rounded-pill dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e(\App\Models\Project::$projectStatus[$project->status]); ?>

                    </button>
                    <div class="dropdown-menu">
                        <?php $__currentLoopData = $projectStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item status" data-id="<?php echo e($k); ?>"
                                data-url="<?php echo e(route('project.status', $project->id)); ?>"
                                href="#"><?php echo e($status); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Overview')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i> </div>
                            </a>
                            <a href="#useradd-2"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Task List')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#useradd-3"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Task Kanban')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#useradd-4"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Gantt Chart')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#useradd-5"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Milestone')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#useradd-6"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Notes')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#useradd-7"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Files')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#useradd-8"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Comments')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#useradd-9"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Client Feedback')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                                <a href="#useradd-10"
                                    class="list-group-item list-group-item-action border-0"><?php echo e(__('Invoice')); ?>

                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            <?php endif; ?>
                            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                                <a href="#useradd-11"
                                    class="list-group-item list-group-item-action border-0"><?php echo e(__('Timesheets')); ?>

                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            <?php endif; ?>
                            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                                <a href="#useradd-12"
                                    class="list-group-item list-group-item-action border-0"><?php echo e(__('Payment')); ?>

                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            <?php endif; ?>
                            <?php if(\Auth::user()->type == 'company'): ?>
                                <a href="#useradd-13"
                                    class="list-group-item list-group-item-action border-0"><?php echo e(__('Expense')); ?>

                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="col-xl-9">
                    <?php
                        $percentages = 0;
                        $total = count($project->tasks);
                        if ($total != 0) {
                            $percentages = round($project->completedTask() / ($total / 100));
                        }
                    ?>

                    <div id="useradd-1">
                        <div class="row">
                            <div class="col-xxl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <h5><?php echo e($project->title); ?></h5>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-success"
                                                        style="width: <?php echo e($percentages); ?>%;"></div>
                                                    <h6 class="mb-0  mt-2"><?php echo e(__('Completed')); ?>: <b>
                                                            <?php echo e($percentages); ?>%</b></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-12">
                                                <p class="text-sm text-muted mb-2"><?php echo e($project->description); ?></p>
                                            </div>
                                        </div>

                                        <div class="row  mt-4">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="d-flex align-items-start">
                                                    <div class="theme-avtar bg-success">
                                                        <i class="ti ti-calendar"></i>
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Start Date')); ?>:</p>
                                                        <p class="mb-0 text-success">
                                                            <?php echo e(\Auth::user()->dateFormat($project->start_date)); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 my-3 my-sm-0">
                                                <div class="d-flex align-items-start">
                                                    <div class="theme-avtar bg-info">
                                                        <i class="ti ti-calendar-time"></i>
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Due Date')); ?>:</p>
                                                        <p class="mb-0 text-info">
                                                            <?php echo e(\Auth::user()->dateFormat($project->due_date)); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="d-flex align-items-start">
                                                    <div class="theme-avtar bg-danger">
                                                        <i class="ti ti-brand-hipchat"></i>
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Comments')); ?>:</p>
                                                        <p class="mb-0 text-danger"><?php echo e(count($comments)); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  mt-4">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="d-flex align-items-start">
                                                    <div class="theme-avtar bg-warning">
                                                        <i class="ti ti-user"></i>
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Members')); ?>:</p>
                                                        <p class="mb-0 text-warning"><?php echo e(count($projectUsers)); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 my-3 my-sm-0">
                                                <div class="d-flex align-items-start">
                                                    <div class="theme-avtar bg-dark">
                                                        <i class="ti ti-calendar-event"></i>
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Days Left')); ?>:</p>
                                                        <p class="mb-0 text-dark"><?php echo e($daysleft); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="float-end">
                                            <?php if(\Auth::user()->type == 'company'): ?>
                                                <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                                    <a href="#" class="btn btn-sm btn-primary btn-icon m-1"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        data-url="<?php echo e(route('project.user', $project->id)); ?>"
                                                        data-bs-whatever="<?php echo e(__('Add User')); ?>"> <span
                                                            class="text-white">
                                                            <i class="ti ti-plus" data-bs-toggle="tooltip"
                                                                data-bs-original-title="<?php echo e(__('Add')); ?>"></i></span>
                                                    </a>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <h5 class="mb-0"><?php echo e(__('Project members')); ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <?php $__currentLoopData = $projectUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="list-group-item">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <!-- Avatar -->
                                                            <a href="#" class="avatar rounded-circle user-group1">
                                                                <img alt="Image placeholder" class=""
                                                                    <?php if(!empty($user->avatar)): ?> src="<?php echo e($profile . '/' . $user->avatar); ?>" <?php else: ?>  avatar="<?php echo e($user->name); ?>" <?php endif; ?>>
                                                            </a>
                                                        </div>
                                                        <div class="col ml-n2">
                                                            <a href="#!"
                                                                class="d-block h6 mb-0"><?php echo e($user->name); ?></a>
                                                            <small><?php echo e($user->email); ?></small>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="action-btn bg-warning ms-2">
                                                                <a href="<?php echo e(route('employee.show', \Crypt::encrypt($user->user_id))); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                    data-toggle="tooltip"
                                                                    data-original-title="<?php echo e(__('View')); ?>">
                                                                    <i class="ti ti-eye text-white"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="<?php echo e(__('View')); ?>"></i>
                                                                </a>
                                                            </div>
                                                            <?php if(\Auth::user()->type == 'company'): ?>
                                                                <div class="action-btn bg-danger ms-2">
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['project.user.destroy', $project->id, $user->user_id]]); ?>

                                                                    <a href="#!"
                                                                        class="mx-3 btn btn-sm d-flex align-items-center show_confirm">
                                                                        <i class="ti ti-trash text-white"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                                    </a>
                                                                    <?php echo Form::close(); ?>

                                                                </div>
                                                            <?php endif; ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="row">
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="theme-avtar bg-success">
                                                    <i class="ti ti-report-money"></i>
                                                </div>
                                                <h6 class="mb-3 mt-2"><?php echo e(__('Budget')); ?></h6>
                                                <h4 class="mb-0">
                                                    <?php echo e(\Auth::user()->priceFormat($project->price)); ?> </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="theme-avtar bg-info">
                                                    <i class="ti ti-click"></i>
                                                </div>
                                                <h6 class="mb-3 mt-2"><?php echo e(__('Expense')); ?></h6>
                                                <h4 class="mb-0"><?php echo e(\Auth::user()->priceFormat($totalExpense)); ?>

                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="theme-avtar bg-warning">
                                                    <i class="ti ti-user-plus"></i>
                                                </div>
                                                <h6 class="mb-3 mt-2"><?php echo e(__('Client')); ?></h6>
                                                <h6 class="mb-0">
                                                    <?php echo e(!empty($project->clients) ? $project->clients->name : ''); ?> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!--Task List-->
                    <div id="useradd-2">

                        <div class="card">
                            <div class="card-header">
                                <div class="float-end">
                                    <?php if(\Auth::user()->type == 'company'): ?>
                                        <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                            <a href="#" class="btn btn-sm btn-primary btn-icon m-1"
                                                data-bs-toggle="modal" data-size="lg" data-bs-target="#exampleModal"
                                                data-url="<?php echo e(route('project.task.create', $project->id)); ?>"
                                                data-bs-whatever="<?php echo e(__('Create New Task')); ?>"> <span class="text-white">
                                                    <i class="ti ti-plus text-white" data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <h5 class="mb-0"><?php echo e(__('Task List')); ?></h5>
                            </div>

                            <div class="scrollbar-inner">
                                <div class="card-body project-detail-common-box">
                                    <?php
                                        $json = [];
                                        foreach ($stages as $stage) {
                                            $json[] = 'task-list-' . $stage->id;
                                        }
                                    ?>
                                    <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $tasks =$stage->allTask ?>
                                        <h4 class="mb-0"><?php echo e($stage->name); ?></h4>
                                        <div class="mb-4" id="card-list-1">
                                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="card card-progress border shadow-none draggable-item">
                                                    <?php if($task->priority == 'low'): ?>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 100%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="50"></div>
                                                        </div>
                                                    <?php elseif($task->priority == 'medium'): ?>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 100%" aria-valuenow="80" aria-valuemin="0"
                                                                aria-valuemax="80"></div>
                                                        </div>
                                                    <?php elseif($task->priority == 'high'): ?>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    <?php endif; ?>


                                                    <div class="card-body row align-items-center">
                                                        <div class="user-group1">
                                                            <span class="avatar avatar-sm rounded-circle mr-2">
                                                                <img alt="image" data-toggle="tooltip"
                                                                    data-original-title="<?php echo e(!empty($task->taskUser) ? $task->taskUser->name : ''); ?>"
                                                                    <?php if($task->taskUser && !empty($task->taskUser->avatar)): ?> src="<?php echo e($profile . '/' . $task->taskUser->avatar); ?>" <?php else: ?> avatar="<?php echo e(!empty($task->taskUser) ? $task->taskUser->name : ''); ?>" <?php endif; ?>
                                                                    class="">
                                                            </span>
                                                            <a href="#" data-size="lg"
                                                                data-url="<?php echo e(route('project.task.show', $task->id)); ?>"
                                                                data-ajax-popup="true" data-bs-target="#exampleModal"
                                                                data-bs-toggle="modal"
                                                                data-title="<?php echo e(__('Task Detail')); ?>" class="h6 ms-3"
                                                                data-toggle="tooltip"
                                                                data-bs-whatever="<?php echo e(__('View Task')); ?>">
                                                                <?php echo e($task->title); ?>

                                                            </a>
                                                            <br>
                                                            <span>
                                                                <?php if($task->priority == 'low'): ?>
                                                                    <div class="badge bg-success p-2 px-3 rounded">
                                                                        <?php echo e($task->priority); ?></div>
                                                                <?php elseif($task->priority == 'medium'): ?>
                                                                    <div class="badge bg-warning p-2 px-3 rounded">
                                                                        <?php echo e($task->priority); ?></div>
                                                                <?php elseif($task->priority == 'high'): ?>
                                                                    <div class="badge bg-danger p-2 px-3 rounded">
                                                                        <?php echo e($task->priority); ?></div>
                                                                <?php endif; ?>
                                                            </span>
                                                            <div class="actions d-inline-block text-end float-sm-none">
                                                                <div class="action-item ml-4 ms-5 pt-3">
                                                                    <i class="ti ti-calendar-event"></i>
                                                                    <?php echo e(\Auth::user()->dateFormat($task->start_date)); ?>

                                                                </div>
                                                            </div>
                                                            <div class="actions d-inline-block text-end float-sm-none">
                                                                <div class="action-item ml-4 ms-5 pt-3">
                                                                    <i class="ti ti-calendar-event"></i>
                                                                    <?php echo e(\Auth::user()->dateFormat($task->due_date)); ?>

                                                                </div>
                                                            </div>
                                                            <span class="col-auto" style="margin-left: 500px">
                                                                <?php if(\Auth::user()->type == 'company'): ?>
                                                                    <div class="action-btn bg-info ms-2">
                                                                        <a href="#"
                                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                            data-size="lg"
                                                                            data-bs-whatever="<?php echo e(__('Edit Task')); ?>"
                                                                            data-url="<?php echo e(route('project.task.edit', $task->id)); ?>"
                                                                            data-bs-target="#exampleModal"
                                                                            data-bs-toggle="modal"> <span
                                                                                class="text-white"> <i class="ti ti-edit"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-original-title="<?php echo e(__('Edit')); ?>"></i></span></a>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="action-btn bg-warning ms-2">
                                                                    <a href="#"class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                        data-bs-target="#exampleModal"
                                                                        data-bs-toggle="modal"
                                                                        data-url="<?php echo e(route('project.task.show', $task->id)); ?>"
                                                                        data-bs-whatever="<?php echo e(__('View Task')); ?>"
                                                                        data-size="lg"> <span class="text-white">
                                                                            <i class="ti ti-eye" data-bs-toggle="tooltip"
                                                                                data-bs-original-title="<?php echo e(__('View')); ?>">
                                                                            </i>
                                                                        </span>
                                                                    </a>
                                                                </div>

                                                                <?php if(\Auth::user()->type == 'company'): ?>
                                                                    <div class="action-btn bg-danger ms-2">
                                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['project.task.destroy', $task->id]]); ?>

                                                                        <a href="#!"
                                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center show_confirm m-2">
                                                                            <i class="ti ti-trash text-white"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                                        </a>
                                                                        <?php echo Form::close(); ?>

                                                                    </div>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <span class="empty-container" data-placeholder="Empty"></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Task Kanban-->
                    <div id="useradd-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-end">
                                    <?php if(\Auth::user()->type == 'company'): ?>
                                        <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                            <a href="#" class="btn btn-sm btn-primary btn-icon m-1"
                                                data-bs-toggle="modal" data-size="lg" data-bs-target="#exampleModal"
                                                data-url="<?php echo e(route('project.task.create', $project->id)); ?>"
                                                data-bs-whatever="<?php echo e(__('Create New Task')); ?>"> <span
                                                    class="text-white">
                                                    <i class="ti ti-plus text-white" data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <h5 class="mb-0"><?php echo e(__('Task')); ?></h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <?php
                                        $json = [];
                                        foreach ($stages as $stage) {
                                            $json[] = 'kanban-blacklist-' . $stage->id;
                                        }
                                    ?>

                                    <div class="row kanban-wrapper horizontal-scroll-cards kanban-board"
                                        data-containers='<?php echo json_encode($json); ?>' data-plugin="dragula">
                                        <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $tasks =$stage->tasks($project->id) ?>
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="float-end">
                                                            <button class="btn btn-sm btn-primary btn-icon task-header">
                                                                <span class="count text-white"><?php echo e(count($tasks)); ?></span>
                                                            </button>
                                                        </div>
                                                        <h4 class="mb-0"><?php echo e($stage->name); ?></h4>
                                                    </div>
                                                    <div class="card-body kanban-box"
                                                        id="kanban-blacklist-<?php echo e($stage->id); ?>"
                                                        data-id="<?php echo e($stage->id); ?>">
                                                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="card" data-id="<?php echo e($task->id); ?>">
                                                                <div class="pt-3 ps-1">
                                                                    <?php if($task->priority == 'low'): ?>
                                                                        <div class="badge bg-success p-2 px-3 rounded">
                                                                            <?php echo e($task->priority); ?></div>
                                                                    <?php elseif($task->priority == 'medium'): ?>
                                                                        <div class="badge bg-warning p-2 px-3 rounded">
                                                                            <?php echo e($task->priority); ?></div>
                                                                    <?php elseif($task->priority == 'high'): ?>
                                                                        <div class="badge bg-danger p-2 px-3 rounded">
                                                                            <?php echo e($task->priority); ?></div>
                                                                    <?php endif; ?>
                                                                    <div
                                                                        class="card-header border-0 pb-0 position-relative">
                                                                        <h5>
                                                                            <a href="#"
                                                                                data-url="<?php echo e(route('project.task.show', $task->id)); ?>"
                                                                                data-toggle="modal"
                                                                                data-bs-target="#exampleModal"
                                                                                data-ajax-popup="true"
                                                                                data-bs-whatever="<?php echo e(__('View Task Details')); ?>"
                                                                                data-bs-toggle="modal" title
                                                                                data-toggle="tooltip" data-size="lg"
                                                                                data-bs-original-title="<?php echo e(__('Task Detail')); ?>"><?php echo e($task->title); ?></a>
                                                                        </h5>

                                                                        <div class="card-header-right">
                                                                            <div class="btn-group card-option">
                                                                                <div
                                                                                    class="dropdown-menu dropdown-menu-end">
                                                                                    <?php if(\Auth::user()->type == 'company'): ?>
                                                                                        <a href="#!"
                                                                                            class="dropdown-item"
                                                                                            data-size="lg"
                                                                                            data-url="<?php echo e(route('project.task.edit', $task->id)); ?>"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#exampleModal"
                                                                                            data-bs-whatever="<?php echo e(__('Edit Task')); ?>">
                                                                                            <i class="ti ti-edit"></i>
                                                                                            <span><?php echo e(__('Edit')); ?></span>
                                                                                        </a>
                                                                                    <?php endif; ?>

                                                                                    <?php if(\Auth::user()->type == 'company'): ?>
                                                                                        <a href="#!"
                                                                                            class="dropdown-item"
                                                                                            data-size="lg"
                                                                                            data-url="<?php echo e(route('project.task.show', $task->id)); ?>"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#exampleModal"
                                                                                            data-bs-whatever="<?php echo e(__('View')); ?>">
                                                                                            <i class="ti ti-eye"></i>
                                                                                            <span><?php echo e(__('View')); ?></span>
                                                                                        </a>
                                                                                    <?php endif; ?>

                                                                                    <?php if(\Auth::user()->type == 'company'): ?>
                                                                                        <span class="dropdown-item">
                                                                                            <?php echo Form::open([
                                                                                                'method' => 'DELETE',
                                                                                                'route' => ['project.task.destroy', $task->id],
                                                                                                'id' => 'delete-form-' . $task->id,
                                                                                            ]); ?>

                                                                                            <a href="#!"
                                                                                                class=" show_confirm">
                                                                                                <i
                                                                                                    class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

                                                                                            </a>
                                                                                            <?php echo Form::close(); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">

                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <ul class="list-inline mb-3 ms-1">
                                                                                <li
                                                                                    class="list-inline-item d-inline-flex align-items-center">
                                                                                    <i
                                                                                        class="f-16 text-primary ti ti-calendar-stats"></i><?php echo e(\Auth::user()->dateFormat($task->start_date)); ?>

                                                                                </li>
                                                                                <li
                                                                                    class="list-inline-item d-inline-flex align-items-center">
                                                                                    <i
                                                                                        class="f-16 text-primary ti ti-calendar-stats ms-2"></i><?php echo e(\Auth::user()->dateFormat($task->due_date)); ?>

                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <ul class="list-inline mb-0 mt-3">
                                                                                <li
                                                                                    class="list-inline-item d-inline-flex align-items-center">
                                                                                    <i
                                                                                        class="f-16 text-primary ti ti-discount"></i>
                                                                                    <?php echo e($task->taskCompleteCheckListCount()); ?>/<?php echo e($task->taskTotalCheckListCount()); ?>

                                                                                </li>
                                                                                <li class="list-inline-item d-inline-flex align-items-center "
                                                                                    style="
                                                                                        margin-left: 130px;
                                                                                    ">
                                                                                    <div class="user-group">
                                                                                        <a href="#"
                                                                                            class="avatar rounded-circle avatar-sm text-end"
                                                                                            data-original-title="<?php echo e(!empty($task->taskUser) ? $task->taskUser->name : ''); ?>"
                                                                                            data-toggle="tooltip">
                                                                                            <img <?php if($task->taskUser && !empty($task->taskUser->avatar)): ?> src="<?php echo e($profile . '/' . $task->taskUser->avatar); ?>" <?php else: ?> avatar="<?php echo e(!empty($task->taskUser) ? $task->taskUser->name : ''); ?>" <?php endif; ?>
                                                                                                class="">
                                                                                        </a>

                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <!-- [ sample-page ] end -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Gantt Chart-->
                    <div id="useradd-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card overflow-hidden ">
                                    <div class="card-header">
                                        <div class="float-end">
                                            <a href="#"
                                                class="btn btn-sm btn-info gantt-chart-mode  <?php if($duration == 'Quarter Day'): ?> active <?php endif; ?>"
                                                data-value="Quarter Day"><?php echo e(__('Quarter Day')); ?></a>
                                            <a href="#"
                                                class="btn btn-sm btn-info gantt-chart-mode <?php if($duration == 'Half Day'): ?> active <?php endif; ?>"
                                                data-value="Half Day"><?php echo e(__('Half Day')); ?></a>
                                            <a href="#"
                                                class="btn btn-sm btn-info gantt-chart-mode <?php if($duration == 'Day'): ?> active <?php endif; ?>"
                                                data-value="Day"><?php echo e(__('Day')); ?></a>
                                            <a href="#"
                                                class="btn btn-sm btn-info gantt-chart-mode <?php if($duration == 'Week'): ?> active <?php endif; ?>"
                                                data-value="Week"><?php echo e(__('Week')); ?></a>
                                            <a href="#"
                                                class="btn btn-sm btn-info gantt-chart-mode <?php if($duration == 'Month'): ?> active <?php endif; ?>"
                                                data-value="Month"><?php echo e(__('Month')); ?></a>
                                        </div>
                                        <h5 class="mb-0"><?php echo e(__('Gantt Chart')); ?></h5>
                                    </div>

                                    <div class="card-body">
                                        <svg id="gantt"></svg>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Milestone-->
                    <div id="useradd-5">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-end">
                                    <?php if(\Auth::user()->type == 'company'): ?>
                                        <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                            <a href="#" class="btn btn-sm btn-primary btn-icon m-1"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-url="<?php echo e(route('project.milestone.create', $project->id)); ?>"
                                                data-bs-whatever="<?php echo e(__('Create New Milestone')); ?>"> <span
                                                    class="text-white">
                                                    <i class="ti ti-plus text-white" data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <h5 class="mb-0"><?php echo e(__('Milestone')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="pc-dt-simple">
                                        <thead>
                                            <tr>
                                                <th scope="col"><?php echo e(__('Title')); ?></th>
                                                <th scope="col"><?php echo e(__('Description')); ?></th>
                                                <th scope="col"><?php echo e(__('Start Date')); ?></th>
                                                <th scope="col"><?php echo e(__('Due Date')); ?></th>
                                                <th scope="col"><?php echo e(__('Cost')); ?></th>
                                                <th scope="col"><?php echo e(__('Progress')); ?></th>
                                                <th scope="col"><?php echo e(__('Status')); ?></th>
                                                <?php if(\Auth::user()->type == 'company'): ?>
                                                    <th scope="col" class="text-right"><?php echo e(__('Action')); ?></th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="media align-items-center">
                                                            <div class="media-body">
                                                                <a href="#"
                                                                    class="name h6 mb-0 text-sm"><?php echo e($milestone->title); ?></a><br>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <td><?php echo e($milestone->description); ?></td>
                                                    <td><?php echo e(\Auth::user()->dateFormat($milestone->start_date)); ?></td>
                                                    <td><?php echo e(\Auth::user()->dateFormat($milestone->due_date)); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($milestone->cost)); ?></td>
                                                    <td>
                                                        <div class="progress_wrapper">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: <?php echo e($milestone->progress); ?>px;"
                                                                    aria-valuenow="55" aria-valuemin="0"
                                                                    aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                            <div class="progress_labels">
                                                                <div class="total_progress">
                                                                    <strong> <?php echo e($milestone->progress); ?>%</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td><span
                                                            class="badge fix_badges bg-info p-2 px-3 rounded"><?php echo e($milestone->status); ?></span>
                                                    </td>

                                                    <?php if(\Auth::user()->type == 'company'): ?>
                                                        <td class="text-right">
                                                            <div class="action-btn bg-info ms-2">
                                                                <a href="#"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                    data-url="<?php echo e(route('project.milestone.edit', $milestone->id)); ?>"
                                                                    data-bs-whatever="<?php echo e(__('Edit Milestone')); ?>"> <span
                                                                        class="text-white"> <i class="ti ti-edit"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="<?php echo e(__('Edit')); ?>"></i></span></a>
                                                            </div>

                                                            <div class="action-btn bg-danger ms-2">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['project.milestone.destroy', $milestone->id]]); ?>

                                                                <a href="#!"
                                                                    class="mx-3 btn btn-sm d-flex align-items-center show_confirm">
                                                                    <i class="ti ti-trash text-white"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                                </a>
                                                                <?php echo Form::close(); ?>



                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Notes-->
                    <div id="useradd-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-end">
                                    <?php if(\Auth::user()->type == 'company'): ?>
                                        <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                            <a href="#" class="btn btn-sm btn-primary btn-icon m-1"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-url="<?php echo e(route('project.note.create', $project->id)); ?>"
                                                data-bs-whatever="<?php echo e(__('Create New Notes')); ?>"> <span
                                                    class="text-white">
                                                    <i class="ti ti-plus text-white" data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <h5 class="mb-0"><?php echo e(__('Notes')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="pc-dt-simple">
                                        <thead>
                                            <tr>
                                                <th scope="col"><?php echo e(__('Title')); ?></th>
                                                <th scope="col"><?php echo e(__('Description')); ?></th>
                                                <th scope="col"><?php echo e(__('Created Date')); ?></th>
                                                <?php if(\Auth::user()->type == 'company'): ?>
                                                    <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="media align-items-center">
                                                            <div class="media-body">
                                                                <a href="#"
                                                                    class="name h6 mb-0 text-sm"><?php echo e($note->title); ?></a><br>
                                                            </div>
                                                        </div>
                                                    </th>

                                                    <td><?php echo e($note->description); ?></td>
                                                    <td><?php echo e(\Auth::user()->dateFormat($note->created_at)); ?></td>
                                                    <?php if(\Auth::user()->type == 'company'): ?>
                                                        <td class="text-end">
                                                            <div class="action-btn bg-info ms-2">
                                                                <a href="#"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                    data-url="<?php echo e(route('project.note.edit', [$project->id, $note->id])); ?>"
                                                                    data-bs-whatever="<?php echo e(__('Edit Notes')); ?>"> <span
                                                                        class="text-white"> <i class="ti ti-edit"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="<?php echo e(__('Edit')); ?>"></i></span></a>
                                                            </div>

                                                            <div class="action-btn bg-danger ms-2">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['project.note.destroy', $project->id, $note->id]]); ?>

                                                                <a href="#!"
                                                                    class="mx-3 btn btn-sm  align-items-center show_confirm ">
                                                                    <i class="ti ti-trash text-white"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                                </a>
                                                                <?php echo Form::close(); ?>



                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Files-->
                    <div id="useradd-7">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-end">
                                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                                        <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                            <a href="#" class="btn btn-sm btn-primary btn-icon m-1"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-url="<?php echo e(route('project.file.create', $project->id)); ?>"
                                                data-bs-whatever="<?php echo e(__('Create New Files')); ?>"> <span
                                                    class="text-white">
                                                    <i class="ti ti-plus text-white" data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <h5 class="mb-0"><?php echo e(__('Files')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="pc-dt-simple">
                                        <thead>
                                            <tr>
                                                <th scope="col"><?php echo e(__('#')); ?></th>
                                                <th scope="col"><?php echo e(__('Title')); ?></th>
                                                <th scope="col"><?php echo e(__('Created Date')); ?></th>
                                                <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php

                                                ?>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="media align-items-center">
                                                            <div class="media-body user-group1">
                                                                <img alt="Image placeholder"
                                                                    src="<?php echo e(\App\Models\Utility::get_file('uploads/files/') . '/' . $file->file); ?>"
                                                                    class=""><br>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <td><?php echo e($file->file); ?></td>
                                                    <td><?php echo e(\Auth::user()->dateFormat($file->created_at)); ?></td>
                                                    <td class="text-end">
                                                        <div class="action-btn bg-primary ms-2">
                                                            <a href="<?php echo e(\App\Models\Utility::get_file('uploads/files/') . '/' . $file->file); ?>"
                                                                class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                download="">
                                                                <i data-bs-toggle="tooltip"
                                                                    data-bs-original-title="<?php echo e(__('Download')); ?>"
                                                                    class="ti ti-arrow-bar-to-down text-white"></i>
                                                            </a>
                                                        </div>
                                                        <div class="action-btn bg-secondary ms-2">
                                                            <a href="<?php echo e(\App\Models\Utility::get_file('uploads/files/') . '/' . $file->file); ?>"
                                                                class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                data-bs-toggle="tooltip" target="_blank"
                                                                data-original-title="<?php echo e(__('Preview')); ?>">
                                                                <i class="ti ti-crosshair text-white"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-original-title="<?php echo e(__('Preview')); ?>"></i>
                                                            </a>
                                                        </div>
                                                        <?php if(\Auth::user()->type == 'company'): ?>
                                                            <div class="action-btn bg-info ms-2">
                                                                <a href="#"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                    data-url="<?php echo e(route('project.file.edit', [$project->id, $file->id])); ?>"
                                                                    data-bs-whatever="<?php echo e(__('Edit Files')); ?>"> <span
                                                                        class="text-white"> <i class="ti ti-edit"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="<?php echo e(__('Edit')); ?>"></i></span></a>
                                                            </div>

                                                            <div class="action-btn bg-danger ms-2">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['project.file.destroy', $project->id, $file->id]]); ?>

                                                                <a href="#!"
                                                                    class="mx-3 btn btn-sm d-flex align-items-center show_confirm">
                                                                    <i class="ti ti-trash text-white"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                                </a>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Comments-->
                    <div id="useradd-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><?php echo e(__('Comments')); ?></h5>
                            </div>
                            <div class="card-body">
                                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="media mb-2">

                                        <a class="pr-2" href="#">
                                            <img <?php if(!empty($comment->commentUser && !empty($comment->commentUser->avatar))): ?> src="<?php echo e($profile . '/' . $comment->commentUser->avatar); ?>" <?php else: ?> avatar="<?php echo e(!empty($comment->commentUser) ? $comment->commentUser->name : ''); ?>" <?php endif; ?>
                                                class="rounded-circle" alt="" height="32">
                                        </a>

                                        <div class="media-body">
                                            <h6 class="mt-0 ms-2">
                                                <?php echo e(!empty($comment->commentUser) ? $comment->commentUser->name : ''); ?>

                                                <small class="text-muted float-right"><?php echo e($comment->created_at); ?></small>
                                            </h6>

                                            <p class="text-sm mb-0 ms-2">
                                                <?php echo e($comment->comment); ?>

                                            </p>
                                            <div class="text-end">
                                                <?php if(!empty($comment->file)): ?>
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="#" class="like active"
                                                            style="margin-bottom: -13px;">
                                                            <i class="ni ni-cloud-download-95"></i>
                                                            <a href="<?php echo e(\App\Models\Utility::get_file('uploads/files') . '/' . $comment->file); ?>"
                                                                download=""
                                                                class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                data-bs-toggle="tooltip" title="<?php echo e(__('Download')); ?>">
                                                                <i class="ti ti-download text-white"></i> </a>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="#"
                                                        data-url="<?php echo e(route('project.comment.reply', [$project->id, $comment->id])); ?>"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        data-bs-whatever="<?php echo e(__('Create Comment Reply')); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Reply')); ?>">
                                                        <i class="ti ti-send text-white"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php $__currentLoopData = $comment->subComment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="media mt-3">
                                                    <a class="pr-2" href="#">
                                                        <img <?php if(!empty($subComment->commentUser && !empty($subComment->commentUser->avatar))): ?> src="<?php echo e($profile . '/' . $subComment->commentUser->avatar); ?>" <?php else: ?>  avatar="<?php echo e(!empty($subComment->commentUser) ? $subComment->commentUser->name : ''); ?>" <?php endif; ?>
                                                            class="rounded-circle" alt="" height="32">
                                                    </a>
                                                    <div class="media-body">
                                                        <h6 class="mt-0 ms-2">
                                                            <?php echo e(!empty($subComment->commentUser) ? $subComment->commentUser->name : ''); ?>

                                                            <small
                                                                class="text-muted float-right"><?php echo e($subComment->created_at); ?></small>
                                                        </h6>
                                                        <p class="text-sm mb-0 ms-2">
                                                            <?php echo e($subComment->comment); ?>

                                                        </p>

                                                        <?php if(!empty($subComment->file)): ?>
                                                            <div class="action-btn bg-warning ms-2">
                                                                <a href="<?php echo e(\App\Models\Utility::get_file('uploads/files') . '/' . $subComment->file); ?>"
                                                                    download="" data-bs-toggle="tooptip"
                                                                    title="<?php echo e(__('Download')); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"><i
                                                                        class="ti ti-download text-white"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="border rounded mt-4">

                                    <?php echo e(Form::open(['route' => ['project.comment.store', $project->id], 'enctype' => 'multipart/form-data'])); ?>

                                    <textarea rows="3" class="form-control border-0 resize-none project_comment" name="comment"
                                        placeholder="Your comment..." required></textarea>
                                    <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                        <div class="col-8">
                                            <input type="file" class="form-control" name="file" id="file">
                                        </div>
                                        <?php if(App\Models\Utility::is_chatgpt_enable()): ?>
                                            <div class="">
                                                <a data-size="md" class="btn btn-primary btn-icon btn-sm text-white "
                                                    data-ajax-popup-over="true" id="grammarCheck"
                                                    data-url="<?php echo e(route('grammar', ['project_comment'])); ?>"
                                                    data-bs-placement="top"
                                                    data-title="<?php echo e(__('Grammar check with AI')); ?>">
                                                    <i class="ti ti-rotate"></i>
                                                    <span><?php echo e(__('Grammar check with AI')); ?></span></a>
                                            </div>
                                        <?php endif; ?>
                                        <button type="submit" class="btn btn-primary"><i
                                                class='uil uil-message mr-1'></i><?php echo e(__('Post')); ?></button>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Client Feedback-->
                    <div id="useradd-9">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><?php echo e(__('Client Feedback')); ?></h5>
                            </div>
                            <div class="card-body">
                                <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="media mb-2">
                                        <a class="pr-2" href="#">
                                            <img <?php if(!empty($feedback->feedbackUser) && !empty($feedback->feedbackUser->avatar)): ?> src="<?php echo e($profile . '/' . $feedback->feedbackUser->avatar); ?>" <?php else: ?>  avatar="<?php echo e(!empty($feedback->feedbackUser) ? $feedback->feedbackUser->name : ''); ?>" <?php endif; ?>
                                                class="rounded-circle" alt="" height="32">
                                        </a>
                                        <div class="media-body">
                                            <h6 class="mt-0 ms-2">
                                                <?php echo e(!empty($feedback->feedbackUser) ? $feedback->feedbackUser->name : ''); ?>

                                                <small class="text-muted float-right"><?php echo e($feedback->created_at); ?></small>
                                            </h6>

                                            <p class="text-sm mb-0 ms-2">
                                                <?php echo e($feedback->feedback); ?>

                                            </p>
                                            <div class="text-end">
                                                <?php if(!empty($feedback->file)): ?>
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="<?php echo e(\App\Models\Utility::get_file('uploads/files') . '/' . $feedback->file); ?>"
                                                            download=""
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center like active"
                                                            data-bs-toggle="tooltip" title="<?php echo e(__('Download')); ?>"> <i
                                                                class="ti ti-download text-white"></i> </a>

                                                    </div>
                                                <?php endif; ?>
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="#"
                                                        data-url="<?php echo e(route('project.client.feedback.reply', [$project->id, $feedback->id])); ?>"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        data-bs-whatever="<?php echo e(__('Create feedback Reply')); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                        <i class="ti ti-send text-white" data-bs-toggle="tooltip"
                                                            data-bs-original-title="<?php echo e(__('Reply')); ?>"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php $__currentLoopData = $feedback->subfeedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subfeedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="media mt-3">
                                                    <a class="pr-2" href="#">
                                                        <img <?php if(!empty($subfeedback->feedbackUser && !empty($subfeedback->feedbackUser->avatar))): ?> src="<?php echo e($profile . '/' . $subfeedback->feedbackUser->avatar); ?>" <?php else: ?>  avatar="<?php echo e(!empty($subfeedback->feedbackUser) ? $subfeedback->feedbackUser->name : ''); ?>" <?php endif; ?>
                                                            class="rounded-circle" alt="" height="32">
                                                    </a>
                                                    <div class="media-body">
                                                        <h6 class="mt-0 ms-2">
                                                            <?php echo e(!empty($subfeedback->feedbackUser) ? $subfeedback->feedbackUser->name : ''); ?>

                                                            <small
                                                                class="text-muted float-right"><?php echo e($subfeedback->created_at); ?></small>
                                                        </h6>
                                                        <p class="text-sm mb-0 ms-2">
                                                            <?php echo e($subfeedback->feedback); ?>

                                                        </p>

                                                        <?php if(!empty($subfeedback->file)): ?>
                                                            <div class="action-btn bg-warning ms-2">
                                                                <a href="<?php echo e(\App\Models\Utility::get_file('uploads/files') . '/' . $subfeedback->file); ?>"
                                                                    download="" data-bs-toggle="tooptip"
                                                                    title="<?php echo e(__('Download')); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"><i
                                                                        class="ti ti-download text-white"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="border rounded mt-4">

                                    <?php echo e(Form::open(['route' => ['project.client.feedback.store', $project->id], 'enctype' => 'multipart/form-data'])); ?>

                                    <textarea rows="3" class="form-control border-0 resize-none" name="feedback" placeholder="Your feedback..."
                                        required></textarea>
                                    <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                        <div class="col-8">
                                            <input type="file" class="form-control" name="file" id="file">
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i
                                                class='uil uil-message mr-1'></i><?php echo e(__('Post')); ?></button>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Invoice-->
                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                        <div id="useradd-10">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><?php echo e(__('Invoice')); ?></h5>
                                </div>

                                <div class="card-body">
                                    <div class="row notes-list">
                                        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <div class="card hover-shadow-lg">
                                                    <div class="card-header border-0">
                                                        <div class="row align-items-center">
                                                            <div class="col-10">
                                                                <h6 class="mb-0">
                                                                    <a
                                                                        href="<?php echo e(route('invoice.show', \Crypt::encrypt($invoice->id))); ?>"><?php echo e(\Auth::user()->invoiceNumberFormat($invoice->invoice_id)); ?></a>
                                                                </h6>
                                                            </div>
                                                            <div class="col-2 text-end">
                                                                <div class="actions">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="action-item"
                                                                            data-bs-toggle="dropdown"><i
                                                                                class="fas fa-ellipsis-v"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                                                                                <a href="<?php echo e(route('invoice.show', \Crypt::encrypt($invoice->id))); ?>"
                                                                                    class="dropdown-item">
                                                                                    <i
                                                                                        class="ti ti-eye"></i><?php echo e(__('View')); ?>

                                                                                </a>
                                                                            <?php endif; ?>

                                                                            <?php if(\Auth::user()->type == 'company'): ?>
                                                                                <a href="#!"
                                                                                    data-url="<?php echo e(route('invoice.edit', $invoice->id)); ?>"
                                                                                    class="dropdown-item"
                                                                                    data-toggle="tooltip"
                                                                                    data-original-title="<?php echo e(__('Edit')); ?>"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#exampleModal"
                                                                                    data-bs-whatever="<?php echo e(__('Edit Invoice')); ?>">
                                                                                    <i
                                                                                        class="ti ti-edit"></i><?php echo e(__('Edit')); ?>

                                                                                </a>


                                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['invoice.destroy', $invoice->id]]); ?>

                                                                                <a href="#!"
                                                                                    class=" show_confirm dropdown-item">
                                                                                    <i
                                                                                        class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

                                                                                </a>
                                                                                <?php echo Form::close(); ?>

                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="p-3 border border-dashed">
                                                            <?php if($invoice->status == 0): ?>
                                                                <span
                                                                    class="badge badge-primary"><?php echo e(__(\App\Models\Invoice::$statues[$invoice->status])); ?></span>
                                                            <?php elseif($invoice->status == 1): ?>
                                                                <span
                                                                    class="badge badge-warning"><?php echo e(__(\App\Models\Invoice::$statues[$invoice->status])); ?></span>
                                                            <?php elseif($invoice->status == 2): ?>
                                                                <span
                                                                    class="badge badge-danger"><?php echo e(__(\App\Models\Invoice::$statues[$invoice->status])); ?></span>
                                                            <?php elseif($invoice->status == 3): ?>
                                                                <span
                                                                    class="badge badge-info"><?php echo e(__(\App\Models\Invoice::$statues[$invoice->status])); ?></span>
                                                            <?php elseif($invoice->status == 4): ?>
                                                                <span
                                                                    class="badge badge-success"><?php echo e(__(\App\Models\Invoice::$statues[$invoice->status])); ?></span>
                                                            <?php endif; ?>
                                                            <div class="row align-items-center mt-3">
                                                                <div class="col-6">
                                                                    <h6 class="mb-0">
                                                                        <?php echo e(\Auth::user()->priceFormat($invoice->getTotal())); ?>

                                                                    </h6>
                                                                    <span
                                                                        class="text-sm text-muted"><?php echo e(__('Total Amount')); ?></span>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6 class="mb-0">
                                                                        <?php echo e(\Auth::user()->priceFormat($invoice->getDue())); ?>

                                                                    </h6>
                                                                    <span
                                                                        class="text-sm text-muted"><?php echo e(__('Due Amount')); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mt-3">
                                                                <div class="col-6">
                                                                    <h6 class="mb-0">
                                                                        <?php echo e(\Auth::user()->dateFormat($invoice->issue_date)); ?>

                                                                    </h6>
                                                                    <span
                                                                        class="text-sm text-muted"><?php echo e(__('Issue Date')); ?></span>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6 class="mb-0">
                                                                        <?php echo e(\Auth::user()->dateFormat($invoice->due_date)); ?>

                                                                    </h6>
                                                                    <span
                                                                        class="text-sm text-muted"><?php echo e(__('Due Date')); ?></span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <?php if(\Auth::user()->type != 'client'): ?>
                                                            <?php $client=$invoice->clients ?>
                                                            <div class="media mt-4 align-items-center">
                                                                <img <?php if(!empty($client->avatar)): ?> src="<?php echo e($profile . '/' . $client->avatar); ?>" <?php else: ?> avatar="<?php echo e($invoice->clients->name); ?>" <?php endif; ?>
                                                                    class="avatar rounded-circle avatar-custom"
                                                                    data-toggle="tooltip"
                                                                    data-original-title="<?php echo e(__('Client')); ?>">
                                                                <div class="media-body pl-3">
                                                                    <div class="text-sm my-0">
                                                                        <?php echo e(!empty($invoice->clients) ? $invoice->clients->name : ''); ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!--Timesheets-->
                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                        <div id="useradd-11">
                            <div class="card">
                                <div class="card-header">
                                    <div class="float-end">
                                        <?php if(\Auth::user()->type == 'company'): ?>
                                            <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                                <a href="#" class="btn btn-sm btn-primary btn-icon m-1"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-url="<?php echo e(route('project.timesheet.create', $project->id)); ?>"
                                                    data-bs-whatever="<?php echo e(__('Create New Timesheet')); ?>"> <span
                                                        class="text-white">
                                                        <i class="ti ti-plus text-white" data-bs-toggle="tooltip"
                                                            data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                                </a>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <h5 class="mb-0"><?php echo e(__('Timesheet')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="pc-dt-simple">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><?php echo e(__('Member')); ?></th>
                                                    <th scope="col"><?php echo e(__('Task')); ?></th>
                                                    <th scope="col"><?php echo e(__('Start Date')); ?></th>
                                                    <th scope="col"><?php echo e(__('Start Time')); ?></th>
                                                    <th scope="col"><?php echo e(__('End Date')); ?></th>
                                                    <th scope="col"><?php echo e(__('End Time')); ?></th>
                                                    <th scope="col"><?php echo e(__('Notes')); ?></th>
                                                    <?php if(\Auth::user()->type == 'company'): ?>
                                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(!empty($timesheet->users) ? $timesheet->users->name : '-'); ?>

                                                        </td>
                                                        <td> <?php echo e(!empty($timesheet->tasks) ? $timesheet->tasks->title : '-'); ?>

                                                        </td>
                                                        <td><?php echo e(\Auth::user()->dateFormat($timesheet->start_date)); ?></td>
                                                        <td><?php echo e(\Auth::user()->timeFormat($timesheet->start_time)); ?></td>
                                                        <td><?php echo e(\Auth::user()->dateFormat($timesheet->end_date)); ?></td>
                                                        <td><?php echo e(\Auth::user()->timeFormat($timesheet->end_time)); ?></td>
                                                        <td>
                                                            <div class="action-btn bg-warning ms-2">
                                                                <a href="#"
                                                                    data-url="<?php echo e(route('project.timesheet.note', [$project->id, $timesheet->id])); ?>"
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                    data-bs-toggle="tooltip"
                                                                    title="<?php echo e(__('Timesheet Notes')); ?>"
                                                                    data-bs-whatever="<?php echo e(__('Timesheet Notes')); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                    <i class="ti ti-brand-hipchat text-white"></i></a>
                                                            </div>
                                                        </td>
                                                        <?php if(\Auth::user()->type == 'company'): ?>
                                                            <td class="table-actions text-end">
                                                                <div class="action-btn bg-info ms-2">
                                                                    <a href="#"
                                                                        data-url="<?php echo e(route('project.timesheet.edit', [$project->id, $timesheet->id])); ?>"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal"
                                                                        title="<?php echo e(__('Edit Timesheet')); ?>"
                                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                        <i class="ti ti-edit text-white"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="<?php echo e(__('Edit')); ?>"></i>
                                                                    </a>
                                                                </div>

                                                                <div class="action-btn bg-danger ms-2">
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['project.timesheet.destroy', $project->id, $timesheet->id]]); ?>

                                                                    <a href="#!"
                                                                        class="mx-3 btn btn-sm  align-items-center show_confirm ">
                                                                        <i class="ti ti-trash text-white"></i>
                                                                    </a>
                                                                    <?php echo Form::close(); ?>


                                                                </div>

                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!--payments-->
                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                        <div id="useradd-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><?php echo e(__('Payment')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="pc-dt-simple">
                                            <thead>
                                                <tr>
                                                    <th><?php echo e(__('Transaction ID')); ?></th>
                                                    <th><?php echo e(__('Invoice ID')); ?></th>
                                                    <th><?php echo e(__('Payment Date')); ?></th>
                                                    <th><?php echo e(__('Payment Method')); ?></th>
                                                    <th><?php echo e(__('Payment Type')); ?></th>
                                                    <th><?php echo e(__('Notes')); ?></th>
                                                    <th><?php echo e(__('Amount')); ?></th>
                                                    <th><?php echo e(__('Action')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $__currentLoopData = $invoice->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e(\Auth::user()->invoiceNumberFormat($invoice->invoice_id)); ?>

                                                            </td>
                                                            <td><?php echo e($payment->transaction); ?> </td>
                                                            <td><?php echo e(\Auth::user()->dateFormat($payment->date)); ?> </td>
                                                            <td><?php echo e(!empty($payment->payments) ? $payment->payments->name : ''); ?>

                                                            </td>
                                                            <td><?php echo e($payment->payment_type); ?> </td>
                                                            <td><?php echo e($payment->notes); ?> </td>
                                                            <td> <?php echo e(\Auth::user()->priceFormat($payment->amount)); ?></td>
                                                            <td width="7%" class="text-end">
                                                                <div class="action-btn bg-warning ms-2">
                                                                    <a href="<?php echo e(route('invoice.show', \Crypt::encrypt($invoice->id))); ?>"
                                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                        data-bs-toggle="tooltip"
                                                                        title="<?php echo e(__('View')); ?>">
                                                                        <i class="ti ti-eye text-white"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!--Expense-->
                    <?php if(\Auth::user()->type == 'company'): ?>
                        <div id="useradd-13">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><?php echo e(__('Expenses')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="pc-dt-simple">
                                            <thead>
                                                <tr>
                                                    <th> <?php echo e(__('Date')); ?></th>
                                                    <th> <?php echo e(__('Amount')); ?></th>
                                                    <th> <?php echo e(__('User')); ?></th>
                                                    <th> <?php echo e(__('Attachment')); ?></th>
                                                    <th> <?php echo e(__('Description')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $project->expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="font-style">
                                                        <td><?php echo e(Auth::user()->dateFormat($expense->date)); ?></td>
                                                        <td><?php echo e(Auth::user()->priceFormat($expense->amount)); ?></td>
                                                        <td><?php echo e(!empty($expense->users) ? $expense->users->name : ''); ?>

                                                        </td>
                                                        <td>
                                                            <?php if(!empty($expense->attachment)): ?>
                                                                <a href="<?php echo e(asset(Storage::url('uploads/attachment/' . $expense->attachment))); ?>"
                                                                    target="_blank"><?php echo e($expense->attachment); ?></a>
                                                            <?php else: ?>
                                                                --
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($expense->description); ?></td>

                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/project/show.blade.php ENDPATH**/ ?>