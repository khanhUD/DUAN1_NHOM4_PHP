<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../../public/assets/admin/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Đổi mật khẩu Ninh Kiều Restaurant</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="../../../public/assets/admin/img/favicon/favicon.ico" /> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../../public/assets/admin/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../../public/assets/admin/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../../public/assets/admin/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../../public/assets/admin/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../../public/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../../../public/assets/admin/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../../../public/assets/admin/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../../public/assets/admin/js/config.js"></script>
</head>

<body>
    <!-- Content -->
    <?= show_message('<div id="alert" class="alert bg-gradient-primary alert-dismissible text-sm  text-white  fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>', '</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>');

        ?>
    <div class="container-xxl">
        


        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->

                        <!-- /Logo -->
                        <a href="<?php _WEB_ROOT ?>Trang-Chu">
                            <h4 class="mb-2 text-center">Ninh Kiều Restaurant</h4>
                        </a>

                        <p class="mb-4 text-center">Thay đổi mật khẩu</p>

                        <form id="formAuthentication" class="mb-3" action="<?php _WEB_ROOT ?>/email/updatePass" method="POST">
                            <div class="mb-3 form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email của bạn" autofocus />
                                <div class='form-message text-danger'></div>
                            </div>
                            <div class="mb-3 form-password-toggle form-group">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Nhập mật khẩu mới </label>

                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="form-group input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <div class='form-message text-danger'></div>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Đổi mật khẩu</button>
                            </div>
                        </form>


                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../../public/assets/admin/vendor/libs/jquery/jquery.js"></script>
    <script src="../../../public/assets/admin/vendor/libs/popper/popper.js"></script>
    <script src="../../../public/assets/admin/vendor/js/bootstrap.js"></script>
    <script src="../../../public/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../../public/assets/admin/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../../../public/assets/admin/js/main.js"></script>

    <!-- Validate -->
    <script src="<?= _WEB_ROOT; ?>/public/assets/admin/js/Validation.js"></script>

    <script>
        if (document.querySelector('#formAuthentication')) {
            Validator({
                form: '#formAuthentication',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    // Validator.isRequired('.input-group input[name="email"]','Vui lòng nhập'),
                    Validator.isEmail('input[name="email"]','Vui lòng nhập đúng định dạng email!'),
                    
                    Validator.minLength('input[name="password"]', '8', 'Vui lòng nhập tối thiểu 8 kí tự!'),
                ]
            });

        }
    </script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>