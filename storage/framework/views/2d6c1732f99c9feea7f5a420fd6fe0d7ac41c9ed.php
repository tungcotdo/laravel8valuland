Dear <?php echo e($student->fullname_vn); ?>, 

British University Vietnam (BUV) would like to thank you for taking your time to fill in the scholarship form.

Your form has been temporarily saved at this <a href="<?php echo e(route('scholarship.continue', ['sid' => $student->sid])); ?>">LINK</a>. Please kindly access to this for the next revisions. 

Yours sincerely,

BUV Student Recruitment Office

-------------------------------------------------------------------------- 

<?php echo e($student->fullname_vn); ?> thân mến, 

Trường Đại học Anh Quốc Việt Nam (BUV) cảm ơn em đã dành thời gian điền đơn Đăng Ký Học Bổn.

Đơn Đăng Ký của em đã được lưu lại. Để cập nhật hoặc sửa đổi thông tin, em vui lòng truy cập vào <a href="<?php echo e(route('scholarship.continue', ['sid' => $student->sid])); ?>">LINK</a>. 

Trân trọng, 

Văn phòng Tuyển Sinh BUV<?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/email.blade.php ENDPATH**/ ?>