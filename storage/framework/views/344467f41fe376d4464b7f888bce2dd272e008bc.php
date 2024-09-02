
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
        <h1>Danh sách đã bán</h1>
        <nav>
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách đã bán</li>
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
            <form class="row g-3" action="<?php echo e(route('admin.sale.sold')); ?>">
                <div class="col-md-2 validate">
                    <label for="code" class="form-label-sm">Mã căn</label>
                    <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?php echo e(request()->code); ?>">
                    <small class="error-message text-danger"></small>
                </div>
                <div class="col-md-2 validate">
                    <label for="sale_style" class="form-label-sm">Loại căn hộ</label>
                    <select class="form-control form-control-sm" id="sale_style" name="sale_style">
                      <option value="0">--Chọn--</option>
                      <?php if( !empty( $house->_STYLE ) ): ?>
                        <?php $__currentLoopData = $house->_STYLE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($value); ?>" <?php echo e($value == request()->sale_style ? 'selected' : ''); ?>><?php echo e($text); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>
                    <small class="error-message text-danger"></small>
                </div>
                <div class="col-md-2 validate">
                    <label for="sale_status" class="form-label-sm">Trạng thái</label>
                    <select id="sale_status" class="form-control form-control-sm" name="sale_status">
                        <option value="0">--Chọn--</option>
                        <option <?php echo e(request()->sale_status == 5 ? 'selected' : ''); ?> value="5" >Mình đã bán</option>
                        <option <?php echo e(request()->sale_status == 4 ? 'selected' : ''); ?> value="4">Họ đã bán</option>
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

              <!-- Start sale -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body">

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
                        <?php if( !empty( $sale_solds ) ): ?>
                            <?php $__currentLoopData = $sale_solds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($value->sale_building); ?>.<?php echo e($value->sale_floor); ?><?php echo e($value->code); ?></th>
                                    <td><?php echo e($value->sale_navigable_area); ?></td>
                                    <td><?php echo e($value->sale_room); ?></td>
                                    <td><?php echo e(( !empty( $house->_STYLE[$value->sale_style] ) ) ? $house->_STYLE[$value->sale_style] : ''); ?></td>
                                    <td><?php echo e($value->sale_navigable_area); ?></td>
                                    <td><?php echo e($value->sale_price); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->sale_updated_at)->format('H:m - d/m/Y')); ?></td>
                                    <td>
                                      <?php if( $value->sale_status == 5 ): ?>
                                        <span class="badge bg-success">Mình đã bán</span>
                                      <?php endif; ?>
                                      <?php if( $value->sale_status == 4 ): ?>
                                        <span class="badge bg-secondary">Họ đã bán</span>
                                      <?php endif; ?>
                                    </td>
                                    <td>
                                      <a href="<?php echo e(route('admin.sale.edit', ['sale_id' => $value->sale_id, 'sale_status' => 2])); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square small"> Sửa</i></a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/sale/sold.blade.php ENDPATH**/ ?>