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

            <?php echo $__env->yieldContent('content'); ?>

        </div><!-- container -->
    </div><!-- scholarship -->


</body>
</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/layouts/app-no-banner.blade.php ENDPATH**/ ?>