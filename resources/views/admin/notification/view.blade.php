@extends('layouts.admin')
@section('admin.main')
    <div class="pagetitle">
      <h1>Xem Thông báo</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.notification.index') }}">Thông báo</a></li>
          <li class="breadcrumb-item active">Xem</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- Start raw -->
          <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12">
                      <label for="notification_title" class="form-label">Thời gian gửi</label>
                      <input type="text" class="form-control" id="notification_title" name="notification_title" value="{{$notification->notification_updated_at}}" disabled>
                    </div>
                    <div class="col-md-12">
                      <label for="notification_title" class="form-label">Tiêu Đề</label>
                      <input type="text" class="form-control" id="notification_title" name="notification_title" value="{{$notification->notification_title}}" disabled>
                    </div>
                    <div class="col-md-12">
                      <label for="notification_content" class="form-label">Nội dung thông báo</label>
                      <textarea type="text" class="form-control" id="notification_content" name="notification_content" disabled>{{$notification->notification_content}}</textarea>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </section>
@endsection

@section('admin.script')
  <script>
      Validator({
          form: '#admin-owner-store',
          rules: [
              Validator.tbRequired({
                  selector: '#notification_title',
                  submit: true
              }),
              Validator.tbRequired({
                  selector: '#notification_content',
                  submit: true
              })
          ],
          onSubmit: (data) => {
              document.getElementById("modal__loading").style.display = "block";
              data.form.submit();
          }
      });
  </script>
@endsection