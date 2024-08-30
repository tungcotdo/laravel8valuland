@extends('layouts.web')
@section('web.main')
    <div class="container mt-3">
        <div class="pagetitle">
            <h1>Form đăng tin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('web.sale.select')}}">Danh sách bất động sản</a></li>
                    <li class="breadcrumb-item active">Đăng tin</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Start col-lg-12 -->
                        <form class="col-lg-12" action="{{route('web.sale.add')}}" method="POST" id="web-sale-add">
                            @csrf  
                            <input type="hidden" name="sale_status" value="">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title py-0">Thông tin chung</h5>
                                    <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="sale_subdivision" class="form-label-sm">Phân khu</label>
                                        <select class="form-control form-control-sm" id="sale_subdivision" name="sale_subdivision">
                                        @if( !empty( $house->_SUBDIVISION ) )
                                            @foreach( $house->_SUBDIVISION as $value => $text )
                                            <option value="{{ $value }}" {{ $value == $sale->sale_subdivision ? 'selected' : '' }}>{{ $text }}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sale_building" class="form-label-sm">Tòa</label>
                                        <input type="text" class="form-control form-control-sm" id="sale_building" name="sale_building" value="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sale_floor" class="form-label-sm">Tầng</label>
                                        <input type="text" class="form-control form-control-sm" id="sale_floor" name="sale_floor" value="">
                                    </div>
                                    <div class="col-md-4 validate">
                                        <label for="code" class="form-label-sm">Mã căn<small class="text-danger"> *</small></label>
                                        <input type="text" class="form-control form-control-sm" id="code" name="code" value="">
                                        <small class="error-message text-danger"></small>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sale_navigable_area" class="form-label-sm">DT thông thủy</label>
                                        <input type="text" class="form-control form-control-sm" id="sale_navigable_area" name="sale_navigable_area" value="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sale_room" class="form-label-sm">Phòng ngủ</label>
                                        <select class="form-control form-control-sm" id="sale_room" name="sale_room">
                                        @if( !empty( $house->_ROOM ) )
                                            @foreach( $house->_ROOM as $value => $text )
                                            <option value="{{ $value }}">{{ $text }}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="sale_style" class="form-label-sm">Loại căn hộ</label>
                                        <select class="form-control form-control-sm" id="sale_style" name="sale_style">
                                        @if( !empty( $house->_STYLE ) )
                                            @foreach( $house->_STYLE as $value => $text )
                                            <option value="{{ $value }}">{{ $text }}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sale_direction" class="form-label-sm">Hướng</label>
                                        <select class="form-control form-control-sm" id="sale_direction" name="sale_direction">
                                        @if( !empty( $house->_DIRECTION ) )
                                            @foreach( $house->_DIRECTION as $value => $text )
                                            <option value="{{ $value }}">{{ $text }}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sale_price" class="form-label-sm">Giá bán</label>
                                        <input type="text" class="form-control form-control-sm" id="sale_price" name="sale_price" value="">
                                    </div>

                                    <div class="col-md-4 validate">
                                        <label for="owner_name" class="form-label-sm">Tên chủ hộ <small class="text-danger"> *</small></label>
                                        <input type="text" class="form-control form-control-sm" id="owner_name" name="owner_name" value="">
                                        <small class="error-message text-danger"></small>
                                    </div>
                                    <div class="col-md-4 validate">
                                        <label for="owner_phone" class="form-label-sm">Điện thoại chủ hộ <small class="text-danger"> *</small></label>
                                        <input type="text" class="form-control form-control-sm" id="owner_phone" name="owner_phone" value="">
                                        <small class="error-message text-danger"></small>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="sale_description" class="form-label-sm">Mô tả</label>
                                        <textarea class="form-control form-control-sm" name="sale_description" id="sale_description"></textarea>
                                    </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->

                            <div class="card mt-3">
                                <div class="card-body">
                                    <!-- Images -->
                                    <div class="col-md-12">
                                        <a href="sale-add.html" class="btn btn-sm btn-success mb-3" data-bs-toggle="modal" data-bs-target="#imgModal"><i class="bi bi-plus-lg"></i> Thêm mới ảnh</a>
                                        <div class="row g-2" id="sale-img"></div>
                                    </div>
                                    <!-- End Images -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                            
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row g-2" id="sale-video">
                                        <div class="col-md-12">
                                            <a href="#" class="btn btn-sm btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#videoModal"><i class="bi bi-plus-lg"></i> Thêm mới video</a>
                                        </div>
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
                        <form action="" id="web-sale-uploadimg" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="sale-loadimg-url" value="">
                            @csrf
                            <div class="row">
                                <div class="col-auto validate">
                                    <input class="form-control" type="file" id="sale_img_input" name="files[]" multiple>
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
                        <form action="" id="web-salevideo-upload" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="web-salevideo-upload-url" value="">
                            @csrf
                            <div class="row">
                                <div class="col-auto validate">
                                    <input class="form-control" type="file" id="sale_video_input" name="file" multiple>
                                    <small class="error-message text-danger"></small>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary" id="sale_video_save">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- End Upload IMG Modal-->
    </div>

    @section('web.script')
      <script src="{{asset('form/sale-img.js')}}"></script>
      <script src="{{asset('form/sale-video.js')}}"></script>
    @endsection

@endsection