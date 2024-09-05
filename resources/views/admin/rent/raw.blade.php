@extends('layouts.admin')
@section('admin.main')
    <div class="pagetitle">
        <h1>Danh sách thuê sơ</h1>
        <nav>
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách thuê sơ</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <div class="card-btns">
        <a href="{{route('admin.owner.add')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Thêm mới</a>
      </div>
      <section class="section mt-3">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <!-- Start rent -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <p class="text-danger">Tổng số <b>{{ count( $rent_raws ) }}</b> bản ghi.</p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" class="small">MÃ CĂN</th>
                          <th scope="col" class="small">TÊN</th>
                          <th scope="col" class="small">ĐIÊN THOẠI</th>
                          <th scope="col" class="small">THỜI GIAN CẬP NHẬT</th>
                          <th scope="col" class="small">HÀNH ĐỘNG</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if( !empty( $rent_raws ) )
                            @foreach( $rent_raws as $value )
                                <tr>
                                    <th>{{$value->code}}</th>
                                    <td>{{ $value->owner_name }}</td>
                                    <td>{{ $value->owner_phone }}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->rent_updated_at)->format('H:m - d/m/Y')}}</td>
                                    <td>
                                        <a href="{{route('admin.rent.edit', ['rent_id' => $value->rent_id, 'rent_status' => 1])}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square small"> Sửa</i></a>
                                        <a onclick="return confirm('Bạn có muốn xóa hết dữ liệu không?')" href="{{route('admin.rent.delete', $value->rent_id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash small"> Xóa</i></a>
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