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
    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('error')); ?></div>
    <?php endif; ?>
    <div class="row">
      <div class="col-6">
        <form action="<?php echo e(route('mark.upload')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="row">
            <div class="col-12 mb-3">
              <label for="formFile" class="form-label-sm">Upload your excel file</label>
              <div class="row">
                <div class="col-6">
                  <input class="form-control form-control-sm" type="file" name="excel_file">
                </div>
                <div class="col-6">
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-6">
        <?php if( !empty( $marks ) ): ?>
          <form action="<?php echo e(route('mark.index')); ?>">
            <div class="row ">
                <div class="col-8">
                  <label for="formFile" class="form-label-sm">Search by student's name</label>
                  <div class="row justify-content-end">
                    <div class="col-10 text-end"><input class="form-control w-100" type="text" name="search" placeholder="Search by enter name..." value="<?php echo e(!empty( $_GET['search'] ) ? $_GET['search'] : ''); ?>"></div>
                    <div class="col-2 text-end"><button type="submit" class="btn btn-success">Search</button></div>
                  </div>
                </div>
            </div>
          </form>
        <?php endif; ?>
      </div>
    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Cohort</th>
                <th scope="col">Student Name</th>
                <th scope="col">Student Code</th>
                <th scope="col">Subject</th>
                <th scope="col">Semester</th>
                <th scope="col">Sit</th>
            </tr>
        </thead>
        <tbody>
          <?php if( !empty( $marks ) ): ?>
            <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($mark->cohort); ?></td>
                    <td><a href="<?php echo e(route('mark.detail', ['student_code' => $mark->student_code])); ?>"><?php echo e($mark->student_name); ?></a></td>
                    <td><?php echo e($mark->student_code); ?></td>
                    <td><?php echo e($mark->subject); ?></td>
                    <td><?php echo e($mark->semester); ?></td>
                    <td><?php echo e($mark->sit); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </tbody>
    </table>
  </body>
</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8tool\resources\views/mark/index.blade.php ENDPATH**/ ?>