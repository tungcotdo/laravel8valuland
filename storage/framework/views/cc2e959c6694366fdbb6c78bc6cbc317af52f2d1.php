<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name=Generator content="Microsoft Word 15 (filtered)">
    <title>HRH application form 08122019</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style type="text/css">
        @font-face {
            font-family: 'Arial';
            font-weight: 400;
            font-style: normal;
        }

        @page  {
            margin: 0;
        }

        body {
            color: #444;
        }
    </style>
</head>

<body>

<div>
    <div style="font-size: 15px;padding: 30px 20px;margin: 0;">

        <div style="font-size: 15px;font-family: 'Arial', sans-serif;padding: 15px 0 100px;margin: 0;">

            <div style="width:100%;text-align:right;margin-bottom: 10px;float:right">
                <!-- <img src="<?php echo e(asset('img/logo-small-2.png')); ?>" width="250"/> -->
            </div>
            <h1 style="font-size:90px;letter-spacing: 9px;font-family: 'Arial', sans-serif;color:#D92027;text-transform:uppercase;margin-bottom: 0;">
                BUV
            </h1>
            <h2 style="font-size:60px;letter-spacing: 9px;font-family: 'Arial', sans-serif;color:#D92027;text-transform:uppercase;margin-top:0;margin-bottom:0;">
                SCHOLARSHIP
            </h2>
            <div style="width:100%;text-align:right;margin-bottom: 60px;float:right">
                <!-- <img src="<?php echo e(asset('img/line.png')); ?>" width="100%"/> -->
            </div>
            <h3 style="font-size:45px;letter-spacing: 1px;font-family: 'Arial', sans-serif;text-transform:uppercase;margin-top:0;margin-bottom:20px;">
                APPLICATION FORM
            </h3>
            <p style="font-family: 'Arial', sans-serif;font-size: 22px;font-weight: bold;margin-top: 0;margin-bottom: 0;">
                You are applying for:</p>
            <p style="font-family: 'Arial', sans-serif;font-size: 17px;font-weight: bold;margin-top: 0;margin-bottom: 30px;">
                (Please check the appropriate box/boxes)</p>
            <table style="width:100%;margin-bottom: 50px;" cellpadding="3">
                <tr>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 5px 0;">
                        <input type="checkbox" <?php echo e(!empty( $scholarship ) && in_array( $scholarship1, $scholarship ) ? 'checked' : ''); ?> > <?php echo e($scholarship1); ?>

                    </td>
                </tr>
                <tr>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 5px 0;">
                        <input type="checkbox" <?php echo e(!empty( $scholarship ) && in_array( $scholarship2, $scholarship ) ? 'checked' : ''); ?> > <?php echo e($scholarship2); ?>

                    </td>
                </tr>
                <tr>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 5px 0;">
                        <input type="checkbox" <?php echo e(!empty( $scholarship ) && in_array( $scholarship3, $scholarship ) ? 'checked' : ''); ?>> <?php echo e($scholarship3); ?>

                    </td>
                </tr>
                <tr>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 5px 0;">
                        <input type="checkbox" <?php echo e(!empty( $scholarship ) && in_array( $scholarship4, $scholarship ) ? 'checked' : ''); ?>> <?php echo e($scholarship4); ?>

                    </td>
                </tr>

                <tr>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 5px 0;">
                        <input type="checkbox" <?php echo e(!empty( $scholarship ) && in_array( $scholarship5, $scholarship ) ? 'checked' : ''); ?>> <?php echo e($scholarship5); ?>

                    </td>
                </tr>

                <tr>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 5px 0;">
                        <input type="checkbox" <?php echo e(!empty( $scholarship ) && in_array( $scholarship6, $scholarship ) ? 'checked' : ''); ?>> <?php echo e($scholarship6); ?>

                    </td>
                </tr>

                <?php if( !empty( $student->scholarship_other ) ): ?>
                    <tr>
                        <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 5px 0;">
                            <input type="checkbox" checked> Others (Please specify: <?php echo e($student->scholarship_other); ?>)
                        </td>
                    </tr>
                <?php endif; ?>

            </table>


            <table style="width:100%;margin-bottom: 50px;" cellpadding="3">
                <tr>
                    <td width="30%"
                        style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 0 15px 0 0;text-align: right">
                        Full name
                    </td>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 2px 0">
                        <table style="width:100%;" cellpadding="3">
                            <tr>
                                <td style="background-color: #eee;"><?php echo e(!empty($student->fullname_vn) ? $student->fullname_vn : ''); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 0 15px 0 0;text-align: right">
                        Date of birth
                    </td>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 2px 0;">
                        <table style="width:100%;" cellpadding="3">
                            <tr>
                                <td style="background-color: #eee;"><?php echo e(!empty($student->day_of_birth) ? $student->day_of_birth : ''); ?>/<?php echo e(!empty($student->month_of_birth) ? $student->month_of_birth : ''); ?>/<?php echo e(!empty($student->year_of_birth) ? $student->year_of_birth : ''); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 0 15px 0 0;text-align: right">
                        Application number<br> <span style="font-size: 14px;">(For office use only)</span>
                    </td>
                    <td style="font-family: 'Arial', sans-serif;font-size: 17px;text-align:left;color:#403f41;padding: 0;">
                        <table style="width:100%;" cellpadding="3">
                            <tr>
                                <td style="background-color: #eee;"><?php echo e(!empty($student->phone_number) ? $student->phone_number : '&nbsp;'); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div style="display: block;width: 100%;float: left;margin-bottom: 30px;padding-top: 40px;">
            <div style="background-color: #d92027; padding: 3px 6px 2px;margin-top: 0px; margin-bottom: 6px; font-size: 16px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; color: #fff;">
                PERSONAL INFORMATION
            </div>

            <table style="width:100%;margin-bottom: 0px;">
                <tr>
                    <td style="vertical-align: top;padding: 0;" colspan="2">
                        <table style="width:100%;border-collapse: collapse;margin: 0" border="0" cellpadding="0">
                            <tr style="margin: 6px 0;">
                                <td colspan="3"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Full name in Vietnamese: <strong><?php echo e(!empty($student->fullname_vn) ? $student->fullname_vn : ''); ?></strong>
                                </td>
                            </tr>
                            <tr style="margin: 6px 0;">
                                <td colspan="3"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    National ID card number/Passport number: <strong><?php echo e(!empty($student->passport) ? $student->passport : ''); ?></strong>
                                </td>
                            </tr>
                            <tr style="margin: 6px 0;">
                                <td style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    First name: <strong><?php echo e(!empty($student->first_name) ? $student->first_name : ''); ?></strong>
                                </td>
                                <td style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Middle name: <strong><?php echo e(!empty($student->middle_name) ? $student->middle_name : ''); ?></strong>
                                </td>
                                <td style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Last name: <strong><?php echo e(!empty($student->last_name) ? $student->last_name : ''); ?></strong>
                                </td>
                            </tr>
                            <tr style="margin: 6px 0;">
                                <td style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Date of birth: <strong><?php echo e(!empty($student->day_of_birth) ? $student->day_of_birth : ''); ?>/<?php echo e(!empty($student->month_of_birth) ? $student->month_of_birth : ''); ?>/<?php echo e(!empty($student->year_of_birth) ? $student->year_of_birth : ''); ?></strong>
                                </td>
                                <td style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Place of birth: <strong><?php echo e(!empty($student->place_of_birth) ? $student->place_of_birth : ''); ?></strong>
                                </td>
                                <td style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Gender: <strong><input type="checkbox" <?php echo e(!empty($student->gender == 1 ) ? 'checked' : ''); ?>> Male</strong> <strong><input
                                    type="checkbox" <?php echo e(!empty($student->gender == 2 ) ? 'checked' : ''); ?>> Female</strong>
                                    <strong><input type="checkbox" <?php echo e(!empty($student->gender == 3 ) ? 'checked' : ''); ?>> Other</strong>
                                </td>
                            </tr>
                            <tr style="margin: 6px 0;">
                                <td colspan="3"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Current address: <strong><?php echo e(!empty($student->current_address) ? $student->current_address : ''); ?></strong>
                                </td>
                            </tr>
                            <!--<tr style="margin: 6px 0;">-->
                            <!--<td colspan="3"-->
                            <!--style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">-->
                            <!--Permanent address: <strong>[permanent_address]</strong></td>-->
                            <!--</tr>-->
                            <tr style="margin: 6px 0;">
                                <td colspan="3"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Email (in CAPITALS): <strong><?php echo e(!empty($student->email) ? $student->email : ''); ?></strong>
                                </td>
                            </tr>
                            <tr style="margin: 6px 0;">
                                <!--<td style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">-->
                                <!--Home phone: <strong>[home_phone]</strong></td>-->
                                <td colspan="3"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Mobile phone: <strong><?php echo e(!empty($student->phone_number) ? $student->phone_number : ''); ?></strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div style="display: block;width: 100%;float: left;margin-bottom: 20px;">
            <div style="background-color: #d92027; padding: 3px 6px 2px;margin-bottom: 6px; font-size: 16px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; color: #fff;">
                EMERGENCY CONTACT
            </div>
            <table style="width:100%;font-size:12px; border-collapse: collapse;margin-bottom: 30px;" border=1
                   cellpadding="6">
                <tr style="background-color: #ddd">
                    <th style="font-size: 14px;font-weight: normal;">NAME</th>
                    <th style="font-size: 14px;font-weight: normal;">RELATIONSHIP</th>
                    <th style="font-size: 14px;font-weight: normal;">PHONE</th>
                    <th style="font-size: 14px;font-weight: normal;">EMAIL</th>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($student->e_name_1) ? $student->e_name_1 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($student->e_relationship_1) ? $student->e_relationship_1 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($student->e_phone_1) ? $student->e_phone_1 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($student->e_email_1) ? $student->e_email_1 : ''); ?></td>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($student->e_name_2) ? $student->e_name_2 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($student->e_relationship_2) ? $student->e_relationship_2 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($student->e_phone_2) ? $student->e_phone_2 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($student->e_email_2) ? $student->e_email_2 : ''); ?></td>
                </tr>

            </table>
        </div>

        <div style="display: block;width: 100%;float: left;margin-bottom: 20px;">
            <div style="background-color: #d92027; padding: 3px 6px 2px;margin-bottom: 6px; font-size: 16px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; color: #fff;">
                QUALIFICATIONS
            </div>
            <table style="width:100%;font-size:12px; border-collapse: collapse;margin-bottom: 30px;" border=1
                   cellpadding="6">
                <tr style="background-color: #ddd">
                    <th style="font-size: 14px;font-weight: normal;">QUALIFICATION</th>
                    <th style="font-size: 14px;font-weight: normal;">NAME OF INSTITUTION</th>
                    <th style="font-size: 14px;font-weight: normal;">COUNTRY OF STUDY</th>
                    <th style="width:15%;font-size: 14px;font-weight: normal;">PERIOD OF STUDY<br>FROM ... TO...</th>
                    <th style="font-size: 14px;font-weight: normal;">GPA</th>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;">
                        <p><?php echo e(!empty($qualification->qualification_1) ? $qualification->qualification_1 : $qualification->qualification_other_1); ?></p>
                    </td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->institution_1) ? $qualification->institution_1 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->country_1) ? $qualification->country_1 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->period_1) ? $qualification->period_1 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->gpa_1) ? $qualification->gpa_1 : ''); ?></td>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;">
                        <p><?php echo e(!empty($qualification->qualification_2) ? $qualification->qualification_2 : $qualification->qualification_other_2); ?></p>
                    </td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->institution_2) ? $qualification->institution_2 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->country_2) ? $qualification->country_2 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->period_2) ? $qualification->period_2 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->gpa_2) ? $qualification->gpa_2 : ''); ?></td>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;">
                        <p><?php echo e(!empty($qualification->qualification_3) ? $qualification->qualification_3 : $qualification->qualification_other_3); ?></p>
                    </td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->institution_3) ? $qualification->institution_3 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->country_3) ? $qualification->country_3 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->period_3) ? $qualification->period_3 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->gpa_3) ? $qualification->gpa_3 : ''); ?></td>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;">
                        <p><?php echo e(!empty($qualification->qualification_4) ? $qualification->qualification_4 : $qualification->qualification_other_4); ?></p>
                    </td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->institution_4) ? $qualification->institution_4 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->country_4) ? $qualification->country_4 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->period_4) ? $qualification->period_4 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->gpa_4) ? $qualification->gpa_4 : ''); ?></td>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;">
                        <p><?php echo e(!empty($qualification->qualification_5) ? $qualification->qualification_5 : $qualification->qualification_other_5); ?></p>
                    </td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->institution_5) ? $qualification->institution_5 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->country_5) ? $qualification->country_5 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->period_5) ? $qualification->period_5 : ''); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e(!empty($qualification->gpa_5) ? $qualification->gpa_5 : ''); ?></td>
                </tr>

            </table>
        </div>


        <div style="display: block;width: 100%;float: left;margin-bottom: 50px;padding-bottom: 10px;">

            <div style="background-color: #d92027; padding: 3px 6px 2px;margin-bottom: 6px; font-size: 16px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; color: #fff;">
                EXTRA - CURRICULAR ACTIVITIES
            </div>
            <table style="width:100%;font-size:12px; border-collapse: collapse;margin-bottom: 30px;" border=1 cellpadding="6">
                <tr style="background-color: #ddd">
                    <th style="font-size: 14px;font-weight: normal;">ACTIVITY</th>
                    <th style="font-size: 14px;font-weight: normal;">ORGANIZATION</th>
                    <th style="font-size: 14px;font-weight: normal;">ROLE & TASK</th>
                    <th style="width:15%;font-size: 14px;font-weight: normal;">PERIOD FROM ... TO ...</th>
                    <th style="font-size: 14px;font-weight: normal;">PRIZE/ CERTIFICATE/ ACHIEVEMENT</th>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->activity_1); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->organization_1); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->role_1); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->period_1); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->prize_1); ?></td>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->activity_2); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->organization_2); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->role_2); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->period_2); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->prize_2); ?></td>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->activity_3); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->organization_3); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->role_3); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->period_3); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->prize_3); ?></td>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->activity_4); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->organization_4); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->role_4); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->period_4); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->prize_4); ?></td>
                </tr>

                <tr>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->activity_5); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->organization_5); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->role_5); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->period_5); ?></td>
                    <td style="height:28px;font-size: 15px;"><?php echo e($activity->prize_5); ?></td>
                </tr>

            </table>
        </div>


        <div style="display: block;width: 100%;float:left;margin-bottom: 30px;">
            <div style="background-color: #d92027; padding: 3px 6px 2px;margin-bottom: 6px; font-size: 16px; font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; color: #fff;">
                PROPOSED STUDY PROGRAMMES
            </div>
            <div style="width: 100%; margin-bottom: 6px; float: left;">
                <div style="width: 100%;">

                    <fieldset class="scholarship-section__fieldset-group">
                        <legend class="scholarship-section__fieldset-legen">1. STAFFORDSHIRE UNIVERSITY</legend>
                        <div class="">
                            <div class="scholarship-section__field-checkbox-group">
                                <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-1" value="<?php echo e($stafford[1]); ?>" <?php echo e(!empty( $selection ) && in_array( $stafford[1], $selection ) ? 'checked' : ''); ?> name="selection[]">
                                <label for="scholarship-section__field-checkbox-input-1" class="scholarship-section__field-checkbox-label"> <?php echo e($stafford[1]); ?></label>
                            </div>
                            <div class="scholarship-section__field-checkbox-group">
                                <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-2" value="<?php echo e($stafford[2]); ?>" <?php echo e(!empty( $selection ) && in_array( $stafford[2], $selection ) ? 'checked' : ''); ?> name="selection[]">
                                <label for="scholarship-section__field-checkbox-input-2" class="scholarship-section__field-checkbox-label"> <?php echo e($stafford[2]); ?></label>
                            </div>
                            <div class="scholarship-section__field-checkbox-group">
                                <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-3" value="<?php echo e($stafford[3]); ?>" <?php echo e(!empty( $selection ) && in_array( $stafford[3], $selection ) ? 'checked' : ''); ?> name="selection[]">
                                <label for="scholarship-section__field-checkbox-input-3" class="scholarship-section__field-checkbox-label"> <?php echo e($stafford[3]); ?></label>
                            </div>
                            <div class="scholarship-section__field-checkbox-group">
                                <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-4" value="<?php echo e($stafford[4]); ?>" <?php echo e(!empty( $selection ) && in_array( $stafford[4], $selection ) ? 'checked' : ''); ?> name="selection[]">
                                <label for="scholarship-section__field-checkbox-input-4" class="scholarship-section__field-checkbox-label"> <?php echo e($stafford[4]); ?></label>
                            </div>
                            <div class="scholarship-section__field-checkbox-group">
                                <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-5" value="<?php echo e($stafford[5]); ?>" <?php echo e(!empty( $selection ) && in_array( $stafford[5], $selection ) ? 'checked' : ''); ?> name="selection[]">
                                <label for="scholarship-section__field-checkbox-input-5" class="scholarship-section__field-checkbox-label"> <?php echo e($stafford[5]); ?></label>
                            </div>
                            <fieldset class="scholarship-section__fieldset-group scholarship-section__fieldset-sub-group">
                                <legend class="scholarship-section__fieldset-sub-legend"><?php echo e($stafford[6][1]); ?></legend>
                                <div class="scholarship-section__field-checkbox-group">
                                    <input type="checkbox" class="scholarship-section__field-checkbox-input field-checkbox-ccp" id="scholarship-section__field-checkbox-input-6" value="<?php echo e($stafford[6][1]); ?>" <?php echo e(!empty( $selection ) && in_array( $stafford[6][1], $selection ) ? 'checked' : ''); ?> name="selection[]">
                                    <label class="scholarship-section__field-checkbox-label" for="scholarship-section__field-checkbox-input-6"> <?php echo e($stafford[6][1]); ?></label>
                                </div>
                                <div class="scholarship-section__field-checkbox-group">
                                    <input type="checkbox" class="scholarship-section__field-checkbox-input field-checkbox-ccp" id="scholarship-section__field-checkbox-input-7" value="<?php echo e($stafford[6][2]); ?>" <?php echo e(!empty( $selection ) && in_array( $stafford[6][2], $selection ) ? 'checked' : ''); ?> name="selection[]">
                                    <label class="scholarship-section__field-checkbox-label" for="scholarship-section__field-checkbox-input-7"> <?php echo e($stafford[6][2]); ?></label>
                                </div>
                                <div class="scholarship-section__field-checkbox-group">
                                    <input type="checkbox" class="scholarship-section__field-checkbox-input field-checkbox-ccp" id="scholarship-section__field-checkbox-input-8" value="<?php echo e($stafford[6][3]); ?>" <?php echo e(!empty( $selection ) && in_array( $stafford[6][3], $selection ) ? 'checked' : ''); ?> name="selection[]">
                                    <label class="scholarship-section__field-checkbox-label" for="scholarship-section__field-checkbox-input-8"> <?php echo e($stafford[6][3]); ?></label>
                                </div>
                            </fieldset>
                            <fieldset class="scholarship-section__fieldset-group scholarship-section__fieldset-sub-group">
                                <legend class="scholarship-section__fieldset-sub-legend"><?php echo e($stafford[7][0]); ?></legend>
                                <div class="scholarship-section__field-checkbox-group">
                                    <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-9" value="<?php echo e($stafford[7][1]); ?>" <?php echo e(!empty( $selection ) && in_array( $stafford[7][1], $selection ) ? 'checked' : ''); ?> name="selection[]">
                                    <label for="scholarship-section__field-checkbox-input-9" class="scholarship-section__field-checkbox-label"> <?php echo e($stafford[7][1]); ?></label>
                                </div>
                                <div class="scholarship-section__field-checkbox-group">
                                    <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-10" value="<?php echo e($stafford[7][2]); ?>" <?php echo e(!empty( $selection ) && in_array( $stafford[7][2], $selection ) ? 'checked' : ''); ?> name="selection[]">
                                    <label for="scholarship-section__field-checkbox-input-10" class="scholarship-section__field-checkbox-label"> <?php echo e($stafford[7][2]); ?></label>
                                </div>
                            </fieldset>
                        </div>
                    </fieldset>

                    <fieldset class="scholarship-section__fieldset-group">
                        <legend class="scholarship-section__fieldset-legen">2. UNIVERSITY OF LONDON</legend>
                        <div class="scholarship-section__field-checkbox-group">
                            <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-11" value="<?php echo e($london[1]); ?>" <?php echo e(!empty( $selection ) && in_array( $london[1], $selection ) ? 'checked' : ''); ?> name="selection[]">
                            <label for="scholarship-section__field-checkbox-input-11" class="scholarship-section__field-checkbox-label"> <?php echo e($london[1]); ?></label>
                        </div>
                    </fieldset>

                    <fieldset class="scholarship-section__fieldset-group">
                        <legend class="scholarship-section__fieldset-legen">3. BRITISH UNIVERSITY VIETNAM</legend>
                        <div class="scholarship-section__field-checkbox-group">
                            <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-12" value="<?php echo e($vietnamese[1]); ?>" <?php echo e(!empty( $selection ) && in_array( $vietnamese[1], $selection ) ? 'checked' : ''); ?> name="selection[]">
                            <label for="scholarship-section__field-checkbox-input-12" class="scholarship-section__field-checkbox-label"> <?php echo e($vietnamese[1]); ?></label>
                        </div>
                        <div class="scholarship-section__field-checkbox-group">
                            <input type="checkbox" class="scholarship-section__field-checkbox-input" id="scholarship-section__field-checkbox-input-13" value="<?php echo e($vietnamese[2]); ?>" <?php echo e(!empty( $selection ) && in_array( $vietnamese[2], $selection ) ? 'checked' : ''); ?> name="selection[]">
                            <label for="scholarship-section__field-checkbox-input-13" class="scholarship-section__field-checkbox-label"> <?php echo e($vietnamese[2]); ?>

                            </label>
                        </div>
                    </fieldset>

                </div>
            </div>


        </div>
        <div style="display: block;width: 100%;float: left;">
            <div style="background-color: #d92027; padding: 3px 6px 2px;font-size: 16px;font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; color: #fff;margin-bottom: 6px;">
                English language Proficiency
            </div>
            <table style="width:100%;font-size: 13px;font-family: 'Arial', sans-serif;margin-bottom: 30px;">
                <tr>
                    <td colspan="3"
                        style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                        Is English the language of your secondary/ high school or tertiary studies?
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%; vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                        <label><input type="checkbox" <?php echo e(isset( $programme->english_is_secondary ) && $programme->english_is_secondary == 1  ? 'checked' : ''); ?> /> Yes</label>
                    </td>
                    <td style="width: 20%; vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                        <label><input type="checkbox" <?php echo e(isset( $programme->english_is_secondary ) && $programme->english_is_secondary == 0  ? 'checked' : ''); ?> /> No</label>
                    </td>
                    <td style="width: 60%; vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">

                    </td>
                </tr>
                <tr>
                    <td colspan="3"
                        style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                        If Yes, provide a statement from the Institution verifying the language of instruction
                    </td>
                </tr>
                <tr>
                    <td colspan="3"
                        style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                        Have you taken any English test?
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%; vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                        <label><input type="checkbox" <?php echo e(!empty( $programme->english_test_taken )  ? 'checked' : ''); ?>/> Yes</label>
                    </td>
                    <td style="width: 20%; vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                        <label><input type="checkbox" <?php echo e(empty( $programme->english_test_taken )  ? 'checked' : ''); ?>/> No</label>
                    </td>
                    <td style="width: 60%; vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">

                    </td>
                </tr>

                <tr>
                    <td colspan="3"
                        style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                        <p>If Yes, please provide the result</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"
                        style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                        <table width="100%">
                            <tr>
                                <td width="10%"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Date taken: <?php echo e(!empty( $programme->english_test_date )  ? $programme->english_test_date : ''); ?>

                                </td>
                                <td width="10%"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Listening: <?php echo e(!empty( $programme->english_test_listening )  ? $programme->english_test_listening : ''); ?>

                                </td>
                                <td width="10%"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Reading: <?php echo e(!empty( $programme->english_test_reading )  ? $programme->english_test_reading : ''); ?>

                                </td>
                                <td width="10%"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Writing: <?php echo e(!empty( $programme->english_test_writing )  ? $programme->english_test_writing : ''); ?>

                                </td>
                                <td width="10%"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Speaking: <?php echo e(!empty( $programme->english_test_speaking )  ? $programme->english_test_speaking : ''); ?>

                                </td>
                                <td width="10%"
                                    style="vertical-align:top;font-size: 15px;font-family: 'Arial', sans-serif;padding: 3px 0;">
                                    Overall score: <?php echo e(!empty( $programme->english_test_overall )  ? $programme->english_test_overall : ''); ?>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>


        <div style="display: block;width: 100%;float: left;margin-bottom: 30px;">
            <div style="background-color: #d92027; padding: 3px 6px 2px;font-size: 16px;font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; color: #fff;margin-bottom: 6px;">
                APPLICANT'S SUPPORTING STATEMENTS
            </div>
            <p>Please limit your answer to 100 words per question. Attach a page if there is not enough room.</p>


            <p>1. Briefly give the reasons why you feel you are an ideal candidate for this scholarship.</p>
            <p style="border-bottom: 1px dotted #333;line-height: 140%;"><?php echo e(!empty( $statement->statement_1 ) ? $statement->statement_1 : ''); ?></p>
            <p style="border-bottom: 1px dotted #333;line-height: 140%;"></p>
            <p style="border-bottom: 1px dotted #333;"></p>


            <p>2. What one thing outside of school has been the most challenging for you so far?</p>
            <p style="border-bottom: 1px dotted #333;"><?php echo e(!empty( $statement->statement_2 ) ? $statement->statement_2 : ''); ?></p>
            <p style="border-bottom: 1px dotted #333;"></p>
            <p style="border-bottom: 1px dotted #333;"></p>


            <p>3. How will the major that you have applied for will contribute significantly to the development of
                Vietnam?</p>
            <p style="border-bottom: 1px dotted #333;"><?php echo e(!empty( $statement->statement_3 ) ? $statement->statement_3 : ''); ?></p>
            <p style="border-bottom: 1px dotted #333;"></p>
            <p style="border-bottom: 1px dotted #333;"></p>


            <p>4. In your field of interest, who do you admire most and why?</p>
            <p style="border-bottom: 1px dotted #333;"><?php echo e(!empty( $statement->statement_4 ) ? $statement->statement_4 : ''); ?></p>
            <p style="border-bottom: 1px dotted #333;"></p>
            <p style="border-bottom: 1px dotted #333;"></p>


            <p>5. How would you contribute to British University Vietnam if you studied here?</p>
            <p style="border-bottom: 1px dotted #333;"><?php echo e(!empty( $statement->statement_5 ) ? $statement->statement_5 : ''); ?></p>
            <p style="border-bottom: 1px dotted #333;"></p>
            <p style="border-bottom: 1px dotted #333;"></p>


            <p>6. Is there anything else would you like to add in support of your application for this scholarship? Give
                details.</p>
            <p style="border-bottom: 1px dotted #333;"><?php echo e(!empty( $statement->statement_6 ) ? $statement->statement_6 : ''); ?></p>
            <p style="border-bottom: 1px dotted #333;"></p>
            <p style="border-bottom: 1px dotted #333;"></p>

        </div>

        <div style="display: block;width: 100%;float: left;margin-bottom: 30px;">
            <div style="background-color: #d92027; padding: 3px 6px 2px;font-size: 16px;font-weight: bold; font-family: 'Arial', sans-serif; text-transform: uppercase; color: #fff;margin-bottom: 6px;">
                TERMS & CONDITIONS
            </div>

            <p>1. I certify that all information given by me in this application is true and correct. I further declare
                that any tertiary academic results submitted are a complete record of all results I have obtained from
                every institution I have attended.</p>
            <p>2. I understand that at the time of enrollment I will be required to supply copy of all
                documents used to support this application.</p>
            <p>3. I hereby agree to abide by all regulations and procedures laid down by British University Vietnam if I
                am successfully chosen as a scholarship grantee.</p>
            <p>4. I hereby declare my consent to have my details made available to the academic faculty. I agree to be
                contacted via phone or email by the University for academic reasons. I further understand that it may be
                disclosed to third parties for the purpose of processing my application.</p>
            <p>5. I hereby declare that I have not committed any criminal offences and am able to provide a criminal
                record check when required.</p>
        </div>

        <div style="display: block;width: 40%;float: left;margin-bottom: 30px;padding-top: 30px;">
            <p style="margin-bottom: 0;font-weight: bold;">Applicant’s signature</p>
            <p style="margin-bottom: 0;font-weight: bold;">Chữ ký của người dự tuyển</p>

            <p style="margin-bottom: 0;"><img src="[signature_image]" width="190"></p>
            <p style="margin-bottom: 0;">Sign date</p>
            <p style="margin-bottom: 0;"><?php echo e(date('d/m/Y')); ?></p>
        </div>
    </div>
</div>
</body>
</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/scholarship/pdf/finish.blade.php ENDPATH**/ ?>