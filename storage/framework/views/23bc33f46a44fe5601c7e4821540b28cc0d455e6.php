
<?php $__env->startSection('content'); ?>

    <p>Dear <?php echo e($student->fullname_vn); ?>,</p>
    <p>British University Vietnam (BUV) would like to thank you for taking your time to fill in the scholarship form.</p>
    <p>Your form has been temporarily saved at this <a href="<?php echo e(route('scholarship.continue', ['sid' => $student->sid])); ?>">LINK</a>. Please kindly access to this for the next revisions. </p>
    <p>Yours sincerely, </p>
    <p>BUV Student Recruitment Office</p>

    -------------------------------------------------------------------------- 

    <p><?php echo e($student->fullname_vn); ?> thân mến,</p>
    <p>Trường Đại học Anh Quốc Việt Nam (BUV) cảm ơn em đã dành thời gian điền đơn Đăng Ký Học Bổng.</p>
    <p>Đơn Đăng Ký của em đã được lưu lại. Để cập nhật hoặc sửa đổi thông tin, em vui lòng truy cập vào <a href="<?php echo e(route('scholarship.continue', ['sid' => $student->sid])); ?>">LINK</a>. </p>
    <p>Trân trọng, </p>
    <p>Văn phòng Tuyển Sinh BUV</p>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app-no-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/email/step2.blade.php ENDPATH**/ ?>