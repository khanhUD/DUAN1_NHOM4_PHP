<!-- Hero Start -->
<div class="container-fluid bg-light py-6 my-6 mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1 mb-4">Món ăn chi tiết</h1>
        <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="homeClient">Trang chủ</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Món ăn chi tiết</li>
        </ol>
    </div>
</div>
<!-- Hero End -->
<!-- row -->
<div class="row container">
    <!-- Product main img -->
    <div class="col-md-5 col-md-push-2">
        <div id="product-main-img">
            <div class="product-preview">
                <!-- img  -->
            </div>
        </div>
    </div>
    <!-- /Product main img -->

    <!-- Product thumb imgs -->
    <div class="col-md-2  col-md-pull-5">
        <div id="product-imgs">

        </div>
    </div>
    <!-- /Product thumb imgs -->

    <!-- Product details -->
    <div class="col-md-5">
        <div class="product-details">

            <h2 class="product-name">Món ăn nhè nhẹ</h2>
            <div>
                <a class="review-link" href="#">(10 Đánh giá đếm số bình luận, số sao trung bình) | Thêm đánh giá của bạn</a>
            </div>
            <div>
                <h3 class="product-price">50 <del class="product-old-price">100</del></h3>

            </div>
            <p>Mô tả ngắn</p>



            <div class="add-to-cart">
                <div class="qty-label">

                    Số lượng
                    <div class="input-number">
                        <input type="number">
                        <span class="qty-up">+</span>
                        <span class="qty-down">-</span>
                    </div>
                </div>
                <button class="btn"><i class="fa fa-shopping-cart"></i> Mua ngay</button>
            </div>

            <ul class="product-btns">
                <li><a href="#"><i class="fa fa-heart-o"></i> Thêm vào yêu thích</a></li>
            </ul>
            <ul class="product-links">

                <li>Danh mục:loại món </li>
            </ul>

         

        </div>
    </div>

    <!-- /Product details -->
</div>
<!-- Product tab -->
<div class="col-md-12  bg-light">
    <div class="container">
        <div id="product-tab ">
            <div class="row  ">
                <!-- Reviews -->
                <div class="col-md-9">
                    <div id="reviews">
                        <ul class="reviews" style="  max-width: 100%; overflow: hidden;word-wrap: break-word;">

                            <li>
                                <div class="review-heading">
                                    <h5 class="name">họ tên</h5>
                                    <p class="date">bày bình luận</p>
                                </div>
                                <div class="review-body">
                                    <p>nội dung</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>


                <!-- /Reviews -->
                <!-- Review Form -->
                <div class="col-md-3">
                    <div id="review-form">
                        <form class="review-form" action="index.php" method="post">

                            <div class="input-rating">
                                <span>Đánh giá: </span>
                                <input type="hidden" name="ma_hh" value="mã ">
                                <textarea class="input" name="noi_dung" id="noi_dung" placeholder="Nhập bình luận" rows="5" cols="40"></textarea>
                                <span class="error-message" id="noi_dung-error" style="color: red;"></span>
                            </div>
                            <button class="primary-btn" type="submit" name="guiBinhLuan" onclick="return validateBinhLuan();">Gửi</button>

                            <textarea class="input" placeholder="Đăng nhập để được bình luận" rows="5" cols="40" readonly></textarea>

                        </form>



                    </div>
                </div>
                <!-- /Review Form -->


            </div>

        </div>

    </div>


</div>

<!-- /product tab -->

<!-- /row -->
<?php
?>

</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Sản phẩm liên quan</h3>
                </div>
            </div>

            <a href="#">
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="hinh" alt="">
                            <div class="product-label">
                                <span class="sale">giảm giá</span>

                                <span class="new">TƯƠNG TỰ</span>

                            </div>
                        </div>
                        <div class="product-body">

                            <h3 class="product-name"><a href="#">tên món ăn</a></h3>
                            <h4 class="product-price">

                                <h5 class="product-price">
                                    <del class="product-old-price">df</del>
                                    <del class="product-old-price">sdf</del>
                                </h5>

                                <div class="product-btns">
                                    <button onclick="window.location.href = 'index.php?act=Yeuthich';" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp"> Yêu thích</span></button>
                                    <button onclick="window.location.href = '#';" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem ngay</span></button>
                                </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Mua ngay</button>
                        </div>
                    </div>
                </div>
            </a>

            <?php

            ?>
            <!-- product -->

            <!-- /product -->




        </div>
        <!-- /store products -->
    </div>