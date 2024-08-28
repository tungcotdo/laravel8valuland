
<?php $__env->startSection('content'); ?>
<form class="scholarship__form" id="scholarship__form" action="<?php echo e(route('scholarship.store.step1', $redirect_parram)); ?>" method="POST">
    <input type="hidden" id="hd_recaptcha" name="hd_recaptcha">
    <?php echo csrf_field(); ?>
    <div class="scholarship__section scholarship__section--background">
        
        <p class="text-italic">Instructions:</p>
        <p class="scholarship__note">1)	You can apply for more than one scholarship(s). For more information on BUV scholarship programmes, please <a href="https://www.buv.edu.vn/hoc-bong-cu-nhan/" target="_blank">click here</a>.</p>
        <p class="scholarship__note">2)	The portal has eight steps. Remember to save your data by clicking the “Save” button at the end of each step.</p>
        <p class="scholarship__note">3)	Fill in your full name and email in Step 2. Your information is saved, and an automatic email with the Save Draft link will be sent to your registered email for subsequent revisions. Before clicking “Submit” in the final step, you can come back to edit your application several times through the Save Draft link.</p>
        <p class="scholarship__note">4)	Required fields are marked with (*) and must be completed. Missing documents will cause scholarship failure.</p>
        <p class="scholarship__note">5)	The uploaded documents are limited to 2MB or 20MB. To reduce the file size, you can use a tool like <a href="https://smallpdf.com/compress-pdf" target="_blank">smallpdf.com</a>.This is a third-party website, and BUV assumes no liability or responsibility for its use.</p>        
        <p class="scholarship__note">6)	Contact a BUV Student Recruitment Representative or our hotline at 0966629909 if you need assistance during the scholarship application process.</p>

        <h3 class="scholarship-section__heading">What are you applying for?</h3>

        <div class="scholarship-section__field">
            <div class="validate" id="scholarship-section__field--cb-apply">

                <?php if( isset( $scholarship_list ) ): ?>
                    <?php $__currentLoopData = $scholarship_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( $item['Value'] != 'Others' ): ?>
                            <div class="scholarship-section__field-checkbox-group">
                                <input type="radio" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-rb-<?php echo e($key); ?>" value="<?php echo e($item['Value']); ?>" name="scholarship" <?php echo e(( isset( $student->scholarship ) && $student->scholarship == $item['Value'] ) ? 'checked' : ''); ?>>
                                <label for="scholarship-section__field-rb-<?php echo e($key); ?>" class="scholarship-section__field-checkbox-label"> <?php echo e($item['Label']); ?></label>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <div class="scholarship-section__field-checkbox-group">
                    <input type="radio" class="scholarship-section__field-checkbox-input scholarship-section__field-group-other-cb" name="scholarship" id="scholarship-section__field-group-other-cb">
                    <label class="scholarship-section__field-checkbox-label mr-1" for="scholarship-section__field-group-other-cb">Others</label>
                    <div class="w-100 validate" id="scholarship-section__field-group-other">
                        <input class="scholarship-section__field-group-other-textbox" type="text" placeholder="Please specify ..." id="scholarship-section__field-group-other-textbox" name="scholarship_other" value="<?php echo e(isset( $student ) ? $student->scholarship_other : ''); ?>">
                        <small class="error-message-other"></small>
                    </div>
                </div>

                <small class="error-message"></small>
            </div>
        </div>
    </div>

    <div class="scholarship-form__submit">
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--save" id="scholarship-form-submit__btn--save" type="submit" value="Save">
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--next" id="scholarship-form-submit__btn--next" type="submit" value="Next">
    </div>

</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>

    Functions.rbShowHide({
        rbClass : 'scholarship-section__field-checkbox-input',
        eID : 'scholarship-section__field-group-other',
        status : document.getElementById('scholarship-section__field-group-other-cb').checked,
        value: document.getElementById('scholarship-section__field-group-other-cb').value
    });

    Validator({
        form: '#scholarship__form',
        rules: [
            Validator.rbRequired({
                selector: '.scholarship-section__field-checkbox-input',
                submit: true,
                msg : Validator.message.scholarship
            }),
            Validator.tbRequiredWhenCbChecked({
                selector: '#scholarship-section__field-group-other-textbox',
                checkbox: '.scholarship-section__field-group-other-cb',
                msg: 'You must speficy the name of scholarship/ Bạn phải điền vào tên học bổng',
                submit: true,
                error: '#scholarship-section__field-group-other .error-message-other'
            })
        ],
        onSubmit: (data) => {
            data.form.submit();
        }
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/step1.blade.php ENDPATH**/ ?>