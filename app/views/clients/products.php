<div class="container-fluid bg-light py-6 mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1">Thực đơn</h1>
        <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="<? _WEB_ROOT ?>/ClientHome">Trang chủ</a></li>
            <!-- <li class="breadcrumb-item"><a href="#">Thực đơn</a></li> -->
            <li class="breadcrumb-item text-dark" aria-current="page">Thực đơn</li>
        </ol>
    </div>
</div>
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3 mb-3">
            <aside class="wow bounceInRight" data-wow-delay="0.7s">
                <div class="card">
                    <h6 class="card-title bg-primary p-3 rounded-top m-0">DANH MỤC MÓN ĂN</h6>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class=" ps-0 list-group-item"><a href="<?= _WEB_ROOT ?>/ClientProducts" class="category-link">Tất cả</a></li>
                            <?php foreach ($productCategories as $productCategoriesItems) : ?>
                                <li class="ps-0 list-group-item"><a href="<?= _WEB_ROOT ?>/ClientProducts/products?id=<?= $productCategoriesItems['id'] ?>" class="category-link"><?= $productCategoriesItems['name'] ?></a></li>
                            <?php endforeach; ?>


                        </ul>
                    </div>
                </div>
            </aside>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <?php
                // print_r($products)
                foreach ($products as $items) :
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
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
                                        <?php
                                        if (isset($_SESSION['users'])) {
                                        ?>
                                            <li><a onclick="addToCart()" class="btn btn-primary text-white mt-2 addToCart" href="<?= _WEB_ROOT ?>/ClientCarts/addCart?id=<?= $items['id'] ?>&quantity=1"><i class="fas fa-cart-plus"></i></a></li>

                                        <?php
                                        } else {
                                        ?>
                                            <li><a onclick="noneClick()" class="btn btn-primary text-white mt-2 addToCart" href=""><i class="fas fa-cart-plus"></i></a></li>

                                        <?php
                                        }

                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <a href="<?= _WEB_ROOT ?>/ClientProducts/productDetails?id=<?= $items['id'] ?>&categories_id=<?= $items['product_categories_id'] ?>" class="h5 text-decoration-none product-name"><?= $items['name'] ?></a>
                                <p class="text-center mb-0"><?= number_format($items['price'], 0, ',', '.'); ?> VNĐ</p>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>

    </div>
</div>

<script>
    function addToCart() {
        alert("Thêm giỏ hàng thành công!");
    }
    function noneClick() {
        alert("Bạn phải đăng nhập mới có thể mua hàng!");
    }
</script>