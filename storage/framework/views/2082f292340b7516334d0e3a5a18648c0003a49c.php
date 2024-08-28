

<?php $__env->startSection('link'); ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form class="scholarship__form" id="scholarship__form" action="<?php echo e(route('scholarship.store.step5', $redirect_parram)); ?>" method="POST">
    <input type="hidden" id="hd_recaptcha" name="hd_recaptcha">
    <?php echo csrf_field(); ?>
    <div class="scholarship__section">
        <p class="scholarship__note">
            Note: (<span class="required__symbol">*</span>) This field is required/ <span class="text__vi">Vui lòng không để trống thông tin này!</span>
        </p>

        <h3 class="scholarship-section__heading">PROPOSED STUDY PROGRAMMES</h3>

        <div class="scholarship-section__field validate" id="scholarship-section__proposed-study-programmes">
            <small id="proposed-study-programmes-error-message" class="error-message"></small>
            
            <fieldset class="scholarship-section__fieldset-group">
                <?php $__currentLoopData = $programmeLabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="scholarship-section__field-checkbox-group">
                        <input type="radio" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-stafford-<?php echo e($key); ?>" value="<?php echo e($value['Name']); ?>" name="program_selection" <?php echo e(isset($programme->program_selection) && $programme->program_selection == $value['Name'] ? 'checked' : ''); ?>>
                        <label for="scholarship-section__field-checkbox-input-stafford-<?php echo e($key); ?>" class="scholarship-section__field-checkbox-label"> <?php echo e($value['Name']); ?></label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="scholarship-section__field-group validate" id="field__show-ccp-upload">
                    <input type="hidden" name="is_ccp_programme" id="is_ccp_programme" value="0">
                    <label class="mr-1">An original Portfolio of Artwork (<a href="<?php echo e(asset('doc/Portfolio_of_Artwork_template.docx')); ?>">Download template</a>)<span class="required__symbol">*</span></label><br>
                    <small class="note-message-file"></small>

                    <div id="scholarship-section__ccp">
                        <button class="scholarship-section__field-file-edit" id="scholarship-section__field-file-edit--ccp"><?php echo e(!empty($document->portfolio_of_artwork) ? $document->portfolio_of_artwork : ''); ?></button>
                        <input class="scholarship-section__field-file" type="file" id="scholarship-section__field-file-ccp">
                    </div>

                    <small class="error-message error-message-ccp"></small>
                </div>

            </fieldset>

        </div>
        <!-- /scholarship-section__field -->

        <h3 class="scholarship-section__heading">ENGLISH LANGUAGE PROFICIENCY</h3>

        <div class="scholarship-section__field">
            <div class="validate">
                <div class="scholarship-section__field-yn-group">
                    <label class="scholarship-section__field-label">Is English the language of your secondary/ high school or tertiary studies?<span class="required__symbol">*</span></label>
                    <div class="scholarship-section__field-yn-radio">
                        <div class="scholarship-section__field-radio-group">
                            <input type="radio" class="scholarship-section__field-radio-yn-input field__rb-eng-at-school" name="english_is_secondary" value="1" id="field__rb-eng-at-school-yes" <?php echo e(isset( $programme->english_is_secondary ) && $programme->english_is_secondary == 1  ? 'checked' : ''); ?>>
                            <label class="scholarship-section__field-radio-label" for="field__rb-eng-at-school-yes"> Yes</label>
                        </div>
                        <div class="scholarship-section__field-radio-group">
                            <input type="radio" class="scholarship-section__field-radio-yn-input field__rb-eng-at-school" name="english_is_secondary" value="0" id="field__rb-eng-at-school-no" <?php echo e(isset( $programme->english_is_secondary ) && $programme->english_is_secondary == 0  ? 'checked' : ''); ?>>
                            <label class="scholarship-section__field-radio-label" for="field__rb-eng-at-school-no"> No</label>
                        </div>
                    </div>
                    
                </div>
                <small class="error-message"></small>
            </div>


            
            <div class="validate">
                <div class="scholarship-section__fieldset-yn-group">
                    <label class="scholarship-section__field-label">Have you taken any English test?<span class="required__symbol">*</span></label>
                    <div class="">
                        <div class="grid-english-taken-col">
                            <div class="scholarship-section__field-radio-group">
                                <input type="radio" class="scholarship-section__field-radio-option-input field__rb-eng-taken" name="english_test_taken" id="field__rb-eng-taken-no" value="No" <?php echo e(!empty( $programme->english_test_taken ) && $programme->english_test_taken == 'No' ? 'checked' : ''); ?>>
                                <label class="scholarship-section__field-radio-label" for="field__rb-eng-taken-no"> No</label>
                            </div>

                            <div class="scholarship-section__field-checkbox-group">
                                <input type="radio" class="scholarship-section__field-radio-option-input scholarship-section__field-radio-option-input--validate-result" id="scholarship-section__field-rb-2" value="IELTS" name="english_test_taken" <?php echo e(!empty( $programme->english_test_taken ) && $programme->english_test_taken == 'IELTS' ? 'checked' : ''); ?>>
                                <label for="scholarship-section__field-rb-2" class="scholarship-section__field-checkbox-label"> IELTS</label>
                            </div>

                            <div class="scholarship-section__field-checkbox-group">
                                <input type="radio" class="scholarship-section__field-radio-option-input scholarship-section__field-radio-option-input--validate-result" id="scholarship-section__field-rb-3" value="TOEFL" name="english_test_taken" <?php echo e(!empty( $programme->english_test_taken ) && $programme->english_test_taken == 'TOEFL' ? 'checked' : ''); ?>>
                                <label for="scholarship-section__field-rb-3" class="scholarship-section__field-checkbox-label"> TOEFL</label>
                            </div>

                            <div class="scholarship-section__field-checkbox-group">
                                <input type="radio" class="scholarship-section__field-radio-option-input scholarship-section__field-radio-option-input--validate-result" id="scholarship-section__field-rb-4" value="BUV Placement Test" name="english_test_taken" <?php echo e(!empty( $programme->english_test_taken ) && $programme->english_test_taken == 'BUV Placement Test' ? 'checked' : ''); ?>>
                                <label for="scholarship-section__field-rb-4" class="scholarship-section__field-checkbox-label"> BUV Placement Test</label>
                            </div>

                            <div class="scholarship-section__field-checkbox-group">
                                <input type="radio" class="scholarship-section__field-radio-option-input scholarship-section__field-group-other-cb" name="english_test_taken" id="scholarship-section__field-group-other-cb" value="Others" <?php echo e(!empty( $programme->english_test_taken ) && $programme->english_test_taken == 'Others' ? 'checked' : ''); ?>>
                                <label class="scholarship-section__field-checkbox-label mr-1" for="scholarship-section__field-group-other-cb"> Others</label>
                                <div class="w-100 validate" id="scholarship-section__field-group-other">
                                    <input class="scholarship-section__field-group-other-textbox" type="text" placeholder="Please specify ..." id="scholarship-section__field-group-other-textbox" name="scholarship_other" value="<?php echo e(!empty( $programme->english_test_other ) ? $programme->english_test_other : ''); ?>">
                                    <small class="error-message-other"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="field__show-eng-result">
                        <!-- Provide english result -->
                        <fieldset class="scholarship-section__fieldset-group">
                            <legend class="scholarship-section__fieldset-legen">Please provide the information of your English qualification</legend>
                            <div class="grid-desktop-six-col grid-ipad-three-col">
                                <div class="scholarship-section__field-group validate">
                                    <label class="scholarship-section__field-label">Date taken<span class="required__symbol">*</span></label>
                                    <input class="scholarship-section__field-textbox-eng-taken" type="text" name="english_test_date" id="scholarship-section__field-textbox-eng-date-taken" autocomplete="off"  value="<?php echo e(!empty( $programme->english_test_date )  ? $programme->english_test_date : ''); ?>">
                                    <small class="error-message"></small>
                                </div>
                                <div class="scholarship-section__field-group validate">
                                    <label class="scholarship-section__field-label">Listening<span class="required__symbol">*</span></label>
                                    <input class="scholarship-section__field-textbox-eng-taken" type="text" name="english_test_listening" id="scholarship-section__field-textbox-eng-listening" value="<?php echo e(!empty( $programme->english_test_listening )  ? $programme->english_test_listening : ''); ?>">
                                    <small class="error-message"></small>
                                </div>
                                <div class="scholarship-section__field-group validate">
                                    <label class="scholarship-section__field-label">Reading<span class="required__symbol">*</span></label>
                                    <input class="scholarship-section__field-textbox-eng-taken" type="text" name="english_test_reading" id="scholarship-section__field-textbox-eng-reading" value="<?php echo e(!empty( $programme->english_test_reading )  ? $programme->english_test_reading : ''); ?>">
                                    <small class="error-message"></small>
                                </div>
                                <div class="scholarship-section__field-group validate">
                                    <label class="scholarship-section__field-label">Writing<span class="required__symbol">*</span></label>
                                    <input class="scholarship-section__field-textbox-eng-taken" type="text" name="english_test_writing" id="scholarship-section__field-textbox-eng-writing" value="<?php echo e(!empty( $programme->english_test_writing )  ? $programme->english_test_writing : ''); ?>">
                                    <small class="error-message"></small>
                                </div>
                                <div class="scholarship-section__field-group validate">
                                    <label class="scholarship-section__field-label">Speaking<span class="required__symbol">*</span></label>
                                    <input class="scholarship-section__field-textbox-eng-taken" type="text" name="english_test_speaking" id="scholarship-section__field-textbox-eng-speaking" value="<?php echo e(!empty( $programme->english_test_speaking )  ? $programme->english_test_speaking : ''); ?>">
                                    <small class="error-message"></small>
                                </div>
                                <div class="scholarship-section__field-group validate">
                                    <label class="scholarship-section__field-label">Overall score<span class="required__symbol">*</span></label>
                                    <input class="scholarship-section__field-textbox-eng-taken" type="text" name="english_test_overall" id="scholarship-section__field-textbox-eng-overall" value="<?php echo e(!empty( $programme->english_test_overall )  ? $programme->english_test_overall : ''); ?>">
                                    <small class="error-message"></small>
                                </div>
                            </div>
                        </fieldset>
                        <!-- End provide english result -->


                        <div class="scholarship-section__field-file-group validate">
                            <label class="scholarship-section__field-label">Copy of IELTS/TOEFL/Other qualifications or copy of BUV Placement test result with valid date <span class="required__symbol">*</span></label>
                            <div class="validate">
                                <small class="note-message-file"></small>
                                <div>
                                    <button class="scholarship-section__field-file-edit"><?php echo e(!empty($document->english_test) ? $document->english_test : ''); ?></button>
                                    <input class="scholarship-section__field-file-eng-taken" type="file" id="scholarship-section__field-file-evidence-of-ielts-toefl" <?php echo e(!empty($document->english_test) ? 'hidden' : ''); ?>>
                                </div>
                                <small class="error-message"></small>
                            </div>
                        </div>
                        
                        <br>
                    </div>
                </div>
                <small class="error-message" id="taken-eng-error-message"></small>
            </div>
        </div>
        <!-- /scholarship-section__field -->

    </div>

    <div class="scholarship-form__submit">
        <a href="<?php echo e(route('scholarship.show.step4', $redirect_parram)); ?>" class="scholarship-form-submit__btn scholarship-form-submit__btn--previous">Previous</a>
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--save" id="scholarship-form-submit__btn--save" type="submit" value="Save">
        <input class="scholarship-form-submit__btn scholarship-form-submit__btn--next" id="scholarship-form-submit__btn--next" type="submit" value="Next">
    </div>
    
</form>
<?php $__env->stopSection(); ?> <!-- content -->

<?php $__env->startSection('script'); ?>
<script>

    document.querySelectorAll('.scholarship-section__field-checkbox-input').forEach(rb => {

        if( Functions.rbChecked(document.querySelectorAll('.field-checkbox-ccp')) ){
            document.getElementById('is_ccp_programme').value = 1;
            document.getElementById('field__show-ccp-upload').style.display = 'block';
        }else{
            document.getElementById('is_ccp_programme').value = 0;
            document.getElementById('field__show-ccp-upload').style.display = 'none';
        }

        rb.addEventListener("click", function(){ 
            if( rb.classList.contains('field-checkbox-ccp') ){
                document.getElementById('is_ccp_programme').value = 1;
                document.getElementById('field__show-ccp-upload').style.display = 'block';
            }else{
                var is_ccp_programme = document.getElementById('is_ccp_programme').value;
                document.getElementById('field__show-ccp-upload').style.display = 'none';
                
                if( is_ccp_programme == 1 ){
                    document.getElementById("modal__loading").style.display = "block";
                    // Delete CCP file.
                    async function call(formData) {
                        try {
                            const response = await fetch(document.querySelector('#delete-url').content, {
                                method: "POST",
                                body: formData,
                            });
                            const result = await response.json();

                            if( result.success && result.data ){
                                document.getElementById("scholarship-section__field-file-edit--ccp").innerText = '';
                                document.getElementById("modal__loading").style.display = "none";
                            }
                            
                        } catch (error) {
                            console.error("Error:", error);
                        }
                    }

                    const formData = new FormData();
                    formData.append("_token", document.querySelector('#csrf-token').content);
                    formData.append("field", "portfolio_of_artwork");
                    formData.append("sid", document.querySelector('#scholarship-student-sid').content);

                    call(formData);

                    document.getElementById('is_ccp_programme').value = 0;
                }

                

            }


        });

    });

    function showEngResult( rb ){
        document.getElementById('field__show-eng-result').style.display = "none";
        document.getElementById('scholarship-section__field-group-other').style.display = "none";
        if(rb.value != 'No' ){
            document.getElementById('field__show-eng-result').style.display = "block";
        } 
        
        if(rb.value == 'Others' ){
            document.getElementById('scholarship-section__field-group-other').style.display = "block";
        }
    }

    var englishTestOptions = document.querySelectorAll('.scholarship-section__field-radio-option-input');
    document.getElementById('field__show-eng-result').style.display = "none";
    document.getElementById('scholarship-section__field-group-other').style.display = "none";
    
    englishTestOptions.forEach(rb => {
        if( rb.checked ){
            showEngResult( rb );
        }
        
        rb.addEventListener("click", function(){ 
            showEngResult( rb );
        });
    });

    
    Validator.tbRequiredWhenEngRbChecked = function({selector, radiobox, msg, error, submit}) {

        function isNumeric(str) {
            if (typeof str != "string") return false // we only process strings!  
            return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
                    !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
        }

        var radioboxes = document.querySelectorAll(radiobox);
        radioboxes.forEach( cb => {
            cb.addEventListener("click", function(){ 
                Functions.deleteErrorMessage(selector, error);
            });
        });

        return {
            type: 'tb',
            selector: selector,
            error: error,
            submit: submit,
            test: function( element, formElement ){
                if( Functions.rbChecked(radioboxes) && !element.value.trim() ){
                    return Validator.message.required;
                }

                let flagNumberic = false;
                let englishTakenOptions = document.querySelectorAll(".scholarship-section__field-radio-option-input--validate-result");
                englishTakenOptions.forEach( rb => {
                    if( rb.checked == true 
                        && ( rb.value == 'IELTS' || rb.value == 'TOEFL' ) 
                        && !isNumeric(element.value.trim())
                    ){
                        flagNumberic = true;
                    }
                });

                if( flagNumberic ){
                    return Validator.message.numberic;
                }
                
                return undefined;
            }
        };
    }

    
    Validator({
        form: '#scholarship__form',
        rules: [
            Validator.fileRequiredWhenRbChecked({
                selector: '#scholarship-section__field-file-ccp',
                required: true,
                radiobox: '.field-checkbox-ccp',
                error: '#field__show-ccp-upload .error-message-ccp',
                extension: ['jpg', 'jpeg', 'png','pdf'],
                size: 20,
                upload: 'portfolio_of_artwork'
            }),
            Validator.rbRequired({
                selector: '.field__rb-eng-at-school'
            }),
            Validator.rbRequired({
                selector: '.field__rb-eng-taken',
                error: '#taken-eng-error-message'
            }),
            Validator.tbRequiredWhenRbChecked({
                selector: '#scholarship-section__field-textbox-eng-date-taken',
                radiobox: '.scholarship-section__field-radio-option-input--validate-result',
                submit: true
            }),
            Validator.tbRequiredWhenEngRbChecked({
                selector: '#scholarship-section__field-textbox-eng-listening',
                radiobox: '.scholarship-section__field-radio-option-input--validate-result',
                submit: true
            }),
            Validator.tbRequiredWhenEngRbChecked({
                selector: '#scholarship-section__field-textbox-eng-reading',
                radiobox: '.scholarship-section__field-radio-option-input--validate-result',
                submit: true
            }),
            Validator.tbRequiredWhenEngRbChecked({
                selector: '#scholarship-section__field-textbox-eng-writing',
                radiobox: '.scholarship-section__field-radio-option-input--validate-result',
                submit: true
            }),
            Validator.tbRequiredWhenEngRbChecked({
                selector: '#scholarship-section__field-textbox-eng-speaking',
                radiobox: '.scholarship-section__field-radio-option-input--validate-result',
                submit: true
            }),
            Validator.tbRequiredWhenEngRbChecked({
                selector: '#scholarship-section__field-textbox-eng-overall',
                radiobox: '.scholarship-section__field-radio-option-input--validate-result',
                submit: true
            }),
            Validator.fileRequiredWhenRbChecked({
                selector: '#scholarship-section__field-file-evidence-of-ielts-toefl',
                radiobox: '.scholarship-section__field-radio-option-input--validate-result',
                required: true,
                size: 2,
                extension: ['jpg', 'jpeg', 'png','pdf'],
                upload: 'english_test'
            }),
        ],
        onSubmit: (data) => {
            data.form.submit();
        }
    });

    
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#scholarship-section__field-textbox-eng-date-taken" ).datepicker({
            onSelect: function(dateText) {
                var dateTakenElement = document.getElementById("scholarship-section__field-textbox-eng-date-taken").closest('.validate');
                dateTakenElement.classList.remove('invalid');
                dateTakenElement.querySelector('.error-message').innerText = '';
                dateTakenElement.classList.add('valid');
            }
        });
    } );
</script>	
<?php $__env->stopSection(); ?> <!-- script -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/step5.blade.php ENDPATH**/ ?>