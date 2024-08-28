
<?php $__env->startSection('admin.main'); ?>
  

    <div class="pagetitle">
      <h1>Form tải file excel danh sách chủ nhà</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.owner.index')); ?>">Chủ nhà</a></li>
          <li class="breadcrumb-item active">Tải file excel</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Start owner -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.owner.upload-excel')); ?>" id="form-upload-excel" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>    
                    <div class="row">
                            <div class="col-auto">
                                <label for="inputNumber" class="col-form-label">File excel</label>
                                <a href="<?php echo e(asset('admin/doc/owner-template-upload.xlsx')); ?>"> (tải mẫu)</a>
                            </div>
                            <div class="col-auto validate">
                                <input class="form-control form-control-sm" type="file" name="owner_upload_excel" id="owner_upload_excel">
                                <small class="error-message text-danger"></small>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary mt-3 mt-md-0">Tải file</button>
                            </div>
                        </div>
                    </form>
                </div>

              </div>
            </div><!-- End owner -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin.script'); ?>
  <script>
      Validator({
          form: '#form-upload-excel',
          rules: [
              Validator.file({
                  required: true,
                  selector: '#owner_upload_excel',
                  extension: ['xlsx'],
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/owner/upload-excel.blade.php ENDPATH**/ ?>