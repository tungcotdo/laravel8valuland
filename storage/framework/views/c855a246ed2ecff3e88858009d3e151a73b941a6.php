

<?php $__env->startSection('code', '401'); ?>
<?php $__env->startSection('title', __('Unauthorized')); ?>

<?php $__env->startSection('image'); ?>
    <div style="background-image: url(<?php echo e(asset('/svg/403.svg')); ?>);" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message', __('Xin lỗi, bạn không có quyền truy cập vào trang web này.')); ?>

<?php echo $__env->make('errors.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/errors/404.blade.php ENDPATH**/ ?>