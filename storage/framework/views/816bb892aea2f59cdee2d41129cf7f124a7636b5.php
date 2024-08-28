
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
      <h1>Form sửa dữ liệu thuê đang giao dịch</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.rentran.index')); ?>">Dánh sách thuê đang giao dịch</a></li>
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
            <form class="col-lg-12" action="<?php echo e(route('admin.rentran.index-update', $rent->rent_id)); ?>" method="POST" id="admin-rent-transaction-update" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>  
              <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                      <div class="col-md-2 validate">
                        <label for="code" class="form-label-sm">Mã căn<small class="text-danger"> *</small></label>
                        <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?php echo e($rent->code); ?>">
                        <small class="error-message text-danger"></small>
                      </div>
                      <div class="col-md-2">
                        <label for="rent_price" class="form-label-sm">Giá</label>
                        <input type="text" class="form-control form-control-sm" id="rent_price" name="rent_price" value="<?php echo e($rent->rent_price); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="rent_deposit_date" class="form-label-sm">Ngày cọc</label>
                        <input type="text" class="form-control form-control-sm" id="rent_deposit_date" name="rent_deposit_date" value="<?php echo e($rent->rent_deposit_date); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="rent_deposit" class="form-label-sm">Tiền cọc</label>
                        <input type="text" class="form-control form-control-sm" id="rent_deposit" name="rent_deposit" value="<?php echo e($rent->rent_deposit); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="rent_contract_date" class="form-label-sm">Ngày ký hợp đồng</label>
                        <input type="text" class="form-control form-control-sm" id="rent_contract_date" name="rent_contract_date" value="<?php echo e($rent->rent_contract_date); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="rent_broker" class="form-label-sm">Người mô giới</label>
                        <input type="text" class="form-control form-control-sm" id="rent_broker" name="rent_broker" value="<?php echo e($rent->rent_broker); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="rent_start_date" class="form-label-sm">Ngày bắt đầu</label>
                        <input type="text" class="form-control form-control-sm" id="rent_start_date" name="rent_start_date" value="<?php echo e($rent->rent_start_date); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="rent_end_date" class="form-label-sm">Ngày kết thúc</label>
                        <input type="text" class="form-control form-control-sm" id="rent_end_date" name="rent_end_date" value="<?php echo e($rent->rent_end_date); ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="rent_contract_img" class="form-label-sm">Ảnh hợp đồng</label>
                        <input class="form-control form-control-sm" type="file" id="rent_contract_img" name="rent_contract_img">
                        <input class="form-control form-control-sm" type="text" id="rent_contract_img_text" name="rent_contract_img_text" value="<?php echo e(asset($rent->rent_contract_img)); ?>" hidden>
                        <?php if( !empty( $rent->rent_contract_img ) ): ?>
                          <div class="card mt-2 w-25">
                              <a href="<?php echo e(asset($rent->rent_contract_img)); ?>" class="card-img-link" target="_blank"><img class="card-img-top rounded-0" src="<?php echo e(asset($rent->rent_contract_img)); ?>" alt="Ảnh hợp đồng"></a>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-md-8">
                        <label for="rent_description" class="form-label-sm">Mô tả</label>
                        <textarea rows="4" class="form-control form-control-sm" name="rent_description" id="rent_description"><?php echo e($rent->rent_description); ?></textarea>
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
          form: '#admin-rent-transaction-update',
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/rent/edit-transaction.blade.php ENDPATH**/ ?>