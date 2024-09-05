@extends('layouts.admin')
@section('admin.main')
    <div class="pagetitle">
        <h1>Danh sách thuê tinh</h1>
        <nav>
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách thuê tinh</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <div class="card-btns">
        <a href="{{route('admin.rent.add')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Thêm mới</a>
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
            <form class="row g-3" action="{{route('admin.rent.select')}}">
                <div class="col-md-2">
                  <label for="rent_building" class="form-label-sm">Tòa</label>
                  <input type="text" class="form-control form-control-sm" id="rent_building" name="rent_building" value="{{request()->rent_building}}">
                </div>
                <div class="col-md-2">
                  <label for="rent_floor" class="form-label-sm">Tầng</label>
                  <input type="text" class="form-control form-control-sm" id="rent_floor" name="rent_floor" value="{{request()->rent_floor}}">
                </div>
                <div class="col-md-2 validate">
                  <label for="code" class="form-label-sm">Căn</label>
                  <input type="text" class="form-control form-control-sm" id="code" name="code" value="{{request()->code}}">
                  <small class="error-message text-danger"></small>
                </div>
                <div class="col-md-2">
                  <label for="rent_style" class="form-label-sm">Loại căn hộ</label>
                  <select class="form-control form-control-sm" id="rent_style" name="rent_style">
                    @if( !empty( $house->_STYLE ) )
                      @foreach( $house->_STYLE as $value => $text )
                        <option value="{{ $value }}" {{ $value == request()->rent_style ? 'selected' : '' }}>{{ $text }}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="rent_direction" class="form-label-sm">Hướng</label>
                  <select class="form-control form-control-sm" id="rent_direction" name="rent_direction">
                    @if( !empty( $house->_DIRECTION ) )
                      @foreach( $house->_DIRECTION as $value => $text )
                        <option value="{{ $value }}" {{ $value == request()->rent_direction ? 'selected' : '' }}>{{ $text }}</option>
                      @endforeach
                    @endif
                  </select>
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

              <!-- Start rent -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <p class="text-danger">Tổng số <b>{{ count( $rent_selects ) }}</b> bản ghi.</p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" class="small">MÃ CĂN</th>
                          <th scope="col" class="small">LOẠI CĂN HỘ</th>
                          <th scope="col" class="small">DIỆN TÍCH</th>
                          <th scope="col" class="small">HƯỚNG</th>
                          <th scope="col" class="small">GIÁ</th>
                          <th scope="col" class="small">CẬP NHẬT LÚC</th>
                          <th scope="col" class="small">HÀNH ĐỘNG</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if( !empty( $rent_selects ) )
                            @foreach( $rent_selects as $value )
                                <tr>
                                    <th>{{ $value->rent_building}}.{{$value->rent_floor}}{{$value->code}}</th>
                                    <td>{{ ( !empty( $house->_STYLE[$value->rent_style] ) ) ? $house->_STYLE[$value->rent_style] : ''}}</td>
                                    <td>{{ $value->rent_navigable_area }}</td>
                                    <td>{{ $value->rent_navigable_area }}</td>
                                    <td>{{ $value->rent_price }}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->rent_updated_at)->format('H:m - d/m/Y')}}</td>
                                    <td>
                                      <a href="{{route('admin.rent.status', ['rent_id' => $value->rent_id, 'rent_status'=> 3])}}" class="btn btn-sm btn-success"><i class="bi bi-cursor small"> Giao dịch</i></a>
                                      <a href="{{route('admin.rent.edit', ['rent_id' => $value->rent_id, 'rent_status' => 2])}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square small"> Sửa</i></a>
                                      <a href="{{route('admin.rent.status', ['rent_id' => $value->rent_id, 'rent_status'=> 4])}}" class="btn btn-sm btn-secondary"><i class="bi bi-eye-fill small"> Đã thuê</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
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