@extends('layouts.admin')
@section('admin.main')
    <div class="pagetitle">
        <h1>Danh sách thông báo</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.notification.index') }}">Thông báo</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Filter -->
    <div class="card">
        <div class="accordion-item p-3">
            <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed py-2 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <i class="bi bi-filter-left"> Bộ lọc</i>
            </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show mt-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                <form class="row g-3" action="{{route('admin.notification.index')}}">
                    <div class="col-md-3 validate">
                        <label for="code" class="form-label form-label-sm">Tiêu đề</label>
                        <input type="text" class="form-control form-control-sm" id="notification_title" name="notification_title" value="{{request()->notification_title}}">
                        <small class="error-message text-danger"></small>
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

            <!-- Start notification -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">

                  <div class="card-btns">
                    <a href="{{ route('admin.notification.add') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Thêm mới</a>
                  </div>

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Đối tượng gửi</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach( $notifications as $value )
                            <tr>
                                <td>{{ $value->notification_title }}</td>
                                <td>{{ $value->notification_content }}</td>
                                <td>{{ $value->notification_user_group }}</td>
                                <td>{{ !empty( $value->notification_issend ) ? 'Đã gửi' : 'Chưa gửi' }}</td>
                                <td>
                                    <a href="{{ route('admin.notification.send', ['notification_id' => $value->notification_id, 'notification_issend' => 1]) }}" class="btn btn-sm btn-success"><i class="bi bi-send"></i> {{ ($value->notification_issend == 1) ? "Gửi lại" : "Gửi" }}</a>
                                    <a href="{{ route('admin.notification.edit', $value->notification_id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Sửa</a>
                                    <a onclick="return confirm('Bạn có muốn xóa dữ liệu này không?')" href="{{ route('admin.notification.delete', $value->notification_id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>

              </div>
            </div><!-- End raw -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>
@endsection