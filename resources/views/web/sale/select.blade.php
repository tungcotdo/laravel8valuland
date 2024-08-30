@extends('layouts.web')
@section('web.main')
    <div class="container mt-2">
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
                        <div class="col-4 col-md-2">
                            <label for="sale_building" class="form-label-sm label-filter">Tòa</label>
                            <input type="text" class="form-control form-control-sm" id="sale_building" name="sale_building">
                        </div>
                        <div class="col-4 col-md-2">
                            <label for="sale_floor" class="form-label-sm label-filter">Tầng</label>
                            <input type="text" class="form-control form-control-sm" id="sale_floor" name="sale_floor">
                        </div>
                        <div class="col-4 col-md-2 validate">
                            <label for="code" class="form-label-sm label-filter">Căn</label>
                            <input type="text" class="form-control form-control-sm" id="code" name="code">
                            <small class="error-message text-danger"></small>
                        </div>
                        <div class="col-4 col-md-2">
                            <label for="sale_navigable_area" class="form-label-sm label-filter">Loại căn hộ</label>
                            <input type="text" class="form-control form-control-sm" id="sale_navigable_area" name="sale_navigable_area">
                        </div>
                        <div class="col-4 col-md-2">
                            <label for="sale_navigable_area" class="form-label-sm label-filter">Hướng</label>
                            <input type="text" class="form-control form-control-sm" id="sale_navigable_area" name="sale_navigable_area">
                        </div>
                        <div class="col-4 col-md-2 search-group">
                            <button class="btn btn-sm btn-secondary" type="submit">Áp dụng lọc</button>
                        </div>
                        <div class="col-12">
                            <h5>Bất động sản Vinhome Ocean Park</h5>
                            <small>Hiện có <b>3</b> bất động sản.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End filter -->
    </div>

    <main class="sale-list container">
        <div class="row">
            <div class="col-md-12">
                <a class="sale-card d-block my-2" href="{{route('web.sale.detail', 1)}}">
                    <div class="sale-card-grid">
                        <div class="sale-grid-item sale-grid--item1">
                            <img class="sale-grid-img" src="{{asset('upload/sale/1.jpg')}}" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item2">
                            <img class="sale-grid-img" src="{{asset('upload/sale/2.jpg')}}" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item3">
                            <img class="sale-grid-img" src="{{asset('upload/sale/3.jpg')}}" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item4">
                            <img class="sale-grid-img" src="{{asset('upload/sale/4.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="product d-flex flex-column" style="gap: 30px;">
                        <div class="card">
                        <div class="card-body">
                            <div class="d-flex sale-house-info">
                                <span class="sale-house-info-item text-dark mr-3">S102.xx</span>
                                <span class="sale-house-info-item text-danger mr-3">63m<sup>2</sup></span>
                                <span class="sale-house-info-item text-dark mr-3">2N1WC</span>
                                <span class="sale-house-info-item text-danger">4.5 tỷ</span>
                            </div>
                            <p class="card-text mt-2 text-dark">Bàn giao Full nội thất liền tường cao cấp nhập khẩu, kính Low - E 3 lớp, cửa chống cháy,...
                            Sử dụng tiện ích chung của Vin Ocean Park nhưng có thêm những đặc quyền dành riêng cho cư dân Mas như</p>
                        </div>
                        </div>
                    </div>
                </a>
                <a class="sale-card d-block my-2" href="{{route('web.sale.detail', 1)}}">
                    <div class="sale-card-grid">
                        <div class="sale-grid-item sale-grid--item1">
                            <img class="sale-grid-img" src="{{asset('upload/sale/1.jpg')}}" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item2">
                            <img class="sale-grid-img" src="{{asset('upload/sale/2.jpg')}}" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item3">
                            <img class="sale-grid-img" src="{{asset('upload/sale/3.jpg')}}" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item4">
                            <img class="sale-grid-img" src="{{asset('upload/sale/4.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="product d-flex flex-column" style="gap: 30px;">
                        <div class="card">
                        <div class="card-body">
                            <div class="d-flex sale-house-info">
                                <span class="sale-house-info-item text-dark mr-3">S102.xx</span>
                                <span class="sale-house-info-item text-danger mr-3">63m<sup>2</sup></span>
                                <span class="sale-house-info-item text-dark mr-3">2N1WC</span>
                                <span class="sale-house-info-item text-danger">4.5 tỷ</span>
                            </div>
                            <p class="card-text mt-2 text-dark">Bàn giao Full nội thất liền tường cao cấp nhập khẩu, kính Low - E 3 lớp, cửa chống cháy,...
                            Sử dụng tiện ích chung của Vin Ocean Park nhưng có thêm những đặc quyền dành riêng cho cư dân Mas như</p>
                        </div>
                        </div>
                    </div>
                </a>
                <a class="sale-card d-block my-2" href="{{route('web.sale.detail', 1)}}">
                    <div class="sale-card-grid">
                        <div class="sale-grid-item sale-grid--item1">
                            <img class="sale-grid-img" src="{{asset('upload/sale/1.jpg')}}" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item2">
                            <img class="sale-grid-img" src="{{asset('upload/sale/2.jpg')}}" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item3">
                            <img class="sale-grid-img" src="{{asset('upload/sale/3.jpg')}}" alt="">
                        </div>
                        <div class="sale-grid-item sale-grid--item4">
                            <img class="sale-grid-img" src="{{asset('upload/sale/4.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="product d-flex flex-column" style="gap: 30px;">
                        <div class="card">
                        <div class="card-body">
                            <div class="d-flex sale-house-info">
                                <span class="sale-house-info-item text-dark mr-3">S102.xx</span>
                                <span class="sale-house-info-item text-danger mr-3">63m<sup>2</sup></span>
                                <span class="sale-house-info-item text-dark mr-3">2N1WC</span>
                                <span class="sale-house-info-item text-danger">4.5 tỷ</span>
                            </div>
                            <p class="card-text mt-2 text-dark">Bàn giao Full nội thất liền tường cao cấp nhập khẩu, kính Low - E 3 lớp, cửa chống cháy,...
                            Sử dụng tiện ích chung của Vin Ocean Park nhưng có thêm những đặc quyền dành riêng cho cư dân Mas như</p>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
@endsection