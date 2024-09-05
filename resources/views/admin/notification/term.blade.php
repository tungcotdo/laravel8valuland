@extends('layouts.admin')
@section('admin.main')
    <div class="pagetitle">
      <h1>Thông báo hạn thuê nhà</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.notification.index') }}">Thông báo</a></li>
          <li class="breadcrumb-item active">Hạn thuê nhà</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- Start raw -->
        <form class="col-12" action="{{route('admin.setting.update')}}" id="admin-notification-term" method="POST">
          @csrf
          <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12 validate">
                      <label for="rent_deadline_date" class="form-label">Thông báo trước (Ngày)</label>
                      <input type="number" class="form-control" id="rent_deadline_date" name="rent_deadline_date" value="{{$setting->value}}">
                      <small class="error-message text-danger"></small>
                    </div>
                </div>
            </div>
          </div>
          <div class="mt-4 d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary mx-3">Lưu dữ liệu</button>
          </div>
        </form><!-- End raw -->
      </div>
    </section>
@endsection

@section('admin.script')
  <script>
      Validator({
          form: '#admin-notification-term',
          rules: [
              Validator.tbRequired({
                  selector: '#rent_deadline_date',
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