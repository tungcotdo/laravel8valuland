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
    <form action="<?php echo e(route('file.upload')); ?>" method="POST" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-6 mb-3">
          <label for="formFile" class="form-label-sm">Upload your excel file</label>
          <input class="form-control-sm" type="file" name="excel_file">
        </div>
        <div class="col-6">
          <label for="formFile" class="form-label-sm">BUV field name</label>
          <input class="form-control-sm" type="text" name="field_name" value='awarding'>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php echo e(route('file.match')); ?>" class="link-underline-primary float-end">Go to the rules</a>
    </form>
  </body>
</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\tool\resources\views/file/index.blade.php ENDPATH**/ ?>