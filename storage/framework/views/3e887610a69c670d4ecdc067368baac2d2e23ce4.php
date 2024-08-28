
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
      <h1>Xem Thông báo</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.notification.index')); ?>">Thông báo</a></li>
          <li class="breadcrumb-item active">Xem</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- Start raw -->
          <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12">
                      <label for="notification_title" class="form-label">Thời gian gửi</label>
                      <input type="text" class="form-control" id="notification_title" name="notification_title" value="<?php echo e($notification->notification_updated_at); ?>" disabled>
                    </div>
                    <div class="col-md-12">
                      <label for="notification_title" class="form-label">Tiêu Đề</label>
                      <input type="text" class="form-control" id="notification_title" name="notification_title" value="<?php echo e($notification->notification_title); ?>" disabled>
                    </div>
                    <div class="col-md-12">
                      <label for="notification_content" class="form-label">Nội dung thông báo</label>
                      <textarea type="text" class="form-control" id="notification_content" name="notification_content" disabled><?php echo e($notification->notification_content); ?></textarea>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin.script'); ?>
  <script>
      Validator({
          form: '#admin-owner-store',
          rules: [
              Validator.tbRequired({
                  selector: '#notification_title',
                  submit: true
              }),
              Validator.tbRequired({
                  selector: '#notification_content',
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/notification/view.blade.php ENDPATH**/ ?>