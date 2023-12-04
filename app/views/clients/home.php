<!-- Hero Start -->
<?php foreach ($banner as $items) : ?>
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 col-md-12">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Chào mừng đến với Ninh Kiều Restaurant</small>
                    <a href="<?= _WEB_ROOT ?><?= $items['link'] ?>">
                        <h3 class="display-1 mb-4 animated bounceInDown"><?= $items['title'] ?></h3>
                    </a>
                    <a href="<?= _WEB_ROOT ?>Dat-Ban" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Đặt bàn ngay</a>
                    <a href="<?= _WEB_ROOT ?>Thuc-Don" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft">Xem thêm</a>
                </div>
                <div class="col-lg-5 col-md-12">
                    <img src="<?= _WEB_ROOT; ?>/public/assets/clients/img/hero.png" class="img-fluid rounded animated zoomIn" alt="">
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Hero End -->

<!-- Bắt đầu Về chúng tôi -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <img src="<?= _WEB_ROOT; ?>/public/assets/clients/img/about.jpg" class="img-fluid rounded" alt="">
            </div>
            <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Về chúng tôi</small>
                <h1 class="display-5 mb-4">Được tin tưởng bởi hơn <?= $users['total_customers']?> khách hàng hài lòng</h1>
                <p class="mb-4">Chúng tôi tự hào được đánh giá cao từ hơn <?= $users['total_customers']?> khách hàng, đồng hành và hài lòng với dịch vụ của chúng tôi. Sự tận tâm và chất lượng là tiêu chí hàng đầu, giúp chúng tôi xây dựng mối quan hệ vững chắc và lâu dài với cộng đồng.</p>
                <div class="row g-4 text-dark mb-5">
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Giao hàng thực phẩm mới và nhanh chóng
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Hỗ trợ khách hàng 24/7
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Tùy chọn Tùy chỉnh Dễ dàng
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Ưu đãi ngon cho các bữa ăn ngon
                    </div>
                </div>
                <a href="" class="btn btn-primary py-3 px-5 rounded-pill">Về Chúng Tôi<i class="fas fa-arrow-right ps-2"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Kết thúc Về chúng tôi -->
<!-- Menu Start -->
<div class="container-fluid menu bg-light py-6 my-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Thực Đơn Của Chúng Tôi</small>
            <h1 class="display-5 mb-5">Nhứng Món Ăn Hấp Dẫn</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill active" data-bs-toggle="pill" href="#tab-6">
                        <span class="text-dark" style="width: 150px;">Bán Chạy Nh</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill" href="#tab-7">
                        <span class="text-dark" style="width: 150px;">Main Course</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill" href="#tab-8">
                        <span class="text-dark" style="width: 150px;">Drinks</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill" href="#tab-9">
                        <span class="text-dark" style="width: 150px;">Offers</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill" href="#tab-10">
                        <span class="text-dark" style="width: 150px;">Our Spesial</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div  class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="<?= _WEB_ROOT; ?>/public/assets/clients/img/menu-01.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Paneer</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.2s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="<?= _WEB_ROOT; ?>/public/assets/clients/img/menu-02.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sweet Potato</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut labore.</p>
                                </div>
                            </div>
                        </div>
                      

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->
<!-- Blog Start -->
<div class="container-fluid blog py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Bài Viết Của Chúng Tôi</small>
            <h1 class="display-5 mb-5">Đọc Tin Tức Đầu Tiên</h1>
        </div>
        <div class="row gx-4 justify-content-center">

            <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                <div class="blog-item">
                    <div class="overflow-hidden rounded">
                        <img src="<?= _WEB_ROOT; ?>/public/assets/clients/img/blog-1.jpg" class="img-fluid w-100" alt="">
                    </div>
                    <div class="blog-content mx-4 d-flex rounded bg-light">
                        <div class="text-dark bg-primary rounded-start">
                            
                        </div>
                        <a href="#" class="h5 lh-base my-auto h-200 p-3">How to get more test in your fozxcvzfxod fromHow to get more test in your food from</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Blog End -->