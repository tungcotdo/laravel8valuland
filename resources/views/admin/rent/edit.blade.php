@extends('layouts.admin')
@section('admin.main')
    <div class="pagetitle">
      <h1>Form sửa dữ liệu thuê</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{route('admin.rent.raw')}}">Danh sách thuê sơ</a></li>
          <li class="breadcrumb-item"><a href="{{route('admin.rent.select')}}">Danh sách thuê tinh</a></li>
          <li class="breadcrumb-item active">Sửa dữ liệu thuê</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Start col-lg-12 -->
            <form class="col-lg-12" action="{{route('admin.rent.update', $rent->rent_id)}}" method="POST" id="admin-rent-edit">
              @csrf  
              <input type="hidden" name="rent_status" value="{{$rent->rent_status}}">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title py-0">Thông tin chung</h5>
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label for="rent_subdivision" class="form-label-sm">Phân khu</label>
                        <select class="form-control form-control-sm" id="rent_subdivision" name="rent_subdivision">
                          @if( !empty( $house->_SUBDIVISION ) )
                            @foreach( $house->_SUBDIVISION as $value => $text )
                              <option value="{{ $value }}" {{ $value == $rent->rent_subdivision ? 'selected' : '' }}>{{ $text }}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="rent_building" class="form-label-sm">Tòa</label>
                        <input type="text" class="form-control form-control-sm" id="rent_building" name="rent_building" value="{{$rent->rent_building}}">
                      </div>
                      <div class="col-md-4">
                        <label for="rent_floor" class="form-label-sm">Tầng</label>
                        <input type="text" class="form-control form-control-sm" id="rent_floor" name="rent_floor" value="{{$rent->rent_floor}}">
                      </div>
                      <div class="col-md-4 validate">
                        <label for="code" class="form-label-sm">Mã căn<small class="text-danger"> *</small></label>
                        <input type="text" class="form-control form-control-sm" id="code" name="code" value="{{$rent->code}}">
                        <small class="error-message text-danger"></small>
                      </div>
                      <div class="col-md-4">
                        <label for="rent_navigable_area" class="form-label-sm">DT thông thủy</label>
                        <input type="text" class="form-control form-control-sm" id="rent_navigable_area" name="rent_navigable_area" value="{{$rent->rent_navigable_area}}">
                      </div>
                      <div class="col-md-4">
                        <label for="rent_room" class="form-label-sm">Phòng ngủ</label>
                        <select class="form-control form-control-sm" id="rent_room" name="rent_room">
                          @if( !empty( $house->_ROOM ) )
                            @foreach( $house->_ROOM as $value => $text )
                              <option value="{{ $value }}" {{ $value == $rent->rent_room ? 'selected' : '' }}>{{ $text }}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>

                      <div class="col-md-4">
                        <label for="rent_style" class="form-label-sm">Loại căn hộ</label>
                        <select class="form-control form-control-sm" id="rent_style" name="rent_style">
                          @if( !empty( $house->_STYLE ) )
                            @foreach( $house->_STYLE as $value => $text )
                              <option value="{{ $value }}" {{ $value == $rent->rent_style ? 'selected' : '' }}>{{ $text }}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="rent_direction" class="form-label-sm">Hướng</label>
                        <select class="form-control form-control-sm" id="rent_direction" name="rent_direction">
                          @if( !empty( $house->_DIRECTION ) )
                            @foreach( $house->_DIRECTION as $value => $text )
                              <option value="{{ $value }}" {{ $value == $rent->rent_direction ? 'selected' : '' }}>{{ $text }}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="rent_price" class="form-label-sm">Giá thuê</label>
                        <input type="text" class="form-control form-control-sm" id="rent_price" name="rent_price" value="{{$rent->rent_price}}">
                      </div>
                      <div class="col-md-4 validate">
                        <label for="owner_name" class="form-label-sm">Tên chủ hộ <small class="text-danger"> *</small></label>
                        <input type="text" class="form-control form-control-sm" id="owner_name" name="owner_name" value="{{$rent->owner_name}}">
                        <small class="error-message text-danger"></small>
                      </div>
                      <div class="col-md-4">
                        <label for="rent_start_date" class="form-label-sm">Ngày bắt đầu</label>
                        <input type="text" class="form-control form-control-sm" id="rent_start_date" name="rent_start_date" value="{{$rent->rent_start_date}}">
                      </div>
                      <div class="col-md-4">
                        <label for="rent_end_date" class="form-label-sm">Ngày kết thúc</label>
                        <input type="text" class="form-control form-control-sm" id="rent_end_date" name="rent_end_date" value="{{$rent->rent_end_date}}">
                      </div>
                      <div class="col-md-4 validate">
                        <label for="owner_phone" class="form-label-sm">Điện thoại chủ hộ <small class="text-danger"> *</small></label>
                        <input type="text" class="form-control form-control-sm" id="owner_phone" name="owner_phone" value="{{$rent->owner_phone}}">
                        <small class="error-message text-danger"></small>
                      </div>
                      <div class="col-md-8">
                        <label for="rent_description" class="form-label-sm">Mô tả</label>
                        <textarea class="form-control form-control-sm" name="rent_description" id="rent_description">{{$rent->rent_description}}</textarea>
                      </div>
                    </div>
                </div> <!-- end card-body -->
              </div> <!-- end card -->

              <div class="card mt-3">
                <div class="card-body">
                    <!-- Images -->
                    <div class="col-md-12">
                      <a href="rent-add.html" class="btn btn-sm btn-success mb-3" data-bs-toggle="modal" data-bs-target="#imgModal"><i class="bi bi-plus-lg"></i> Thêm mới ảnh</a>
                      <div class="row g-2" id="rent-img"></div>
                    </div>
                    <!-- End Images -->
                </div> <!-- end card-body -->
              </div> <!-- end card -->
              
              <div class="card mt-3">
                <div class="card-body">
                  <div class="row g-2" id="rent-video"></div>
                </div>
              </div>
            </div> <!-- end card -->

            <div class="text-center my-5">
              <button type="submit" class="btn btn-primary me-3">Lưu dữ liệu</button>
            </div>
            </form><!-- End col-lg-12 -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

    <!-- Upload IMG Modal -->
    <div class="modal fade" id="imgModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tải ảnh căn hộ</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-img-modal-close"></button>
          </div>
          <div class="modal-body">
            <form action="{{route('admin.rentimg.upload', $rent->rent_id)}}" id="admin-rent-uploadimg" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="rent-loadimg-url" value="{{route('admin.rentimg.render', $rent->rent_id)}}">
                @csrf
                <div class="row">
                    <div class="col-auto validate">
                        <input class="form-control" type="file" id="rent_img_input" name="files[]" multiple>
                        <small class="error-message text-danger"></small>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" id="house-image-save">Lưu</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div><!-- End Upload IMG Modal-->

    <!-- Upload VIDEO Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tải video căn hộ</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-video-modal-close"></button>
          </div>
          <div class="modal-body">
            <form action="{{route('admin.rentvideo.upload', $rent->rent_id)}}" id="admin-rentvideo-upload" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="admin-rentvideo-upload-url" value="{{route('admin.rentvideo.render', $rent->rent_id)}}">
                @csrf
                <div class="row">
                    <div class="col-auto validate">
                        <input class="form-control" type="file" id="rent_video_input" name="file" multiple>
                        <small class="error-message text-danger"></small>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" id="rent_video_save">Lưu</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div><!-- End Upload IMG Modal-->

    @section('admin.script')
      <script src="{{asset('form/rent-img.js')}}"></script>
      <script src="{{asset('form/rent-video.js')}}"></script>
    @endsection

@endsection