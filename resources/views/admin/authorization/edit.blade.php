@extends('layouts.admin')
@section('admin.main')
<div class="pagetitle">
      <h1>Form sửa quyền truy cập</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.authorization.index') }}">Quyền truy cập</a></li>
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
            <form class="col-12" action="{{route('admin.authorization.update', $user_group->user_group_id)}}" id="admin-authorization-edit" method="POST">
              @csrf
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title py-0">Thông tin chung</h5>
                    <div class="row g-3">
                      <div class="col-md-6 validate">
                        <label for="user_group_name" class="form-label small">Tên</label>
                        <input type="text" class="form-control form-control-sm" id="user_group_name" name="user_group_name" value="{{$user_group->user_group_name}}">
                        <small class="error-message text-danger"></small>
                      </div>
                      <div class="col-md-6">
                        <label for="user_group_description" class="form-label small">Mô tả</label>
                        <input type="text" class="form-control form-control-sm" id="user_group_description" name="user_group_description" value="{{$user_group->user_group_description}}">
                      </div>
                      
                    </div>
                </div><!-- card-body -->
              </div><!-- card -->

              <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title py-0 mb-3">Chức năng</h5>
                    <div class="row">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Nhóm</th>
                          <th scope="col">Tên</th>
                          <th scope="col">Chọn</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if( !empty( $functions ) )
                              @foreach( $functions as $value )
                              <tr>
                                  <td>{{$value->function_group}}</td>
                                  <td>{{$value->function_desc}}</td>
                                  <td>
                                    <?php
                                    $checked = '';
                                      if( isset( $user_group_function_id ) &&  in_array($value->function_id, $user_group_function_id)){
                                        $checked = 'checked';
                                      }
                                    ?>
                                    <input type="checkbox" name="function_select[]" value="{{$value->function_id}}" {{$checked}}>
                                  </td>
                              </tr>
                              @endforeach
                          @endif
                      </tbody>
                    </table>
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
          form: '#admin-authorization-edit',
          rules: [
              Validator.tbRequired({
                  selector: '#user_group_name',
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