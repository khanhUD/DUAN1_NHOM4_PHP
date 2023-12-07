<section class="bg-light">
    <div class="container ">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="<?= _WEB_ROOT ?>/public/uploads/<?= $productDetails['image'] ?>" alt="Card image cap" id="product-detail">
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class=""><?= $productDetails['name'] ?>

                        </h1>
                        <p class="h4 py-2"><b>Giá: </b><?= number_format($productDetails['price']) ?>đ</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Danh mục:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?= $productDetails['product_categories_name'] ?></strong></p>
                            </li>
                        </ul>

                        <h6>Mô tả:</h6>
                        <p><?= $productDetails['description'] ?></p>
                        <form action="" method="GET">
                            <div class="row mb-3">
                                <div class="col-auto">
                                    <!-- <form action=""> -->
                                    <div class="mb-1">Số lượng:</div>
                                    <div class="d-flex align-items-center quantity-product">
                                        <button type="button" class="btn bg-primary mr-2 btn-minus"><b class="text-dark">-</b></button>
                                        <input type="text" name="quantity" class="btn-quantity quantity" value="1">
                                        <button type="button" class="btn bg-primary btn-plus"><b class="text-dark">+</b></button>
                                    </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg" name="submit" value="buy">Thêm vào giỏ hàng</button>
                                </div>
                                <div class="col d-grid">
                                    <a href="" class="btn btn-success btn-lg" name="submit" value="addtocard">Đặt bàn tại đây</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<div class="container-fluid blog">
    <div class="container">
        <div class="row">
            <div class="row gx-4 justify-content-center col-md-9">
                <div class="comments mt-5">
                    <h4 class="mb-3">Bình luận</h4>

                    <!-- Hiển thị danh sách bình luận -->
                    <?php foreach ($productComments as $productCommentsItems) :
                        $timestamp = strtotime($productCommentsItems['create_at']);

                        // Lấy ngày, tháng, năm từ timestamp
                        $day = date('d', $timestamp);
                        $month = date('m', $timestamp);
                        $year = date('Y', $timestamp);
                    ?>
                        <div class="row d-flex align-items-center m-3">
                            <div class="col-md-2">
                                <?php
                                if ($productCommentsItems['image'] === '') :
                                ?>
                                    <img src="<?= _WEB_ROOT; ?>/public/uploads/no-img-user.png" class="img-fluid rounded-circle" style="object-fit: cover; height: 100px; width: 100px;" alt="">
                                <?php else :

                                ?>
                                    <img src="<?= _WEB_ROOT; ?>/public/uploads/<?= $productCommentsItems['image'] ?>" class="img-fluid rounded-circle" style="object-fit: cover; height: 100px; width: 100px;" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-10">
                                <p class="comment-meta mb-2"><strong><?= $productCommentsItems['full_name'] ?></strong> - Ngày bình luận: <?= $day ?> Tháng <?= $month ?>, <?= $year ?></p>
                                <p class="comment-text"><?= $productCommentsItems['note'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>


                    <!-- Thêm các mục khác tùy vào số lượng bình luận -->

                    <!-- Form nhập bình luận -->
                    <form class="form-comment" action="<?= _WEB_ROOT ?>/ClientProducts/submitProductComments" method="post">
                        <h5>Để lại bình luận</h5>

                        <div class="mb-3">
                            <label for="commentContent" class="form-label">Nội dung bình luận</label>
                            <input type="text" name="product_id" hidden value="<?= $productDetails['id'] ?>">
                            <input type="text" name="categories_id" hidden value="<?= $productDetails['product_categories_id'] ?>">
                            <input type="text" name="users_id" hidden value="<?= $_SESSION["users"]['id'] ?>">
                            <input type="text" name="status" hidden value="<?= ($_SESSION["users"]['role'] == 'admin') ? 'on' : 'off' ?>">
                            <textarea class="form-control commentContent" id="commentContentP" name="note" rows="3"></textarea>
                            <div class="text-danger errorNote">

                            </div>
                        </div>
                        <?php
                        if (!empty($_SESSION['users'])) {
                        ?>
                            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                        <?php
                        }
                        ?>

                    </form>
                    <?php
                    if (!isset($_SESSION['users'])) {
                    ?>
                        <div class="mb-3">
                            <p class="tex-success">Bạn phải đăng nhập mới có thể bình luận món ăn này!</p> <a class="text-decoration-none text-success fw-bold" href="<?= _WEB_ROOT ?>/Dang-Nhap/">Đăng nhập</a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Start Article -->
<!-- <section class="py-5"> -->
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <!-- <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Bài Viết Của Chúng Tôi</small> -->
                <h1 class="display-5 mb-5">Món ăn cùng loại</h1>
            </div>

            <?php

            foreach ($productRelated as $items) {

            ?>
                <div class="col-md-3">
                    <div class="card mb-4 rounded product-wap rounded shadow">
                        <div class="card rounded p-1">

                            <?php
                            if ($items['image'] === '') :
                            ?>
                                <a href="<?= _WEB_ROOT ?>/ClientProducts/productDetails?id=<?= $items['id'] ?>&categories_id=<?= $items['product_categories_id'] ?>">
                                    <img src="<?= _WEB_ROOT; ?>/public/uploads/no-img.png" class="card-img rounded img-fluid" alt="">
                                </a>

                            <?php else :

                            ?>
                                <a href="<?= _WEB_ROOT ?>/ClientProducts/productDetails?id=<?= $items['id'] ?>&categories_id=<?= $items['product_categories_id'] ?>">
                                    <img src="<?= _WEB_ROOT; ?>/public/uploads/<?= $items['image'] ?>" class="card-img rounded img-fluid" alt="">
                                </a>
                            <?php endif; ?>
                            <div class="card-img-overlay rounded product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-primary text-white mt-2" href="<?= _WEB_ROOT ?>/ClientProducts/productDetails?id=<?= $items['id'] ?>&categories_id=<?= $items['product_categories_id'] ?>"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-primary text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <a href="<?= _WEB_ROOT ?>/ClientProducts/productDetails?id=<?= $items['id'] ?>&categories_id=<?= $items['product_categories_id'] ?>" class="h5 text-decoration-none product-name"><?= $items['name'] ?></a>
                            <p class="text-center mb-0"><?= number_format($items['price']) ?>đ</p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- </section> -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('.form-comment');

        form.addEventListener('submit', function(event) {
            // Ngăn chặn form được submit
            var note = form.querySelector(".commentContent").value;
            var errorNote = form.querySelector(".errorNote");

            // Kiểm tra xem nội dung bình luận có được nhập hay không
            if (note.trim() === "") {
                errorNote.innerText = "Vui lòng nhập nội dung bình luận.";
                event.preventDefault();
            } else {
                errorNote.innerText = "";
                // Hiển thị thông báo "Bình luận của bạn đang chờ kiểm duyệt"
                <?php
                if ($_SESSION["users"]['role'] == 'user') :
                ?>
                    alert("Bình luận của bạn đang chờ duyệt.");

                <?php
                endif;
                ?>
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lặp qua tất cả các sản phẩm để gắn sự kiện cho nút tăng và giảm
        var products = document.querySelectorAll('.quantity-product');
        products.forEach(function(product) {
            var quantityInput = product.querySelector('.quantity');
            var increaseBtn = product.querySelector('.btn-plus');
            var decreaseBtn = product.querySelector('.btn-minus');

            increaseBtn.addEventListener('click', function() {
                var currentQuantity = parseInt(quantityInput.value);
                quantityInput.value = currentQuantity + 1;
                // Nếu muốn lưu trạng thái này, có thể gửi dữ liệu về máy chủ tại đây.
            });

            decreaseBtn.addEventListener('click', function() {
                var currentQuantity = parseInt(quantityInput.value);
                if (currentQuantity > 0) {
                    quantityInput.value = currentQuantity - 1;
                    // Nếu muốn lưu trạng thái này, có thể gửi dữ liệu về máy chủ tại đây.
                }
            });
        });
    });
</script>