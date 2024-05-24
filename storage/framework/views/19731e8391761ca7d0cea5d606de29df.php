
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="jq0sDQZgsrq7az6oTp6NhCDmAHNfXFqCOzY78ro3">
<meta name="title" content="<?php echo e(app('companyName')); ?>: Custom Software Development Services">
<meta name="description"
    content="<?php echo e(app('companyName')); ?> provides custom software development services, including web development, mobile development, quality assurance, and dedicated teams.">
<link rel="canonical" href="<?php echo e(route('custom.index')); ?>">
<meta property="og:title" content="<?php echo e(app('companyName')); ?>: Custom Software Development Services">
<meta property="og:site_name" content="<?php echo e(app('companyName')); ?>">
<meta property="og:url" content="<?php echo e(route('custom.index')); ?>">
<meta property="og:description"
    content="<?php echo e(app('companyName')); ?> Technologies provides custom software development services, including web development, mobile development, quality assurance, and dedicated teams.">
<meta property="og:type" content="Organization">
<meta property="og:image" content="<?php echo e(asset('custom_frontend/frontend-assets/images/thumb-nail.webp')); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?php echo e(app('companyName')); ?>">
<meta name="twitter:title" content="<?php echo e(app('companyName')); ?>: Custom Software Development Services">
<meta name="twitter:description"
    content="<?php echo e(app('companyName')); ?> provides custom software development services, including web development, mobile development, quality assurance, and dedicated teams.">
<meta name="twitter:image" content="<?php echo e(asset('custom_frontend/frontend-assets/images/thumb-nail.webp')); ?>">





<link rel="shortcut icon" href="<?php echo e(asset('custom_frontend/frontend-assets/images/icons/favicon.svg')); ?>" type="image/x-icon">
<link rel="stylesheet" href="<?php echo e(asset('custom_frontend/frontend-assets/css/globalStyle.css')); ?>" media="all">
<link rel="stylesheet" href="<?php echo e(asset('custom_frontend/frontend-assets/css/homeResponsive.css')); ?>" media="all">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.4.1/swiper-bundle.css">
<link cache-files="cached" rel="stylesheet" href="<?php echo e(asset('custom_frontend/frontend-assets/libraries/css/bootstrap.css')); ?>" media="all" />
<link cache-files="cached" rel="stylesheet" href="<?php echo e(asset('custom_frontend/frontend-assets/libraries/css/swiperBundle.css')); ?>" media="all" />
<link rel="stylesheet" href="<?php echo e(asset('custom_frontend/frontend-assets/libraries/css/flatepicker.css')); ?>" media="all" />
<link rel="stylesheet" href="<?php echo e(asset('custom_frontend/frontend-assets/css/feedbackSelector.css')); ?>" media="all" />
<link rel="stylesheet" href="<?php echo e(asset('custom_frontend/frontend-assets/css/style.css')); ?>" media="all" />
<link rel="stylesheet" href="<?php echo e(asset('custom_frontend/frontend-assets/css/responsive.css')); ?>" media="all" />
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>



<style>
    .main-testi {
        background-image: url(../frontend-assets/images/testimonial-bg.webp);
        /* padding: 50px; */
        background-repeat: no-repeat;
        background-size: 100% 100%;
        /* margin-bottom: 80px; */
    }

    .testi-content {
        padding: 93px 0 93px 0;
        gap: 30px;
        justify-content: space-between;
    }

    .teti-text {
        width: 100%;
        max-width: 660px;
    }

    .teti-text .zapta-team-p {
        font-size: 20px;
        font-weight: 500;
        color: white;
        line-height: 32px;

    }

    .testi-img {
        width: 100%;
        max-width: 412px;

    }

    .testi-img img {
        width: 100%;
    }

    .teti-text .redha-client {
        padding-top: 30px;
        font-size: 26px;
        font-weight: 500;
        line-height: 32px;
        color: white;

    }

    .teti-text .legal-p {
        font-size: 18px;
        font-weight: 400;
        color: white;
        line-height: 28px;
    }

    @media screen and (max-width: 991px) {

        .main-testi {
            background-size: cover;
        }

        .testi-content {
            padding: 113px 0 93px 0;
            flex-wrap: wrap-reverse;
            justify-content: center;
        }
    }

    .customError {
        font-size: 1.2rem !important;
    }

    .services-wraper .text-checkbox {
        padding-left: 1rem;
        padding-right: 1rem;
        border: 1px solid #636363;
        border-radius: 2rem;
        font-size: 1.4rem;
        line-height: 3rem;
        font-weight: 600;
        color: #636363;
        cursor: default;
    }

    .services-wraper .text-checkbox:has(input[type=checkbox]:checked) {
        color: var(--white) !important;
        background-color: var(--primaryblue4);
        border: 1px solid var(--primaryblue4);

    }

    .services-wraper .text-checkbox:has(input[type=checkbox]:checked) span {
        color: var(--white) !important;

    }

    .services-wraper .text-checkbox input {
        display: none;
    }

    .zapta-loader {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    .loader-loading {
        height: 170px;
        width: 170px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 6px solid #ccc;
        border-right-color: #005BAA;
        border-radius: 50%;
        -webkit-animation: rotate 1s infinite linear;
    }

    @-webkit-keyframes rotate {
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    .absolute-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .upload-document label.error {
        bottom: unset !important;
    }
</style>



<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D82TEDL95X"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-D82TEDL95X');
</script>


<script>
    (function(h, o, t, j, a, r) {
        h.hj = h.hj || function() {
            (h.hj.q = h.hj.q || []).push(arguments)
        };
        h._hjSettings = {
            hjid: 3736410,
            hjsv: 6
        };
        a = o.getElementsByTagName('head')[0];
        r = o.createElement('script');
        r.async = 1;
        r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
        a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
</script>
<?php /**PATH C:\xampp\htdocs\crmgo\resources\views/frontend/layout/meta.blade.php ENDPATH**/ ?>