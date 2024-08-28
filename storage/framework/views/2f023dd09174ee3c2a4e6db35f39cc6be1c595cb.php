
<?php $__env->startSection('content'); ?>
    <p><span><strong>Dear <?php echo e($student->fullname_vn); ?>,&nbsp;</strong></span></span></p>
    <p><span>Thank you for submitting your scholarship application to British University Vietnam. Your application has been received and will be reviewed carefully by our scholarship panel. &nbsp;</span></span></p>
    <p><span>You can find your submitted documents at this link: <a target="_blank" href="<?php echo e(route('scholarship.document.linkdownload', $redirect_parram)); ?>">Click here</a></span></p>
    <p><span>We appreciate the time and effort you put into the application process. We will announce selected candidates via your registered email and phone number in due course.&nbsp;&nbsp;</span></span></p>
    <p><span>Should you have any enquiries, please notify us by emailing sr@buv.edu.vn or calling 096 662 9909. We wish you the best of luck!&nbsp;</span></span></p>
    <p><span>Best Regards,&nbsp;</span></span></p>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app-no-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/email/student.blade.php ENDPATH**/ ?>