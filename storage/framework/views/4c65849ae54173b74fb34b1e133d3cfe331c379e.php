
<?php $__env->startSection('content'); ?>

    <p>Full name in Vietnamese: <?php echo e($student->fullname_vn); ?></p>
    <p>Date of birth: <?php echo e($student->day_of_birth); ?>/<?php echo e($student->month_of_birth); ?>/<?php echo e($student->year_of_birth); ?></p>
    <p>Mobile phone: <?php echo e($student->phone_number); ?></p>
    <p>Email: <?php echo e($student->email); ?></p>
    <p>Current address: <?php echo e($student->current_address); ?></p>
    <p>Emergency Contact 1: <?php echo e($student->e_phone_1); ?></p>
    <p>Emergency Contact 2: <?php echo e($student->e_phone_2); ?></p>
    <p>Notes or video links: <?php echo e($student->note); ?></p>
    <p>Link for documents: <a target="_blank" href="<?php echo e(route('scholarship.document.linkdownload', $redirect_parram)); ?>">Click here</a></p>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app-no-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/email/admin.blade.php ENDPATH**/ ?>