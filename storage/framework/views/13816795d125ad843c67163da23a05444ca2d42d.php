
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
        <h1>Danh sách bán đang giao dịch</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách bán đang giao dịch</li>
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
          <form class="row g-3" action="<?php echo e(route('admin.saletran.index')); ?>">
                <div class="col-md-2">
                    <label for="code" class="form-label-sm">Mã căn</label>
                    <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?php echo e(request()->code); ?>">
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
                    <p class="text-danger">Tổng số <b><?php echo e(count( $sale_transactions )); ?></b> bản ghi.</p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" class="small">MÃ CĂN</th>
                          <th scope="col" class="small">NGÀY ĐẶT CỌC</th>
                          <th scope="col" class="small">TIỀN ĐẶT CỌC</th>
                          <th scope="col" class="small">NGÀY KÝ HỢP ĐỒNG</th>
                          <th scope="col" class="small">NGƯỜI MÔ GIỚI</th>
                          <th scope="col" class="small">GIÁ</th>
                          <th scope="col" class="small">NGƯỜI LÀM PHÁP LÝ</th>
                          <th scope="col" class="small">HỢP ĐỒNG</th>
                          <th scope="col" class="small">TRẠNG THÁI</th>
                          <th scope="col" class="small">HÀNH ĐỘNG</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if( !empty( $sale_transactions ) ): ?>
                            <?php $__currentLoopData = $sale_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($value->code); ?></th>
                                    <td><?php echo e($value->sale_deposit_date); ?></td>
                                    <td><?php echo e($value->sale_deposit); ?></td>
                                    <td><?php echo e($value->sale_contract_date); ?></td>
                                    <td><?php echo e($value->sale_broker); ?></td>
                                    <td><?php echo e($value->sale_price); ?></td>
                                    <td><?php echo e($value->sale_legal_person); ?></td>
                                    <?php if( !empty( $value->sale_contract_img ) ): ?>
                                      <td><a href="<?php echo e(asset($value->sale_contract_img)); ?>" target="_blank" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Xem</a></td>
                                    <?php else: ?>
                                      <td>Chưa có</td>
                                    <?php endif; ?>
                                    <td style="min-width: 120px;">
                                        <select class="form-control form-control-sm sale-status-slb">
                                            <option value="0">Giao dịch</option>
                                            <option <?php echo e($value->sale_status == 1 ? 'selected' : ''); ?> value="<?php echo e(route('admin.sale.status', ['sale_id' => $value->sale_id, 'sale_status'=> 5])); ?>" >Mình đã bán</option>
                                            <option <?php echo e($value->sale_status == 2 ? 'selected' : ''); ?> value="<?php echo e(route('admin.sale.status', ['sale_id' => $value->sale_id, 'sale_status'=> 4])); ?>">Họ đã bán</option>
                                        </select>
                                    </td>
                                    <td>
                                      <a href="<?php echo e(route('admin.saletran.edit', $value->sale_id)); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square small"> Sửa</i></a>
                                      <a onclick="return confirm('Bạn có muốn dữ liệu không?')" href="<?php echo e(route('admin.sale.delete', $value->sale_id)); ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash small"> Xóa</i></a>
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

<?php $__env->startSection('admin.script'); ?>
  <script>
      let ownerUpdate = document.querySelectorAll('.sale-status-slb');
        ownerUpdate.forEach( slb => {
            slb.addEventListener('change', () => {
              if( slb.value !== 0 ){
                document.getElementById("modal__loading").style.display = "block";
                window.location.href = slb.value
              } 
            }) 
        })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/saletran/index.blade.php ENDPATH**/ ?>