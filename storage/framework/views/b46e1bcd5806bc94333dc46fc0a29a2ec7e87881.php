<?php if( isset( $rent->rent_video_path ) && !empty( $rent->rent_video_path ) ): ?>
    <div class="col-md-12">
        <a href="#" class="btn btn-sm btn-danger mb-3 rent-video-delete" id="<?php echo e(route('admin.rentvideo.delete', $rent->rent_id)); ?>"><i class="bi bi-trash"></i> Xóa video</a>
        <video controls class="w-100">
        <source src="<?php echo e(asset($rent->rent_video_path)); ?>" type="video/mp4">
            Your browser does not support HTML video.
        </video>
    </div>
<?php else: ?>
    <div class="col-md-12">
        <a href="#" class="btn btn-sm btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#videoModal"><i class="bi bi-plus-lg"></i> Thêm mới video</a>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/partials/rent_video.blade.php ENDPATH**/ ?>