<?php
    $settings = Utility::settings();
    
    $color = !empty($settings['color']) ? $settings['color'] : 'theme-3';

    if (isset($settings['color_flag']) && $settings['color_flag'] == 'true') {
        $themeColor = 'custom-color';
    } else {
        $themeColor = $color;
    }

    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $company_favicon = Utility::getValByName('company_favicon');
    $company_logo = \App\Models\Utility::GetLogo();
    \App\Models\Utility::setPusherConfig();
    \App\Models\Utility::setMailConfig();
    $users = \Auth::user();
    $currantLang = $users->currentLanguage();
    // $languages=\App\Models\Utility::languages();
    $footer_text = isset($settings['footer_text']) ? $settings['footer_text'] : '';
    // $setting = App\Models\Utility::colorset();
    $SITE_RTL = !empty($settings['SITE_RTL']) ? $settings['SITE_RTL'] : 'off';
?>

<!DOCTYPE html>
<html lang="en" dir="<?php echo e($SITE_RTL == 'on' ? 'rtl' : ''); ?>">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="url" content="<?php echo e(url('') . '/' . config('chatify.routes.prefix')); ?>" data-user="<?php echo e(Auth::user()->id); ?>">

<?php echo $__env->make('partials.admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="<?php echo e($themeColor); ?>">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <?php echo $__env->make('partials.admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-content position-relative">
        <?php echo $__env->make('partials.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="page-content">
            <?php echo $__env->make('partials.admin.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body body">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleOverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="commonModalOver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToast" class="toast text-white  fade" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    

    <?php echo $__env->make('partials.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Chatify::layouts.footerLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(Session::has('success')): ?>
        <script>
            toastrs('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
        </script>
        <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            toastrs('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
        </script>
        <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>

    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            var url = button.getAttribute('data-url')
            var size = button.getAttribute('data-size');
            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.modal-body input')
            modalTitle.textContent = recipient
            $("#exampleModal .modal-dialog").addClass('modal-' + size);
            $.ajax({
                url: url,
                success: function(data) {
                    // $("#exampleModal").modal('hide');
                    $('#exampleModal .modal-body').html(data);
                    $("#exampleModal").modal('show');
                },
                error: function(data) {
                    data = data.responseJSON;
                    toastrs('Error', data.error, 'error')
                }
            });
        })

        var exampleOverModal = document.getElementById('exampleOverModal')
        exampleOverModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            var url = button.getAttribute('data-url')
            var size = button.getAttribute('data-size');
            var modalTitle = exampleOverModal.querySelector('.modal-title')
            var modalBodyInput = exampleOverModal.querySelector('.modal-body input')
            modalTitle.textContent = recipient
            $("#exampleOverModal .modal-dialog").addClass('modal-' + size);
            $.ajax({
                url: url,
                success: function(data) {
                    //$("#exampleOverModal").modal('hide');

                    $('#exampleOverModal .modal-body').html(data);
                    $("#exampleOverModal").modal('show');
                },
                error: function(data) {
                    data = data.responseJSON;
                    toastrs('Error', data.error, 'error')
                }
            });
        })

        function arrayToJson(form) {
            var data = $(form).serializeArray();
            var indexed_array = {};

            $.map(data, function(n, i) {
                indexed_array[n['name']] = n['value'];
            });

            return indexed_array;
        }
        $(document).on('click', ' .fc-daygrid-event', function(e) {
            // if (!$(this).hasClass('project')) {
            // alert('jkxd');
            e.preventDefault();
            var event = $(this);
            var title = $(this).find('.fc-content .fc-title').html();
            var size = 'md';
            var url = $(this).attr('href');
            $("#exampleModal .modal-title").html(title);
            $("#exampleModal .modal-dialog").addClass('modal-' + size);
            $.ajax({
                url: url,
                success: function(data) {

                    $('#exampleModal .modal-body').html(data);
                    $("#exampleModal").modal('show');

                },
                error: function(data) {
                    data = data.responseJSON;
                    toastrs('Error', data.error, 'error')
                }
            });
            // }
        });
    </script>
    <footer class="dash-footer">
        <div class="footer-wrapper">
            <div class="py-1">
                <span class="text-muted">&copy; <?php echo e($footer_text); ?></span>
            </div>
        </div>
    </footer>



    ​<?php if(!empty($settings['enable_cookie']) && $settings['enable_cookie'] == 'on'): ?>
        <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\crmgo\resources\views/layouts/admin.blade.php ENDPATH**/ ?>