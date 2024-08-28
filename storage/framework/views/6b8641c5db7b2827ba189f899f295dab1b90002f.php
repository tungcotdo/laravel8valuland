
<?php $__env->startSection('content'); ?>
<form class="scholarship__form" id="scholarship__form" action="<?php echo e(route('scholarship.store.step6', $redirect_parram)); ?>" method="POST">
    <input type="hidden" id="hd_recaptcha" name="hd_recaptcha">
    <?php echo csrf_field(); ?>
    <div class="scholarship__section">
        <p class="scholarship__note">
            Note: (<span class="required__symbol">*</span>) This field is required/ <span class="text__vi">Vui lòng không để trống thông tin này!</span>
        </p>

        <h3 class="scholarship-section__heading">APPLICANT'S SUPPORTING STATEMENTS</h3>

        <p class="scholarship__note">Instruction: please limit your answer to 100 words per question.</p>

        <div class="scholarship-section__field">

            <div class="scholarship-section__field-textarea-group validate">
                <label class="scholarship-section__field-label">1. Briefly give the reasons why you feel you are an ideal candidate for this scholarship.<span class="required__symbol">*</span></label>
                <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textarea-input-statement1" type="text" name="statement_1"><?php echo e(!empty( $statement->statement_1 ) ? $statement->statement_1 : ''); ?></textarea>
                <small class="error-message"></small>
            </div>

            <div class="scholarship-section__field-textarea-group validate">
                <label class="scholarship-section__field-label">2. What one thing outside of school has been the most challenging for you so far?<span class="required__symbol">*</span></label>
                <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textarea-input-statement2" type="text" name="statement_2"><?php echo e(!empty( $statement->statement_2 ) ? $statement->statement_2 : ''); ?></textarea>
                <small class="error-message"></small>
            </div>

            <div class="scholarship-section__field-textarea-group validate">
                <label class="scholarship-section__field-label">3. How will the major you have applied for contribute significantly to the development of Vietnam?<span class="required__symbol">*</span></label>
                <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textarea-input-statement3" type="text" name="statement_3"><?php echo e(!empty( $statement->statement_3 ) ? $statement->statement_3 : ''); ?></textarea>
                <small class="error-message"></small>
            </div>

            <div class="scholarship-section__field-textarea-group validate">
                <label class="scholarship-section__field-label">4. In your field of interest, who do you admire most and why? <span class="required__symbol">*</span></label>
                <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textarea-input-statement4" type="text" name="statement_4"><?php echo e(!empty( $statement->statement_4 ) ? $statement->statement_4 : ''); ?></textarea>
                <small class="error-message"></small>
            </div>

            <div class="scholarship-section__field-textarea-group validate">
                <label class="scholarship-section__field-label">5. How will you contribute to British University Vietnam if you study here? <span class="required__symbol">*</span></label>
                <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textarea-input-statement5" type="text" name="statement_5"><?php echo e(!empty( $statement->statement_5 ) ? $statement->statement_5 : ''); ?></textarea>
                <small class="error-message"></small>
            </div>

            <div class="scholarship-section__field-textarea-group validate">
                <label class="scholarship-section__field-label">6. Is there anything else you would like to add in support of your application for this scholarship? Give details. <span class="required__symbol">*</span></label>
                <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textarea-input-statement6" type="text" name="statement_6"><?php echo e(!empty( $statement->statement_6 ) ? $statement->statement_6 : ''); ?></textarea>
                <small class="error-message"></small>
            </div>
            <br>
            <div class="scholarship-section__field-group">
                <label class="scholarship-section__field-label">Personal Statement in English (<a href="<?php echo e(asset('doc/2023_Scholarships_Personal_Statement.docx')); ?>">Download template</a>)<span class="required__symbol">*</span></label>
                <div class="validate">
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->personal_statement) ? $document->personal_statement : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file-personal-statement" <?php echo e(!empty($document->personal_statement) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
            </div>
        </div>
        <!-- /scholarship-section__field -->


    </div>

    <div class="scholarship-form__submit">
        <a href="<?php echo e(route('scholarship.show.step5', $redirect_parram)); ?>" class="scholarship-form-submit__btn scholarship-form-submit__btn--previous">Previous</a>
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--save" id="scholarship-form-submit__btn--save" type="submit" value="Save">
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--next" id="scholarship-form-submit__btn--next" type="submit" value="Next">
    </div>
    
</form>
<?php $__env->stopSection(); ?> <!-- content -->

<?php $__env->startSection('script'); ?>
<script>
    
    Validator({
        form: '#scholarship__form',
        rules: [
            Validator.tbRequired({
                selector: '#scholarship-section__field-textarea-input-statement1'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textarea-input-statement2'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textarea-input-statement3'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textarea-input-statement4'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textarea-input-statement5'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textarea-input-statement6'
            }),
            Validator.file({
                selector: '#scholarship-section__field-file-personal-statement',
                required: true,
                extension: ['pdf'],
                size: 2,
                upload: 'personal_statement'
            })
        ],
        onSubmit: (data) => {
            data.form.submit();
        }
    });

    
</script>
<?php $__env->stopSection(); ?> <!-- script -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/step6.blade.php ENDPATH**/ ?>