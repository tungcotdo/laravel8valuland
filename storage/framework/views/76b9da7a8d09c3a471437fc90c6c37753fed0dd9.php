<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body class="p-4">
    <?php if(Session::has('error')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('error')); ?></div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Student Name</th>
                <th scope="col">Student Code</th>
                <th scope="col">Subject</th>
                <th scope="col">Component</th>
                <th scope="col">Marks by BUV - 1st Marker</th>
                <th scope="col">Marks by BUV - 2nd Marker</th>
                <th scope="col">Agreed Marks out of 100</th>
                <th scope="col">Final Marks out of 100</th>
                <th scope="col">Marks by BUV Examiner, if any changes</th>
                <th scope="col">Total Marks secured (BUV)</th>
                <th scope="col">Suffix</th>
                <th scope="col">Final Mark by Examiner</th>
                <th scope="col">COMMENT, IF ANY (For different marks)</th>
                <th scope="col">COMMENT, IF ANY</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $mark_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($value->student_name); ?></td>
                    <td><?php echo e($value->student_code); ?></td>
                    <td><?php echo e($value->subject); ?></td>
                    <td><?php echo e($value->component_name); ?></td>
                    <td><?php echo e($value->first_mark); ?></td>
                    <td><?php echo e($value->second_mark); ?></td>
                    <td><?php echo e($value->agreed_mark); ?></td>
                    <td><?php echo e($value->final_mark); ?></td>
                    <td><?php echo e($value->examiner_mark); ?></td>
                    <td><?php echo e($value->total_mark); ?></td>
                    <td><?php echo e($value->suffix); ?></td>
                    <td><?php echo e($value->final_mark_examiner); ?></td>
                    <td><?php echo e($value->comment_diff_mark); ?></td>
                    <td><?php echo e($value->comment); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  </body>
</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\tool\resources\views/mark/detail.blade.php ENDPATH**/ ?>