<table class="table">
    <thead>
        <tr>
            <!-- Student -->
            <th scope="col">ID</th>
            <th scope="col">applying for</th>
            <th scope="col">First name</th>
            <th scope="col">Middle name</th>
            <th scope="col">Last name</th>
            <th scope="col">Full name in Vietnamese</th>
            <th scope="col">National ID card number/Passport number</th>
            <th scope="col">Date of birth</th>
            <th scope="col">Place of birth</th>
            <th scope="col">Gender</th>
            <th scope="col">Current address</th>
            <th scope="col">Email (in CAPITALS)</th>
            <th scope="col">Phone number</th>
            <th scope="col">Emegency name 1</th>
            <th scope="col">Emegency relatioship 1</th>
            <th scope="col">Emegency phone 1</th>
            <th scope="col">Emegency email 1</th>
            <th scope="col">Emegency name 2</th>
            <th scope="col">Emegency relatioship 2</th>
            <th scope="col">Emegency phone 2</th>
            <th scope="col">Emegency email 2</th>
            
            <!-- Qualification -->
            <th scope="col">Qualification 1</th>
            <th scope="col">Awarding Institution 1</th>
            <th scope="col">Country Of Study 1</th>
            <th scope="col">Period Of Study 1</th>
            <th scope="col">GPA 1</th>
            <th scope="col">Qualification 2</th>
            <th scope="col">Awarding Institution 2</th>
            <th scope="col">Country Of Study 2</th>
            <th scope="col">Period Of Study 2</th>
            <th scope="col">GPA 2</th>
            <th scope="col">Qualification 3</th>
            <th scope="col">Awarding Institution 3</th>
            <th scope="col">Country Of Study 3</th>
            <th scope="col">Period Of Study 3</th>
            <th scope="col">GPA 3</th>
            <th scope="col">Qualification 4</th>
            <th scope="col">Awarding Institution 4</th>
            <th scope="col">Country Of Study 4</th>
            <th scope="col">Period Of Study 4</th>
            <th scope="col">GPA 4</th>
            <th scope="col">Qualification 5</th>
            <th scope="col">Awarding Institution 5</th>
            <th scope="col">Country Of Study 5</th>
            <th scope="col">Period Of Study 5</th>
            <th scope="col">GPA 5</th>
            
            <!-- Activity -->
            <th scope="col">Activity 1</th>
            <th scope="col">Organization 1</th>
            <th scope="col">Location Of Activity 1</th>
            <th scope="col">Period 1</th>
            <th scope="col">Prize/ Certificate/ Achievement 1</th>
            <th scope="col">Activity 2</th>
            <th scope="col">Organization 2</th>
            <th scope="col">Location Of Activity 2</th>
            <th scope="col">Period 2</th>
            <th scope="col">Prize/ Certificate/ Achievement 2</th>
            <th scope="col">Activity 3</th>
            <th scope="col">Organization 3</th>
            <th scope="col">Location Of Activity 3</th>
            <th scope="col">Period 3</th>
            <th scope="col">Prize/ Certificate/ Achievement 3</th>
            <th scope="col">Activity 4</th>
            <th scope="col">Organization 4</th>
            <th scope="col">Location Of Activity 4</th>
            <th scope="col">Period 4</th>
            <th scope="col">Prize/ Certificate/ Achievement 4</th>
            <th scope="col">Activity 5</th>
            <th scope="col">Organization 5</th>
            <th scope="col">Location Of Activity 5</th>
            <th scope="col">Period 5</th>
            <th scope="col">Prize/ Certificate/ Achievement 5</th>
            
            <!-- Programee -->
            <th scope="col">Program</th>
            <th scope="col">English is secondary language</th>
            <th scope="col">English taken</th>
            <th scope="col">English test date</th>
            <th scope="col">English listening</th>
            <th scope="col">English reading</th>
            <th scope="col">English writing</th>
            <th scope="col">English speaking</th>
            <th scope="col">English overall</th>
            <th scope="col">CCP programme</th>

            <!-- Statement -->
            <!-- <th scope="col">Briefly give the reasons why you feel you are an ideal candidate for this scholarship *</th>
            <th scope="col">What one thing outside of school has been the most challenging for you so far?</th>
            <th scope="col">How will the major that you have applied for will contribute significantly to the development of Vietnam? *</th>
            <th scope="col">In your field of interest, who do you admire most and why? *</th>
            <th scope="col">How would you contribute to British University Vietnam if you studied here?</th>
            <th scope="col">Is there anything else would you like to add in support of your application for this scholarship?</th>
            <th scope="col">Note</th>
            <th scope="col">Created on</th> -->

            <!-- Statement -->
            <th scope="col">Statement 1</th>
            <th scope="col">Statement 2</th>
            <th scope="col">Statement 3</th>
            <th scope="col">Statement 4</th>
            <th scope="col">Statement 5</th>
            <th scope="col">Statement 6</th>
            <th scope="col">Other</th>
            <th scope="col">Submit date</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            

            <!-- Student -->
            <th scope="col"><?php echo e($value->sid); ?></th>
            <th scope="col"><?php echo e(!empty( $value->scholarship ) ? $value->scholarship : $value->scholarship_other); ?></th>
            <th scope="col"><?php echo e($value->first_name); ?></th>
            <th scope="col"><?php echo e($value->middle_name); ?></th>
            <th scope="col"><?php echo e($value->last_name); ?></th>
            <th scope="col"><?php echo e($value->fullname_vn); ?></th>
            <th scope="col"><?php echo e($value->passport); ?></th>
            <th scope="col"> <?php echo e($value->month_of_birth); ?> / <?php echo e($value->day_of_birth); ?> / <?php echo e($value->year_of_birth); ?></th>
            <th scope="col"><?php echo e($value->place_of_birth); ?></th>
            <th scope="col">
                <?php
                    if( $value->gender == 1 ){
                        echo 'Male';
                    }elseif( $value->gender == 2 ){
                        echo 'FeMale';
                    }else{
                        echo 'Other';
                    }
                ?>
            </th>
            <th scope="col"><?php echo e($value->current_address); ?></th>
            <th scope="col"><?php echo e($value->email); ?></th>
            <th scope="col"><?php echo e($value->phone_number); ?></th>
            <th scope="col"><?php echo e($value->e_name_1); ?></th>
            <th scope="col"><?php echo e($value->e_relationship_1); ?></th>
            <th scope="col"><?php echo e($value->e_phone_1); ?></th>
            <th scope="col"><?php echo e($value->e_email_1); ?></th>
            <th scope="col"><?php echo e($value->e_name_2); ?></th>
            <th scope="col"><?php echo e($value->e_relationship_2); ?></th>
            <th scope="col"><?php echo e($value->e_phone_2); ?></th>
            <th scope="col"><?php echo e($value->e_email_2); ?></th>

            <!-- Qualification -->
            <th scope="col"><?php echo e(!empty($value->qualification_1) ? $value->qualification_1 : $value->qualification_other_1); ?></th>
            <th scope="col"><?php echo e($value->institution_1); ?></th>
            <th scope="col"><?php echo e($value->country_1); ?></th>
            <th scope="col"><?php echo e($value->period_1); ?></th>
            <th scope="col"><?php echo e($value->gpa_1); ?></th>
            <th scope="col"><?php echo e(!empty($value->qualification_2) ? $value->qualification_2 : $value->qualification_other_2); ?></th>
            <th scope="col"><?php echo e($value->institution_2); ?></th>
            <th scope="col"><?php echo e($value->country_2); ?></th>
            <th scope="col"><?php echo e($value->period_2); ?></th>
            <th scope="col"><?php echo e($value->gpa_2); ?></th>
            <th scope="col"><?php echo e(!empty($value->qualification_3) ? $value->qualification_3 : $value->qualification_other_3); ?></th>
            <th scope="col"><?php echo e($value->institution_3); ?></th>
            <th scope="col"><?php echo e($value->country_3); ?></th>
            <th scope="col"><?php echo e($value->period_3); ?></th>
            <th scope="col"><?php echo e($value->gpa_3); ?></th>
            <th scope="col"><?php echo e(!empty($value->qualification_4) ? $value->qualification_4 : $value->qualification_other_4); ?></th>
            <th scope="col"><?php echo e($value->institution_4); ?></th>
            <th scope="col"><?php echo e($value->country_4); ?></th>
            <th scope="col"><?php echo e($value->period_4); ?></th>
            <th scope="col"><?php echo e($value->gpa_4); ?></th>
            <th scope="col"><?php echo e(!empty($value->qualification_5) ? $value->qualification_5 : $value->qualification_other_5); ?></th>
            <th scope="col"><?php echo e($value->institution_5); ?></th>
            <th scope="col"><?php echo e($value->country_5); ?></th>
            <th scope="col"><?php echo e($value->period_5); ?></th>
            <th scope="col"><?php echo e($value->gpa_5); ?></th>

            <!-- Activity -->
            <th scope="col"><?php echo e($value->activity_1); ?></th>
            <th scope="col"><?php echo e($value->organization_1); ?></th>
            <th scope="col"><?php echo e($value->role_1); ?></th>
            <th scope="col"><?php echo e($value->a_period_1); ?></th>
            <th scope="col"><?php echo e($value->prize_1); ?></th>
            <th scope="col"><?php echo e($value->activity_2); ?></th>
            <th scope="col"><?php echo e($value->organization_2); ?></th>
            <th scope="col"><?php echo e($value->role_2); ?></th>
            <th scope="col"><?php echo e($value->a_period_2); ?></th>
            <th scope="col"><?php echo e($value->prize_2); ?></th>
            <th scope="col"><?php echo e($value->activity_3); ?></th>
            <th scope="col"><?php echo e($value->organization_3); ?></th>
            <th scope="col"><?php echo e($value->role_3); ?></th>
            <th scope="col"><?php echo e($value->a_period_3); ?></th>
            <th scope="col"><?php echo e($value->prize_3); ?></th>
            <th scope="col"><?php echo e($value->activity_4); ?></th>
            <th scope="col"><?php echo e($value->organization_4); ?></th>
            <th scope="col"><?php echo e($value->role_4); ?></th>
            <th scope="col"><?php echo e($value->a_period_4); ?></th>
            <th scope="col"><?php echo e($value->prize_4); ?></th>
            <th scope="col"><?php echo e($value->activity_5); ?></th>
            <th scope="col"><?php echo e($value->organization_5); ?></th>
            <th scope="col"><?php echo e($value->role_5); ?></th>
            <th scope="col"><?php echo e($value->a_period_5); ?></th>
            <th scope="col"><?php echo e($value->prize_5); ?></th>

            <!-- Programee -->
            <th scope="col"><?php echo e($value->program_selection); ?></th>
            <th scope="col"><?php echo e($value->english_is_secondary); ?></th>
            <th scope="col"><?php echo e($value->english_test_taken); ?></th>
            <th scope="col"><?php echo e($value->english_test_date); ?></th>
            <th scope="col"><?php echo e($value->english_test_listening); ?></th>
            <th scope="col"><?php echo e($value->english_test_reading); ?></th>
            <th scope="col"><?php echo e($value->english_test_writing); ?></th>
            <th scope="col"><?php echo e($value->english_test_speaking); ?></th>
            <th scope="col"><?php echo e($value->english_test_overall); ?></th>
            <th scope="col"><?php echo e($value->is_ccp_programme); ?></th>

            <!-- Statement -->
            <th scope="col"><?php echo e($value->statement_1); ?></th>
            <th scope="col"><?php echo e($value->statement_2); ?></th>
            <th scope="col"><?php echo e($value->statement_3); ?></th>
            <th scope="col"><?php echo e($value->statement_4); ?></th>
            <th scope="col"><?php echo e($value->statement_5); ?></th>
            <th scope="col"><?php echo e($value->statement_6); ?></th>
            <th scope="col"><?php echo e($value->other); ?></th>
            <th scope="col"><?php echo e($value->submit_date); ?></th>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    </tbody>
</table>
   <?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/admin/export.blade.php ENDPATH**/ ?>