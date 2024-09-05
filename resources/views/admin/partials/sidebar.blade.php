<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <!-- Dashboard nav -->
  <li class="nav-item">
    <a class="nav-link " href="{{route('admin.dashboard.index')}}">
      <i class="bi bi-grid"></i>
      <span>Trang chủ</span>
    </a>
  </li><!-- End Dashboard Nav -->

 
    <!-- Owner nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#owner-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-box-arrow-in-down"></i><span>Chủ nhà</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="owner-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        @if( $_authorization('admin', 'owner', 'index', true) )
          <li>
            <a href="{{route('admin.owner.index')}}">
              <i class="bi bi-circle"></i><span>Danh sách</span>
            </a>
          </li>
        @endif

        @if( $_authorization('admin', 'owner', 'add', true) )
          <li>
          <a href="{{route('admin.owner.add')}}">
            <i class="bi bi-circle"></i><span>Thêm mới</span>
          </a>
        </li>
        @endif

        @if( $_authorization('admin', 'owner', 'upload_excel', true) )
          <li>
            <a href="{{route('admin.owner.form-upload-excel')}}">
              <i class="bi bi-circle"></i><span>Tải file Excel</span>
            </a>
          </li>
        @endif

      </ul>
    </li><!-- End owner nav -->



  <!-- Sale nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#sale-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-box-arrow-up"></i><span>Bán</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="sale-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        @if( $_authorization('admin', 'sale', 'raw', true) )
          <li>
            <a href="{{route('admin.sale.raw')}}">
              <i class="bi bi-circle"></i><span>Danh sách sơ</span>
            </a>
          </li>
        @endif

        @if( $_authorization('admin', 'sale', 'select', true) )
          <li>
            <a href="{{route('admin.sale.select')}}">
              <i class="bi bi-circle"></i><span>Danh sách tinh</span>
            </a>
          </li>
        @endif
        
        @if( $_authorization('admin', 'sale', 'transaction', true) )
          <li>
            <a href="{{route('admin.saletran.index')}}">
              <i class="bi bi-circle"></i><span>Danh sách giao dịch</span>
            </a>
          </li>
        @endif

        @if( $_authorization('admin', 'sale', 'sold', true) )
          <li>
            <a href="{{route('admin.sale.sold')}}">
              <i class="bi bi-circle"></i><span>Danh sách đã bán</span>
            </a>
          </li>
        @endif
    </ul>
  </li><!-- End sale nav -->

  <!-- Rent nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#rent-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-box-arrow-up"></i><span>Thuê</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="rent-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        @if( $_authorization('admin', 'rent', 'raw', true) )
          <li>
            <a href="{{route('admin.rent.raw')}}">
              <i class="bi bi-circle"></i><span>Danh sách sơ</span>
            </a>
          </li>
        @endif

        @if( $_authorization('admin', 'rent', 'select', true) )
          <li>
            <a href="{{route('admin.rent.select')}}">
              <i class="bi bi-circle"></i><span>Danh sách tinh</span>
            </a>
          </li>
        @endif
        
        @if( $_authorization('admin', 'rent', 'transaction', true) )
          <li>
            <a href="{{route('admin.renttran.index')}}">
              <i class="bi bi-circle"></i><span>Danh sách giao dịch</span>
            </a>
          </li>
        @endif

        @if( $_authorization('admin', 'rent', 'sold', true) )
          <li>
            <a href="{{route('admin.rent.sold')}}">
              <i class="bi bi-circle"></i><span>Danh sách đã thuê</span>
            </a>
          </li>
        @endif
    </ul>
  </li><!-- End rent nav -->



  <!-- Notification nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#notification-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-bell"></i><span>Thông báo</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="notification-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      @if( $_authorization('admin', 'notification', 'index', true) )
        <li>
          <a href="{{route('admin.notification.index')}}">
            <i class="bi bi-circle"></i><span>Danh sách</span>
          </a>
        </li>
      @endif

      @if( $_authorization('admin', 'notification', 'add', true) )
        <li>
          <a href="{{route('admin.notification.add')}}">
            <i class="bi bi-circle"></i><span>Thêm mới</span>
          </a>
        </li>
        <li >
          <a href="{{route('admin.notification.term')}}">
            <i class="bi bi-circle"></i><span>Hết hạn thuê</span>
          </a>
        </li>
      @endif
    </ul>
  </li><!-- End notification nav -->


  <!-- Contract nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#contract-nav" data-bs-toggle="collapse" href="{{route('admin.contract.index')}}">
      <i class="bi bi-journal-text"></i><span>Hợp đồng</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="contract-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      @if( $_authorization('admin', 'contract', 'index', true) )
        <li>
          <a href="{{route('admin.contract.index')}}">
            <i class="bi bi-circle"></i><span>Danh sách</span>
          </a>
        </li>
      @endif
      @if( $_authorization('admin', 'contract', 'add', true) )
        <li>
          <a href="{{route('admin.contract.add')}}">
            <i class="bi bi-circle"></i><span>Thêm mới</span>
          </a>
        </li>
      @endif

    </ul>
  </li><!-- End contract nav -->

  <!-- User nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person"></i><span>Người dùng</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      @if( $_authorization('admin', 'user', 'index', true) )
      <li>
        <a href="{{route('admin.user.index')}}">
          <i class="bi bi-circle"></i><span>Danh sách</span>
        </a>
      </li>
      @endif
      @if( $_authorization('admin', 'user', 'add', true) )
      <li>
        <a href="{{route('admin.user.add')}}">
          <i class="bi bi-circle"></i><span>Thêm mới</span>
        </a>
      </li>
      @endif

    </ul>
  </li><!-- End user nav -->

    <!-- Authorized nav -->
    <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#authorization-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-lock"></i><span>Quyền truy cập</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="authorization-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

      @if( $_authorization('admin', 'authorization', 'index', true) )
      <li>
        <a href="{{route('admin.authorization.index')}}">
          <i class="bi bi-circle"></i><span>Danh sách</span>
        </a>
      </li>
      @endif

      @if( $_authorization('admin', 'authorization', 'add', true) )
      <li>
        <a href="{{route('admin.authorization.add')}}">
          <i class="bi bi-circle"></i><span>Thêm mới</span>
        </a>
      </li>
      @endif

    </ul>
  </li><!-- End Authorized nav -->




</ul>

</aside>