<div class="container-fluid bg-light py-6 mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1">Thực đơn</h1>
        <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="<?_WEB_ROOT?>/ClientHome">Trang chủ</a></li>
            <!-- <li class="breadcrumb-item"><a href="#">Thực đơn</a></li> -->
            <li class="breadcrumb-item text-dark" aria-current="page">Thực đơn</li>
        </ol>
    </div>
</div>
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <aside class="wow bounceInRight" data-wow-delay="0.7s">
                <div class="card">
                    <h6 class="card-title bg-primary p-3 rounded-top m-0">DANH MỤC MÓN ĂN</h6>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <!-- <li class="list-group-item"><a href="<?= _WEB_ROOT ?>/ClientProducts" class="category-link">Tất cả</a></li> -->
                            <?php foreach ($productCategories as $productCategoriesItems) : ?>
                                <li class="ps-0 list-group-item"><a href="<?= _WEB_ROOT ?>/ClientProducts/products?id=<?= $productCategoriesItems['id'] ?>" class="category-link"><?= $productCategoriesItems['name'] ?></a></li>
                            <? endforeach; ?>

                        </ul>
                    </div>
                </div>
            </aside>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <?php
                // print_r($products);
                foreach ($products as $items) :
                ?>
                    <div class="col-md-3">
                        <div class="card mb-4 rounded product-wap rounded shadow">
                            <div class="card rounded p-1">

                                <?php
                                if ($items['image'] === '') :
                                ?>
                                    <a href="<?= _WEB_ROOT ?>/ClientProducts/productDetails?id=<?= $items['id'] ?>">
                                        <img src="<?= _WEB_ROOT; ?>/public/uploads/no-img.png" class="card-img rounded img-fluid" alt="">
                                    </a>

                                <?php else :

                                ?>
                                    <a href="<?= _WEB_ROOT ?>/ClientProducts/productDetails?id=<?= $items['id'] ?>">
                                        <img src="<?= _WEB_ROOT; ?>/public/uploads/<?= $items['image'] ?>" class="card-img rounded img-fluid" alt="">
                                    </a>
                                <?php endif; ?>
                                <div class="card-img-overlay rounded product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-primary text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-primary text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <a href="<?= _WEB_ROOT ?>/ClientProducts/productDetails?id=<?= $items['id'] ?>" class="h5 text-decoration-none product-name"><?= $items['name'] ?></a>
                                <p class="text-center mb-0"><?= number_format($items['price']) ?>đ</p>
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