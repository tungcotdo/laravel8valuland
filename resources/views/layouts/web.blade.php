<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token"/>

  <title>VALULAND</title>

  <!-- Favicons -->
  <link href="{{asset('web/img/valuland-favicon.png')}}" rel="icon">
  <link href="{{asset('web/img/valuland-favicon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('web/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('web/css/style.css')}}" rel="stylesheet">

  <!-- Form CSS File -->
  <link href="{{asset('form/modal.css')}}" rel="stylesheet">

  <style>
    
  </style>
</head>

<body>
    <header class="web-header py-3">
        <div class="container">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-6 pt-1">
                <a class="text-muted" href="#">
                    <img width="150" src="{{asset('web/img/valuland-Logo.png')}}" alt="">
                </a>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                <a class="btn btn-sm btn-outline-secondary" href="#">Đăng tin</a>
                </div>
            </div>
        </div>
    </header>

    @yield('web.main')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Modal loading page -->
    <div class="modal" id="modal__loading">
        <div class="modal__overlay"></div>
        <div class="modal__content">
            <div class="modal__loading">
                <div class="modal__loading-icon"></div>
                <div class="modal__loading-text">Đang xử lý ...</div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Form JS File -->
    <script src="{{asset('form/function.js')}}"></script>

    @yield('admin.script')
</body>

</html>