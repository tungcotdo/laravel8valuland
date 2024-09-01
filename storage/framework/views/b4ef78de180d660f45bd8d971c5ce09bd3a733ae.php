
<?php $__env->startSection('web.main'); ?>
    <?php $__env->startSection('web.style'); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <!-- Demo styles -->
        <style>
            .swiper {
                width: 100%;
                height: 100%;
            }

            .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .swiper {
                width: 100%;
                height: 100%;
                margin-left: auto;
                margin-right: auto;
            }

            .slide{
                height: 500px;
            }

            .swiper-slide {
                background-size: cover;
                background-position: center;
            }

            .mySwiper2 {
                height: 80%;
                width: 100%;
            }

            .mySwiper {
                height: 30%;
                box-sizing: border-box;
                padding: 10px 0;
            }

            .mySwiper .swiper-slide {
                width: 25%;
                height: 100%;
                opacity: 0.4;
            }

            .mySwiper .swiper-slide-thumb-active {
                opacity: 1;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>
    <?php $__env->stopSection(); ?>
    <div class="container mt-3">
        <div class="pagetitle">
            <h1>Chi tiết căn</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('web.sale.select')); ?>">Danh sách bất động sản</a></li>
                    <li class="breadcrumb-item active">Chi tiết căn</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Start col-lg-12 -->
                        <form class="col-lg-12" action="<?php echo e(route('web.sale.add')); ?>" method="POST" id="web-sale-add">
                            <?php echo csrf_field(); ?>  
                            <input type="hidden" name="sale_status" value="">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title py-0">Thông tin chung</h5>
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label for="sale_subdivision" class="form-label-sm">Phân khu</label>
                                            <select class="form-control form-control-sm" disabled id="sale_subdivision" name="sale_subdivision">
                                                <?php if( !empty( $house->_SUBDIVISION ) ): ?>
                                                    <?php $__currentLoopData = $house->_SUBDIVISION; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>" <?php echo e($value == $sale->sale_subdivision ? 'selected' : ''); ?>><?php echo e($text); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sale_building" class="form-label-sm">Tòa</label>
                                            <input type="text" class="form-control form-control-sm" disabled id="sale_building" name="sale_building" value="">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sale_floor" class="form-label-sm">Tầng</label>
                                            <input type="text" class="form-control form-control-sm" disabled id="sale_floor" name="sale_floor" value="">
                                        </div>
                                        <div class="col-md-2 validate">
                                            <label for="code" class="form-label-sm">Mã căn<small class="text-danger"> *</small></label>
                                            <input type="text" class="form-control form-control-sm" disabled id="code" name="code" value="">
                                            <small class="error-message text-danger"></small>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sale_navigable_area" class="form-label-sm">DT thông thủy</label>
                                            <input type="text" class="form-control form-control-sm" disabled id="sale_navigable_area" name="sale_navigable_area" value="">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sale_room" class="form-label-sm">Phòng ngủ</label>
                                            <select class="form-control form-control-sm" disabled id="sale_room" name="sale_room">
                                                <?php if( !empty( $house->_ROOM ) ): ?>
                                                    <?php $__currentLoopData = $house->_ROOM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>"><?php echo e($text); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sale_style" class="form-label-sm">Loại căn hộ</label>
                                            <select class="form-control form-control-sm" disabled id="sale_style" name="sale_style">
                                                <?php if( !empty( $house->_STYLE ) ): ?>
                                                    <?php $__currentLoopData = $house->_STYLE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>"><?php echo e($text); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sale_direction" class="form-label-sm">Hướng</label>
                                            <select class="form-control form-control-sm" disabled id="sale_direction" name="sale_direction">
                                                <?php if( !empty( $house->_DIRECTION ) ): ?>
                                                    <?php $__currentLoopData = $house->_DIRECTION; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>"><?php echo e($text); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sale_price" class="form-label-sm">Giá bán</label>
                                            <input type="text" class="form-control form-control-sm" disabled id="sale_price" name="sale_price" value="">
                                        </div>
                                        <div class="col-md-2 validate">
                                            <label for="owner_name" class="form-label-sm">Tên chủ hộ <small class="text-danger"> *</small></label>
                                            <input type="text" class="form-control form-control-sm" disabled id="owner_name" name="owner_name" value="">
                                            <small class="error-message text-danger"></small>
                                        </div>
                                        <div class="col-md-2 validate">
                                            <label for="owner_phone" class="form-label-sm">Điện thoại chủ hộ <small class="text-danger"> *</small></label>
                                            <input type="text" class="form-control form-control-sm" disabled id="owner_phone" name="owner_phone" value="">
                                            <small class="error-message text-danger"></small>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="sale_description" class="form-label-sm">Mô tả</label>
                                            <textarea class="form-control form-control-sm" disabled name="sale_description" id="sale_description"></textarea>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->

                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title py-0">Ảnh căn hộ</h5>
                                    <div class="slide">
                                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                                                </div>
                                                </div>
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                            <div thumbsSlider="" class="swiper mySwiper">
                                                <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                                                </div>
                                                </div>
                                        </div>
                                    </div> <!-- end slide -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                            
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title py-0">Video căn hộ</h5>
                                    <div class="col-md-12">
                                        <video controls class="w-100">
                                        <source src="" type="video/mp4">
                                            Your browser does not support HTML video.
                                        </video>
                                    </div>
                                </div>
                            </div> <!-- end card -->
                        </form><!-- End col-lg-12 -->

                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

        <!-- Upload IMG Modal -->
        <div class="modal fade" id="imgModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tải ảnh căn hộ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-img-modal-close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="web-sale-uploadimg" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="sale-loadimg-url" value="">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-auto validate">
                                <input class="form-control" type="file" id="sale_img_input" name="files[]" multiple>
                                <small class="error-message text-danger"></small>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary" id="house-image-save">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div><!-- End Upload IMG Modal-->

        <!-- Upload VIDEO Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tải video căn hộ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-video-modal-close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="web-salevideo-upload" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="web-salevideo-upload-url" value="">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-auto validate">
                                <input class="form-control" type="file" id="sale_video_input" name="file" multiple>
                                <small class="error-message text-danger"></small>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary" id="sale_video_save">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div><!-- End Upload IMG Modal-->
    </div>

    <?php $__env->startSection('web.script'); ?>
        <script src="<?php echo e(asset('form/sale-img.js')); ?>"></script>
        <script src="<?php echo e(asset('form/sale-video.js')); ?>"></script>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 10,
                slidesPerView: 5,
                freeMode: true,
                watchSlidesProgress: true,
            });

            var swiper2 = new Swiper(".mySwiper2", {
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });
        </script>
    <?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/web/sale/detail.blade.php ENDPATH**/ ?>