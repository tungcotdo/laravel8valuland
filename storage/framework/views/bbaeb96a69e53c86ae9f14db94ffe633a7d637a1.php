
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
        <h1>Danh sách đã thuê</h1>
        <nav>
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách đã thuê</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
      <!-- Filter -->
      <div class="card">
        <div class="accordion-item p-3">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed py-2 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <i class="bi bi-filter-left"> Bộ lọc</i>
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse show mt-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
            <form class="row g-3" action="<?php echo e(route('admin.rent.sold')); ?>">
                <div class="col-md-2 validate">
                    <label for="code" class="form-label-sm">Mã căn</label>
                    <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?php echo e(request()->code); ?>">
                    <small class="error-message text-danger"></small>
                </div>
                <div class="col-md-2 validate">
                    <label for="rent_style" class="form-label-sm">Loại căn hộ</label>
                    <select class="form-control form-control-sm" id="rent_style" name="rent_style">
                      <option value="0">--Chọn--</option>
                      <?php if( !empty( $house->_STYLE ) ): ?>
                        <?php $__currentLoopData = $house->_STYLE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($value); ?>" <?php echo e($value == request()->rent_style ? 'selected' : ''); ?>><?php echo e($text); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>
                    <small class="error-message text-danger"></small>
                </div>
                <div class="col-md-2 validate">
                    <label for="rent_status" class="form-label-sm">Trạng thái</label>
                    <select id="rent_status" class="form-control form-control-sm" name="rent_status">
                        <option value="0">--Chọn--</option>
                        <option <?php echo e(request()->rent_status == 5 ? 'selected' : ''); ?> value="5" >Mình cho thuê</option>
                        <option <?php echo e(request()->rent_status == 4 ? 'selected' : ''); ?> value="4">Họ cho thuê</option>
                    </select>
                    <small class="error-message text-danger"></small>
                </div>
                <div class="col-md-2 search-group">
                    <button class="btn btn-sm btn-secondary search-group-btn" type="submit">Áp dụng lọc</button>
                </div>
            </form>
          </div>
        </div>

      </div>
      <!-- End filter -->

      <section class="section mt-3">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <!-- Start rent -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <p class="text-danger">Tổng số <b><?php echo e(count( $rent_solds )); ?></b> bản ghi.</p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" class="small">MÃ CĂN</th>
                          <th scope="col" class="small">DIỆN TÍCH</th>
                          <th scope="col" class="small">PHÒNG NGỦ</th>
                          <th scope="col" class="small">LOẠI</th>
                          <th scope="col" class="small">HƯỚNG</th>
                          <th scope="col" class="small">GIÁ</th>
                          <th scope="col" class="small">CẬP NHẬT LÚC</th>
                          <th scope="col" class="small">TRẠNG THÁI</th>
                          <th scope="col" class="small">HÀNH ĐỘNG</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if( !empty( $rent_solds ) ): ?>
                            <?php $__currentLoopData = $rent_solds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($value->rent_building); ?>.<?php echo e($value->rent_floor); ?><?php echo e($value->code); ?></th>
                                    <td><?php echo e($value->rent_navigable_area); ?></td>
                                    <td><?php echo e($value->rent_room); ?></td>
                                    <td><?php echo e(( !empty( $house->_STYLE[$value->rent_style] ) ) ? $house->_STYLE[$value->rent_style] : ''); ?></td>
                                    <td><?php echo e($value->rent_navigable_area); ?></td>
                                    <td><?php echo e($value->rent_price); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->rent_updated_at)->format('H:m - d/m/Y')); ?></td>
                                    <td>
                                      <?php if( $value->rent_status == 5 ): ?>
                                        <span class="badge bg-success">Mình cho thuê</span>
                                      <?php endif; ?>
                                      <?php if( $value->rent_status == 4 ): ?>
                                        <span class="badge bg-secondary">Họ cho thuê</span>
                                      <?php endif; ?>
                                    </td>
                                    <td>
                                      <a href="<?php echo e(route('admin.rent.edit', ['rent_id' => $value->rent_id, 'rent_status' => 2])); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square small"> Sửa</i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </tbody>
                    </table>


                  </div>

                </div>
              </div><!-- End owner -->

            </div>
          </div><!-- End Left side columns -->

        </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/rent/sold.blade.php ENDPATH**/ ?>