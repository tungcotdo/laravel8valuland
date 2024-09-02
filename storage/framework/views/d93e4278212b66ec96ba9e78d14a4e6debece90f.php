
<?php $__env->startSection('admin.main'); ?>
        <div class="pagetitle">
            <h1>Thống kê số liệu</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thống kê</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <?php if( $_authorization('admin', 'dashboard', 'index', true) ): ?>
            <section class="section dashboard" id="dashboard">

            </section>
            <input type="hidden" value="<?php echo e(route('admin.dashboard.render')); ?>" id="dashboard-render-url">
        <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin.script'); ?>
  <script>
    // Define API
    async function fetchAPI(url, formData) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle successful response from the server
                    let result = JSON.parse(xhr.response);
                    document.getElementById("dashboard").innerHTML = result.template;

                } else {
                    // Handle error response from the server
                    console.error('Failed to upload files.');
                }
            }
        };
        xhr.send(formData);
    }

    // render
    const formData = new FormData();
    formData.append("_token", document.querySelector("#csrf-token").content);
    fetchAPI(document.getElementById('dashboard-render-url').value, formData);

    setInterval(function(){
        fetchAPI(document.getElementById('dashboard-render-url').value, formData);
    }, 5000);

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8valuland\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>