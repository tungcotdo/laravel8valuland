
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
        <h1>Danh sách bán sơ</h1>
        <nav>
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách bán sơ</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section mt-3">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <!-- Start sale -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <p class="text-danger">Tổng số <b><?php echo e(count( $sale_raws )); ?></b> bản ghi.</p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" class="small">MÃ CĂN</th>
                          <th scope="col" class="small">TÊN</th>
                          <th scope="col" class="small">ĐIÊN THOẠI</th>
                          <th scope="col" class="small">THỜI GIAN CẬP NHẬT</th>
                          <th scope="col" class="small">HÀNH ĐỘNG</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if( !empty( $sale_raws ) ): ?>
                            <?php $__currentLoopData = $sale_raws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($value->code); ?></th>
                                    <td><?php echo e($value->owner_name); ?></td>
                                    <td><?php echo e($value->owner_phone); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->sale_updated_at)->format('H:m - d/m/Y')); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.sale.edit', ['sale_id' => $value->sale_id, 'sale_status' => 1])); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square small"> Sửa</i></a>
                                        <a onclick="return confirm('Bạn có muốn xóa hết dữ liệu không?')" href="<?php echo e(route('admin.sale.delete', $value->sale_id)); ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash small"> Xóa</i></a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/sale/raw.blade.php ENDPATH**/ ?>