<!-- Hero Start -->
<div class="container-fluid bg-light py-6 my-6 mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1 mb-4">Đặt bàn</h1>
        <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="<? _WEB_ROOT ?>/trang-chu">Trang chủ</a></li>
            <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
            <li class="breadcrumb-item text-dark" aria-current="page">Đặt bàn</li>
        </ol>
    </div>
</div>
<!-- Hero End -->


<!-- Book Us Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-0">
            <div class="col-1">
                <img src="<?= _WEB_ROOT ?>/public/assets/clients/img/background-site.jpg" class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
            <div class="col-10">
                <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                    <div class="text-center">
                        <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Đặt bàn</small>
                        <h1 class="display-5 mb-5">Liên hệ đặt bàn</h1>
                    </div>
                    <form id="form-booking" action="<?php _WEB_ROOT ?>/dat-ban/add" method="post">
                        <div class="row g-4 form mb-3">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Họ và tên:</label>
                                    <input type="text" name="full_name" class="w-100 p-2 form-control border-primary bg-light" placeholder="Họ và tên (*)">
                                    <div class="mb-3 text-danger form-message"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Email:</label>
                                    <input type="email" name="email" class="w-100 p-2 form-control border-primary bg-light" value="<?= isset(($_SESSION['users']['email'])) ? $_SESSION['users']['email'] : 'Email' ?>" readonly>
                                    <div class="mb-3 text-danger form-message"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Số điện thoại:</label>
                                    <input type="text" name="phone" class="w-100 p-2 form-control border-primary bg-light" placeholder="Điện thoại (*)">
                                    <div class="mb-3 text-danger form-message"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Bạn đến mấy người?</label>
                                    <input type="number" name="number_people" class="w-100 p-2 form-control border-primary bg-light" placeholder="Số người (*)">
                                    <div class="mb-3 text-danger form-message"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Bạn có thể đến ngày nào?</label>
                                    <input type="date" name="arrival_date" class="w-100 p-2 form-control border-primary bg-light" placeholder="Chọn ngày (*)">
                                    <div class="mb-3 text-danger form-message"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">Thời gian bạn đến?</label>
                                    <input type="time" name="arrival_time" class="w-100 p-2 form-control border-primary bg-light" placeholder="Chọn ngày (*)">
                                    <div class="mb-3 text-danger form-message"></div>
                                </div>
                            </div>
                        </div>
                        <div class="contact t">
                            <p>Mọi chi tiết xin liên hệ: <b class="text-primary"> 0909 1509 09</b></p>
                        </div>
                        <input type="text" name="user_id" class="w-100 p-2 form-control border-primary bg-light" value="<?= isset(($_SESSION['users']['id'])) ? $_SESSION['users']['id'] : '' ?>" hidden>
                        <div class="col-12 text-center">
                            <?php
                            if (!empty($_SESSION['users'])) {
                            ?>
                                <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Đặt bàn ngay</button>
                            <?php
                            }
                            ?>

                            <?php
                            if (!isset($_SESSION['users'])) {
                            ?>
                                <div class="mb-3">
                                    <p class="tex-success">Bạn phải đăng nhập mới có thể đặt bàn!</p> <a class="text-decoration-none text-success fw-bold" href="<?= _WEB_ROOT ?>/Dang-Nhap">Đăng nhập</a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-1">
                <img src="<?= _WEB_ROOT ?>/public/assets/clients/img/background-site.jpg" class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
        </div>

    </div>
</div>

<script src="<?= _WEB_ROOT; ?>/public/assets/admin/js/Validation.js"></script>

<script>
    if (document.querySelector('#form-booking')) {
    Validator({
      form: '#form-booking',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="phone"]', 'Vui lòng nhập!'),
        Validator.isPhone('input[name="phone"]', 'Số điện thoại không đúng định dạng!'),
        Validator.isRequired('input[name="full_name"]', 'Họ và tên không được để trống!'),
        Validator.isRequired('input[name="number_people"]', 'Số người không được để trống!'),
        Validator.isNumber('input[name="number_people"]', 'Hãy chọn số người bạn đến!'),
        Validator.isRequired('input[name="arrival_date"]', 'Hãy chọn ngày bạn đến!'),
        Validator.isDateBeforeNow('input[name="arrival_date"]', 'Bạn phải đặt trước một ngày!'),
        Validator.isRequired('input[name="arrival_time"]', 'Hãy chọn thời gian bạn đến!'),
        Validator.isTimeWithinRange('input[name="arrival_time"]', 'Hãy chọn!'),
        
      ]
    })
  }
</script>
<!-- Book Us End -->