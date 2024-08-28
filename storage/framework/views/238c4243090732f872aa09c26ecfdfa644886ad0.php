<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PAYMENT ONLINE</title>
  <meta name="description">
  <meta name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/boxicons/css/boxicons.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/quill/quill.snow.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/quill/quill.bubble.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/remixicon/remixicon.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/simple-datatables/style.css')); ?>">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo-transparent.png" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo e(Auth::user()->name); ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            
            <li class="dropdown-header">
              <h6><?php echo e(Auth::user()->name); ?></h6>
              <span><?php echo e(Auth::user()->email); ?></span>
            </li>
            
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a 
                class="dropdown-item d-flex align-items-center" 
                href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
              >
                <i class="bi bi-box-arrow-right"></i>
                <span><?php echo e(__('Logout')); ?></span>
              </a>

              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                  <?php echo csrf_field(); ?>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="scholarship-index.html">
          <i class="bi bi-layout-text-window-reverse"></i><span>PAYMENT ONLINE</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo e(route('admin.payment_transaction.index')); ?>" class="active">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>PAYMENT ONLINE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item">PAYMENT ONLINE</li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <!-- Card filter -->
          <div class="card mb-0">
            <div class="card-body">
              <!-- Browser Default Validation -->
              <form class="row g-2 mt-1" action="<?php echo e(route('admin.payment_transaction.index')); ?>">
                
                <div class="col-md-2">
                  <label class="form-label-sm">Order code</label>
                  <input type="text" class="form-control form-control-sm" name="txt_order_code" value="<?php echo e(!empty( $_GET['txt_order_code'] ) ? $_GET['txt_order_code'] : ''); ?>">
                </div>
                <div class="col-md-2">
                  <label class="form-label-sm">Payment for</label>
                  <input type="text" class="form-control form-control-sm" name="txt_payment_for" value="<?php echo e(!empty( $_GET['txt_payment_for'] ) ? $_GET['txt_payment_for'] : ''); ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label-sm">Payment method</label>
                    <input type="text" class="form-control form-control-sm" name="txt_payment_method" value="<?php echo e(!empty( $_GET['txt_payment_method'] ) ? $_GET['txt_payment_method'] : ''); ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label-sm">Student ID</label>
                    <input type="text" class="form-control form-control-sm" name="txt_student_id" value="<?php echo e(!empty( $_GET['txt_student_id'] ) ? $_GET['txt_student_id'] : ''); ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label-sm">Student name</label>
                    <input type="text" class="form-control form-control-sm" name="txt_student_name" value="<?php echo e(!empty( $_GET['txt_student_name'] ) ? $_GET['txt_student_name'] : ''); ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label-sm">Status</label>
                    <input type="text" class="form-control form-control-sm" name="txt_status" value="<?php echo e(!empty( $_GET['txt_status'] ) ? $_GET['txt_status'] : ''); ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label-sm">Created on</label>
                    <input type="text" class="form-control form-control-sm" name="txt_created_on" value="<?php echo e(!empty( $_GET['txt_created_on'] ) ? $_GET['txt_created_on'] : ''); ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label-sm">to</label>
                    <input type="text" class="form-control form-control-sm" name="txt_to" value="<?php echo e(!empty( $_GET['txt_to'] ) ? $_GET['txt_to'] : ''); ?>">
                </div>
                <div class="col-12">
                    <button class="btn btn-secondary btn-sm" type="submit"><i class="bi bi-search"></i> Filter</button>
                </div>
              </form>
              <!-- End Browser Default Validation -->
            </div>
          </div><!-- End Card filter -->

          <!-- Button -->
          <div class="row my-2">
            <div class="col-md-12 text-end">
                <a class="btn btn-success btn-sm" href="<?php echo e(route('admin.payment_transaction.index', array_merge( $parameter,  ['export' => 1]) )); ?>"><i class="bi bi-file-earmark-excel"></i> Export</a>
            </div>
          </div>

          <div class="card">
            <div class="card-body p-3">

                <!-- Table with stripped rows -->
                <table class="table table-bordered payment-online__table">
                    <thead>
                        <tr>
                          <th scope="col">Student ID</th>
                          <th scope="col">Student name</th>
                          <th scope="col">D.O.B</th>
                          <th scope="col">Order code</th>
                          <th scope="col">Payment for</th>
                          <th scope="col">Payment method</th>
                          <th scope="col">Bank name</th>
                          <th scope="col">Card number</th>
                          <th scope="col">Amount (VND)</th>
                          <th scope="col">Content</th>
                          <th scope="col">Status</th>
                          <th scope="col">Created on</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td valign="middle"> <?php echo e($value->student_id); ?></td>
                              <td valign="middle"> <?php echo e($value->student_name); ?></td>
                              <td valign="middle"> <?php echo e($value->student_dob); ?></td>
                              <td valign="middle"> <?php echo e($value->order_code); ?></td>
                              <td valign="middle"> <?php echo e(!empty( cglobal::$payment_type[$value->type] ) ? cglobal::$payment_type[$value->type] : ''); ?></td>
                              <td valign="middle"> <?php echo e(!empty( cglobal::$payment_type[$value->method] ) ? cglobal::$payment_method[$value->method] : ''); ?></td>
                              <td valign="middle"> <?php echo e($value->bank_name); ?></td>
                              <td valign="middle"> <?php echo e($value->card_number); ?></td>
                              <td valign="middle"> <?php echo e($value->amount); ?></td>
                              <td valign="middle"> <?php echo e($value->note); ?></td>
                              <td valign="middle"> <?php echo $value->status ? '<span class="text-success">Success</span>' : '<span class="text-danger">Unsuccessful</span>'; ?></td>
                              <td valign="middle"> <?php echo e($value->created_at); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

                <!-- Pagination -->
                <ul class="pagination mb-0">
                  <?php $__currentLoopData = $pagination['links']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="page-item <?php echo e($value['active'] ? 'active' : ''); ?>"><a class="page-link " href="<?php echo e($value['url']); ?>"><?php echo $value['label']; ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <!-- End Pagination -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
  <!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="<?php echo e(asset('admin/assets/vendor/apexcharts/apexcharts.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/assets/vendor/chart.js/chart.umd.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/assets/vendor/echarts/echarts.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/assets/vendor/quill/quill.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/assets/vendor/simple-datatables/simple-datatables.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/assets/vendor/tinymce/tinymce.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/assets/vendor/php-email-form/validate.js')); ?>"></script>

  <!-- Template Main JS File -->
  <!-- <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script> -->

</body>

</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\payment\resources\views/payment_transaction/index.blade.php ENDPATH**/ ?>