
<?php $__env->startSection('content'); ?>
<form class="scholarship__form" id="scholarship__form" action="<?php echo e(route('scholarship.store.step2', $redirect_parram)); ?>" method="POST">
    <input type="hidden" id="hd_recaptcha" name="hd_recaptcha">
    <?php echo csrf_field(); ?>
    <div class="scholarship__section">
        <p class="scholarship__note">
            Note: (<span class="required__symbol">*</span>) This field is required/ <span class="text__vi">Vui lòng không để trống thông tin này!</span>
        </p>

        <!-- PERSONAL INFOMATION -->
        <h3 class="scholarship-section__heading">PERSONAL INFORMATION</h3>
        <div class="scholarship-section__field">

            <div class="grid-desktop-three-col grid-ipad-three-col">
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">First name<span class="required__symbol">*</span></label>
                    <input class="scholarship-section__field-textbox" type="text" name="first_name" id="scholarship-section__field-textbox--firstname" value="<?php echo e(!empty($student->first_name) ? $student->first_name : ''); ?>">
                    <small class="error-message"></small>
                </div>
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">Middle name</label>
                    <input class="scholarship-section__field-textbox" type="text" name="middle_name" id="scholarship-section__field-textbox--middlename" value="<?php echo e(!empty($student->middle_name) ? $student->middle_name : ''); ?>">
                    <small class="error-message"></small>
                </div>
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">Last name<span class="required__symbol">*</span></label>
                    <input class="scholarship-section__field-textbox" type="text" name="last_name" id="scholarship-section__field-textbox--lastname" value="<?php echo e(!empty($student->last_name) ? $student->last_name : ''); ?>">
                    <small class="error-message"></small>
                </div>
            </div>

            <div class="grid-desktop-three-col">
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">Full name in Vietnamese (Tên tiếng việt có dấu)<span class="required__symbol">*</span></label>
                    <input class="scholarship-section__field-textbox" type="text" name="fullname_vn" id="scholarship-section__field-textbox--fullname" value="<?php echo e(!empty($student->fullname_vn) ? $student->fullname_vn : ''); ?>">
                    <small class="error-message"></small>
                </div>
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">Mobile phone<span class="required__symbol">*</span></label>
                    <input class="scholarship-section__field-textbox" type="text" name="phone_number" id="scholarship-section__field-textbox--phone" value="<?php echo e(!empty($student->phone_number) ? $student->phone_number : ''); ?>">
                    <small class="error-message"></small>
                </div>
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">Email (in CAPITALS)<span class="required__symbol">*</span></label>
                    <input class="scholarship-section__field-textbox" type="text" name="email" id="scholarship-section__field-textbox--email" value="<?php echo e(!empty($student->email) ? $student->email : ''); ?>">
                    <small class="error-message"></small>
                </div>
            </div>

            <div class="grid-desktop-three-col">
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">Gender<span class="required__symbol">*</span></label>
                    <div class="grid-three-col scholarship-section__field-gender-group">
                        <div class="scholarship-section__field-gender-radio-group">
                            <input type="radio" class="scholarship-section__field-radio-input scholarship-section__field-radio-gender-input" name="gender" value="Male" <?php echo e(!empty($student->gender) && $student->gender == 'Male' ? 'checked' : ''); ?>>
                            <label class="scholarship-section__field-radio-gender-label" for="scholarship-section__field-gender-male"> Male</label>
                        </div>
                        <div class="scholarship-section__field-gender-radio-group">
                            <input type="radio" class="scholarship-section__field-radio-input scholarship-section__field-radio-gender-input" name="gender" value="Female" <?php echo e(!empty($student->gender) && $student->gender == 'Female' ? 'checked' : ''); ?>>
                            <label class="scholarship-section__field-radio-gender-label" for="scholarship-section__field-gender-female"> Female</label>
                        </div>
                        <div class="scholarship-section__field-gender-radio-group">
                            <input type="radio" class="scholarship-section__field-radio-input scholarship-section__field-radio-gender-input" name="gender" value="Other" <?php echo e(!empty($student->gender) && $student->gender == 'Other' ? 'checked' : ''); ?>>
                            <label class="scholarship-section__field-radio-gender-label" for="scholarship-section__field-gender-other"> Other</label>
                        </div>
                    </div>
                    <small class="error-message"></small>
                </div>
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">Date of birth<span class="required__symbol">*</span></label>
                    <div class="grid-three-col scholarship-section__field-birthday" id="scholarship-section__field-birthday">
                        <select class="scholarship-section__field-selectbox" name="day_of_birth">
                            <option value="">Day</option>
                            <?php $__currentLoopData = $DOB_days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value='<?php echo e($item["Value"]); ?>' <?php echo e(!empty($student) && $student->day_of_birth == $item["Value"] ? 'selected' : ''); ?>><?php echo e($item["Value"]); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <select class="scholarship-section__field-selectbox" name="month_of_birth">
                            <option value="">Month</option>
                            <?php $__currentLoopData = $DOB_months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value='<?php echo e($item["Value"]); ?>' <?php echo e(!empty($student) && $student->month_of_birth == $item["Value"] ? 'selected' : ''); ?>><?php echo e($item["Value"]); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <select class="scholarship-section__field-selectbox" name="year_of_birth">
                            <option value="">Year</option>
                            <?php $__currentLoopData = $DOB_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value='<?php echo e($item["Value"]); ?>' <?php echo e(!empty($student) && $student->year_of_birth == $item["Value"] ? 'selected' : ''); ?>><?php echo e($item["Value"]); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <small class="error-message"></small>
                </div>
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">Place of birth<span class="required__symbol">*</span></label>
                    <input class="scholarship-section__field-textbox" type="text" id="scholarship-section__field-textbox--placeofbirth" name="place_of_birth" value="<?php echo e(!empty($student->place_of_birth) ? $student->place_of_birth : ''); ?>">
                    <small class="error-message"></small>
                </div>
            </div>

            <div class="grid-desktop-three-col grid-ipad-three-col">
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">National ID card number/Passport number<span class="required__symbol">*</span></label>
                    <input class="scholarship-section__field-textbox" type="text" id="scholarship-section__field-textbox--passportnumber" name="passport" value="<?php echo e(!empty($student->passport) ? $student->passport : ''); ?>">
                    <small class="error-message"></small>
                </div>
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">Passport-sized photograph<span class="required__symbol">*</span></label>
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->passport_photograph) ? $document->passport_photograph : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file--passportphoto" <?php echo e(!empty($document->passport_photograph) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
                <div class="scholarship-section__field-group validate">
                    <label class="scholarship-section__field-label">Notarised copy of ID card/Passport<span class="required__symbol">*</span></label>
                    <small class="note-message-file"></small>
                    <div>
                        <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->passport_copy) ? $document->passport_copy : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file--passportcopy" <?php echo e(!empty($document->passport_copy) ? 'hidden' : ''); ?>>
                    </div>
                    <small class="error-message"></small>
                </div>
            </div>

            <div class="scholarship-section__field-textarea-group validate">
                <label class="scholarship-section__field-label">Current address<span class="required__symbol">*</span></label>
                <textarea class="scholarship-section__field-textarea-input" type="text" id="scholarship-section__field-textarea-currentaddress" name="current_address"><?php echo e(!empty($student->current_address) ? $student->current_address : ''); ?></textarea>
                <small class="error-message"></small>
            </div>

            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen" >EMERGENCY CONTACT 1</legend>
                <div class="grid-desktop-four-col grid-ipad-four-col">
                    <div class="scholarship-section__field-group validate">
                        <label class="scholarship-section__field-label d-none">EMERGENCY CONTACT 1 - Name<span class="required__symbol">*</span></label>
                        <label class="scholarship-section__field-label">Name<span class="required__symbol">*</span></label>
                        <input class="scholarship-section__field-textbox" id="scholarship-section__field-textbox--name" type="text" name="e_name_1" value="<?php echo e(!empty($student->e_name_1) ? $student->e_name_1 : ''); ?>">
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group validate">
                        <label class="scholarship-section__field-label d-none">EMERGENCY CONTACT 1 - Relationship<span class="required__symbol">*</span></label>
                        <label class="scholarship-section__field-label">Relationship<span class="required__symbol">*</span></label>
                        <select class="scholarship-section__field-selectbox" id="scholarship-section__field-name-relationship-1" name="e_relationship_1">
                            <option value="">-- Choose option --</option>
                            <?php $__currentLoopData = $relationships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value='<?php echo e($relationship["Value"]); ?>' <?php echo e(isset( $student->e_relationship_1 ) && $student->e_relationship_1 == $relationship["Value"] ? 'selected' : ''); ?>><?php echo e($relationship["Value"]); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if( !empty(  $student ) && $student->e_relationship_1 == 'other' ): ?>
                            <input class="scholarship-section__field-textbox scholarship-section__field-textbox-otherrelationship" type="text" name="e_relationship_other_1" value="<?php echo e($student->e_relationship_other_1); ?>">
                        <?php endif; ?>
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group validate">
                        <label class="scholarship-section__field-label d-none">EMERGENCY CONTACT 1 - Phone no<span class="required__symbol">*</span></label>
                        <label class="scholarship-section__field-label">Phone no<span class="required__symbol">*</span></label>
                        <input class="scholarship-section__field-textbox" id="scholarship-section__field-textbox--phone" type="text" name="e_phone_1" value="<?php echo e(!empty($student->e_phone_1) ? $student->e_phone_1 : ''); ?>">
                        <small class="error-message"></small>
                    </div>
                    <div class="scholarship-section__field-group validate">
                        <label class="scholarship-section__field-label d-none">EMERGENCY CONTACT 1 - Email<span class="required__symbol">*</span></label>
                        <label class="scholarship-section__field-label">Email<span class="required__symbol">*</span></label>
                        <input class="scholarship-section__field-textbox" id="scholarship-section__field-textbox--emergency-email" type="text" name="e_email_1" value="<?php echo e(!empty($student->e_email_1) ? $student->e_email_1 : ''); ?>">
                        <small class="error-message"></small>
                    </div>
                </div>
            </fieldset>

            <fieldset class="scholarship-section__fieldset-group">
                <legend class="scholarship-section__fieldset-legen" >EMERGENCY CONTACT 2</legend>
                <div class="grid-desktop-four-col grid-ipad-four-col">
                    <div class="scholarship-section__field-group validate">
                        <label class="scholarship-section__field-label">Name</label>
                        <input class="scholarship-section__field-textbox" type="text" name="e_name_2" value="<?php echo e(!empty($student->e_name_2) ? $student->e_name_2 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group validate">
                        <label class="scholarship-section__field-label">Relationship</label>
                        <select class="scholarship-section__field-selectbox" id="scholarship-section__field-name-relationship-2" name="e_relationship_2">
                            <option value="">-- Choose option --</option>
                            <?php $__currentLoopData = $relationships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value='<?php echo e($relationship["Value"]); ?>' <?php echo e(isset( $student->e_relationship_2 ) && $student->e_relationship_2 == $relationship["Value"] ? 'selected' : ''); ?>><?php echo e($relationship["Value"]); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if( !empty(  $student ) && $student->e_relationship_2 == 'other' ): ?>
                            <input class="scholarship-section__field-textbox scholarship-section__field-textbox-otherrelationship" type="text" name="e_relationship_other_2" value="<?php echo e($student->e_relationship_other_2); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="scholarship-section__field-group validate">
                        <label class="scholarship-section__field-label">Phone no</label>
                        <input class="scholarship-section__field-textbox" type="text" name="e_phone_2" value="<?php echo e(!empty($student->e_phone_2) ? $student->e_phone_2 : ''); ?>">
                    </div>
                    <div class="scholarship-section__field-group validate">
                        <label class="scholarship-section__field-label">Email</label>
                        <input class="scholarship-section__field-textbox" type="text" name="e_email_2"  value="<?php echo e(!empty($student->e_email_2) ? $student->e_email_2 : ''); ?>">
                    </div>
                </div>
            </fieldset>


        </div>
        <!-- / PERSONAL INFOMATION -->

    </div>

    
    <div class="scholarship-form__submit">
        <a href="<?php echo e(route('scholarship.show.step1', $redirect_parram)); ?>" class="scholarship-form-submit__btn scholarship-form-submit__btn--previous">Previous</a>
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--save" id="scholarship-form-submit__btn--save" type="submit" value="Save">
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--next" id="scholarship-form-submit__btn--next" type="submit" value="Next">
    </div>


</form>
<?php $__env->stopSection(); ?> <!-- content -->

<?php $__env->startSection('script'); ?>
<script>

    var qualificationSelects = document.querySelectorAll(".scholarship-section__field-selectbox");
        qualificationSelects.forEach( element => {
        element.addEventListener("change", function(){ 
            if( element.value == 'other' ){
                var positionIndex = element.id.split("scholarship-section__field-name-relationship-")['1'];
                var otherTextbox = document.createElement("input");
                otherTextbox.classList.add("scholarship-section__field-textbox");
                otherTextbox.classList.add("scholarship-section__field-textbox-otherrelationship");
                otherTextbox.name = "e_relationship_other_" + positionIndex;
                otherTextbox.placeholder = " Please clarify";
                element.parentElement.appendChild(otherTextbox);
            }else{
                element.parentElement.querySelector(".scholarship-section__field-textbox-otherrelationship").remove();
            }
        });
    } );
        
    Validator({
        form: '#scholarship__form',
        rules: [
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox--firstname'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox--lastname'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox--fullname',
                submit: true
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox--phone'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox--email',
                submit: true
            }),
            Validator.email({
                selector: '#scholarship-section__field-textbox--email',
                submit: true
            }),
            Validator.rbRequired({
                selector: '.scholarship-section__field-radio-gender-input'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox--passportnumber'
            }),
            Validator.bdRequired({
                selector: '#scholarship-section__field-birthday'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox--placeofbirth'
            }),
            Validator.file({
                selector: '#scholarship-section__field-file--passportphoto',
                required: true,
                size: 2,
                extension: ['jpg', 'jpeg', 'png'],
                upload: 'passport_photograph'
            }),
            Validator.file({
                selector: '#scholarship-section__field-file--passportcopy',
                required: true,
                size: 2,
                extension: ['jpg', 'jpeg', 'png','pdf'],
                upload: 'passport_copy'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textarea-currentaddress'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox--name'
            }),
            Validator.slbRequired({
                selector: '#scholarship-section__field-name-relationship-1'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox--phone'
            }),
            Validator.tbRequired({
                selector: '#scholarship-section__field-textbox--emergency-email'
            }),
            Validator.email({
                selector: '#scholarship-section__field-textbox--emergency-email'
            })
        ],
        onSubmit: (data) => {
            data.form.submit();
        }
    });

    
    
</script>
<?php $__env->stopSection(); ?> <!-- script -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/step2.blade.php ENDPATH**/ ?>