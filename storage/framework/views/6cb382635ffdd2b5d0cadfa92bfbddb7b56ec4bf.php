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
    <form action="<?php echo e(route('file.save.match')); ?>" method="POST" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-4 mb-3">
            <label for="formFile" class="form-label-sm">BUV name</label>
            <input class="form-control-sm" type="text" name="value" value="<?php echo e(!empty($_GET['value']) ? $_GET['value'] : ''); ?>">
        </div>
        <div class="col-4 mb-3">
            <label for="formFile" class="form-label-sm">SQE</label>
            <input class="form-control-sm" type="text" name="key" value="<?php echo e(!empty($_GET['key']) ? $_GET['key'] : ''); ?>">
        </div>
        <div class="col-4 mb-3">
            <label for="formFile" class="form-label-sm">Code</label>
            <input class="form-control-sm" type="text" name="code" value="<?php echo e(!empty($_GET['code']) ? $_GET['code'] : ''); ?>">
        </div>
      </div>
      <button type="submit" class="btn btn-primary my-2">Submit</button>
      <a href="<?php echo e(route('file.index')); ?>" class="link-underline-primary float-end">Go to convert excel file</a>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">BUV name</th>
                <th scope="col">SQE</th>
                <th scope="col">Code</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($match->value); ?></td>
                    <td><?php echo e($match->key); ?></td>
                    <td><?php echo e($match->code); ?></td>
                    <td><a href="<?php echo e(route('file.match.active', ['id' => $match->id, 'status' => $match->status])); ?>" class="btn btn-sm btn-<?php echo e($match->status == 0 ? 'secondary' : 'info'); ?>"><?php echo e($match->status == 0 ? 'InActive' : 'Active'); ?></a>    </td>
                    <td>
                        <a href="<?php echo e(route('file.match', ['id' => $match->id, 'value' => $match->value, 'key' => $match->key, 'code' => $match->code])); ?>" class="btn btn-sm btn-success">Edit</a>
                        <a href="<?php echo e(route('file.match.delete', ['id' => $match->id])); ?>" onclick="return confirm('Do you want to delete this item?');" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  </body>
</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8tool\resources\views/file/match.blade.php ENDPATH**/ ?>