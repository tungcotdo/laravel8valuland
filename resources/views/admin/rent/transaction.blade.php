@extends('layouts.admin')
@section('admin.main')
    <div class="pagetitle">
        <h1>Danh sách thuê đang giao dịch</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách thuê đang giao dịch</li>
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
            <form class="row g-3" action="{{route('admin.rent.select')}}">
                <div class="col-md-3 validate">
                    <label for="code" class="form-label-sm">Mã căn</label>
                    <input type="text" class="form-control form-control-sm" id="code" name="code" value="{{request()->code}}">
                    <small class="error-message text-danger"></small>
                </div>
                <div class="col-md-3 validate">
                    <label for="owner_name" class="form-label-sm">Tên</label>
                    <input type="text" class="form-control form-control-sm" id="owner_name" name="owner_name" value="{{request()->owner_name}}">
                    <small class="error-message text-danger"></small>
                </div>
                <div class="col-md-3 validate">
                    <label for="owner_phone" class="form-label-sm">Điện thoại</label>
                    <input type="text" class="form-control form-control-sm" id="owner_phone" name="owner_phone" value="{{request()->owner_phone}}">
                    <small class="error-message text-danger"></small>
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

              <!-- Start rent -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" class="small">MÃ CĂN</th>
                          <th scope="col" class="small">NGÀY ĐẶT CỌC</th>
                          <th scope="col" class="small">TIỀN ĐẶT CỌC</th>
                          <th scope="col" class="small">NGÀY KÝ HỢP ĐỒNG</th>
                          <th scope="col" class="small">NGƯỜI MÔ GIỚI</th>
                          <th scope="col" class="small">GIÁ</th>
                          <th scope="col" class="small">NGƯỜI LÀM PHÁP LÝ</th>
                          <th scope="col" class="small">HỢP ĐỒNG</th>
                          <th scope="col" class="small">HÀNH ĐỘNG</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if( !empty( $rent_transactions ) )
                            @foreach( $rent_transactions as $value )
                                <tr>
                                    <th>{{$value->code}}</th>
                                    <td>{{$value->rent_deposit_date}}</td>
                                    <td>{{$value->rent_deposit}}</td>
                                    <td>{{$value->rent_contract_date}}</td>
                                    <td>{{$value->rent_broker}}</td>
                                    <td>{{$value->rent_price}}</td>
                                    <td>{{$value->rent_legal_person}}</td>
                                      @if( !empty( $value->rent_contract_img ) )
                                        <td><a href="{{asset($value->rent_contract_img)}}" target="_blank" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Xem</a></td>
                                      @else
                                        <td>Chưa có</td>
                                      @endif
                                    <td>
                                      <a href="{{route('admin.renttran.index-edit', $value->rent_id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square small"> Sửa</i></a>
                                      <a onclick="return confirm('Bạn có muốn dữ liệu không?')" href="{{route('admin.rent.delete', $value->rent_id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash small"> Xóa</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>

                </div>
              </div><!-- End owner -->
              <nav class="mt-3" aria-label="...">
                <ul class="pagination pagination-sm">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Lùi</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Tiến</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div><!-- End Left side columns -->

        </div>
      </section>
@endsection