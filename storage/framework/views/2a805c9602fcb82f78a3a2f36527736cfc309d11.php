
<?php $__env->startSection('admin.main'); ?>
<div class="pagetitle">
      <h1>Form thêm quyền truy cập</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.authorization.index')); ?>">Quyền truy cập</a></li>
          <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            
            <!-- Start raw -->
            <form class="col-12" action="<?php echo e(route('admin.authorization.store')); ?>" method="POST" id="admin-authorization-add">
              <?php echo csrf_field(); ?>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title py-0">Thông tin chung</h5>
                    <div class="row g-3">
                      <div class="col-md-6 validate">
                        <label for="user_group_name" class="form-label small">Tên</label>
                        <input type="text" class="form-control form-control-sm" id="user_group_name" name="user_group_name">
                        <small class="error-message text-danger"></small>
                      </div>
                      <div class="col-md-6">
                        <label for="user_group_description" class="form-label small">Mô tả</label>
                        <input type="text" class="form-control form-control-sm" id="user_group_description" name="user_group_description">
                      </div>
                      
                    </div>
                </div><!-- card-body -->
              </div><!-- card -->

              <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title py-0 mb-3">Chức năng</h5>
                    <div class="row">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Tên</th>
                          <th scope="col">Nhóm</th>
                          <th scope="col">Chọn</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php if( !empty( $functions ) ): ?>
                              <?php $__currentLoopData = $functions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td><?php echo e($value->function_name); ?></td>
                                  <td><?php echo e($value->function_group); ?></td>
                                  <td>
                                    <input type="checkbox" name="function_select[]" value="<?php echo e($value->function_id); ?>">
                                  </td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                      </tbody>
                    </table>
                    </div>
                </div><!-- card-body -->
              </div><!-- card -->

              <div class="text-center my-5">
                <button type="submit" class="btn btn-primary me-3">Lưu dữ liệu</button>
              </div>
            </form><!-- End raw -->

          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin.script'); ?>
  <script>
      Validator({
          form: '#admin-authorization-add',
          rules: [
              Validator.tbRequired({
                  selector: '#user_group_name',
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/authorization/add.blade.php ENDPATH**/ ?>