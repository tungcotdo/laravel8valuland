<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" id="csrf-token"/>

  <title>VALULAND</title>

  <!-- Favicons -->
  <link href="<?php echo e(asset('web/img/valuland-favicon.png')); ?>" rel="icon">
  <link href="<?php echo e(asset('web/img/valuland-favicon.png')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('web/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('web/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo e(asset('web/css/style.css')); ?>" rel="stylesheet">

  <!-- Form CSS File -->
  <link href="<?php echo e(asset('form/modal.css')); ?>" rel="stylesheet">

  <?php echo $__env->yieldContent('web.style'); ?>
</head>

<body>
    <header class="web-header py-3">
        <div class="container">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-6 pt-1 main-navigation">
                    <a class="text-muted" href="#">
                        <img width="130" src="<?php echo e(asset('web/img/valuland-Logo.png')); ?>" alt="">
                    </a>
                    <a class="main-navigation-item main-navigation-item--active" href="#">Nhà đất bán</a>
                    <a class="main-navigation-item" href="#">Nhà đất cho thuê</a>
                </div>
                
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('web.sale.add')); ?>">Đăng tin</a>
                </div>
            </div>
        </div>
    </header>

    <?php echo $__env->yieldContent('web.main'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Modal loading page -->
    <div class="modal" id="modal__loading">
        <div class="modal__overlay"></div>
        <div class="modal__content">
            <div class="modal__loading">
                <div class="modal__loading-icon"></div>
                <div class="modal__loading-text">Đang xử lý ...</div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Form JS File -->
    <script src="<?php echo e(asset('form/function.js')); ?>"></script>

    <?php echo $__env->yieldContent('web.script'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/layouts/web.blade.php ENDPATH**/ ?>