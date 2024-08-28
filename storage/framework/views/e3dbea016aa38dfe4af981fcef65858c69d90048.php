<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" id="csrf-token"/>
    <meta name="upload-url" content="<?php echo e(route('scholarship.upload')); ?>" id="upload-url"/>
    <meta name="scholarship-student-sid" content="<?php echo e(request()->sid); ?>" id="scholarship-student-sid"/>

    <title>Scholarship</title>

    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/modal.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>

    <div class="scholarship">
        <div class="container">
            
            <a class="scholarship__banner" href="<?php echo e(route('scholarship.show.step1', ['sid' => !empty( request()->sid ) ? request()->sid : 0 ])); ?>">
                <div class="scholarship-banner__logo">
                    <img class="scholarship-banner-logo__img" src="<?php echo e(asset('img/BUV-Logo-Transparent.png')); ?>">
                </div>
                <div class="scholarship-banner__title">
                    <h3 class="scholarship-banner-title__heading">BUV SCHOLARSHIP</h3>
                </div>
            </a>

            <?php echo $__env->yieldContent('content'); ?>

        </div><!-- container -->
    </div><!-- scholarship -->

    <!-- Modal loading page -->
    <div class="modal" id="modal__loading">
        <div class="modal__overlay"></div>
        <div class="modal__content">
            <div class="loader"></div>
            <div class="loading__title">Processing ...<br>Please do not close the browser</div>
        </div>
    </div>

    <?php echo $__env->yieldContent('script'); ?>

    <script>
        window.addEventListener("load", function() { 
            document.getElementById("modal__loading").style.display = "none";
        });

        setTimeout(function() {
            var alertElement = document.querySelector('.scholarship__alert');
            if( alertElement ){
                alertElement.remove();
            }
        }, 5000); // <-- time in milliseconds
    </script>
</body>
</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/layouts/app-no-navigate.blade.php ENDPATH**/ ?>