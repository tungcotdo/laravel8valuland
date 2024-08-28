
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
        <h1>Danh sách thuê tinh</h1>
        <nav>
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách thuê tinh</li>
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
            <form class="row g-3" action="<?php echo e(route('admin.rent.select')); ?>">
                <div class="col-md-2">
                  <label for="rent_building" class="form-label-sm">Tòa</label>
                  <input type="text" class="form-control form-control-sm" id="rent_building" name="rent_building" value="<?php echo e(request()->rent_building); ?>">
                </div>
                <div class="col-md-2">
                  <label for="rent_floor" class="form-label-sm">Tầng</label>
                  <input type="text" class="form-control form-control-sm" id="rent_floor" name="rent_floor" value="<?php echo e(request()->rent_floor); ?>">
                </div>
                <div class="col-md-2 validate">
                  <label for="code" class="form-label-sm">Căn</label>
                  <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?php echo e(request()->code); ?>">
                  <small class="error-message text-danger"></small>
                </div>
                <div class="col-md-2">
                  <label for="rent_style" class="form-label-sm">Loại căn hộ</label>
                  <select class="form-control form-control-sm" id="rent_style" name="rent_style">
                    <?php if( !empty( $house->_STYLE ) ): ?>
                      <?php $__currentLoopData = $house->_STYLE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value); ?>" <?php echo e($value == request()->rent_style ? 'selected' : ''); ?>><?php echo e($text); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="rent_direction" class="form-label-sm">Hướng</label>
                  <select class="form-control form-control-sm" id="rent_direction" name="rent_direction">
                    <?php if( !empty( $house->_DIRECTION ) ): ?>
                      <?php $__currentLoopData = $house->_DIRECTION; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value); ?>" <?php echo e($value == request()->rent_direction ? 'selected' : ''); ?>><?php echo e($text); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="col-12">
                    <button class="btn btn-sm btn-secondary" type="submit">Áp dụng lọc</button>
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

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" class="small">MÃ CĂN</th>
                          <th scope="col" class="small">LOẠI CĂN HỘ</th>
                          <th scope="col" class="small">DIỆN TÍCH</th>
                          <th scope="col" class="small">HƯỚNG</th>
                          <th scope="col" class="small">GIÁ</th>
                          <th scope="col" class="small">CẬP NHẬT LÚC</th>
                          <th scope="col" class="small">HÀNH ĐỘNG</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if( !empty( $rent_selects ) ): ?>
                            <?php $__currentLoopData = $rent_selects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($value->rent_building); ?>.<?php echo e($value->rent_floor); ?><?php echo e($value->code); ?></th>
                                    <td><?php echo e(( !empty( $house->_STYLE[$value->rent_style] ) ) ? $house->_STYLE[$value->rent_style] : ''); ?></td>
                                    <td><?php echo e($value->rent_navigable_area); ?></td>
                                    <td><?php echo e($value->rent_navigable_area); ?></td>
                                    <td><?php echo e($value->rent_price); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->rent_updated_at)->format('H:m - d/m/Y')); ?></td>
                                    <td>
                                      <a href="<?php echo e(route('admin.rent.status', ['rent_id' => $value->rent_id, 'rent_status'=> 3])); ?>" class="btn btn-sm btn-success"><i class="bi bi-cursor small"> Giao dịch</i></a>
                                      <a href="<?php echo e(route('admin.rent.edit', ['rent_id' => $value->rent_id, 'rent_status' => 2])); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square small"> Sửa</i></a>
                                      <a href="<?php echo e(route('admin.rent.status', ['rent_id' => $value->rent_id, 'rent_status'=> 4])); ?>" class="btn btn-sm btn-secondary"><i class="bi bi-eye-fill small"> Đã thuê</i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </tbody>
                    </table>


                  </div>

                </div>
              </div><!-- End owner -->
              <nav class="mt-3" aria-label="...">
                <ul class="pagination pagination-sm">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Lùi</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Tiến</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div><!-- End Left side columns -->

        </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/rent/select.blade.php ENDPATH**/ ?>