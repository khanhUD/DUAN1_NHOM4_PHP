<!-- Footer Start -->
<div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h1 class="text-primary">Ninh<span class="text-dark">Kiều</span></h1>
                    <p class="lh-lg mb-4">Chúng tôi cung cấp dịch vụ ẩm thực chất lượng cao với đội ngũ đầu bếp tài năng. Hãy đồng hành cùng chúng tôi trong mỗi bữa ăn!</p>
                    <div class="footer-icon d-flex">
                        <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-primary btn-sm-square me-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Menu hôm nay</h4>
                    <div class="d-flex flex-column align-items-start">
                        <?php
                        foreach ($count_view as $items) :

                        ?>
                            <a class="text-body mb-3" href="<?= _WEB_ROOT; ?>/clientProducts/productDetails?id=<?= $items['id'] ?>&categories_id=<?= $items['product_categories_id'] ?>"><i class="fa fa-check text-primary me-2"></i><?=$items['name']?></a>
                        <?php endforeach; ?>
<!--                         
                        <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i> Sandwich</a>
                        <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i> Bánh Burger Panner</a>
                        <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i> Đặc Sản Ngọt</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Liên Hệ</h4>
                    <div class="d-flex flex-column align-items-start">
                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i> 02 Đường Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ</p>
                        <p><i class="fa fa-phone-alt text-primary me-2"></i> 0909 1509 09</p>
                        <p><i class="fas fa-envelope text-primary me-2"></i> ninhkieures@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Món ăn nổi bật</h4>
                    <div class="row g-2">

                        <?php
                        foreach ($count_view as $items) :

                        ?>
                            <div class="col-4">
                                <a href="<?= _WEB_ROOT; ?>/clientProducts/productDetails?id=<?= $items['id'] ?>&categories_id=<?= $items['product_categories_id'] ?>"> <img src="<?= _WEB_ROOT; ?>/public/uploads/<?= $items['image'] ?>" class="img-fluid rounded-circle border border-primary p-2" alt=""></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Dự án 1 nhóm 4</a>, Bản quyền © 2023, Đã đăng ký. Mọi quyền được bảo lưu.</span>

            </div>

        </div>
    </div>
</div>
<!-- Copyright End -->