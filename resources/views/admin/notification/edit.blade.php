@extends('layouts.admin')
@section('admin.main')
    <div class="pagetitle">
      <h1>Form sửa thông báo</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.notification.index') }}">Thông báo</a></li>
          <li class="breadcrumb-item active">Sửa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- Start raw -->
        <form class="col-12" action="{{route('admin.notification.update', $notification->notification_id)}}" id="admin-notification-edit" method="POST">
          @csrf
          <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12 validate">
                      <label for="notification_title" class="form-label">Tiêu Đề</label>
                      <input type="text" class="form-control" id="notification_title" name="notification_title" value="{{$notification->notification_title}}">
                      <small class="error-message text-danger"></small>
                    </div>
                    <div class="col-md-12 validate">
                      <label for="notification_content" class="form-label">Nội dung thông báo</label>
                      <textarea type="text" class="form-control" id="notification_content" name="notification_content">{{$notification->notification_content}}</textarea>
                      <small class="error-message text-danger"></small>
                    </div>
                </div>
            </div>
          </div>

          <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title py-0 mb-3">Gửi cho</h5>
                <div class="row">
                    @foreach( $user_groups as $key => $value )
                      <div class="col-md-2">
                        <input {{ in_array( $value->user_group_id, $notification_user ) ? 'checked' : '' }} class="form-check-input" type="checkbox" name="notification_user[{{$value->user_group_id}}]" id="notification_user_{{ $key }}" value="{{$value->user_group_name}}">
                        <label class="form-check-label" for="notification_user_{{ $key }}">
                          {{ $value->user_group_name }}
                        </label>
                      </div>
                    @endforeach
                </div>
            </div><!-- card-body -->
          </div><!-- card -->

          <div class="mt-4 d-flex justify-content-center align-items-center">
            <div>
              <input class="form-check-input" type="checkbox" name="notification_issend" id="notification_issend" value="1">
              <label class="form-check-label" for="notification_issend">
                Gửi thông báo
              </label>
            </div>
            <button type="submit" class="btn btn-primary mx-3">Lưu thông báo</button>
          </div>
        </form><!-- End raw -->
      </div>
    </section>
@endsection

@section('admin.script')
  <script>
      Validator({
          form: '#admin-notification-edit',
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