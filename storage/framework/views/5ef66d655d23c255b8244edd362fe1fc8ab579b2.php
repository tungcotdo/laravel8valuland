
<?php $__env->startSection('content'); ?>
<form class="scholarship__form" id="scholarship__form" action="<?php echo e(route('scholarship.store.step3', $redirect_parram)); ?>" method="POST">
    <input type="hidden" id="hd_recaptcha" name="hd_recaptcha">
    <?php echo csrf_field(); ?>
    <div class="scholarship__section">
        <p class="scholarship__note">
            Note: (<span class="required__symbol">*</span>) This field is required/ <span class="text__vi">Vui lòng không để trống thông tin này!</span>
        </p>

        <h3 class="scholarship-section__heading">QUALIFICATIONS</h3>
        
        <p class="scholarship__note">Instruction: Please list down your academic result during HIGH SCHOOL in chronological order, starting with the most recent result first 
            (such as Grade 12 then Grade 11, Grade 10 or equivalent…)</p>

        <div class="scholarship-section__field">

            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen">1</legend>
                <div class="grid-desktop-five-col grid-ipad-three-col">
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group validate">
                        <label class="scholarship-section__field-label">Name<span class="required__symbol">*</span></label>
                        <select class="scholarship-section__field-selectbox scholarship-section__field-selectbox-qualification" id="scholarship-section__field-name-qualification-1" name="qualification_1">
                            <option value="">-- Choose option --</option>
                            <?php $__currentLoopData = $qualification_text; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value['Value']); ?>" <?php echo e(!empty( $qualification ) && $value['Value'] == $qualification->qualification_1 ? 'selected' : ''); ?>><?php echo e($value['Value']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if( !empty( $qualification ) && $qualification->qualification_1 == 'Other' ): ?>
                            <input class="scholarship-section__field-textbox scholarship-section__field-textbox-otherqualification" type="text" id="scholarship-section__field-other-name-qualification-1" name="qualification_other_1" value="<?php echo e($qualification->qualification_other_1); ?>">
                        <?php endif; ?>
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group validate">
                        <label class="scholarship-section__field-label">Name of institution<span class="required__symbol">*</span></label>
                        <input class="scholarship-section__field-textbox" type="text" id="scholarship-section__field-textbox-institution-qualification1" name="institution_1" value="<?php echo e(!empty( $qualification->institution_1 ) ? $qualification->institution_1 : ''); ?>">
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group validate">
                        <label class="scholarship-section__field-label">Country of study<span class="required__symbol">*</span></label>
                        <input class="scholarship-section__field-textbox" type="text" id="scholarship-section__field-textbox-country-qualification1" name="country_1" value="<?php echo e(!empty( $qualification->country_1 ) ? $qualification->country_1 : ''); ?>">
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group validate">
                        <label class="scholarship-section__field-label">Period from..to<span class="required__symbol">*</span> <span class="scholarship-section__field-label-eg">(e.g: 09/2021 - 09/2024)</span></label>
                        <input class="scholarship-section__field-textbox" type="text" id="scholarship-section__field-textbox-period-qualification1" name="period_1" value="<?php echo e(!empty( $qualification->period_1 ) ? $qualification->period_1 : ''); ?>">
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group validate">
                        <label class="scholarship-section__field-label">GPA<span class="required__symbol">*</span></label>
                        <input class="scholarship-section__field-textbox" type="text" id="scholarship-section__field-textbox-gpa-qualification1" name="gpa_1" value="<?php echo e(!empty( $qualification->gpa_1 ) ? $qualification->gpa_1 : ''); ?>">
                        <small class="error-message"></small>
                    </div>
                </div>
            </fieldset>

            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen">2</legend>
                <div class="grid-desktop-five-col grid-ipad-three-col">
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Name</label>
                        <select class="scholarship-section__field-selectbox scholarship-section__field-selectbox-qualification" id="scholarship-section__field-name-qualification-2" name="qualification_2">
                        <option value="">-- Choose option --</option>
                        <?php $__currentLoopData = $qualification_text; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value['Value']); ?>" <?php echo e(!empty( $qualification ) && $value['Value'] == $qualification->qualification_2 ? 'selected' : ''); ?>><?php echo e($value['Value']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if( !empty( $qualification )  && $qualification->qualification_2 == 'Other' ): ?>
                            <input class="scholarship-section__field-textbox scholarship-section__field-textbox-otherqualification" type="text" name="qualification_other_2" value="<?php echo e($qualification->qualification_other_2); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Name of institution</label>
                        <input class="scholarship-section__field-textbox" type="text" name="institution_2" value="<?php echo e(!empty( $qualification->institution_2 ) ? $qualification->institution_2 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Country of study</label>
                        <input class="scholarship-section__field-textbox" type="text" name="country_2" value="<?php echo e(!empty( $qualification->country_2 ) ? $qualification->country_2 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Period from..to <span class="scholarship-section__field-label-eg">(e.g: 09/2021 - 09/2024)</span></label>
                        <input class="scholarship-section__field-textbox" type="text" name="period_2" value="<?php echo e(!empty( $qualification->period_2 ) ? $qualification->period_2 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">GPA</label>
                        <input class="scholarship-section__field-textbox" type="text" name="gpa_2" value="<?php echo e(!empty( $qualification->gpa_2 ) ? $qualification->gpa_2 : ''); ?>">
                    </div>
                </div>
            </fieldset>
            
            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen">3</legend>
                <div class="grid-desktop-five-col grid-ipad-three-col">
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Name</label>
                        <select class="scholarship-section__field-selectbox scholarship-section__field-selectbox-qualification" id="scholarship-section__field-name-qualification-3" name="qualification_3">
                            <option value="">-- Choose option --</option>
                            <?php $__currentLoopData = $qualification_text; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value['Value']); ?>" <?php echo e(!empty( $qualification ) && $value['Value'] == $qualification->qualification_3 ? 'selected' : ''); ?>><?php echo e($value['Value']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if( !empty( $qualification )  && $qualification->qualification_3 == 'Other' ): ?>
                            <input class="scholarship-section__field-textbox scholarship-section__field-textbox-otherqualification" type="text" name="qualification_other_3" value="<?php echo e($qualification->qualification_other_3); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Name of institution</label>
                        <input class="scholarship-section__field-textbox" type="text" name="institution_3" value="<?php echo e(!empty( $qualification->institution_3 ) ? $qualification->institution_3 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Country of study</label>
                        <input class="scholarship-section__field-textbox" type="text" name="country_3" value="<?php echo e(!empty( $qualification->country_3 ) ? $qualification->country_3 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Period from..to <span class="scholarship-section__field-label-eg">(e.g: 09/2021 - 09/2024)</span></label>
                        <input class="scholarship-section__field-textbox" type="text" name="period_3" value="<?php echo e(!empty( $qualification->period_3 ) ? $qualification->period_3 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">GPA</label>
                        <input class="scholarship-section__field-textbox" type="text" name="gpa_3" value="<?php echo e(!empty( $qualification->gpa_3 ) ? $qualification->gpa_3 : ''); ?>">
                    </div>
                </div>
            </fieldset>

            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen">4</legend>
                <div class="grid-desktop-five-col grid-ipad-three-col">
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Name</label>
                        <select class="scholarship-section__field-selectbox scholarship-section__field-selectbox-qualification" id="scholarship-section__field-name-qualification-4" name="qualification_4">
                            <option value="">-- Choose option --</option>
                            <?php $__currentLoopData = $qualification_text; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value['Value']); ?>" <?php echo e(!empty( $qualification ) && $value['Value'] == $qualification->qualification_4 ? 'selected' : ''); ?>><?php echo e($value['Value']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if( !empty( $qualification )  && $qualification->qualification_4 == 'Other' ): ?>
                            <input class="scholarship-section__field-textbox scholarship-section__field-textbox-otherqualification" type="text" name="qualification_other_4" value="<?php echo e($qualification->qualification_other_4); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Name of institution</label>
                        <input class="scholarship-section__field-textbox" type="text" name="institution_4" value="<?php echo e(!empty( $qualification ) ? $qualification->institution_4 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Country of study</label>
                        <input class="scholarship-section__field-textbox" type="text" name="country_4" value="<?php echo e(!empty( $qualification ) ? $qualification->country_4 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Period from..to <span class="scholarship-section__field-label-eg">(e.g: 09/2021 - 09/2024)</span></label>
                        <input class="scholarship-section__field-textbox" type="text" name="period_4" value="<?php echo e(!empty( $qualification ) ? $qualification->period_4 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">GPA</label>
                        <input class="scholarship-section__field-textbox" type="text" name="gpa_4" value="<?php echo e(!empty( $qualification ) ? $qualification->gpa_4 : ''); ?>">
                    </div>
                </div>
            </fieldset>

            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen">5</legend>
                <div class="grid-desktop-five-col grid-ipad-three-col">
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Name</label>
                        <select class="scholarship-section__field-selectbox scholarship-section__field-selectbox-qualification" id="scholarship-section__field-name-qualification-5" name="qualification_5">
                            <option value="">-- Choose option --</option>
                            <?php $__currentLoopData = $qualification_text; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value['Value']); ?>" <?php echo e(!empty( $qualification ) && $value['Value'] == $qualification->qualification_5 ? 'selected' : ''); ?>><?php echo e($value['Value']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if( !empty( $qualification )  && $qualification->qualification_5 == 'Other' ): ?>
                            <input class="scholarship-section__field-textbox scholarship-section__field-textbox-otherqualification" type="text" name="qualification_other_5" value="<?php echo e($qualification->qualification_other_5); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Name of institution</label>
                        <input class="scholarship-section__field-textbox" type="text" name="institution_5" value="<?php echo e(!empty( $qualification->institution_5 ) ? $qualification->institution_5 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Country of study</label>
                        <input class="scholarship-section__field-textbox" type="text" name="country_5" value="<?php echo e(!empty( $qualification->country_5 ) ? $qualification->country_5 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">Period from..to <span class="scholarship-section__field-label-eg">(e.g: 09/2021 - 09/2024)</span></label>
                        <input class="scholarship-section__field-textbox" type="text" name="period_5" value="<?php echo e(!empty( $qualification->period_5 ) ? $qualification->period_5 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group scholarship-section__field-textbox-group">
                        <label class="scholarship-section__field-label">GPA</label>
                        <input class="scholarship-section__field-textbox" type="text" name="gpa_5" value="<?php echo e(!empty( $qualification->gpa_5 ) ? $qualification->gpa_5 : ''); ?>">
                    </div>
                </div>
            </fieldset>

            <div class="scholarship-section__field-file-group">
                <label class="scholarship-section__field-label">English-translated copy of high school graduation certificate OR provisional high school graduation certificate (if applicable)</label>
                <div class="validate">
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->high_school) ? $document->high_school : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file-english-translated-highschool" <?php echo e(!empty($document->high_school) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
            </div>

            <div class="scholarship-section__field-file-group">
                <label class="scholarship-section__field-label">English-translated copy of academic transcript for grades 10, 11 and 12 and other transcript(s) <span class="required__symbol">*</span></label>
                <div class="validate">
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->academic_transcript) ? $document->academic_transcript : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file-english-translated-academic" <?php echo e(!empty($document->academic_transcript) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
            </div>
            <div class="scholarship-section__field-file-group">
                <label class="scholarship-section__field-label">International Qualifications (if any): English-translated Certificate(s) and transcript(s)</label>
                <div class="validate">
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->international_qualification) ? $document->international_qualification : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file-english-translated-internationalqualification" <?php echo e(!empty($document->international_qualification) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
            </div>

        </div>

    </div>

    <div class="scholarship-form__submit">
        <a href="<?php echo e(route('scholarship.show.step2', $redirect_parram)); ?>" class="scholarship-form-submit__btn scholarship-form-submit__btn--previous">Previous</a>
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--save" id="scholarship-form-submit__btn--save" type="submit" value="Save">
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--next" id="scholarship-form-submit__btn--next" type="submit" value="Next">
    </div>
    
</form>
<?php $__env->stopSection(); ?> <!-- content -->

<?php $__env->startSection('script'); ?>
<script>
        
        var qualificationSelects = document.querySelectorAll(".scholarship-section__field-selectbox-qualification");
        qualificationSelects.forEach( element => {
            element.addEventListener("change", function(){ 
                if( element.value == 'Other' ){
                    var positionIndex = element.id.split("scholarship-section__field-name-qualification-")['1'];
                    var otherTextbox = document.createElement("input");
                    otherTextbox.classList.add("scholarship-section__field-textbox");
                    otherTextbox.classList.add("scholarship-section__field-textbox-otherqualification");
                    otherTextbox.name = "qualification_other_" + positionIndex;
                    otherTextbox.placeholder = " Enter qualification";
                    element.parentElement.appendChild(otherTextbox);
                }else{
                    element.parentElement.querySelector(".scholarship-section__field-textbox-otherqualification").remove();
                }
            });
        } );

        Validator({
            form: '#scholarship__form',
            rules: [
                Validator.slbRequired({
                    selector: '#scholarship-section__field-name-qualification-1'
                }),
                Validator.tbRequired({
                    selector: '#scholarship-section__field-textbox-institution-qualification1'
                }),
                Validator.tbRequired({
                    selector: '#scholarship-section__field-textbox-country-qualification1'
                }),
                Validator.tbRequired({
                    selector: '#scholarship-section__field-textbox-period-qualification1'
                }),
                Validator.tbRequired({
                    selector: '#scholarship-section__field-textbox-gpa-qualification1'
                }),
                Validator.file({
                    selector: '#scholarship-section__field-file-english-translated-highschool',
                    size: 2,
                    extension: ['jpg', 'jpeg', 'png','pdf'],
                    upload: 'high_school'
                }),
                Validator.file({
                    selector: '#scholarship-section__field-file-english-translated-academic',
                    required: true,
                    size: 20,
                    extension: ['jpg', 'jpeg', 'png','pdf'],
                    upload: 'academic_transcript'
                }),
                Validator.file({
                    selector: '#scholarship-section__field-file-english-translated-internationalqualification',
                    size: 2,
                    extension: ['jpg', 'jpeg', 'png','pdf'],
                    upload: 'international_qualification'
                })
            ],
            onSubmit: (data) => {
                data.form.submit();
            }
        });
        
    </script>
<?php $__env->stopSection(); ?> <!-- script -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/step3.blade.php ENDPATH**/ ?>