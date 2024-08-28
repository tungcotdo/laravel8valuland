
<?php $__env->startSection('title', 'Online payment/ Thanh toán trực tuyến'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container" style="position: relative;top: -120px;">
        <div class="row">
            <div class="col-lg-12" style="background-color: #fff;padding: 25px 25px;">
                <ul class="payment-tab">
                    <li><a href="<?php echo e(route('/')); ?>" <?php if($type == 0): ?> class="active" <?php endif; ?>>Tuition fee/ Học phí</a></li>
                    <li><a href="<?php echo e(route('/', [ 'type'=>1 ])); ?>" <?php if($type == 1): ?> class="active" <?php endif; ?>>Other fee/ Phí
                            khác</a></li>
                </ul>

                <div <?php if($type == 1): ?>class="display-none" <?php endif; ?> id="tuition_fee">
                    <form action="" method="GET" class="mb-5">
                        <div class="row mb-3">
                            <div class="col-lg-6 mb-2">
                                <div class="form-group">
                                    <label class="font-weight-bold mb-2 fs-17">Student code/ Mã sinh viên<span
                                                class="required">*</span></label>
                                    <div>
                                        <input type="text" class="form-control-sm" name="code" value="<?php echo e($student_code); ?>"
                                               autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6" style="padding-top: 32px;">
                                <button type="submit" class="btn btn-primary" style="height: 56px;">Search/ Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>

                    <form action="<?php echo e(route('pay.tuition_fee')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h2 class="fs-26">Thông tin sinh viên</h2>

                                <div class="form-group">
                                    <label>Student code/ Mã sinh viên:</label>
                                    <p class="font-weight-bold"><?php echo e($student_code); ?></p>
                                </div>
                                <div class="form-group">
                                    <label>Student name/ Tên sinh viên:</label>
                                    <p class="font-weight-bold">NGUYEN HUU QUANG</p>
                                </div>
                                <div class="form-group">
                                    <label>Cohort/ khóa học:</label>
                                    <p class="font-weight-bold">2010CGDP</p>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <?php if(!empty($order_list)): ?>
                                    <?php $__currentLoopData = $order_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row"
                                             style="<?php if($k%2 == 0): ?>background-color: #efefef; <?php endif; ?> padding: 10px 0">
                                            <div class="col-lg-1 text-center" style="padding-top: 5px;">
                                                <label>
                                                    <input type="checkbox" class="form-control-sm"
                                                           style="width: auto!important;" name="invoice[]" value="<?php echo e($v['IdInvoice']); ?>" <?php if(in_array($v['IdInvoice'], old('invoice', [$order_list[0]['IdInvoice']]))): ?> checked <?php endif; ?>>
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="mb-0 font-weight-bold">Lần <?php echo e($v['lan_nop']); ?></p>
                                                <p class="mb-0 fs-18 color-red font-weight-bold"><?php echo e(number_format(($v['gia_tri'] + $v['phat_nop_cham']), 0, '.', ',')); ?>

                                                    (VNĐ)</p>
                                                <p class="mb-0 fs-16 font-weight-bold">Học
                                                    phí: <?php echo e(number_format($v['gia_tri'], 0, '.', ',')); ?> (VNĐ)</p>
                                                <p class="mb-0 fs-16 font-weight-bold">Phí nộp
                                                    muộn: <?php echo e(number_format($v['phat_nop_cham'], 0, '.', ',')); ?>

                                                    (VNĐ)</p>
                                            </div>
                                            <div class="col-lg-5" style="padding-top: 25px;">
                                                <p class="mb-0">Học kỳ: <?php echo e($v['IdCohort']); ?></p>
                                                <p class="mb-0">Hạn nộp: <?php echo e($v['han_nop']); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <div class="form-group text-center">
                                    <hr>
                                </div>
                                <div class="form-group text-center">
                                    <div>
                                        <button type="submit" class="btn btn-primary font-weight-bold"
                                                style="font-weight: bold;font-size: 17px;height: 56px;">
                                            <svg data-name="Layer 21" height="24" id="Layer_21" viewBox="0 0 24 24"
                                                 width="24" fill="#fff" xmlns="http://www.w3.org/2000/svg"><title/>
                                                <polygon
                                                        points="3 12 8.61 14.992 17 8 9 17.455 9 21 12.164 16.887 18 20 21 3 3 12"/>
                                            </svg>
                                            Pay/ Thanh toán
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>

                <div <?php if($type == 0): ?>class="display-none" <?php endif; ?> id="tuition_fee">
                    <form action="<?php echo e(route('payment')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="row mb-3">
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="font-weight-bold mb-2 fs-17">Payment for/ Thanh toán cho <span
                                                class="required">*</span></label>
                                    <div style="padding-left: 25px;">
                                        <div class="row">
                                            <?php $__currentLoopData = cglobal::$payment_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-12 mb-2">
                                                    <label class="font-weight-normal" for="type_<?php echo e($k); ?>"><input
                                                                type="radio"
                                                                name="type" id="type_<?php echo e($k); ?>" value="<?php echo e($k); ?>"
                                                                <?php if(old('type') != '' && (int)old('type') == $k): ?> checked <?php endif; ?>>
                                                        <span class="radio"><?php echo e($v); ?></span></label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($errors->has('type')): ?>
                                                <p class="required"><?php echo e($errors->first('type')); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="student_id" class="font-weight-bold fs-17">Student ID/ Mã sinh
                                        viên</label>
                                    <div>
                                        <input type="text" name="student_id" id="student_id" class="form-control-sm"
                                               value="<?php echo e(old('student_id')); ?>" autocomplete="off">
                                        <?php if($errors->has('student_id')): ?>
                                            <p class="required"><?php echo e($errors->first('student_id')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="student_name" class="font-weight-bold fs-17">Fullname/ Họ, tên sinh viên
                                        (Học viên) <span class="required">*</span></label>
                                    <div>
                                        <input type="text" name="student_name" id="student_name" class="form-control-sm"
                                               value="<?php echo e(old('student_name')); ?>" autocomplete="off">
                                        <?php if($errors->has('student_name')): ?>
                                            <p class="required"><?php echo e($errors->first('student_name')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="student_dob" class="font-weight-bold fs-17">Date of birth/ Ngày sinh
                                        <span
                                                class="required">*</span></label>
                                    <div>
                                        <input type="text" id="student_dob" name="student_dob"
                                               class="form-control datepicker" data-date-format="dd/mm/yyyy"
                                               value="<?php echo e(old('student_dob')); ?>" autocomplete="off" readonly>
                                        <?php if($errors->has('student_dob')): ?>
                                            <p class="required"><?php echo e($errors->first('student_dob')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="amount" class="font-weight-bold fs-17">Payment amount/ Số tiền thanh
                                        toán (VND)
                                        <span class="required">*</span></label>
                                    <div>
                                        <input type="text" class="form-control-sm" id="amount" name="amount"
                                               onkeypress="return isNumberKey(event)" onchange="number_format(this);"
                                               value="<?php echo e(old('amount')); ?>" autocomplete="off">
                                        <?php if($errors->has('amount')): ?>
                                            <p class="required"><?php echo e($errors->first('amount')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="note" class="font-weight-bold fs-17">Content/ Nội dung thanh toán <span
                                        class="required">*</span></label>
                            <div>
                                <textarea name="note" id="note" class="form-control-sm"
                                          rows="5"><?php echo e(old('note')); ?></textarea>
                                <?php if($errors->has('note')): ?>
                                    <p class="required"><?php echo e($errors->first('note')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div>
                                <button type="submit" class="btn btn-primary font-weight-bold"
                                        style="font-weight: bold;font-size: 17px;height: 56px;">
                                    <svg data-name="Layer 21" height="24" id="Layer_21" viewBox="0 0 24 24"
                                         width="24" fill="#fff" xmlns="http://www.w3.org/2000/svg"><title/>
                                        <polygon
                                                points="3 12 8.61 14.992 17 8 9 17.455 9 21 12.164 16.887 18 20 21 3 3 12"/>
                                    </svg>
                                    Pay/ Thanh toán
                                </button>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        function number_format(event) {
            $(event).val(formatNumber($(event).val().replace(/[.,#]/g, "")));
        }

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
        }


    </script>

    <script type="text/javascript">
        $(function () {
            $(".datepicker").datepicker();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\payment\resources\views/payment.blade.php ENDPATH**/ ?>