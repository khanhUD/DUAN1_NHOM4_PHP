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
                <h1 class="display-5 mb-4">Được tin tưởng bởi hơn <?= $users['total_customers'] ?> khách hàng hài lòng</h1>
                <p class="mb-4">Chúng tôi tự hào được đánh giá cao từ hơn <?= $users['total_customers'] ?> khách hàng, đồng hành và hài lòng với dịch vụ của chúng tôi. Sự tận tâm và chất lượng là tiêu chí hàng đầu, giúp chúng tôi xây dựng mối quan hệ vững chắc và lâu dài với cộng đồng.</p>
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
                <a href="<? _WEB_ROOT ?>/Gioi-Thieu" class="btn btn-primary py-3 px-5 rounded-pill">Về Chúng Tôi<i class="fas fa-arrow-right ps-2"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Kết thúc Về chúng tôi -->


<div class="container-fluid menu bg-light py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Menu</small>
            <h1 class="display-5 mb-5">Những món ăn hấp dẫn</h1>
        </div>
        <div class="tab-class text-center">
            <div class="tab-content">
                <?php
                $i = 1;
                ?>
                <div id="tab-<? $productItems['product_categories_id'] ?>" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php
                        foreach ($products as $productItems) :
                        ?>
                            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.<?= $i ?>s">
                                <div class="menu-item d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded-circle" width="100px" src="<?= _WEB_ROOT ?>/public/uploads/<?= $productItems['image'] ?>" alt="">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                            <h4><?= $productItems['name'] ?></h4>
                                            <h4 class="text-primary"><?= number_format($productItems['price']) ?></h4>
                                        </div>
                                        <p class="mb-0"><?= html_entity_decode($productItems['short_description']) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        endforeach;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




<!-- Blog Start -->
<div class="container-fluid blog py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Bài Viết Của Chúng Tôi</small>
            <h1 class="display-5 mb-5">Đọc Tin Tức Đầu Tiên</h1>
        </div>
        <div class="row">
            <div class="row gx-4 justify-content-center col-md-12">
                <?php
                //  print_r($posts);
                foreach ($posts as $items) :

                    $timestamp = strtotime($items['create_at']);

                    // Lấy ngày, tháng, năm từ timestamp
                    $day = date('d', $timestamp);
                    $month = date('m', $timestamp);
                    $year = date('Y', $timestamp);
                ?>
                    <div class="col-md-6 col-lg-4 wow bounceInUp mb-3" data-wow-delay="0.2s">
                        <div class="blog-item shadow">
                            <div class="overflow-hidden rounded-top img-post">
                                <?php
                                if ($items['image'] === '') :
                                ?>
                                    <a href="<?= _WEB_ROOT ?>/ClientPosts/postDetails?id=<?= $items['id'] ?>">
                                        <img src="<?= _WEB_ROOT; ?>/public/uploads/no-img.png" class="img-fluid w-100" alt="">
                                    </a>

                                <?php else :

                                ?>
                                    <a href="<?= _WEB_ROOT ?>/ClientPosts/postDetails?id=<?= $items['id'] ?>">
                                        <img src="<?= _WEB_ROOT; ?>/public/uploads/<?= $items['image'] ?>" class="img-fluid w-100" alt="">
                                    </a>
                                <?php endif; ?>

                            </div>
                            <div class="rounded-bottom bg-dark bg-gradient p-3">
                                <h6 class="title-blog pb-3"><a href="<?= _WEB_ROOT ?>/ClientPosts/postDetails?id=<?= $items['id'] ?>" class="lh-base my-auto"><?= $items['title'] ?></a></h6>
                                <p class="blog-content m-0 mt-3"><?= html_entity_decode($items['short_description']) ?></p>

                                <div class="blog-date text-white rounded mt-3 bg-primary">
                                    <span><?= $day ?>/<?= $month ?>/<?= $year ?></span>
                                </div>

                                <div class="border-top pt-3">
                                    <a class="pb-3 fw-bold" href="<?= _WEB_ROOT ?>/ClientPosts/postDetails?id=<?= $items['id'] ?>">Xem thêm </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->