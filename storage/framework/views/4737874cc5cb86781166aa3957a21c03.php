<?php $__env->startPush('pre-purpose-css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/dragula.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('pre-purpose-script-page'); ?>
    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
        <script src="<?php echo e(asset('assets/js/plugins/dragula.min.js')); ?>"></script>
         <?php if($pipeline): ?>
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
                                var pipeline_id = '1';

                                $("#" + source.id).parent().find('.count').text($("#" + source.id + " > div")
                                    .length);
                                $("#" + target.id).parent().find('.count').text($("#" + target.id + " > div")
                                    .length);

                                $.ajax({
                                    url: '<?php echo e(route('lead.order')); ?>',
                                    type: 'POST',
                                    data: {
                                        lead_id: id,
                                        stage_id: stage_id,
                                        order: order,
                                        new_status: new_status,
                                        old_status: old_status,
                                        pipeline_id: pipeline_id,
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
                $(document).on("change", "#change-pipeline select[name=default_pipeline_id]", function() {
                    $('#change-pipeline').submit();
                });
            </script>
            <script>
                $(document).on("click", ".pipeline_id", function() {
                    var pipeline_id = $(this).attr('data-id');
                    $.ajax({
                        url: '<?php echo e(route('lead.change.pipeline')); ?>',
                        type: 'POST',
                        data: {
                            pipeline_id: pipeline_id,
                            "_token": $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $('#change-pipeline').submit();
                            location.reload();
                        }
                    });
                });
            </script>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Lead')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Lead')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Lead')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if(\Auth::user()->type == 'company'): ?>
        <?php if($pipeline): ?>
            <div class="btn-group">
                <button class="btn btn-sm btn-primary btn-icon m-1 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <?php echo e($pipeline->name); ?>

                </button>
                <div class="dropdown-menu">
                    <?php $__currentLoopData = $pipelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="dropdown-item pipeline_id" data-id="<?php echo e($pipe->id); ?>"
                            href="#"><?php echo e($pipe->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
    data-url="<?php echo e(route('lead.file.import')); ?>" data-bs-whatever="<?php echo e(__('Import CSV file')); ?>"> <span
        class="text-white">
        <i class="ti ti-file-import" data-bs-toggle="tooltip"
            data-bs-original-title="<?php echo e(__('Import item CSV file')); ?>"></i>
    </a>
   
    <a href="<?php echo e(route('lead.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
        <i class="ti ti-layout-grid text-white" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('List View')); ?>">
        </i>
    </a>

    <?php if(\Auth::user()->type == 'company'): ?>
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-url="<?php echo e(route('lead.create')); ?>" data-bs-whatever="<?php echo e(__('Create New Lead')); ?>"
            data-bs-original-title="<?php echo e(__('Create New Lead')); ?>">
            <i data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" class="ti ti-plus text-white"></i>
        </a>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <?php if($pipeline): ?>
                <?php
                    $lead_stages = $pipeline->leadStages;
                    $json = [];
                    foreach ($lead_stages as $lead_stage) {
                        $json[] = 'kanban-blacklist-' . $lead_stage->id;
                    }
                ?>

                <div class="row kanban-wrapper horizontal-scroll-cards kanban-board"
                    data-containers='<?php echo json_encode($json); ?>' data-plugin="dragula">
                    <?php $__currentLoopData = $lead_stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $leads = $lead_stage->lead() ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="float-end">
                                        <label class="btn btn-sm btn-primary btn-icon task-header">
                                            <span class="count text-white"><?php echo e(count($leads)); ?></span>
                                        </label>
                                    </div>
                                    <h4 class="mb-0"><?php echo e($lead_stage->name); ?></h4>
                                </div>
                                <div class="card-body kanban-box" id="kanban-blacklist-<?php echo e($lead_stage->id); ?>"
                                    data-id="<?php echo e($lead_stage->id); ?>">
                                    <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $labels = $lead->labels() ?>
                                        <div class="card" data-id="<?php echo e($lead->id); ?>">
                                            <div class="pt-3 ps-3">
                                                <?php if($labels): ?>
                                                    <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <span
                                                            class="badge rounded-pill bg-<?php echo e($label->color); ?> ml-1"><?php echo e($label->name); ?></span>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <div class="card-header border-0 pb-0 position-relative">
                                                    <h5>
                                                        <a href="<?php echo e(route('lead.show', \Crypt::encrypt($lead->id))); ?>"
                                                            data-bs-whatever="<?php echo e(__('View Lead Details')); ?>"
                                                            data-bs-toggle="tooltip" title
                                                            data-bs-original-title="<?php echo e(__('Lead Detail')); ?>"><?php echo e($lead->name); ?></a>
                                                    </h5>
                                                    <div class="card-header-right">
                                                        <div class="btn-group card-option">
                                                            <button type="button" class="btn dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <?php if(!$lead->is_active): ?>
                                                                    <a href="#" class="table-action">
                                                                        <i class="ti ti-lock"></i>
                                                                    </a>
                                                                <?php else: ?>
                                                                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                                                                        <a href="#!" class="dropdown-item"
                                                                            data-size="lg"
                                                                            data-url="<?php echo e(route('lead.edit', $lead->id)); ?>"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal"
                                                                            data-bs-whatever="<?php echo e(__('Edit Lead')); ?>">
                                                                            <i class="ti ti-edit"></i>
                                                                            <span><?php echo e(__('Edit')); ?></span>
                                                                        </a>
                                                                    <?php endif; ?>

                                                                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                                                                        <a href="#!" class="dropdown-item"
                                                                            data-size="lg"
                                                                            data-url="<?php echo e(route('lead.label', $lead->id)); ?>"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal"
                                                                            data-bs-whatever="<?php echo e(__('Add Label')); ?>">
                                                                            <i class="ti ti-sticker"></i>
                                                                            <span><?php echo e(__('Add Label')); ?></span>
                                                                        </a>
                                                                    <?php endif; ?>

                                                                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                                                                        <?php echo Form::open([
                                                                            'method' => 'DELETE',
                                                                            'route' => ['lead.destroy', $lead->id],
                                                                            'id' => 'delete-form-' . $lead->id,
                                                                        ]); ?>

                                                                        <a href="#!"
                                                                            class="dropdown-item show_confirm">
                                                                            <i class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

                                                                        </a>
                                                                        <?php echo Form::close(); ?>

                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-muted text-sm" data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Subject')); ?>">
                                                        <?php echo e($lead->subject); ?></p>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item d-inline-flex align-items-center"><i
                                                                    class="f-16 text-primary ti ti-message-2"></i><?php echo e(\Auth::user()->dateFormat($lead->date)); ?>

                                                            </li>
                                                        </ul>
                                                        <div class="user-group">
                                                            <?php $__currentLoopData = $lead->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a href="#" class="avatar rounded-circle avatar-sm"
                                                                    data-original-title="<?php echo e($user->name); ?>"
                                                                    data-toggle="tooltip">
                                                                    <img <?php if(!empty($user->avatar)): ?> src="<?php echo e(asset('/storage/uploads/avatar/' . $user->avatar)); ?>" <?php else: ?> avatar="<?php echo e($user->name); ?>" <?php endif; ?>
                                                                        class="">
                                                                </a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <h4><?php echo e(__('No data available')); ?></h4>
                </div>
            <?php endif; ?>
            <!-- [ sample-page ] end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/lead/index.blade.php ENDPATH**/ ?>