<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | BUV - Scholarship</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="admin/assets/img/favicon.png" rel="icon">
  <link href="admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('admin/assets/vendor/simple-datatables/style.css')); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo e(asset('admin/assets/css/style.css')); ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="toggle-sidebar">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo e(route('scholarship.admin.list')); ?>" class="logo d-flex align-items-center">
        <img src="admin/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">BUV scholarship</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="GET">
        <input type="text" name="name" placeholder="Search" title="Enter search keyword" value="<?php echo e(!empty( request()->name ) ? request()->name : ''); ?>">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo e(Auth::user()->email); ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('logout')); ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
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
        <a class="nav-link collapsed" href="<?php echo e(route('scholarship.admin.list')); ?>">
          <i class="bi bi-grid"></i>
          <span>Student</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="row my-4">
        <div class="col-6">
            <div class="pagetitle">
                <h1>Student list</h1>
            </div><!-- End Page Title -->
        </div>
        <div class="col-6">
            <a class="btn btn-success rounded-pill float-end" href="<?php echo e(route('scholarship.admin.export')); ?>" role="button"><i class="bi bi-box-arrow-down"></i> Export excel</a>
        </div>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Scholarship</th>
                    <th scope="col">Submit date</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile phone</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if( !empty( $data ) ): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <!-- Student -->
                            <td scope="col"><?php echo e($key + 1); ?></td>
                            <td scope="col"><?php echo e($value->fullname_vn); ?></td>
                            <td scope="col"><?php echo e(!empty( $value->scholarship ) ? $value->scholarship : $value->scholarship_other); ?></td>
                            <td scope="col"><?php echo e($value->submit_date); ?></td>
                            <td scope="col"><?php echo e($value->email); ?></td>
                            <td scope="col"><?php echo e($value->phone_number); ?></td>
                            <td scope="col"><?php echo e($value->day_of_birth); ?>/<?php echo e($value->month_of_birth); ?>/<?php echo e($value->year_of_birth); ?></td>
                            <td scope="col">
                                <?php
                                    if( $value->gender == 1 ){
                                        echo 'Male';
                                    }elseif( $value->gender == 2 ){
                                        echo 'FeMale';
                                    }else{
                                        echo 'Other';
                                    }
                                ?>
                            </td>
                            <td scope="col">
                              <a href="<?php echo e(route('scholarship.document.download', ['sid' => $value->sid ])); ?>">Download</a>
                              <a href="<?php echo e(route('scholarship.document.combine', ['sid' => $value->sid ])); ?>">Combine</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>BUV ICT team</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">BUV ICT developers</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo e(asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/assets/vendor/simple-datatables/simple-datatables.js')); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo e(asset('admin/assets/js/main.js')); ?>"></script>

</body>

</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/admin/index.blade.php ENDPATH**/ ?>