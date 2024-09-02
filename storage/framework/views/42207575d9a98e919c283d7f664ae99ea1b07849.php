
<?php $__env->startSection('admin.main'); ?>
<div class="pagetitle">
  <h1>Danh sách chủ nhà</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
      <li class="breadcrumb-item"><a href="<?php echo e(route('admin.owner.index')); ?>">Chủ nhà</a></li>
      <li class="breadcrumb-item active">Danh sách</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card-btns">
  <a href="<?php echo e(route('admin.owner.form-upload-excel')); ?>" class="btn btn-sm btn-success"><i class="bi bi-upload"></i> Tải file excel</a>
  <a href="<?php echo e(route('admin.owner.add')); ?>" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Thêm mới</a>
  <a href="<?php echo e(route('admin.owner.arrange')); ?>" class="btn btn-sm btn-warning"><i class="bi bi-arrow-repeat"></i> Sắp xếp</a>
  <a href="<?php echo e(route('admin.owner.truncate')); ?>" onclick="return confirm('Bạn có muốn xóa hết dữ liệu không?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Xóa dữ liệu</a>
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
        <form class="row g-3" action="<?php echo e(route('admin.owner.index')); ?>">
            <div class="col-md-2 validate">
                <label for="code" class="form-label form-label-sm">Mã căn</label>
                <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?php echo e(request()->code); ?>">
                <small class="error-message text-danger"></small>
            </div>
            <div class="col-md-2 validate">
                <label for="owner_name" class="form-label form-label-sm">Tên</label>
                <input type="text" class="form-control form-control-sm" id="owner_name" name="owner_name" value="<?php echo e(request()->owner_name); ?>">
                <small class="error-message text-danger"></small>
            </div>
            <div class="col-md-2 validate">
                <label for="owner_phone" class="form-label form-label-sm">Điện thoại</label>
                <input type="text" class="form-control form-control-sm" id="owner_phone" name="owner_phone" value="<?php echo e(request()->owner_phone); ?>">
                <small class="error-message text-danger"></small>
            </div>
            <div class="col-md-2">
                <label for="owner_demand" class="form-label form-label-sm">Nhu cầu</label>
                <select id="owner_demand" class="form-select form-select-sm w-100" name="owner_demand">
                    <option value="0">Không có</option>
                    <option value="1" <?php echo e(request()->owner_demand == 1 ? 'selected' : ''); ?>>Bán</option>
                    <option value="2" <?php echo e(request()->owner_demand == 2 ? 'selected' : ''); ?>>Thuê</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="owner_telesale" class="form-label form-label-sm">Telesale</label>
                <select id="owner_telesale" class="form-select form-select-sm w-100" name="owner_telesale">
                    <option value="0">Không có</option>
                    <?php if( !empty( $telesales ) ): ?>
                      <?php $__currentLoopData = $telesales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>"  <?php echo e(request()->owner_telesale == $value->id ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-md-2 search-group">
                <button class="btn btn-sm btn-secondary search-group-btn" type="submit">Áp dụng lọc</button>
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

        <!-- Start owner -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <p class="text-danger">Tổng số <b><?php echo e(count( $owners )); ?></b> bản ghi.</p>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="small">MÃ CĂN</th>
                    <th scope="col" class="small">TÊN</th>
                    <th scope="col" class="small">ĐIỆN THOẠI</th>
                    <th scope="col" class="small">NHU CẦU</th>
                    <th scope="col" class="small">TELESALE</th>
                    <th scope="col" class="small">HÀNH ĐỘNG</th>
                  </tr>
                </thead>
                <tbody>
                    
                    <?php $__currentLoopData = $owners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value->code); ?></td>
                            <td style="max-width: 200px; overflow-x: auto;"><?php echo e($value->owner_name); ?></td>
                            <td style="max-width: 200px; overflow-x: auto;"><?php echo e($value->owner_phone); ?></td>
                            
                            <td style="min-width: 100px;">
                                <select class="form-control form-control-sm owner-demand-slb">
                                    <option value="0">Không có</option>
                                    <option <?php echo e($value->owner_demand == 1 ? 'selected' : ''); ?> value="<?php echo e(route('admin.owner.update-demand', [$value->owner_id, 1])); ?>" >Bán</option>
                                    <option <?php echo e($value->owner_demand == 2 ? 'selected' : ''); ?> value="<?php echo e(route('admin.owner.update-demand', [$value->owner_id, 2])); ?>">Thuê</option>
                                </select>
                            </td>

                            <td style="max-width: fit-content; overflow-x: auto;">
                              <select class="form-control form-control-sm owner-telesale-slb">
                                <option value="<?php echo e(route('admin.owner.update-telesale', ['owner_id' => $value->owner_id, 'user_id' => 0])); ?>">Không có</option>
                                <?php if( !empty( $telesales ) ): ?>
                                  <?php $__currentLoopData = $telesales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $telesale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(route('admin.owner.update-telesale', ['owner_id' => $value->owner_id, 'user_id' => $telesale->id])); ?>" <?php echo e($value->user_id == $telesale->id ? 'selected' : ''); ?>><?php echo e($telesale->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
                            </td>

                            <td>
                                <a href="<?php echo e(route('admin.owner.edit', $value->owner_id)); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square small"> Sửa</i></a>
                                <a href="<?php echo e(route('admin.owner.delete', $value->owner_id)); ?>" onclick="return confirm('Bạn có muốn xóa dữ liệu này không?')" class="btn btn-sm btn-danger"><i class="bi bi-trash small"> Xóa</i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
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
      let ownerUpdate = document.querySelectorAll('.owner-demand-slb, .owner-telesale-slb');
        ownerUpdate.forEach( slb => {
            if( slb.value !== 0 ){
                slb.addEventListener('change', () => {
                    document.getElementById("modal__loading").style.display = "block";
                    window.location.href = slb.value
                }) 
            }   
        })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/owner/index.blade.php ENDPATH**/ ?>