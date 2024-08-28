
<?php $__env->startSection('admin.main'); ?>
<div class="pagetitle">
      <h1>Form thêm hợp đồng</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.contract.index')); ?>">Hợp đồng</a></li>
          <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- Start raw -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <form class="row g-3" action="<?php echo e(route('admin.contract.store')); ?>" method="POST" id="admin-contract-add" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>    
                    <div class="col-md-4 validate">
                      <label for="contract_title" class="form-label">Tiêu Đề</label>
                      <input type="text" class="form-control" id="contract_title" name="contract_title">
                      <small class="error-message text-danger"></small>
                    </div>
                    <div class="col-md-4">
                      <label for="contract_description" class="form-label">Mô tả</label>
                      <input type="text" class="form-control" id="contract_description" name="contract_description">
                    </div>
                    <div class="col-md-4">
                      <label for="contract_file" class="form-label">File</label>
                      <input class="form-control" type="file" id="contract_file" name="contract_file">
                    </div>
                    <div class="text-center mt-4">
                      <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    </div>
                </form>
            </div>

          </div>
        </div><!-- End raw -->
      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin.script'); ?>
  <script>
      Validator({
          form: '#admin-contract-add',
          rules: [
              Validator.tbRequired({
                  selector: '#contract_title',
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/contract/add.blade.php ENDPATH**/ ?>