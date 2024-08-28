<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" id="csrf-token"/>
    <meta name="upload-url" content="<?php echo e(route('scholarship.upload')); ?>" id="upload-url"/>
    <meta name="delete-url" content="<?php echo e(route('scholarship.delete')); ?>" id="delete-url"/>
    <meta name="scholarship-student-sid" content="<?php echo e(!empty( request()->sid ) ? request()->sid : 0); ?>" id="scholarship-student-sid"/>

    <title>BUV Scholarship</title>

    <?php echo $__env->yieldContent('link'); ?>

    <link href="<?php echo e(asset('favicon.ico')); ?>" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/modal.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libs/signature/jquery.signaturepad.css')); ?>" >
</head>
<body>

    <div class="scholarship">
        <div class="container">
            
            <a class="scholarship__banner" href="<?php echo e(route('scholarship.show.step1', $redirect_parram)); ?>">
                <div class="scholarship-banner__logo">
                    <img class="scholarship-banner-logo__img" src="<?php echo e(asset('img/BUV-Logo-Transparent.png')); ?>">
                </div>
                <div class="scholarship-banner__title">
                    <h3 class="scholarship-banner-title__heading">BUV SCHOLARSHIP</h3>
                </div>
            </a>

            <div class="scholarship__pagination">
                <div class="scholarship-pagination__item">
                    <a class="scholarship-pagination-item__btn scholarship-pagination-item__btn-question" href="<?php echo e(route('scholarship.show.step1', $redirect_parram)); ?>">1</a>
                </div>
                <div class="scholarship-pagination__dash"></div>
                <div class="scholarship-pagination__item">
                    <a class="scholarship-pagination-item__btn scholarship-pagination-item__btn-question" href="<?php echo e(route('scholarship.show.step2', $redirect_parram)); ?>">2</a>
                </div>
                <div class="scholarship-pagination__dash"></div>
                <div class="scholarship-pagination__item">
                    <a class="scholarship-pagination-item__btn scholarship-pagination-item__btn-question" href="<?php echo e(route('scholarship.show.step3', $redirect_parram)); ?>">3</a>
                </div>
                <div class="scholarship-pagination__dash"></div>
                <div class="scholarship-pagination__item">
                    <a class="scholarship-pagination-item__btn scholarship-pagination-item__btn-question" href="<?php echo e(route('scholarship.show.step4', $redirect_parram)); ?>">4</a>
                </div>
                <div class="scholarship-pagination__dash"></div>
                <div class="scholarship-pagination__item">
                    <a class="scholarship-pagination-item__btn scholarship-pagination-item__btn-question" href="<?php echo e(route('scholarship.show.step5', $redirect_parram)); ?>">5</a>
                </div>
                <div class="scholarship-pagination__dash"></div>
                <div class="scholarship-pagination__item">
                    <a class="scholarship-pagination-item__btn scholarship-pagination-item__btn-question" href="<?php echo e(route('scholarship.show.step6', $redirect_parram)); ?>">6</a>
                </div>
                <div class="scholarship-pagination__dash"></div>
                <div class="scholarship-pagination__item">
                    <a class="scholarship-pagination-item__btn scholarship-pagination-item__btn-question" href="<?php echo e(route('scholarship.show.step7', $redirect_parram)); ?>">7</a>
                </div>
                <div class="scholarship-pagination__dash"></div>
                <div class="scholarship-pagination__item">
                    <a class="scholarship-pagination-item__btn scholarship-pagination-item__btn-question" href="<?php echo e(route('scholarship.show.step8', $redirect_parram)); ?>">8</a>
                </div>
            </div>


            <?php if(Session::has('error')): ?>
                <div class="scholarship__alert scholarship__alert--danger"><?php echo e(Session::get('error')); ?></div>
            <?php elseif(Session::has('message')): ?>
                <div class="scholarship__alert scholarship__alert--success"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>

        </div><!-- container -->
    </div><!-- scholarship -->

    <!-- Modal loading page -->
    <div class="modal" id="modal__loading">
        <div class="modal__overlay"></div>
        <div class="modal__content">
            <div class="loader"></div>
            <div class="loading__title">Processing ...<br>Please do not close the browser</div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo e(asset('js/function.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libs/jquery_1.5.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libs/signature/jquery.signaturepad.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libs/signature/json2.min.js')); ?>"></script>
    <!-- <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=6LetauIkAAAAAA3upDCA_AiDcodBrN2-4igX5x3k"></script> -->

    <?php echo $__env->yieldContent('script'); ?>

    <script>
        // Active menu
        var _currentStep = document.URL.split("show/").pop().charAt(0);
        var menuItems = document.querySelectorAll(".scholarship-pagination-item__btn");

        menuItems.forEach(( item )=>{
            if( item.innerText == _currentStep ){
                item.closest('.scholarship-pagination__item').classList.add('scholarship-pagination__item--active');
            }
        });
        // End active menu


        // Update document
        document.querySelectorAll('.scholarship-section__field-file-edit').forEach(element => {
            element.addEventListener("click", (e)=>{
                e.preventDefault();
                e.target.closest('.validate').querySelector('input[type="file"]').click();
            });
        });
        // End update document

        setTimeout(function() {
            var alertElement = document.querySelector('.scholarship__alert');
            if( alertElement ){
                alertElement.remove();
            }
        }, 5000); // <-- time in milliseconds


        // Detect submit and next navigate
        var btnSubmits = document.querySelectorAll('.scholarship-form-submit__btn');
        var _inputSubmit = document.createElement("input");
        _inputSubmit.type = "hidden";
        _inputSubmit.name = "navigation_value";
        
        btnSubmits.forEach((btnElement)=>{
            btnElement.addEventListener('click', function(){
                if(btnElement.classList.contains('scholarship-form-submit__btn--next')){
                    _inputSubmit.value = parseInt(_currentStep) + 1;
                    document.getElementById('scholarship__form').appendChild(_inputSubmit);
                }
            });
        });

        // submit form when click to navigate btn
        var navigateBtns = document.querySelectorAll('.scholarship-pagination-item__btn');
        navigateBtns.forEach((navBtn)=>{
            navBtn.addEventListener('click', function(event){
                if( _currentStep != 8 ){
                    event.preventDefault();
                    _inputSubmit.value = navBtn.innerText;
                    var formElement = document.getElementById('scholarship__form');
                    formElement.appendChild(_inputSubmit);
                    document.getElementById('scholarship-form-submit__btn--save').click();
                }
            });
        });

        // Innit captcha
        // grecaptcha.ready(function() {
        //     grecaptcha.execute('6LetauIkAAAAAA3upDCA_AiDcodBrN2-4igX5x3k', {action: 'submit'}).then(function(token) {
        //         document.getElementById('hd_recaptcha').value = token;
        //     });
        // });

        // setInterval(function() {
        //     grecaptcha.ready(function() {
        //         grecaptcha.execute('6LetauIkAAAAAA3upDCA_AiDcodBrN2-4igX5x3k', {action: 'submit'}).then(function(token) {
        //             document.getElementById('hd_recaptcha').value = token;
        //         });
        //     });
        //     console.log('--refresh captcha token--');
        // }, 60 * 1000);
        
        window.addEventListener("load", function() { 
            document.getElementById("modal__loading").style.display = "none";

            // Scroll to labelText
            var url_string = window.location.href; 
            var url = new URL(url_string);

            const labelText = url.searchParams.get("label");
            for (const labelElement of document.querySelectorAll('label')) {

                if (  labelElement.textContent.includes(labelText) && labelElement.querySelector('.required__symbol') != null ) {
                    console.log(labelElement.closest('.validate'));
                    const validateElement = labelElement.closest('.validate') ? labelElement.closest('.validate') : labelElement.nextElementSibling;

                    validateElement.classList.add('invalid');
                    validateElement.querySelector('.error-message').innerText = Validator.message.required;
                    validateElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center',
                        inline: 'center'
                    });
                    break;
                }

            }
        });
    </script>
</body>
</html><?php /**PATH C:\tungc\App Installation\xampp742\htdocs\laravel8scholarship\resources\views/layouts/app.blade.php ENDPATH**/ ?>