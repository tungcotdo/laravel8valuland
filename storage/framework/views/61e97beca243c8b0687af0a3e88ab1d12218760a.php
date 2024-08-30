<?php $__currentLoopData = $sale_imgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-lg-2">  
    <div class="card">
        <div class="card-body text-center">
            <a onclick="return confirm('Bạn có muốn xóa ảnh này không?')"  href="<?php echo e(route('shared.saleimg.delete', $value->sale_img_id)); ?>" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i> </a>
        </div>
        <a href="<?php echo e(asset($value->sale_img_path)); ?>" class="card-img-link" target="_blank"><img class="card-img-top rounded-0" src="<?php echo e(asset($value->sale_img_path)); ?>" alt="Card image cap"></a>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/sale/img.blade.php ENDPATH**/ ?>