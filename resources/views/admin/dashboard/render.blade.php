<div class="row">
    <div class="col-lg-12" method="POST">
        <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3 mb-3 mb-md-0">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Căn đang bán</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-box-arrow-up"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $saleNumber }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3 mb-3 mb-md-0">
                <div class="card info-card sales-card">

                    <div class="card-body">
                    <h5 class="card-title">Căn cho thuê</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-arrow-left-right"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $rentNumber }}</h6>
                        </div>
                    </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3 mb-3 mb-md-0">
                <div class="card info-card sales-card">
                    <div class="card-body">
                    <h5 class="card-title">Căn giao dịch</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-percent"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $saletranNumber + $rentranNumber }}</h6>
                        </div>
                    </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Doanh thu <span>| Tháng này</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                            <h6>{{ $saleRevenueNumber + $rentRevenueNumber }} tỷ</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->
        </div>
    </div>

    <!-- Left side columns -->
    <div class="col-lg-8 mt-4">
        <div class="row">
            <!-- Top sale -->
            <div class="col-12">
            <section class="section">
                <div class="card">
                    <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="sale-raw-tab" data-bs-toggle="tab" data-bs-target="#sale-raw" type="button" role="tab" aria-controls="sale-raw" aria-selected="true">Bán sơ</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sale-select-tab" data-bs-toggle="tab" data-bs-target="#sale-select" type="button" role="tab" aria-controls="sale-select" aria-selected="false">Bán tinh</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="sale-raw" role="tabpanel" aria-labelledby="sale-raw-tab">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" class="small">MÃ CĂN</th>
                                <th scope="col" class="small">CẬP NHẬT BỞI</th>
                                <th scope="col" class="small">THỜI GIAN CẬP NHẬT</th>
                                <th scope="col" class="small">HÀNH ĐỘNG</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if( !empty( $saleRaws ) )
                                    @foreach( $saleRaws as $value )
                                        <tr>
                                            <th scope="row">{{$value->code}}</th>
                                            <td>{{$value->sale_updated_by}}</td>
                                            <td>{{$value->sale_updated_at}}</td>
                                            <td>
                                            <a href="{{route('admin.sale.edit', ['sale_id' => $value->sale_id, 'sale_status' => $value->sale_status])}}" class="btn btn-sm btn-info"><i class="bi bi-eye small"> Xem chi tiết</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="sale-select" role="tabpanel" aria-labelledby="sale-select-tab">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" class="small">MÃ CĂN</th>
                                <th scope="col" class="small">GIÁ</th>
                                <th scope="col" class="small">DT_TT(M2)</th>
                                <th scope="col" class="small">LOẠI CĂN</th>
                                <th scope="col" class="small">CẬP NHẬT BỞI</th>
                                <th scope="col" class="small">THỜI GIAN CẬP NHẬT</th>
                                <th scope="col" class="small">HÀNH ĐỘNG</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if( !empty( $saleSelects ) )
                                    @foreach( $saleSelects as $value )
                                        <tr>
                                            <th scope="row">{{$value->code}}</th>
                                            <td>{{$value->sale_price}}</td>
                                            <td>{{$value->sale_navigable_area}}</td>
                                            <td>{{$value->sale_style}}</td>
                                            <td>{{$value->sale_updated_by}}</td>
                                            <td>{{$value->sale_updated_at}}</td>
                                            <td>
                                                <a href="{{route('admin.sale.edit', ['sale_id' => $value->sale_id, 'sale_status' => $value->sale_status])}}" class="btn btn-sm btn-info"><i class="bi bi-eye small"> Xem chi tiết</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            </div><!-- End Top sale -->

            <!-- Top rent -->
            <div class="col-12 mt-4">
            <section class="section">
                <div class="card">
                    <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="rent-raw-tab" data-bs-toggle="tab" data-bs-target="#rent-raw" type="button" role="tab" aria-controls="rent-raw" aria-selected="true">Thuê sơ</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rent-select-tab" data-bs-toggle="tab" data-bs-target="#rent-select" type="button" role="tab" aria-controls="rent-select" aria-selected="false">Thuê tinh</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="rent-raw" role="tabpanel" aria-labelledby="rent-raw-tab">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" class="small">MÃ CĂN</th>
                                <th scope="col" class="small">CẬP NHẬT BỞI</th>
                                <th scope="col" class="small">THỜI GIAN CẬP NHẬT</th>
                                <th scope="col" class="small">HÀNH ĐỘNG</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if( !empty( $rentRaws ) )
                                    @foreach( $rentRaws as $value )
                                        <tr>
                                            <th scope="row">{{$value->code}}</th>
                                            <td>{{$value->rent_updated_by}}</td>
                                            <td>{{$value->rent_updated_at}}</td>
                                            <td>
                                            <a href="{{route('admin.rent.edit', ['rent_id' => $value->rent_id, 'rent_status' => $value->rent_status])}}" class="btn btn-sm btn-info"><i class="bi bi-eye small"> Xem chi tiết</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="rent-select" role="tabpanel" aria-labelledby="rent-select-tab">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" class="small">MÃ CĂN</th>
                                <th scope="col" class="small">GIÁ</th>
                                <th scope="col" class="small">DT_TT(M2)</th>
                                <th scope="col" class="small">LOẠI CĂN</th>
                                <th scope="col" class="small">CẬP NHẬT BỞI</th>
                                <th scope="col" class="small">THỜI GIAN CẬP NHẬT</th>
                                <th scope="col" class="small">HÀNH ĐỘNG</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if( !empty( $rentSelects ) )
                                    @foreach( $rentSelects as $value )
                                        <tr>
                                            <th scope="row">{{$value->code}}</th>
                                            <td>{{$value->rent_price}}</td>
                                            <td>{{$value->rent_navigable_area}}</td>
                                            <td>{{$value->rent_style}}</td>
                                            <td>{{$value->rent_updated_by}}</td>
                                            <td>{{$value->rent_updated_at}}</td>
                                            <td>
                                                <a href="{{route('admin.rent.edit', ['rent_id' => $value->rent_id, 'rent_status' => $value->rent_status])}}" class="btn btn-sm btn-info"><i class="bi bi-eye small"> Xem chi tiết</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            </div><!-- End Top rent -->

        </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4 mt-4">
    <!-- Recent Activity -->
    <div class="card">

        <div class="card-body">
            <h5 class="card-title">Vừa thông báo</h5>
            <div class="activity">
                @if( !empty( $notifications ) )
                    @foreach( $notifications as $value )
                    <div class="activity-item mb-4">
                        <b>{{ $value->notification_title }}</b> {{ $value->notification_content }} <br>
                        <small class="text-secondary">{{ \Carbon\Carbon::parse($value->notification_updated_at)->diffForHumans() }}</small>
                    </div><!-- End activity item-->
                    @endforeach
                @endif
            </div>

        </div>
    </div><!-- End Recent Activity -->
    </div><!-- End Right side columns -->
</div>