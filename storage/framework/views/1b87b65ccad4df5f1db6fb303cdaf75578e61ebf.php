
<?php $__env->startSection('content'); ?>
    <div class="scholarship__section scholarship__section--background">
        <div class="scholarship__section">
            <p class="scholarship__note">
                <span class="error-message">You still can't submit, please go back to the previous steps and fill in the required information/ Bạn chưa thể submit, vui lòng quay lại các bước trước đó và điền đầy đủ các thông tin còn thiếu!</span>
            </p>
            <h3 class="scholarship-section__heading">CÁC THÔNG TIN CÒN THIẾU</h3>
            <div class="scholarship-section__field">
                <ul class="scholarship-section__field-missing-message">
                    <?php if( !empty( $requireds ) ): ?>
                        <?php $__currentLoopData = $requireds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('scholarship.show.step'.$step , $redirect_parram)); ?>?label=<?php echo e($item); ?>" class="scholarship-section__field-missing-message-item"><span class="text__vi">Step <?php echo e($step); ?></span> - [<?php echo e($item); ?> <span class="required__symbol">*</span>]</a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- /scholarship-section__field -->
        </div>
    </div>

    <div class="scholarship-form__submit">
        <a href="<?php echo e(route('scholarship.show.step7', $redirect_parram)); ?>" class="scholarship-form-submit__btn scholarship-form-submit__btn--previous">Previous</a>
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--disabled scholarship-form-submit__btn--save" type="submit" value="Submit" id="scholarship-form-submit__btn--save" title="Bạn chưa thể submit thông tin, vui lòng quay lại các bước và điền đầy đủ những thông tin bắt buộc!" disabled>
    </div>
<?php $__env->stopSection(); ?> <!-- content -->

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/step8.blade.php ENDPATH**/ ?>