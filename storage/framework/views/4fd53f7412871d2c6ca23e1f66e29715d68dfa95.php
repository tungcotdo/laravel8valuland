<table>
                    <thead>
                        <tr>
                          <th scope="col">Student ID</th>
                          <th scope="col">Student name</th>
                          <th scope="col">D.O.B</th>
                          <th scope="col">Order code</th>
                          <th scope="col">Payment for</th>
                          <th scope="col">Payment method</th>
                          <th scope="col">Bank name</th>
                          <th scope="col">Card number</th>
                          <th scope="col">Amount (VND)</th>
                          <th scope="col">Content</th>
                          <th scope="col">Status</th>
                          <th scope="col">Created on</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td valign="middle"> <?php echo e($value->student_id); ?></td>
                              <td valign="middle"> <?php echo e($value->student_name); ?></td>
                              <td valign="middle"> <?php echo e($value->student_dob); ?></td>
                              <td valign="middle"> <?php echo e($value->order_code); ?></td>
                              <td valign="middle"> <?php echo e(!empty( cglobal::$payment_type[$value->type] ) ? cglobal::$payment_type[$value->type] : ''); ?></td>
                              <td valign="middle"> <?php echo e(!empty( cglobal::$payment_type[$value->method] ) ? cglobal::$payment_method[$value->method] : ''); ?></td>
                              <td valign="middle"> <?php echo e($value->bank_name); ?></td>
                              <td valign="middle"> <?php echo e($value->card_number); ?></td>
                              <td valign="middle"> <?php echo e($value->amount); ?></td>
                              <td valign="middle"> <?php echo e($value->note); ?></td>
                              <td valign="middle"> <?php echo $value->status ? '<span class="text-success">Success</span>' : '<span class="text-danger">Unsuccessful</span>'; ?></td>
                              <td valign="middle"> <?php echo e($value->created_at); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </tbody>
                </table><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\payment\resources\views/payment_transaction/export.blade.php ENDPATH**/ ?>