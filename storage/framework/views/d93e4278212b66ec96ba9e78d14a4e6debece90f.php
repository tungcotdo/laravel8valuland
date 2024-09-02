
<?php $__env->startSection('admin.main'); ?>
        <div class="pagetitle">
            <h1>Thống kê số liệu</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thống kê</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <?php if( $_authorization('admin', 'dashboard', 'index', true) ): ?>
            <section class="section dashboard" id="dashboard">
                <div class="row">
                    <div class="col-lg-12" method="POST">
                        <div class="row">
                            <!-- Sales Card -->
                            <div class="col-xxl-3 col-md-3 mb-3 mb-md-0">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Căn đang bán</h5>
                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-box-arrow-up"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?php echo e($saleNumber); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Sales Card -->

                            <!-- Sales Card -->
                            <div class="col-xxl-3 col-md-3 mb-3 mb-md-0">
                                <div class="card info-card sales-card">

                                    <div class="card-body">
                                    <h5 class="card-title">Căn cho thuê</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-arrow-left-right"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo e($rentNumber); ?></h6>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->

                            <!-- Sales Card -->
                            <div class="col-xxl-3 col-md-3 mb-3 mb-md-0">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                    <h5 class="card-title">Căn giao dịch</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-percent"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo e($saletranNumber + $rentranNumber); ?></h6>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->

                            <!-- Sales Card -->
                            <div class="col-xxl-3 col-md-3">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Doanh thu <span>| Tháng này</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                            </div>
                                            <div class="ps-3">
                                            <h6><?php echo e($saleRevenueNumber + $rentRevenueNumber); ?> tỷ</h6>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->
                        </div>
                    </div>

                    <!-- Left side columns -->
                    <div class="col-lg-8 mt-4">
                        <div class="row">
                            <!-- Top sale -->
                            <div class="col-12">
                            <section class="section">
                                <div class="card">
                                    <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="sale-raw-tab" data-bs-toggle="tab" data-bs-target="#sale-raw" type="button" role="tab" aria-controls="sale-raw" aria-selected="true">Bán sơ</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sale-select-tab" data-bs-toggle="tab" data-bs-target="#sale-select" type="button" role="tab" aria-controls="sale-select" aria-selected="false">Bán tinh</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="sale-raw" role="tabpanel" aria-labelledby="sale-raw-tab">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="small">MÃ CĂN</th>
                                                <th scope="col" class="small">CẬP NHẬT BỞI</th>
                                                <th scope="col" class="small">THỜI GIAN CẬP NHẬT</th>
                                                <th scope="col" class="small">HÀNH ĐỘNG</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( !empty( $saleRaws ) ): ?>
                                                    <?php $__currentLoopData = $saleRaws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th scope="row"><?php echo e($value->code); ?></th>
                                                            <td><?php echo e($value->sale_updated_by); ?></td>
                                                            <td><?php echo e($value->sale_updated_at); ?></td>
                                                            <td>
                                                            <a href="<?php echo e(route('admin.sale.edit', ['sale_id' => $value->sale_id, 'sale_status' => $value->sale_status])); ?>" class="btn btn-sm btn-info"><i class="bi bi-eye small"> Xem chi tiết</i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="tab-pane fade" id="sale-select" role="tabpanel" aria-labelledby="sale-select-tab">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="small">MÃ CĂN</th>
                                                <th scope="col" class="small">GIÁ</th>
                                                <th scope="col" class="small">DT_TT(M2)</th>
                                                <th scope="col" class="small">LOẠI CĂN</th>
                                                <th scope="col" class="small">CẬP NHẬT BỞI</th>
                                                <th scope="col" class="small">THỜI GIAN CẬP NHẬT</th>
                                                <th scope="col" class="small">HÀNH ĐỘNG</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( !empty( $saleSelects ) ): ?>
                                                    <?php $__currentLoopData = $saleSelects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th scope="row"><?php echo e($value->code); ?></th>
                                                            <td><?php echo e($value->sale_price); ?></td>
                                                            <td><?php echo e($value->sale_navigable_area); ?></td>
                                                            <td><?php echo e($value->sale_style); ?></td>
                                                            <td><?php echo e($value->sale_updated_by); ?></td>
                                                            <td><?php echo e($value->sale_updated_at); ?></td>
                                                            <td>
                                                                <a href="<?php echo e(route('admin.sale.edit', ['sale_id' => $value->sale_id, 'sale_status' => $value->sale_status])); ?>" class="btn btn-sm btn-info"><i class="bi bi-eye small"> Xem chi tiết</i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </section>
                            </div><!-- End Top sale -->

                            <!-- Top rent -->
                            <div class="col-12 mt-4">
                            <section class="section">
                                <div class="card">
                                    <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="rent-raw-tab" data-bs-toggle="tab" data-bs-target="#rent-raw" type="button" role="tab" aria-controls="rent-raw" aria-selected="true">Thuê sơ</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="rent-select-tab" data-bs-toggle="tab" data-bs-target="#rent-select" type="button" role="tab" aria-controls="rent-select" aria-selected="false">Thuê tinh</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="rent-raw" role="tabpanel" aria-labelledby="rent-raw-tab">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="small">MÃ CĂN</th>
                                                <th scope="col" class="small">CẬP NHẬT BỞI</th>
                                                <th scope="col" class="small">THỜI GIAN CẬP NHẬT</th>
                                                <th scope="col" class="small">HÀNH ĐỘNG</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( !empty( $rentRaws ) ): ?>
                                                    <?php $__currentLoopData = $rentRaws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th scope="row"><?php echo e($value->code); ?></th>
                                                            <td><?php echo e($value->rent_updated_by); ?></td>
                                                            <td><?php echo e($value->rent_updated_at); ?></td>
                                                            <td>
                                                            <a href="<?php echo e(route('admin.rent.edit', ['rent_id' => $value->rent_id, 'rent_status' => $value->rent_status])); ?>" class="btn btn-sm btn-info"><i class="bi bi-eye small"> Xem chi tiết</i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="tab-pane fade" id="rent-select" role="tabpanel" aria-labelledby="rent-select-tab">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="small">MÃ CĂN</th>
                                                <th scope="col" class="small">GIÁ</th>
                                                <th scope="col" class="small">DT_TT(M2)</th>
                                                <th scope="col" class="small">LOẠI CĂN</th>
                                                <th scope="col" class="small">CẬP NHẬT BỞI</th>
                                                <th scope="col" class="small">THỜI GIAN CẬP NHẬT</th>
                                                <th scope="col" class="small">HÀNH ĐỘNG</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( !empty( $rentSelects ) ): ?>
                                                    <?php $__currentLoopData = $rentSelects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th scope="row"><?php echo e($value->code); ?></th>
                                                            <td><?php echo e($value->rent_price); ?></td>
                                                            <td><?php echo e($value->rent_navigable_area); ?></td>
                                                            <td><?php echo e($value->rent_style); ?></td>
                                                            <td><?php echo e($value->rent_updated_by); ?></td>
                                                            <td><?php echo e($value->rent_updated_at); ?></td>
                                                            <td>
                                                                <a href="<?php echo e(route('admin.rent.edit', ['rent_id' => $value->rent_id, 'rent_status' => $value->rent_status])); ?>" class="btn btn-sm btn-info"><i class="bi bi-eye small"> Xem chi tiết</i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </section>
                            </div><!-- End Top rent -->

                        </div>
                    </div><!-- End Left side columns -->

                    <!-- Right side columns -->
                    <div class="col-lg-4 mt-4">
                    <!-- Recent Activity -->
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Vừa thông báo</h5>
                            <div class="activity">
                                <?php if( !empty( $notifications ) ): ?>
                                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="activity-item mb-4">
                                        <b><?php echo e($value->notification_title); ?></b> <?php echo e($value->notification_content); ?> <br>
                                        <small class="text-secondary"><?php echo e(\Carbon\Carbon::parse($value->notification_updated_at)->diffForHumans()); ?></small>
                                    </div><!-- End activity item-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div><!-- End Recent Activity -->
                    </div><!-- End Right side columns -->

                </div>
            </section>
            <input type="hidden" value="<?php echo e(route('admin.dashboard.render')); ?>" id="dashboard-render-url">
        <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin.script'); ?>
  <script>
    // Define API
    async function fetchAPI(url, formData) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle successful response from the server
                    let result = JSON.parse(xhr.response);
                    document.getElementById("dashboard").innerHTML = result.template;

                } else {
                    // Handle error response from the server
                    console.error('Failed to upload files.');
                }
            }
        };
        xhr.send(formData);
    }

    setInterval(function(){
        // Load IMG data
        const formData = new FormData();
        formData.append("_token", document.querySelector("#csrf-token").content);
        fetchAPI(document.getElementById('dashboard-render-url').value, formData);

    }, 5000);

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>