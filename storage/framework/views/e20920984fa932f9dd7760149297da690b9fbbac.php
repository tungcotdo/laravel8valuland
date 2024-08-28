
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
        <h1>Danh sách người dùng</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.user.index')); ?>">Người dùng</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      
      <div class="card-btns">
        <a href="<?php echo e(route('admin.user.add')); ?>" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Thêm mới</a>
      </div>

      <!-- Filter -->
      <div class="card">
        <div class="accordion-item p-3">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed py-2 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <i class="bi bi-filter-left"> Bộ lọc</i>
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse show mt-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
            <form class="row g-3">
            <div class="col-md-4">
            <label for="user_name" class="form-label small">Tên</label>
            <input type="text" class="form-control form-control-sm" id="user_name" name="user_name">
            </div>
            <div class="col-md-4">
            <label for="user_email" class="form-label small">Email</label>
            <input type="email" class="form-control form-control-sm" id="user_email" name="user_email">
            </div>
            <div class="col-md-4">
            <label for="user_phone" class="form-label small">Điện thoại</label>
            <input type="text" class="form-control form-control-sm" id="user_phone" name="user_phone">
            </div>

              <div class="col-12">
                <button class="btn btn-sm btn-secondary" type="submit">Áp dụng</button>
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
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php if( !empty( $users ) ): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($value->name); ?></td>
                                <td><?php echo e($value->email); ?></td>
                                <td><?php echo e($value->phone); ?></td>
                                <td><?php echo e($value->user_group_name); ?></td>
                                <td>
                                  <a href="<?php echo e(route('admin.user.edit', $value->id)); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Sửa</a>
                                  <a onclick="return confirm('Bạn có muốn xóa dữ liệu này không?')" href="<?php echo e(route('admin.user.delete', $value->id)); ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                  </table>
                </div>

              </div>
            </div><!-- End raw -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/user/index.blade.php ENDPATH**/ ?>