@extends('layouts.admin')
@section('admin.main')
<div class="pagetitle">
      <h1>Form sửa hợp đồng</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.contract.index') }}">Hợp đồng</a></li>
          <li class="breadcrumb-item active">Sửa mới</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- Start raw -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <form class="row g-3" action="{{route('admin.contract.update', $contract->contract_id)}}" method="POST" id="admin-contract-edit" enctype="multipart/form-data">
                @csrf    
                <div class="col-md-4 validate">
                      <label for="contract_title" class="form-label">Tiêu Đề</label>
                      <input type="text" class="form-control" id="contract_title" name="contract_title" value="{{ $contract->contract_title }}">
                      <small class="error-message text-danger"></small>
                    </div>
                    <div class="col-md-4">
                      <label for="contract_description" class="form-label">Mô tả</label>
                      <input type="text" class="form-control" id="contract_description" name="contract_description" value="{{ $contract->contract_description }}">
                    </div>
                    <div class="col-md-4">
                      <label for="contract_file" class="form-label">File</label>
                      <input class="form-control" type="file" id="contract_file" name="contract_file">
                      <input class="form-control" type="hidden" id="contract_file_text" name="contract_file_text" value="{{ $contract->contract_path }}">
                      @if( !empty( $contract->contract_path ) )
                        <div class="card mt-2">
                            <a href="{{asset($contract->contract_path)}}" class="card-img-link" target="_blank">Xem hợp đồng</a>
                        </div>
                      @endif
                    </div>
                    <div class="text-center mt-4">
                      <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    </div>
                </form>
            </div>

          </div>
        </div><!-- End raw -->
      </div>
    </section>
@endsection
@section('admin.script')
  <script>
      Validator({
          form: '#admin-contract-edit',
          rules: [
              Validator.tbRequired({
                  selector: '#contract_title',
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