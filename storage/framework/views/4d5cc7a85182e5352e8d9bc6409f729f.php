<?php
    //$logo=asset(Storage::url('uploads/logo/'));
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $company_favicon = Utility::getValByName('company_favicon');
    // $setting = App\Models\Utility::colorset();

    $settings = App\Models\Utility::settings();
    $color = !empty($settings['color']) ? $settings['color'] : 'theme-3';
    $SITE_RTL = !empty($settings['SITE_RTL']) ? $settings['SITE_RTL'] : 'off';

?>

<head>
    <title> <?php echo $__env->yieldContent('page-title'); ?> -
        <?php echo e(Utility::getValByName('title_text') ? Utility::getValByName('title_text') : config('app.name', 'CRMGo SaaS')); ?>

    </title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    
    <meta name="keyword" content="<?php echo e(!empty($settings['meta_keyword']) ? $settings['meta_keyword'] : ''); ?>">
    <meta name="description" content="<?php echo e(!empty($settings['meta_description']) ? $settings['meta_description'] : ''); ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:title" content="<?php echo e(!empty($settings['meta_keyword']) ? $settings['meta_keyword'] : ''); ?>">
    <meta property="og:description"
        content="<?php echo e(!empty($settings['meta_description']) ? $settings['meta_description'] : ''); ?>">
    <meta property="og:image"
        content="<?php echo e(asset('storage/meta/' . (isset($settings['meta_image']) && !empty($settings['meta_image']) ? $settings['meta_image'] : ''))); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:title" content="<?php echo e(!empty($settings['meta_keyword']) ? $settings['meta_keyword'] : ''); ?>">
    <meta property="twitter:description"
        content="<?php echo e(!empty($settings['meta_description']) ? $settings['meta_description'] : 'meta_image.png'); ?>">
    <meta property="twitter:image"
        content="<?php echo e(isset($settings['meta_image']) && !empty($settings['meta_image']) ? $settings['meta_image'] : ''); ?>">

    <link rel="icon"
        href="<?php echo e($logo . '/' . (isset($favicon) && !empty($favicon) ? $favicon : 'favicon.png') . '?timestamp=' . time()); ?>"
        type="image/x-icon">

    <meta name="author" content="WorkDo" />

    <!-- Favicon icon -->
    
    
    <!--Calendar -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/main.css')); ?>">
    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">


    <?php echo $__env->yieldPushContent('pre-purpose-css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/style.css')); ?>">
    <!-- vendor css -->
    <?php if($SITE_RTL == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
    <?php endif; ?>

    <?php if($settings['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>" id="style">
        
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="style">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/custom.css')); ?>" id="style">
    <link rel="stylesheet" href="<?php echo e(asset('public/custom_assets/css/custom.css')); ?>">

    
    <!-- date -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/datepicker-bs5.min.css')); ?>">

    <!-- Dragulla -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/dragula.min.css')); ?>">

    <!--bootstrap switch-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-switch-button.min.css')); ?>">

    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/dropzone.min.css')); ?>">

    <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css' />

    <link rel="stylesheet" href="<?php echo e(asset('css/summernote/summernote-bs4.css')); ?>">

      <link rel="stylesheet" href="<?php echo e(asset('css/custom-color.css')); ?>">

    <?php echo $__env->yieldPushContent('css-page'); ?>

    <style>
        [dir="rtl"] .dash-sidebar {
            left: auto !important;
        }

        [dir="rtl"] .dash-header {
            left: 0;
            right: 280px;
        }

        [dir="rtl"] .dash-header:not(.transprent-bg) .header-wrapper {
            padding: 0 0 0 30px;
        }

        [dir="rtl"] .dash-header:not(.transprent-bg):not(.dash-mob-header)~.dash-container {
            margin-left: 0px;
        }

        [dir="rtl"] .me-auto.dash-mob-drp {
            margin-right: 10px !important;
        }

        [dir="rtl"] .me-auto {
            margin-left: 10px !important;
        }
    </style>

<style>
    :root {
        --color-customColor: <?= $color ?>;
    }
</style>

</head>
<?php /**PATH C:\xampp\htdocs\crmgo\resources\views/partials/admin/head.blade.php ENDPATH**/ ?>