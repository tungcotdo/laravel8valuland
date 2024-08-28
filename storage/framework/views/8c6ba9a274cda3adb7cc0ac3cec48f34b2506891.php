
<?php $__env->startSection('content'); ?>
<p class="scholarship__note scholarship__note-finish">
    <a target="_blank" href="<?php echo e(route('scholarship.document.download', $redirect_parram)); ?>" id="scholarship-section__field-file-download-document">Click here to download!</a><br><br><br>
    <a target="_blank" href="<?php echo e(route('scholarship.document.combine', $redirect_parram)); ?>" id="scholarship-section__field-file-combine-document">Click here to combine!</a>
</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-no-navigate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/download.blade.php ENDPATH**/ ?>