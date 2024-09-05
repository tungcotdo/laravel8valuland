
<?php $__env->startSection('web.main'); ?>
    <div class="container mt-2">
        <!-- Filter -->
        <div class="card">
            <div class="accordion-item p-3">
                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                    <div class="col-12">
                        <h5>Bất động sản Vinhome Ocean Park</h5>
                        <small>Hiện có <b>3</b> bất động sản.</small>
                    </div>
                    <form class="row g-3" action="<?php echo e(route('web.sale.select')); ?>">
                        <div class="col-md-2">
                        <label for="sale_building" class="form-label-sm">Tòa</label>
                        <input type="text" class="form-control form-control-sm" id="sale_building" name="sale_building" value="<?php echo e(request()->sale_building); ?>">
                        </div>
                        <div class="col-md-2">
                        <label for="sale_floor" class="form-label-sm">Tầng</label>
                        <input type="text" class="form-control form-control-sm" id="sale_floor" name="sale_floor" value="<?php echo e(request()->sale_floor); ?>">
                        </div>
                        <div class="col-md-2 validate">
                        <label for="code" class="form-label-sm">Căn</label>
                        <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?php echo e(request()->code); ?>">
                        <small class="error-message text-danger"></small>
                        </div>
                        <div class="col-md-2">
                        <label for="sale_style" class="form-label-sm">Loại căn hộ</label>
                        <select class="form-control form-control-sm" id="sale_style" name="sale_style">
                            <?php if( !empty( $house->_STYLE ) ): ?>
                            <?php $__currentLoopData = $house->_STYLE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>" <?php echo e($value == request()->sale_style ? 'selected' : ''); ?>><?php echo e($text); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        </div>
                        <div class="col-md-2">
                        <label for="sale_direction" class="form-label-sm">Hướng</label>
                        <select class="form-control form-control-sm" id="sale_direction" name="sale_direction">
                            <?php if( !empty( $house->_DIRECTION ) ): ?>
                                <?php $__currentLoopData = $house->_DIRECTION; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" <?php echo e($value == request()->sale_direction ? 'selected' : ''); ?>><?php echo e($text); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        </div>
                        <div class="col-md-2 search-group">
                            <button class="btn btn-sm btn-secondary search-group-btn" type="submit">Áp dụng lọc</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End filter -->
    </div>

    <main class="sale-list container">
        <div class="row">
            <div class="col-md-12">
                <?php if( !empty( $sale_selects ) ): ?>
                    <?php $__currentLoopData = $sale_selects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="sale-card d-block my-2" href="<?php echo e(route('web.sale.detail', $value->sale_id)); ?>">
                        <div class="sale-card-grid">
                            <?php
                                if( !empty( $sale_imgs($value->sale_id) ) ){
                                    $imgs = $sale_imgs($value->sale_id);
                                    dd( $imgs[0]->sale_img_path );
                                }
                            ?>
                        </div>

                        <div class="row">
                            <div class="col-8">
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                        <div class="product d-flex flex-column" style="gap: 30px;">
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <div class="d-flex sale-house-info">
                                        <span class="sale-house-info-item text-dark mr-3"><?php echo e($value->sale_building); ?>.<?php echo e($value->sale_floor); ?><?php echo e($value->code); ?></span>
                                        <span class="sale-house-info-item text-danger mr-3"><?php echo e($value->sale_navigable_area); ?>m<sup>2</sup></span>
                                        <span class="sale-house-info-item text-dark mr-3"><?php echo e($house->_STYLE[$value->sale_style]); ?></span>
                                        <span class="sale-house-info-item text-danger"><?php echo e($value->sale_price); ?> tỷ</span>
                                    </div>
                                    <p class="card-text mt-2 text-dark"><?php echo e($value->sale_description); ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/web/sale/select.blade.php ENDPATH**/ ?>