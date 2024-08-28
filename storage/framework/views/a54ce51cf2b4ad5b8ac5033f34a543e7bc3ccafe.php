
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
        <h1>Danh sách quyền</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.authorization.index')); ?>">Quyền</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      
      <div class="card-btns">
        <a href="<?php echo e(route('admin.authorization.add')); ?>" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Thêm mới</a>
      </div>

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
                        <th scope="col">Mô tả</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php if( !empty( $user_groups ) ): ?>
                            <?php $__currentLoopData = $user_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($value->user_group_name); ?></td>
                                <td><?php echo e($value->user_group_description); ?></td>
                                <td>
                                  <a href="<?php echo e(route('admin.authorization.edit', $value->user_group_id)); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Sửa</a>
                                  <a onclick="return confirm('Bạn có muốn xóa dữ liệu này không?')" href="<?php echo e(route('admin.authorization.delete', $value->user_group_id)); ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Xóa</a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/authorization/index.blade.php ENDPATH**/ ?>