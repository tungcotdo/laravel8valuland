
<?php $__env->startSection('admin.main'); ?>
<div class="pagetitle">
      <h1>Danh sách hợp đồng</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.contract.index')); ?>">Hợp đồng</a></li>
          <li class="breadcrumb-item active">Danh sách</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Start contract -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">

                  <div class="card-btns">
                    <a href="<?php echo e(route('admin.contract.add')); ?>" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Thêm mới</a>
                  </div>

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php if( !empty( $contracts ) ): ?>
                            <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="row"><?php echo e($value->contract_id); ?></td>
                                <td><?php echo e($value->contract_title); ?></td>
                                <td><?php echo e($value->contract_description); ?></td>
                                <td>
                                    <a href="<?php echo e(asset($value->contract_path)); ?>" target="_blank" class="btn btn-sm btn-info"><i class="bi bi-folder2-open"></i> File</a>
                                    <a href="<?php echo e(route('admin.contract.edit', $value->contract_id)); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Sửa</a>
                                    <a onclick="return confirm('Bạn có muốn xóa dữ liệu này không?')" href="<?php echo e(route('admin.contract.delete', $value->contract_id)); ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Xóa</a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/contract/index.blade.php ENDPATH**/ ?>