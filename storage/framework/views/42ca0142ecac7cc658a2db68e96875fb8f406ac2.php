
<?php $__env->startSection('admin.main'); ?>
    <div class="pagetitle">
      <h1>Form thêm dữ liệu bán</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="sale.html">Dữ liệu bán</a></li>
          <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Start col-lg-12 -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title py-0">Thông tin chung</h5>
                    <div class="row g-3">
                      <div class="col-md-2">
                        <label for="sale_subdivision" class="form-label-sm">Phân khu</label>
                        <input type="text" class="form-control form-control-sm" id="sale_subdivision" name="sale_subdivision">
                      </div>
                      <div class="col-md-2">
                        <label for="sale_building" class="form-label-sm">Tòa</label>
                        <input type="email" class="form-control form-control-sm" id="sale_building" name="sale_building">
                      </div>
                      <div class="col-md-2">
                        <label for="code" class="form-label-sm">Mã căn</label>
                        <input type="email" class="form-control form-control-sm" id="code" value="S102.1821">
                      </div>
                      <div class="col-md-2">
                        <label for="inputEmail5" class="form-label-sm">Tầng</label>
                        <input type="email" class="form-control form-control-sm" id="inputEmail5" value="18">
                      </div>
                      <div class="col-md-2">
                        <label for="inputEmail5" class="form-label-sm">Căn</label>
                        <input type="email" class="form-control form-control-sm" id="inputEmail5" value="21">
                      </div>
                      <div class="col-md-2">
                        <label for="inputEmail5" class="form-label-sm">Loại căn hộ</label>
                        <select class="form-control form-control-sm">
                          <option>3PN</option>
                          <option>2PN</option>
                          <option>1PN + 1</option>
                          <option>1PN + 1, 2WC</option>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <label for="validationDefault04" class="form-label-sm">Hướng</label>
                        <select class="form-control form-control-sm">
                          <option>Đông Nam</option>
                          <option>Đông Bắc</option>
                          <option>Tây Nam</option>
                          <option>Tây Bắc</option>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <label for="inputPassword5" class="form-label-sm">DT thông thủy</label>
                        <input type="text" class="form-control form-control-sm" id="inputPassword5" value="74.80">
                      </div>
                      <div class="col-md-2">
                        <label for="inputPassword5" class="form-label-sm">Giá bán</label>
                        <input type="text" class="form-control form-control-sm" id="inputPassword5" value="">
                      </div>

                    </div>
                </div> <!-- end card-body -->
              </div> <!-- end card -->
              
              <div class="card mt-3">
                <div class="card-body">
                  <h5 class="card-title py-0">Mô tả</h5>
    
                  <!-- Mô tả -->
                  <div class="quill-editor-default">
                    <p>diện tích tim tường, vay ngân hàng, nội thất, bao phí, hoa hồng, thời gian xem, ghi chú</p>
                  </div>
                  <!-- End Mô tả -->
    
                </div>
              </div>

              <div class="card mt-3">
                <div class="card-body">
                      <!-- Images -->
                      <div class="col-md-12">
                        <!-- Basic Modal -->
                        <div class="modal fade" id="basicModal" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Tải ảnh căn hộ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-auto">
                                            <input class="form-control form-control-sm" type="file">
                                        </div>
                                        <div class="col-auto">
                                            <a href="raw.html" class="btn btn-primary">Lưu</a>
                                        </div>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div><!-- End Basic Modal-->
                        
                        <a href="sale-add.html" class="btn btn-sm btn-success mb-3" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus-lg"></i> Thêm mới ảnh</a>
                        <div class="row g-2">
                          <div class="col-lg-2">  
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i> </a>
                              </div>
                              <a href="/assets/img/thumnail.jpg" class="card-img-link" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail.jpg" class="card-img-link" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail2.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail2.jpg" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail3.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail3.jpg" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail4.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail4.jpg" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail5.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail5.jpg" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail.jpg" class="card-img-link" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail.jpg" class="card-img-link" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail2.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail2.jpg" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail3.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail3.jpg" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail4.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail4.jpg" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail5.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="card">
                              <div class="card-body text-center">
                                <a href="" class="btn btn-sm btn-danger"><i class="small bi bi-trash"> Xóa</i></a>
                              </div>
                              <a href="/assets/img/thumnail5.jpg" target="_blank"><img class="card-img-top rounded-0" src="/assets/img/thumnail.jpg" alt="Card image cap"></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Images -->
                </div> <!-- end card-body -->
              </div> <!-- end card -->

              <div class="text-center my-5">
                <button type="submit" class="btn btn-primary me-3">Lưu dữ liệu</button>
              </div>
            </div><!-- End col-lg-12 -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/sale/add.blade.php ENDPATH**/ ?>