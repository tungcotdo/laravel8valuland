<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        h2{
            color: red;
            font-style: italic;
        }

        a{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <h2>Không có quyền truy cập!</h2>
    <a href="<?php echo e(URL::previous()); ?>">Quay lại</a>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/error/404.blade.php ENDPATH**/ ?>