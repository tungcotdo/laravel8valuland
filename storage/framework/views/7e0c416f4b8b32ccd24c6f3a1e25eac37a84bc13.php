
<?php $__env->startSection('content'); ?>
<form class="scholarship__form" id="scholarship__form" action="<?php echo e(route('scholarship.store.step4', $redirect_parram)); ?>" method="POST">
    <input type="hidden" id="hd_recaptcha" name="hd_recaptcha">
    <?php echo csrf_field(); ?>
    <div class="scholarship__section">
        <p class="scholarship__note">
            Note: (<span class="required__symbol">*</span>) This field is required/ <span class="text__vi">Vui lòng không để trống thông tin này!</span>
        </p>

        <h3 class="scholarship-section__heading">EXTRA - CURRICULAR ACTIVITIES</h3>

        <div class="scholarship-section__field">

            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen">1</legend>
                <div class="grid-desktop-five-col grid-ipad-three-col">
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group validate">
                        <label class="scholarship-section__field-label">Activity<span class="required__symbol">*</span></label>
                        <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textbox-activity-curricular1" name="activity_1"><?php echo e(!empty( $activity->activity_1 ) ? $activity->activity_1 : ''); ?></textarea>
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group validate">
                        <label class="scholarship-section__field-label">Organisation<span class="required__symbol">*</span></label>
                        <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textbox-organization-curricular1" name="organization_1"><?php echo e(!empty( $activity->organization_1 ) ? $activity->organization_1 : ''); ?></textarea>
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group validate">
                        <label class="scholarship-section__field-label">Role & Task<span class="required__symbol">*</span></label>
                        <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textbox-roletask-curricular1" name="role_1"><?php echo e(!empty( $activity->role_1 ) ? $activity->role_1 : ''); ?></textarea>
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group validate">
                        <label class="scholarship-section__field-label">Period from ... to ...<span class="required__symbol">*</span></label>
                        <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textbox-period-curricular1" name="period_1"><?php echo e(!empty( $activity->period_1 ) ? $activity->period_1 : ''); ?></textarea>
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group validate">
                        <label class="scholarship-section__field-label">Prize/certificate/achievement<span class="required__symbol">*</span></label>
                        <textarea class="scholarship-section__field-textarea-input" id="scholarship-section__field-textbox-prize-curricular1" name="prize_1"><?php echo e(!empty( $activity->prize_1 ) ? $activity->prize_1 : ''); ?></textarea>
                        <small class="error-message"></small>
                    </div>
                </div>
            </fieldset>


            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen">2</legend>
                <div class="grid-desktop-five-col grid-ipad-three-col">
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Activity</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="activity_2"><?php echo e(!empty( $activity->activity_2 ) ? $activity->activity_2 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Organisation</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="organization_2"><?php echo e(!empty( $activity->organization_2 ) ? $activity->organization_2 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Role & Task</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="role_2"><?php echo e(!empty( $activity->role_2 ) ? $activity->role_2 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Period from ... to ...</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="period_2"><?php echo e(!empty( $activity->period_2 ) ? $activity->period_2 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Prize/certificate/achievement</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="prize_2"><?php echo e(!empty( $activity->prize_2 ) ? $activity->prize_2 : ''); ?></textarea>
                    </div>
                </div>
            </fieldset>

            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen">3</legend>
                <div class="grid-desktop-five-col grid-ipad-three-col">
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Activity</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="activity_3"><?php echo e(!empty( $activity->activity_3 ) ? $activity->activity_3 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Organisation</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="organization_3"><?php echo e(!empty( $activity->organization_3 ) ? $activity->organization_3 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Role & Task</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="role_3"><?php echo e(!empty( $activity->role_3 ) ? $activity->role_3 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Period from ... to ...</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="period_3"><?php echo e(!empty( $activity->period_3 ) ? $activity->period_3 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Prize/certificate/achievement</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="prize_3"><?php echo e(!empty( $activity->prize_3 ) ? $activity->prize_3 : ''); ?></textarea>
                    </div>
                </div>
            </fieldset>

            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen">4</legend>
                <div class="grid-desktop-five-col grid-ipad-three-col">
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Activity</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="activity_4"><?php echo e(!empty( $activity->activity_4 ) ? $activity->activity_4 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Organisation</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="organization_4"><?php echo e(!empty( $activity->organization_4 ) ? $activity->organization_4 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Role & Task</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="role_4"><?php echo e(!empty( $activity->role_4 ) ? $activity->role_4 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Period from ... to ...</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="period_4"><?php echo e(!empty( $activity->period_4 ) ? $activity->period_4 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Prize/certificate/achievement</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="prize_4"><?php echo e(!empty( $activity->prize_4 ) ? $activity->prize_4 : ''); ?></textarea>
                    </div>
                </div>
            </fieldset>

            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen">5</legend>
                <div class="grid-desktop-five-col grid-ipad-three-col">
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Activity</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="activity_5"><?php echo e(!empty( $activity->activity_5 ) ? $activity->activity_5 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Organisation</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="organization_5"><?php echo e(!empty( $activity->organization_5 ) ? $activity->organization_5 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Role & Task</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="role_5"><?php echo e(!empty( $activity->role_5 ) ? $activity->role_5 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Period from ... to ...</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="period_5"><?php echo e(!empty( $activity->period_5 ) ? $activity->period_5 : ''); ?></textarea>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Prize/certificate/achievement</label>
                        <textarea class="scholarship-section__field-textarea-input"  name="prize_5"><?php echo e(!empty( $activity->prize_5 ) ? $activity->prize_5 : ''); ?></textarea>
                    </div>
                </div>
            </fieldset>

            <div class="scholarship-section__field-file-group">
                <label class="scholarship-section__field-label">Evidence of extra-curricular activities (English translated copy if not in English) <span class="required__symbol">*</span></label>
                <div class="validate">
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->extra_curricular) ? $document->extra_curricular : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file-evidence-of-activity" <?php echo e(!empty($document->extra_curricular) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
            </div>

        </div>

    </div>

    <div class="scholarship-form__submit">
        <a href="<?php echo e(route('scholarship.show.step3', $redirect_parram)); ?>" class="scholarship-form-submit__btn scholarship-form-submit__btn--previous">Previous</a>
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
                selector: '#scholarship-section__field-textbox-activity-curricular1'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox-organization-curricular1'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox-roletask-curricular1'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox-period-curricular1'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox-prize-curricular1'
            }),
            Validator.file({
                selector: '#scholarship-section__field-file-evidence-of-activity',
                required: true,
                size: 20,
                extension: ['jpg', 'jpeg', 'png','pdf'],
                upload: 'extra_curricular'
            })
        ],
        onSubmit: (data) => {
            data.form.submit();
        }
    });
    
</script>
<?php $__env->stopSection(); ?> <!-- script -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/step4.blade.php ENDPATH**/ ?>