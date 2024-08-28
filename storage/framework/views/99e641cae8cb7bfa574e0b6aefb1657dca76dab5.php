

<?php $__env->startSection('code', '401'); ?>
<?php $__env->startSection('title', __('Unauthorized')); ?>

<?php $__env->startSection('image'); ?>
    <div style="background-image: url(<?php echo e(asset('/svg/403.svg')); ?>);" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message', __('Sorry, you are not authorized to access this page.')); ?>

<?php echo $__env->make('errors.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/errors/404.blade.php ENDPATH**/ ?>