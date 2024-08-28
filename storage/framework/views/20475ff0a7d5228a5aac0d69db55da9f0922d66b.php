
<?php $__env->startSection('web.main'); ?>
    <section class="sale-search container">
        <div class="mb-3 border-bottom pb-3">
            <div class="row my-3">
                <div class="col-4 col-md-2">
                <label for="sale_building" class="form-label-sm label-filter">Tòa</label>
                <input type="text" class="form-control form-control-sm" id="sale_building" name="sale_building">
                </div>
                <div class="col-4 col-md-2">
                <label for="sale_floor" class="form-label-sm label-filter">Tầng</label>
                <input type="text" class="form-control form-control-sm" id="sale_floor" name="sale_floor">
                </div>
                <div class="col-4 col-md-2 validate">
                <label for="code" class="form-label-sm label-filter">Căn</label>
                <input type="text" class="form-control form-control-sm" id="code" name="code">
                <small class="error-message text-danger"></small>
                </div>
                <div class="col-4 col-md-2">
                <label for="sale_navigable_area" class="form-label-sm label-filter">Loại căn hộ</label>
                <input type="text" class="form-control form-control-sm" id="sale_navigable_area" name="sale_navigable_area">
                </div>
                <div class="col-4 col-md-2">
                <label for="sale_navigable_area" class="form-label-sm label-filter">Hướng</label>
                <input type="text" class="form-control form-control-sm" id="sale_navigable_area" name="sale_navigable_area">
                </div>
                <div class="col-4 col-md-2 search-group">
                    <button class="btn btn-primary btn-sm search-group-btn">Tìm kiếm</button>
                </div>
            </div>
        </div>
    </section>

    <main class="sale-list container">
        <div class="row ">
            <div class="col-md-12">
                <div class="mb-2">
                    <h4>Mua bán nhà đất trên toàn quốc</h4>
                    <span>Hiện có 170 bất động sản</span>
                </div>
                <a class="sale-card d-block mb-4" href="#">
                    <div class="sale-card-grid">
                        <div class="sale-grid-item sale-grid--item1">
                            <img class="sale-grid-img" src="<?php echo e(asset('upload/sale/1.jpg')); ?>" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item2">
                            <img class="sale-grid-img" src="<?php echo e(asset('upload/sale/2.jpg')); ?>" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item3">
                            <img class="sale-grid-img" src="<?php echo e(asset('upload/sale/3.jpg')); ?>" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item4">
                            <img class="sale-grid-img" src="<?php echo e(asset('upload/sale/4.jpg')); ?>" alt="">
                        </div>
                    </div>
                    <div class="product d-flex flex-column" style="gap: 30px;">
                        <div class="card">
                        <div class="card-body">
                            <div class="d-flex sale-house-info">
                                <span class="sale-house-info-item text-dark mr-3">S102.xx</span>
                                <span class="sale-house-info-item text-danger mr-3">63m<sup>2</sup></span>
                                <span class="sale-house-info-item text-dark mr-3">2N1WC</span>
                                <span class="sale-house-info-item text-danger">4.5 tỷ</span>
                            </div>
                            <p class="card-text mt-2 text-dark">Bàn giao Full nội thất liền tường cao cấp nhập khẩu, kính Low - E 3 lớp, cửa chống cháy,...
                            Sử dụng tiện ích chung của Vin Ocean Park nhưng có thêm những đặc quyền dành riêng cho cư dân Mas như</p>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/web/sale/index.blade.php ENDPATH**/ ?>