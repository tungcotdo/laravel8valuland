
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
      <h1>Form sửa dữ liệu bán đang giao dịch</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.saletran.index')); ?>">Dánh sách bán đang giao dịch</a></li>
          <li class="breadcrumb-item active">Sửa dữ liệu</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Start col-lg-12 -->
            <form class="col-lg-12" action="<?php echo e(route('admin.saletran.update', $sale->sale_id)); ?>" method="POST" id="admin-sale-transaction-update" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>  
              <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                      <div class="col-md-2 validate">
                        <label for="code" class="form-label-sm">Mã căn<small class="text-danger"> *</small></label>
                        <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?php echo e($sale->code); ?>">
                        <small class="error-message text-danger"></small>
                      </div>
                      <div class="col-md-2">
                        <label for="sale_price" class="form-label-sm">Giá</label>
                        <input type="text" class="form-control form-control-sm" id="sale_price" name="sale_price" value="<?php echo e($sale->sale_price); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="sale_deposit_date" class="form-label-sm">Ngày cọc</label>
                        <input type="text" class="form-control form-control-sm" id="sale_deposit_date" name="sale_deposit_date" value="<?php echo e($sale->sale_deposit_date); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="sale_deposit" class="form-label-sm">Tiền cọc</label>
                        <input type="text" class="form-control form-control-sm" id="sale_deposit" name="sale_deposit" value="<?php echo e($sale->sale_deposit); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="sale_contract_date" class="form-label-sm">Ngày ký hợp đồng</label>
                        <input type="text" class="form-control form-control-sm" id="sale_contract_date" name="sale_contract_date" value="<?php echo e($sale->sale_contract_date); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="sale_broker" class="form-label-sm">Người mô giới</label>
                        <input type="text" class="form-control form-control-sm" id="sale_broker" name="sale_broker" value="<?php echo e($sale->sale_broker); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="sale_legal_person" class="form-label-sm">Người pháp lý</label>
                        <input type="text" class="form-control form-control-sm" id="sale_legal_person" name="sale_legal_person" value="<?php echo e($sale->sale_legal_person); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="sale_contract_img" class="form-label-sm">Ảnh hợp đồng</label>
                        <input class="form-control form-control-sm" type="file" id="sale_contract_img" name="sale_contract_img">
                        <input class="form-control form-control-sm" type="text" id="sale_contract_img_text" name="sale_contract_img_text" value="<?php echo e(asset($sale->sale_contract_img)); ?>" hidden>
                        <?php if( !empty( $sale->sale_contract_img ) ): ?>
                          <div class="card mt-2 w-25">
                              <a href="<?php echo e(asset($sale->sale_contract_img)); ?>" class="card-img-link" target="_blank"><img class="card-img-top rounded-0" src="<?php echo e(asset($sale->sale_contract_img)); ?>" alt="Ảnh hợp đồng"></a>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-md-8">
                        <label for="sale_description" class="form-label-sm">Mô tả</label>
                        <textarea rows="4" class="form-control form-control-sm" name="sale_description" id="sale_description"><?php echo e($sale->sale_description); ?></textarea>
                      </div>
                    </div>
                </div> <!-- end card-body -->
              </div> <!-- end card -->
              <div class="text-center my-5">
                <button type="submit" class="btn btn-primary me-3">Lưu dữ liệu</button>
              </div>
            </form><!-- End col-lg-12 -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

    <?php $__env->startSection('admin.script'); ?>
    <script>
      Validator({
          form: '#admin-sale-transaction-update',
          rules: [
              Validator.tbRequired({
                  selector: '#code',
                  submit: true
              })
          ],
          onSubmit: (data) => {
              document.getElementById("modal__loading").style.display = "block";
              data.form.submit();
          }
      });
    </script>
    <?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/saletran/edit.blade.php ENDPATH**/ ?>