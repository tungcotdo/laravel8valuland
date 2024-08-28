<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Favicons -->
    <link href="<?php echo e(asset('images/favicon.png')); ?>?v=<?php echo e(cglobal::$ver_static); ?>" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>?v=<?php echo e(cglobal::$ver_static); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>?v=<?php echo e(cglobal::$ver_static); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/datepicker.css')); ?>?v=<?php echo e(cglobal::$ver_static); ?>">
    <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>?v=<?php echo e(cglobal::$ver_static); ?>"></script>
    <script src="<?php echo e(asset('js/autoNumeric.js')); ?>?v=<?php echo e(cglobal::$ver_static); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>?v=<?php echo e(cglobal::$ver_static); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.js')); ?>?v=<?php echo e(cglobal::$ver_static); ?>"></script>
</head>
<body>
<?php echo app('arrilot.widget')->run('header'); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo app('arrilot.widget')->run('footer'); ?>
</body>
</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\payment-bk\resources\views/layouts/main.blade.php ENDPATH**/ ?>