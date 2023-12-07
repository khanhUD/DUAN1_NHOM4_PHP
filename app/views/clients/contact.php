    <!-- Hero Start -->
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Liên hệ</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="<?=_WEB_ROOT?>/trang-chu">Trang chủ</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                <li class="breadcrumb-item text-dark" aria-current="page">Liên hệ</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Contact Start -->
    <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="p-5 bg-light rounded contact-form">
                <div class="row g-4">
                    <div class="col-12">
                        <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Liên Hệ</small>
                        <h1 class="display-5 mb-0">Liên Hệ Với Chúng Tôi</h1>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div id="success-popup" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <p>Lời nhắn của bạn đã được gửi đi</p>
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mb-4">Nhà hàng chúng tôi luôn luôn đặt khách hàng lên hàng đầu, tận tâm phục vụ, mang lại cho khách hàng những trãi nghiệm tuyệt với nhất. Các món ăn với công thức độc quyền sẽ mang lại hương vị mới mẻ cho thực khách. Nhà hàng Ninh Kiều xin chân thành cảm ơn.</p>

                        <form id="form-contacts" action="<?= _WEB_ROOT ?>/ClientContacts/postForm" method="post">
                            <div class="form-group">
                                <input type="text" name="full_name" class="w-100 form-control p-3  border-primary bg-light" placeholder="Họ và tên (*)">
                                <div class="mb-4 text-danger form-message"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="w-100 form-control p-3 border-primary bg-light" placeholder="Điện thoại (*)">
                                <div class="mb-4 text-danger form-message"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="w-100 form-control p-3 border-primary bg-light" placeholder="Email (*)">
                                <div class="mb-4 text-danger form-message"></div>
                            </div>
                            <div class="form-group">
                                <textarea name="note" class="w-100 form-control p-3 border-primary bg-light" rows="4" cols="10" placeholder="Lời nhắn (*)"></textarea>
                                <div class="mb-4 text-danger form-message"></div>
                            </div>
                            <button class="w-100 btn btn-primary form-control mb-4 p-3 border-primary bg-primary rounded-pill btn-submit-contacts" type="submit">Gửi thông tin</button>
                        </form>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Địa chỉ</h4>
                                    <p>02 Đường Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ</p>
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Email</h4>
                                    <p class="mb-2">info@ninhkieu.com</p>
                                    <p class="mb-0">support@ninhkieu.com</p>
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Điện thoại</h4>
                                    <p class="mb-2">1900 6789</p>
                                    <p class="mb-0">1900 6798</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gg_map mt-5 rounded">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5556.226259940806!2d105.7805112569501!3d10.029624664881956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0629f3310bdad%3A0x2919c5df937d3199!2sNinh%20Kieu%20Riverside%20Hotel%20(Building%20B)!5e0!3m2!1sen!2s!4v1701624262921!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <script src="<?= _WEB_ROOT; ?>/public/assets/admin/js/Validation.js"></script>
    <script>
        if (document.querySelector('#form-contacts')) {
            Validator({
                form: '#form-contacts',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',

                rules: [
                    Validator.isRequired('input[name="full_name"]', '* Vui lòng nhập họ tên!'),
                    Validator.isRequired('input[name="phone"]', '* Vui lòng nhập số điện thoại!'),
                    Validator.isPhone('input[name="phone"]', '* Số điện thoại không hợp lệ!'),
                    Validator.isRequired('input[name="email"]', '* Vui lòng nhập email!'),
                    Validator.isEmail('input[name="email"]', '* Email không hợp lệ!'),
                    Validator.isRequired('textarea[name="note"]', '* Hãy để lại lời nhắn!'),
                ],

                onSubmit: function(data) {
                    // call API
                    //Submit =====>
                    alert("Lời nhắn của bạn đã được gửi đi. ");

                    setTimeout((document.querySelector(this.form).submit()),3000);

                }
            })
        }
    </script>