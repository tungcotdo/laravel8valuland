<?php $__env->startSection('title', 'Online payment failed/ Thanh toán trực tuyến không thành công'); ?>
<?php $__env->startSection('content'); ?>
        <!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Barcode Generator</title>
</head>
<body>
<div class="container text-center" style="background-color: #fff;">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-5">Laravel 8 Barcode Generator</h1>
            <div><?php echo DNS1D::getBarcodeHTML('4445645656', 'C39'); ?></div></br>
            <div><?php echo DNS1D::getBarcodeHTML('4445645656', 'POSTNET'); ?></div></br>
            <div><?php echo DNS1D::getBarcodeHTML('4445645656', 'PHARMA'); ?></div></br>
            <div><?php echo DNS2D::getBarcodeHTML('https://10things.buv.edu.vn', 'QRCODE'); ?></div></br>
        </div>
    </div>
</div>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/merchant/resources/views/barcode.blade.php ENDPATH**/ ?>