
<?php $__env->startSection('content'); ?>
<form class="scholarship__form" id="scholarship__form" action="<?php echo e(route('scholarship.store.step7', $redirect_parram)); ?>" method="POST">
    <input type="hidden" id="hd_recaptcha" name="hd_recaptcha">
    <?php echo csrf_field(); ?>
    <div class="scholarship__section">
        <p class="scholarship__note">
            Note: (<span class="required__symbol">*</span>) This field is required/ <span class="text__vi">Vui lòng không để trống thông tin này!</span>
        </p>

        <h3 class="scholarship-section__heading">OTHER DOCUMENTS</h3>

        <div class="scholarship-section__field">

            <div class="scholarship-section__field-file-group">
                <label class="scholarship-section__field-label">Recommendation Letter(s) (English-translated copy if not in English) (<a href="<?php echo e(asset('doc/2023_Scholarships_Recommendation_Letter_Template.docx')); ?>">Download template</a>) <span class="required__symbol">*</span></label>
                <div class="validate">
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->recommendation_letter) ? $document->recommendation_letter : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file-document-recommendation" <?php echo e(!empty($document->recommendation_letter) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
            </div>

            <div class="scholarship-section__field-file-group">
                <label class="scholarship-section__field-label">Evidence (English-translated copy) of disability or in need of financial support, i.e. “Giấy Chứng nhận hộ nghèo” (if relevant)</label>
                <div class="validate">
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->disability_finanial_support) ? $document->disability_finanial_support : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file-document-disability" <?php echo e(!empty($document->disability_finanial_support) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
            </div>

            <div class="scholarship-section__field-file-group">
                <label class="scholarship-section__field-label">Copy of scholarship application fee receipt of payment (<?php echo e(!empty( $scholarship_fee ) ? number_format($scholarship_fee) : '2,000,000'); ?> VND) <span class="required__symbol">*</span></label>
                <div class="validate">
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->payment_fee_receipt) ? $document->payment_fee_receipt : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file-document-fee-receipt" <?php echo e(!empty($document->payment_fee_receipt) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
            </div>

            <div class="scholarship-section__field-file-group">
                <label class="scholarship-section__field-label">Other documents (English-translated copy if not in English)</label>
                <div class="validate">
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->other) ? $document->other : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file-document-other" <?php echo e(!empty($document->other) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
            </div>
            
            <div>
                <br>
                <p>Payment method: Cash or card at British University Vietnam, Ecopark Township, Van Giang, Hung Yen or bank transfer to one of the below 
                    accounts with the content “Scholarship fee 2024-[Applicant’s Full name]-[Applicant’s Date of birth]</p>
                <br>
                <ul>
                    <li>Account name: BRITISH UNIVERSITY VIETNAM</li>
                    <li>Account number: VND88136924588</li>
                    <li>Bank name: Standard Chartered Bank Vietnam Ltd - Le Dai Hanh branch</li>
                    <li>Swift Code: SCBLVNVX</li>
                </ul>
                <br>
                <p>OR</p>
                <br>
                <ul>
                    <li>Account name: CONG TY TNHH TRUONG DAI HOC ANH QUOC VIET NAM</li>
                    <li>Account number: 0591000392486</li>
                    <li>Bank name: Joint Stock Commercial Bank for Foreign Trade of Vietnam (Vietcombank) - Hung Yen branch</li>
                    <li>Swift Code: BFTVVNVX059</li>
                </ul>
            </div>



        </div>
        <!-- /scholarship-section__field -->


    </div>

    
    <div class="scholarship-form__submit">
        <a href="<?php echo e(route('scholarship.show.step6', $redirect_parram)); ?>" class="scholarship-form-submit__btn scholarship-form-submit__btn--previous">Previous</a>
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
            Validator.file({
                selector: '#scholarship-section__field-file-document-recommendation',
                required: true,
                extension: ['jpg', 'jpeg', 'png','pdf'],
                upload: 'recommendation_letter',
                size: 2,
            }),
            Validator.file({
                selector: '#scholarship-section__field-file-document-disability',
                extension: ['jpg', 'jpeg', 'png','pdf'],
                size: 2,
                upload: 'disability_finanial_support',
            }),
            Validator.file({
                selector: '#scholarship-section__field-file-document-fee-receipt',
                extension: ['jpg', 'jpeg', 'png','pdf'],
                size: 2,
                upload: 'payment_fee_receipt',
            }),
            Validator.file({
                selector: '#scholarship-section__field-file-document-other',
                extension: ['jpg', 'jpeg', 'png','pdf'],
                size: 2,
                upload: 'other',
            })
        ],
        onSubmit: (data) => {
            data.form.submit();
        }
    });
</script>
<?php $__env->stopSection(); ?> <!-- script -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/step7.blade.php ENDPATH**/ ?>