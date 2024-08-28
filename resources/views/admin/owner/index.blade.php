@extends('layouts.admin')
@section('admin.main')
<div class="pagetitle">
  <h1>Danh sách chủ nhà</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Trang chủ</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.owner.index')}}">Chủ nhà</a></li>
      <li class="breadcrumb-item active">Danh sách</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card-btns">
  <a href="{{route('admin.owner.form-upload-excel')}}" class="btn btn-sm btn-success"><i class="bi bi-upload"></i> Tải file excel</a>
  <a href="{{route('admin.owner.add')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Thêm mới</a>
  <a href="{{route('admin.owner.truncate')}}" onclick="return confirm('Bạn có muốn xóa hết dữ liệu không?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Xóa hết dữ liệu</a>
  <!-- <a href="#" class="btn btn-sm btn-warning disabled"><i class="bi bi-download"></i> Xuất file excel</a> -->
</div>

<!-- Filter -->
<div class="card">
  <div class="accordion-item p-3">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed py-2 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        <i class="bi bi-filter-left"> Bộ lọc</i>
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse show mt-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
        <form class="row g-3" action="{{route('admin.owner.index')}}">
            <div class="col-md-3 validate">
                <label for="code" class="form-label form-label-sm">Mã căn</label>
                <input type="text" class="form-control form-control-sm" id="code" name="code" value="{{request()->code}}">
                <small class="error-message text-danger"></small>
            </div>
            <div class="col-md-3 validate">
                <label for="owner_name" class="form-label form-label-sm">Tên</label>
                <input type="text" class="form-control form-control-sm" id="owner_name" name="owner_name" value="{{request()->owner_name}}">
                <small class="error-message text-danger"></small>
            </div>
            <div class="col-md-3 validate">
                <label for="owner_phone" class="form-label form-label-sm">Điện thoại</label>
                <input type="text" class="form-control form-control-sm" id="owner_phone" name="owner_phone" value="{{request()->owner_phone}}">
                <small class="error-message text-danger"></small>
            </div>
            <div class="col-md-3">
                <label for="owner_demand" class="form-label form-label-sm">Nhu cầu</label>
                <select id="owner_demand" class="form-select form-select-sm w-100" name="owner_demand">
                    <option value="0">Không có</option>
                    <option value="1" {{ request()->owner_demand == 1 ? 'selected' : '' }}>Bán</option>
                    <option value="2" {{ request()->owner_demand == 2 ? 'selected' : '' }}>Thuê</option>
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-sm btn-secondary" type="submit">Áp dụng lọc</button>
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

        <!-- Start owner -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">

              <div class="card-filter">

              </div>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="small">MÃ CĂN</th>
                    <th scope="col" class="small">TÊN</th>
                    <th scope="col" class="small">ĐIỆN THOẠI</th>
                    <th scope="col" class="small">NHU CẦU</th>
                    <th scope="col" class="small">HÀNH ĐỘNG</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($owners as $key => $value)
                        <tr>
                            <td style="border-bottom: 1px solid #f3f3f3;">{{ $value->code }}</td>
                            <td style="border-bottom: 1px solid #f3f3f3; max-width: 300px; overflow-x: auto;">{{ $value->owner_name }}</td>
                            <td style="border-bottom: 1px solid #f3f3f3; max-width: 300px; overflow-x: auto;">{{ $value->owner_phone }}</td>
                            <td style="border-bottom: 1px solid #f3f3f3; min-width: 100px;">
                                <select class="form-control form-control-sm owner-demand-slb">
                                    <option value="0">Không có</option>
                                    <option {{ $value->owner_demand == 1 ? 'selected' : '' }} value="{{route('admin.owner.update-demand', [$value->owner_id, 1])}}" >Bán</option>
                                    <option {{ $value->owner_demand == 2 ? 'selected' : '' }} value="{{route('admin.owner.update-demand', [$value->owner_id, 2])}}">Thuê</option>
                                </select>
                            </td>
                            <td style="border-bottom: 1px solid #f3f3f3;">
                                <a href="{{ route('admin.owner.edit', $value->owner_id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square small"> Sửa</i></a>
                                <a href="{{ route('admin.owner.delete', $value->owner_id) }}" onclick="return confirm('Bạn có muốn xóa dữ liệu này không?')" class="btn btn-sm btn-danger"><i class="bi bi-trash small"> Xóa</i></a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
              </table>
            </div>

          </div>
        </div><!-- End owner -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>
@endsection

@section('admin.script')
  <script>
      let ownerDemands = document.querySelectorAll('.owner-demand-slb');
        ownerDemands.forEach( slb => {
            if( slb.value !== 0 ){
                slb.addEventListener('change', () => {
                    document.getElementById("modal__loading").style.display = "block";
                    window.location.href = slb.value
                }) 
            }   
        })
  </script>
@endsection