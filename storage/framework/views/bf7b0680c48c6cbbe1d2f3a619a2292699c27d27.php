
<?php $__env->startSection('content'); ?>
<form class="scholarship__form" id="scholarship__form" action="<?php echo e(route('scholarship.store.step8', $redirect_parram)); ?>" method="POST">
    <input type="hidden" id="hd_recaptcha" name="hd_recaptcha">
    <?php echo csrf_field(); ?>
    <div class="scholarship__section">

        <h3 class="scholarship-section__heading">TERMS & CONDITIONS</h3>

        <div class="scholarship-section__field">
        
            <div class="scholarship-section__field-condition">
                <p class="scholarship-section__field-condition-item">1. I certify that all information given by me in this application is true and correct. I further declare that any tertiary academic results submitted are a complete record of all results I have obtained from every institution I have attended.</p>
                <p class="scholarship-section__field-condition-item">2. I understand that at the time of enrolment I will be required to provide copy of all documents used to support this application.</p>
                <p class="scholarship-section__field-condition-item">3. I hereby agree to abide by all regulations and procedures laid down by British University Vietnam if I am successfully chosen as a scholarship grantee.</p>
                <p class="scholarship-section__field-condition-item">4. I hereby declare my consent to have my details made available to the academic faculty. I agree to be contacted via phone or email by the University for academic reasons. I further understand that it may be disclosed to third parties for the purpose of processing my application.</p>
                <p class="scholarship-section__field-condition-item">5. I hereby declare that I have not committed any criminal offences and am able to provide a criminal record check when required.
            </div>

            <div class="validate" id="scholarship-section__field-file-group-agree">
                <div class="scholarship-section__field-file-group-agree">
                    <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-agree">
                    <label class="scholarship-section__field-checkbox-label" for="scholarship-section__field-checkbox-input-agree"> Please tick here if you agree to the terms and conditions.</label>
                </div>
                <small class="error-message"></small>
            </div>

            <div class="scholarship-section__field-signature validate">
                <label class="scholarship-section__field-label">Applicant’s signature/<span class="text__vi">Chữ ký của người dự tuyển</span></label>
                <small class="error-message"></small>
                
                <canvas class="scholarship-section__field-input-signature pad" id="scholarship-section__field-input-signature" height="300" width="350">
                    <img id="scholarship-section__field-img-signature">
                </canvas>

                <div class="validate--upload-signature-file validate">
                    <div>
                        <small>Please insert your signature here/ <span class="text__vi">Vui lòng thêm chữ ký vào đây</span></small>
                    </div>
                    <button class="scholarship-section__field-clear-signature" type="reset" id="scholarship-section__field-clear-signature">Clear/Xóa</button>
                    <div>
                        <small>Or/Hoặc</small>
                    </div>
                    <button  type="button" class="scholarship-section__field-upload-signature" id="scholarship-section__field-file-upload-signature-btn">
                        <p>Upload photo/ Tải lên ảnh chữ ký</p>
                    </button>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->signature) ? $document->signature : ''); ?></button>
                        <input class="scholarship-section__field-upload-signature-file" type="file" id="scholarship-section__field-upload-signature-file" hidden <?php echo e(!empty($document->signature) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>

                <input type="hidden" name="signature" class="output" id="scholarship-section__field-upload-signature-hidden">
            </div>
        </div>
    </div>
    <hr>
    
    <div class="scholarship-form__submit">
        <a href="<?php echo e(route('scholarship.show.step7', $redirect_parram)); ?>" class="scholarship-form-submit__btn scholarship-form-submit__btn--previous">Previous</a>
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--save" type="submit" value="Submit" id="scholarship-form-submit__btn--save" title="Bạn chưa thể submit thông tin, vui lòng quay lại các bước và điền đầy đủ những thông tin bắt buộc!">
    </div>
</form>
<?php $__env->stopSection(); ?> <!-- content -->

<?php $__env->startSection('script'); ?>
<script>
    document.getElementById('scholarship-section__field-file-upload-signature-btn')
            .addEventListener('click', () => {
                document.getElementById('scholarship-section__field-upload-signature-file').click();
            });

    Validator({
        form: '#scholarship__form',
        rules: [
            Validator.cbChecked({
                selector : '#scholarship-section__field-file-group-agree', 
                msg : 'Please tick here if you agree to the terms and conditions/ Vui lòng đánh dấu vào đây nếu bạn đồng ý với các điều khoản và điều kiện!',
                required: true,
                submit: true,
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-upload-signature-hidden',
                submit: true,
            }),
            Validator.signature({
                type : 'signature',
                selector: '#scholarship-section__field-upload-signature-file',
                required: true,
                size: 3,
                extension: ['jpg', 'jpeg', 'png'],
                upload: 'signature'
            })
        ],
        onSubmit: (data) => {
            data.form.submit();
            document.getElementById("modal__loading").style.display = "block";
        }
    });

    // Delete signature when click to clear btn
    document.getElementById('scholarship-section__field-clear-signature')
            .addEventListener('click', () => {
                    // remove draw signature value
                    document.querySelector('#scholarship-section__field-upload-signature-hidden').value = '';

                    document.getElementById("modal__loading").style.display = "block";
                    // Delete signature.
                    async function call(formData) {
                        try {
                            const response = await fetch(document.querySelector('#delete-url').content, {
                                method: "POST",
                                body: formData,
                            });
                            const result = await response.json();

                            if( result.success && result.data ){
                                document.getElementById("modal__loading").style.display = "none";
                            }
                            
                        } catch (error) {
                            console.error("Error:", error);
                        }
                    }

                    const formData = new FormData();
                    formData.append("_token", document.querySelector('#csrf-token').content);
                    formData.append("field", "signature");
                    formData.append("sid", document.querySelector('#scholarship-student-sid').content);

                    call(formData);

            });

    // Init signature
    $(document).ready(function() {
        $('.scholarship-section__field-signature').signaturePad({
            drawOnly: true,
            defaultAction: 'drawIt',
            validateFields: false,
            lineWidth: 0,
            output: null,
            sigNav: null,
            name: null,
            typed: null,
            clear: '#scholarship-section__field-clear-signature',
            typeIt: null,
            drawIt: null,
            typeItDesc: null,
            drawItDesc: null,
            onDraw : function (){
                document.querySelector('.scholarship-section__field-signature .error-message').innerHTML = '';
                document.querySelector('.validate--upload-signature-file .error-message').innerHTML = '';
                document.getElementById('scholarship-section__field-upload-signature-file').value = '';
            },
            onDrawEnd : function (){
                const canvas = document.querySelector("#scholarship-section__field-input-signature").toDataURL('image/png');
                document.querySelector('#scholarship-section__field-upload-signature-hidden').value = canvas.replace(/^data:image\/(png|jpg);base64,/, "");
            }
        });
    });
</script>
<?php $__env->stopSection(); ?> <!-- script -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/step9.blade.php ENDPATH**/ ?>