@extends('layouts.admin')
@section('admin.main')
<div class="pagetitle">
      <h1>Form sửa người dùng</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">người dùng</a></li>
          <li class="breadcrumb-item active">Sửa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            
            <!-- Start raw -->
            <form class="col-12" action="{{route('admin.user.update', $user->id)}}" method="POST" id="admin-user-edit">
              @csrf
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title py-0">Thông tin chung</h5>
                    <div class="row g-3">
                      <div class="col-md-6 validate">
                        <label for="user_name" class="form-label small">Tên</label>
                        <input type="text" class="form-control form-control-sm" id="user_name" name="user_name" value="{{$user->name}}">
                        <small class="error-message text-danger"></small>
                      </div>
                      <div class="col-md-6 validate">
                        <label for="user_email" class="form-label small">Email</label>
                        <input type="email" class="form-control form-control-sm" id="user_email" name="user_email" value="{{$user->email}}">
                        <small class="error-message text-danger"></small>
                      </div>
                      <div class="col-md-6 validate">
                        <label for="user_email" class="form-label small">Cấp lại mật khẩu</label>
                        <input type="text" class="form-control form-control-sm" id="user_password" name="user_password">
                        <small class="error-message text-danger"></small>
                      </div>
                      <div class="col-md-6 validate">
                        <label for="user_phone" class="form-label small">Điện thoại</label>
                        <input type="text" class="form-control form-control-sm" id="user_phone" name="user_phone" value="{{$user->phone}}">
                        <small class="error-message text-danger"></small>
                      </div>
                    </div>
                </div><!-- card-body -->
              </div><!-- card -->

              <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title py-0 mb-3">Phân quyền</h5>
                    <div class="row">
                      @if( !empty( $user_groups ) )
                        @foreach( $user_groups as $value )
                        <div class="col-md-3">
                          <input {{ ( $value->user_group_id == $user->user_group_id ) ? 'checked' : '' }} class="form-check-input" type="radio" name="user_group" id="gridRadios_{{$value->user_group_id}}" value="{{$value->user_group_id}}_{{$value->user_group_name}}">
                          <label class="form-check-label" for="gridRadios_{{$value->user_group_id}}">
                            {{$value->user_group_name}}
                          </label>
                        </div>
                        @endforeach
                      @endif
                    </div>
                </div><!-- card-body -->
              </div><!-- card -->

              <div class="text-center my-5">
                <button type="submit" class="btn btn-primary me-3">Lưu dữ liệu</button>
              </div>
            </form><!-- End raw -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

@endsection
@section('admin.script')
  <script>
      Validator({
          form: '#admin-user-edit',
          rules: [
              Validator.tbRequired({
                  selector: '#user_name',
                  submit: true
              }),
              Validator.tbRequired({
                  selector: '#user_email',
                  submit: true
              }),
              Validator.tbRequired({
                  selector: '#user_password',
                  submit: true
              }),
              Validator.tbRequired({
                  selector: '#user_phone',
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