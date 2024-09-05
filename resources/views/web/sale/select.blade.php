@extends('layouts.web')
@section('web.main')
    <div class="container mt-2">
        <!-- Filter -->
        <div class="card">
            <div class="accordion-item p-3">
                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                    <div class="col-12">
                        <h5>Bất động sản Vinhome Ocean Park</h5>
                        <small>Hiện có <b>3</b> bất động sản.</small>
                    </div>
                    <form class="row g-3" action="{{route('web.sale.select')}}">
                        <div class="col-md-2">
                        <label for="sale_building" class="form-label-sm">Tòa</label>
                        <input type="text" class="form-control form-control-sm" id="sale_building" name="sale_building" value="{{request()->sale_building}}">
                        </div>
                        <div class="col-md-2">
                        <label for="sale_floor" class="form-label-sm">Tầng</label>
                        <input type="text" class="form-control form-control-sm" id="sale_floor" name="sale_floor" value="{{request()->sale_floor}}">
                        </div>
                        <div class="col-md-2 validate">
                        <label for="code" class="form-label-sm">Căn</label>
                        <input type="text" class="form-control form-control-sm" id="code" name="code" value="{{request()->code}}">
                        <small class="error-message text-danger"></small>
                        </div>
                        <div class="col-md-2">
                        <label for="sale_style" class="form-label-sm">Loại căn hộ</label>
                        <select class="form-control form-control-sm" id="sale_style" name="sale_style">
                            @if( !empty( $house->_STYLE ) )
                            @foreach( $house->_STYLE as $value => $text )
                                <option value="{{ $value }}" {{ $value == request()->sale_style ? 'selected' : '' }}>{{ $text }}</option>
                            @endforeach
                            @endif
                        </select>
                        </div>
                        <div class="col-md-2">
                        <label for="sale_direction" class="form-label-sm">Hướng</label>
                        <select class="form-control form-control-sm" id="sale_direction" name="sale_direction">
                            @if( !empty( $house->_DIRECTION ) )
                                @foreach( $house->_DIRECTION as $value => $text )
                                    <option value="{{ $value }}" {{ $value == request()->sale_direction ? 'selected' : '' }}>{{ $text }}</option>
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
    </div>

    <main class="sale-list container">
        <div class="row">
            <div class="col-md-12">
                @if( !empty( $sale_selects ) )
                    @foreach( $sale_selects as $value )
                    <a class="sale-card d-block my-2" href="{{route('web.sale.detail', $value->sale_id)}}">
                        <div class="sale-card-grid">
                            <?php
                                if( !empty( $sale_imgs($value->sale_id) ) ){
                                    $imgs = $sale_imgs($value->sale_id);
                                    dd( $imgs[0]->sale_img_path );
                                }
                            ?>
                        </div>

                        <div class="row">
                            <div class="col-8">
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                        <div class="product d-flex flex-column" style="gap: 30px;">
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <div class="d-flex sale-house-info">
                                        <span class="sale-house-info-item text-dark mr-3">{{ $value->sale_building}}.{{$value->sale_floor}}{{$value->code}}</span>
                                        <span class="sale-house-info-item text-danger mr-3">{{ $value->sale_navigable_area}}m<sup>2</sup></span>
                                        <span class="sale-house-info-item text-dark mr-3">{{ $house->_STYLE[$value->sale_style]}}</span>
                                        <span class="sale-house-info-item text-danger">{{ $value->sale_price }} tỷ</span>
                                    </div>
                                    <p class="card-text mt-2 text-dark">{{ $value->sale_description }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection

