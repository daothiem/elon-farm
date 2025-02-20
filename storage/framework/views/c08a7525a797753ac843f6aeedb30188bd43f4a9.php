<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset($about_us->logo_mobile)); ?>">
    <link rel="canonical" href="/"/>

    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" itemprop="headline"
          content="<?php if(isset($dataSeo) && isset($dataSeo['title']) && strlen($dataSeo['title'])): ?><?php echo e($dataSeo['title']); ?><?php else: ?> Elon Farm with love from Center highland <?php endif; ?>">
    <meta property="og:image" itemprop="thumbnailUrl"
          content="<?php if(isset($dataSeo) && isset($dataSeo['image'])): ?><?php echo e(asset($dataSeo['image'])); ?> <?php else: ?> <?php echo e(asset($about_us->logo_mobile)); ?> <?php endif; ?>?w=480&amp;h=280">
    <meta name="og:description"
          content="<?php if(isset($dataSeo) && isset($dataSeo['description']) && strlen($dataSeo['description'])): ?><?php echo e($dataSeo['description']); ?><?php else: ?> Visit our vibrant coffee farm and immerse yourself in the local culture. Not only will you experience our coffee, but you’ll also have the opportunity to explore the local culture through silk worm raising activities, visiting Linh An Pagoda, and viewing the majestic Elephant Waterfall. <?php endif; ?> "/>

    <meta name="description"
          content="<?php if(isset($dataSeo) && isset($dataSeo['description']) && strlen($dataSeo['description'])): ?><?php echo e($dataSeo['description']); ?><?php else: ?> Visit our vibrant coffee farm and immerse yourself in the local culture. Not only will you experience our coffee, but you’ll also have the opportunity to explore the local culture through silk worm raising activities, visiting Linh An Pagoda, and viewing the majestic Elephant Waterfall. <?php endif; ?>">
    <link rel="alternate" type="application/rss+xml" title=" "
          href="https://elonfarm.vn">
    <meta name="keywords"
          content="<?php if(isset($dataSeo) && isset($dataSeo['keywords']) && strlen($dataSeo['keywords'])): ?><?php echo e($dataSeo['keywords']); ?> <?php else: ?> elonfarm <?php endif; ?>"/>
    <?php if(isset($dataSeo) && isset($dataSeo['title']) && strlen($dataSeo['title'])): ?>
        <title><?php echo e($dataSeo['title']); ?></title>
    <?php else: ?>
        <title></title>
    <?php endif; ?>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap" rel="stylesheet">
    <link rel="image_src" type="image/jpeg"
          href="<?php if(isset($dataSeo) && isset($dataSeo['image'])): ?><?php echo e(asset($dataSeo['image'])); ?> <?php else: ?> <?php echo e(asset($about_us->logo_mobile)); ?> <?php endif; ?>">

    <link href="<?php echo e(asset('/assets/frontend/vendors/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/bootstrap-select/bootstrap-select.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/animate/animate.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/fontawesome/css/all.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/jquery-ui/jquery-ui.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/jarallax/jarallax.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/jquery-magnific-popup/jquery.magnific-popup.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/nouislider/nouislider.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/nouislider/nouislider.pips.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/tiny-slider/tiny-slider.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/trevlo-icons/style.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/trevlo-one-icons/style.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/daterangepicker-master/daterangepicker.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/owl-carousel/css/owl.carousel.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/vendors/owl-carousel/css/owl.theme.default.min.css')); ?>" rel="stylesheet" type="text/css"/>


    <!-- template styles -->
    <link href="<?php echo e(asset('/assets/frontend/css/trevlo.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/css/color-1.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/assets/frontend/css/color-2.css')); ?>" rel="stylesheet" type="text/css"/>

    <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" id="lottie-container"></div>
        <p>Loading...</p>
    </div>

    <div class="page-wrapper">

        <?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content -->
        <?php echo $__env->yieldContent('main-content'); ?>
        <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/jquery/jquery-3.7.0.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/jarallax/jarallax.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/jquery-ui/jquery-ui.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/jquery-appear/jquery.appear.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/jquery-circle-progress/jquery.circle-progress.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/jquery-validate/jquery.validate.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/nouislider/nouislider.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/tiny-slider/tiny-slider.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/wnumb/wNumb.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/owl-carousel/js/owl.carousel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/owl-carousel/js/owlcarousel2-filter.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/wow/wow.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/tilt/tilt.jquery.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/simpleParallax/simpleParallax.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/imagesloaded/imagesloaded.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/isotope/isotope.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/countdown/countdown.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/daterangepicker-master/moment.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/daterangepicker-master/daterangepicker.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/jquery-circleType/jquery.circleType.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/js/trevlo.js')); ?>"></script>
<!-- template js -->
<script type="text/javascript" src="<?php echo e(URL::asset('/assets/frontend/vendors/jquery-lettering/jquery.lettering.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.0/lottie.min.js"></script>
<script src="https://static.elfsight.com/platform/platform.js" async></script>
<script>
  lottie.loadAnimation({
    container: document.getElementById('lottie-container'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'assets/frontend/images/Logo-animated.json'
  });
  $(document).ready(() => {
        if (localStorage.getItem("scrollToGallery") === "true") {
            localStorage.removeItem("scrollToGallery");
            $("html, body").animate(
                {
                    scrollTop: $("#gallery_about_us").offset().top,
                },
                800 
            );
        }
        $(".footer-widget__gallery__link").on("click", function (event) {
            event.preventDefault(); 
            localStorage.setItem("scrollToGallery", "true");
            window.location.href = "/about-us";
        });
    })
</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Users/thiemdao/Desktop/project/elon-farm/resources/views/frontend/layouts/master.blade.php ENDPATH**/ ?>