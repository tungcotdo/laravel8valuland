
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
      <h1>Thông báo hạn thuê nhà</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.notification.index')); ?>">Thông báo</a></li>
          <li class="breadcrumb-item active">Hạn thuê nhà</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- Start raw -->
        <form class="col-12" action="<?php echo e(route('admin.setting.update')); ?>" id="admin-notification-term" method="POST">
          <?php echo csrf_field(); ?>
          <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12 validate">
                      <label for="rent_deadline_date" class="form-label">Thông báo trước (Ngày)</label>
                      <input type="number" class="form-control" id="rent_deadline_date" name="rent_deadline_date" value="<?php echo e($setting->value); ?>">
                      <small class="error-message text-danger"></small>
                    </div>
                </div>
            </div>
          </div>
          <div class="mt-4 d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary mx-3">Lưu dữ liệu</button>
          </div>
        </form><!-- End raw -->
      </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin.script'); ?>
  <script>
      Validator({
          form: '#admin-notification-term',
          rules: [
              Validator.tbRequired({
                  selector: '#rent_deadline_date',
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/notification/term.blade.php ENDPATH**/ ?>