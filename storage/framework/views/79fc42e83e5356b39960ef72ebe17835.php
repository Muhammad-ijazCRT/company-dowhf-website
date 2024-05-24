<?php
    $profile=asset(Storage::url('uploads/avatar'));
?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/dragula.min.js')); ?>"></script>
    <script>
        !function (a) {
            "use strict";
            var t = function () {
                this.$body = a("body")
            };
            t.prototype.init = function () {
                a('[data-plugin="dragula"]').each(function () {
                    var t = a(this).data("containers"), n = [];
                    if (t) for (var i = 0; i < t.length; i++) n.push(a("#" + t[i])[0]); else n = [a(this)[0]];
                    var r = a(this).data("handleclass");
                    r ? dragula(n, {
                        moves: function (a, t, n) {
                            return n.classList.contains(r)
                        }
                    }) : dragula(n).on('drop', function (el, target, source, sibling) {

                        var id = $(el).attr('data-id');
                        var order = [];
                        $("#" + target.id).each(function () {
                            order[$(this).index()] = $(this).attr('data-id');
                        });


                        var old_status = $("#" + source.id).data('status');
                        var new_status = $("#" + target.id).data('status');
                        var stage_id = $(target).attr('data-id');

                        $("#" + source.id).parent().find('.count').text($("#" + source.id + " > div").length);
                        $("#" + target.id).parent().find('.count').text($("#" + target.id + " > div").length);

                        $.ajax({
                            url: '<?php echo e(route('project.task.order')); ?>',
                            type: 'POST',
                            data: {task_id: id, stage_id: stage_id, order: order, old_status: old_status, new_status: new_status, "_token": $('meta[name="csrf-token"]').attr('content')},
                            success: function (data) {
                                toastrs('Success', 'Task successfully updated', 'success');
                            },
                            error: function (data) {
                                data = data.responseJSON;
                                toastrs('<?php echo e(__("Error")); ?>', data.error, 'error')
                            }
                        });
                    });
                })
            }, a.Dragula = new t, a.Dragula.Constructor = t
        }(window.jQuery), function (a) {
            "use strict";

            a.Dragula.init()

        }(window.jQuery);
    </script>

    <script>

        $(document).on("click", ".status", function () {
            var status = $(this).attr('data-id');
            var url = $(this).attr('data-url');

            $.ajax({
                url: url,
                type: 'POST',
                data: {status: status, "_token": $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    $('#change-project-status').submit();
                    location.reload();
                }
            });
        });
    </script>
    <script>

        $(document).on('change', '#project', function () {
            var project_id = $(this).val();

            $.ajax({
                url: '<?php echo e(route('project.getMilestone')); ?>',
                type: 'POST',
                data: {
                    "project_id": project_id, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    $('#milestone_id').empty();
                    $('#milestone_id').append('<option value="0"> -- </option>');
                    $.each(data, function (key, value) {
                        $('#milestone_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });

            $.ajax({
                url: '<?php echo e(route('project.getUser')); ?>',
                type: 'POST',
                data: {
                    "project_id": project_id, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    $('#assign_to').empty();
                    $.each(data, function (key, value) {
                        $('#assign_to').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });

        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Task')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Task')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Task')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>

    <a href="<?php echo e(route('task.calendar')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="Calendar View" >
        <i class="ti ti-calendar text-white"></i>
    </a>
    
    <a href="<?php echo e(route('project.all.task.gantt.chart')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"  data-bs-original-title="<?php echo e(__('Gnatt Chart')); ?>">
        <i class="ti ti-chart-line"></i>
    </a>


    <a href="<?php echo e(route('project.all.task')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
        <i  data-bs-toggle="tooltip"  data-bs-original-title="<?php echo e(__('List View')); ?>" class="ti ti-list"></i>
    </a>


    <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" 
    data-bs-target="#exampleModal" data-url="<?php echo e(route('project.task.create',0)); ?>" data-size="lg"
    data-bs-whatever="<?php echo e(__('Create New Task')); ?>" >
        <i data-bs-toggle="tooltip"  data-bs-original-title="<?php echo e(__('Create')); ?>" class="ti ti-plus text-white"></i>
    </a>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <div class="col-sm-12">
            <div class=" <?php echo e(isset($_GET['project'])?'show':''); ?>" >
                <div class="card card-body">
                    <?php echo e(Form::open(array('route' => array('project.all.task.kanban'),'method'=>'get'))); ?>

                    <div class="row filter-css">
                        <?php if(\Auth::user()->type=='company'): ?>
                            <div class="col-md-3">
                                <?php echo e(Form::select('project', $projectList,!empty($_GET['project'])?$_GET['project']:'', array('class' => 'form-control','data-toggle'=>'select'))); ?>

                            </div>
                        <?php endif; ?>
                        <div class="col-md-2">
                            <select class="form-control" data-toggle="select" name="status">
                                <option value=""><?php echo e(__('Select Status')); ?></option>
                                <?php $__currentLoopData = $stageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k); ?>" <?php echo e(isset($_GET['status']) && $_GET['status']==$k?'selected':''); ?>> <?php echo e($val); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" data-toggle="select" name="priority">
                                <option value=""><?php echo e(__('Select Priority')); ?></option>
                                <?php $__currentLoopData = $priority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val); ?>" <?php echo e(isset($_GET['priority']) && $_GET['priority']==$val?'selected':''); ?>> <?php echo e($val); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-auto">
                            <?php echo e(Form::date('due_date',isset($_GET['due_date']) ? $_GET['due_date'] : new \DateTime(),array('class'=>'form-control'))); ?>                        </div>
                        <div class="action-btn bg-info ms-2 col-auto">
                            <button type="submit" class="mx-3 btn btn-sm d-flex align-items-center" data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Apply')); ?>" class="ti ti-search text-white"></i></button>
                        </div>
                        <div class="action-btn bg-danger ms-2 col-auto">
                            <a href="<?php echo e(route('project.all.task.kanban')); ?>" data-toggle="tooltip" data-title="<?php echo e(__('Reset')); ?>" class="mx-3 btn btn-sm d-flex align-items-center"><i data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Reset')); ?>" class="ti ti-trash-off text-white"></i></a>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
  
    <div class="row">
        <div class="col-sm-12">
            <?php
                $json = [];
                foreach ($stages as $stage){
                    $json[] = 'kanban-blacklist-'.$stage->id;
                }
            ?>
            <div class="row kanban-wrapper horizontal-scroll-cards kanban-board" data-containers='<?php echo json_encode($json); ?>' data-plugin="dragula">
                <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        if(empty($_GET['project']) && empty($_GET['priority']) && empty($_GET['due_date'])){
                        $tasks = $stage->allTask;
                        }else{
                            $tasks=$stage->allTaskFilter($_GET['project'] , $_GET['priority'],$_GET['due_date']);
                        }
                    ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="float-end">
                                        <button class="btn btn-sm btn-primary btn-icon task-header">
                                            <span class="count text-white"><?php echo e(count($tasks)); ?></span>
                                        </button>
                                    </div>
                                    <h4 class="mb-0"><?php echo e($stage->name); ?></h4>
                                </div>
                                <div class="card-body kanban-box" data-id="<?php echo e($stage->id); ?>"  id="kanban-blacklist-<?php echo e($stage->id); ?>">
                                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card" data-id="<?php echo e($task->id); ?>">
                                            <div class="pt-3 ps-3">
                                                <?php if($task->priority =='low'): ?>
                                                        <div class="badge bg-success p-1 px-3 rounded"> <?php echo e(ucfirst($task->priority)); ?></div>
                                                <?php elseif($task->priority =='medium'): ?>
                                                    <div class="badge bg-warning p-1 px-3 rounded"> <?php echo e(ucfirst($task->priority)); ?></div>
                                                <?php elseif($task->priority =='high'): ?>
                                                    <div class="badge bg-danger p-1 px-3 rounded"> <?php echo e(ucfirst($task->priority)); ?></div>
                                                <?php endif; ?>
                                                <div class="card-header border-0 pb-0 position-relative">
                                                    <h5> 
                                                        <a href="#" data-size="lg" data-url="<?php echo e(route('project.task.show',$task->id)); ?>" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal" data-bs-whatever="<?php echo e(__('View Task Details')); ?>" 
                                                        data-bs-toggle="tooltip"  title data-bs-original-title="<?php echo e(__('Task Detail')); ?>" ><?php echo e($task->title); ?></a></h5>
                                                        <div class="card-header-right">
                                                            <div class="btn-group card-option">
                                                                <button type="button" class="btn dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="ti ti-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <?php if(\Auth::user()->type=='company'): ?>
                                                                        <a href="#!" class="dropdown-item" data-size="lg" data-url="<?php echo e(route('project.task.edit',$task->id)); ?>" 
                                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"  data-bs-whatever="<?php echo e(__('Edit Task')); ?>">
                                                                            <i class="ti ti-edit"></i>
                                                                            <span><?php echo e(__('Edit')); ?></span>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <a href="#!" class="dropdown-item"  data-size="lg" data-url="<?php echo e(route('project.task.show',$task->id)); ?>" 
                                                                        data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="<?php echo e(__('View Task Details')); ?>">
                                                                        <i class="ti ti-eye"></i>
                                                                        <span><?php echo e(__('View')); ?></span>
                                                                    </a>
                                                                    <span class="">
                                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['project.task.destroy', $task->id],'id'=>'task-delete-form-'.$task->id]); ?>

                                                                        <a href="#!" class="dropdown-item  show_confirm ">
                                                                            <i class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

                                                                        </a>
                                                                        <?php echo Form::close(); ?>

                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-muted text-sm" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Description')); ?>"><?php echo e($task->description); ?></p>
                                                    <p class="text-muted text-sm"><?php echo e($task->taskCompleteCheckListCount()); ?>/<?php echo e($task->taskTotalCheckListCount()); ?></p>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <ul class="list-inline mb-0">
                                                            
                                                            <li class="list-inline-item d-inline-flex align-items-center"><i
                                                                    class="f-16 text-primary ti ti-message-2"></i><?php echo e(\Auth::user()->dateFormat($task->start_date)); ?></li>
                                                            
                                                            <li class="list-inline-item d-inline-flex align-items-center"><i
                                                                    class="f-16 text-primary ti ti-link"></i><?php echo e(\Auth::user()->dateFormat($task->due_date)); ?></li>
                                                        </ul>
                                                        <div class="user-group">
                                                            <img alt="image" data-toggle="tooltip" data-original-title="<?php echo e(!empty($task->taskUser)?$task->taskUser->name:''); ?>" <?php if($task->taskUser && !empty($task->taskUser->avatar)): ?> src="<?php echo e($profile.'/'.$task->taskUser->avatar); ?>" <?php else: ?> avatar="<?php echo e(!empty($task->taskUser)?$task->taskUser->name:''); ?>" <?php endif; ?> class="">
                                                        </div>
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
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/project/allTaskKanban.blade.php ENDPATH**/ ?>