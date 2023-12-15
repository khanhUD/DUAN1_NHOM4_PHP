    <!-- Modal Search End -->

    <div class="container-fluid bg-light py-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1">Giỏ hàng</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="<?= _WEB_ROOT ?>trang-chu">Trang chủ</a></li>
                <!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
                <li class="breadcrumb-item text-dark" aria-current="page">Giỏ hàng</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <?php if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
                    <h4 class="mb-3">Giỏ hàng của bạn</h4>

                    <div class="col-lg-9">

                        <table class="table text-dark" style="border: 1px solid #d4a762;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                // Tính tổng tiền
                                $totalAmount = 0;
                                foreach ($_SESSION['cart'] as $product) {
                                    $totalAmount += $product[4];
                                }
                                ?>
                                <?php foreach ($_SESSION['cart'] as $index => $product) : ?>
                                    <tr class="align-middle" data-index="<?= $index ?>">

                                        <td><?= $index + 1 ?></td>
                                        <td>
                                            <a href="<?= _WEB_ROOT ?>/clientProducts/productDetails?id=<?= $product[5] ?>&categories_id=<?= $product[6] ?>"><?= $product[0] ?></a>
                                        </td>
                                        <td>
                                            <img style="width: 100px; height: 100px; object-fit: cover;" class="rounded-circle" src="<?= _WEB_ROOT ?>/public/uploads/<?= $product[1] ?>" alt="">
                                        </td>
                                        <td><?= number_format($product[2], 0, ',', '.'); ?> VNĐ </td>
                                        <td>
                                            <form action="<?= _WEB_ROOT ?>/clientCarts/updateCart" method="post" id="form-quantity">
                                                <div class="form-group">
                                                    <div class="d-flex align-items-center quantity-product">
                                                        <!-- <button type="button" class="btn bg-primary mr-2 btn-minus"><b class="text-dark">-</b></button> -->
                                                        <!-- <input type="text" class="btn-quantity quantity" value="">
                                                    <button type="button" class="btn bg-primary btn-plus"><b class="text-dark">+</b></button> -->
                                                        <button type="button" class="btn bg-primary mr-2 btn-minus" data-index="<?= $index ?>"><b class="text-dark">-</b></button>
                                                        <input type="text" name="quantity" class="btn-quantity quantity" value="<?= $product[3] ?>" data-index="<?= $index ?>">
                                                        <input type="text" name="id" value="<?= $product[5] ?>" hidden>
                                                        <button type="button" class="btn bg-primary btn-plus" data-index="<?= $index ?>"><b class="text-dark">+</b></button>

                                                    </div>
                                                    <div class="text-danger form-message"></div>
                                                </div>
                                            </form>
                                        </td>
                                        <td><?= number_format($product[4], 0, ',', '.'); ?> VNĐ </td>
                                        <td> <a href="<?php _WEB_ROOT ?>/ClientCarts/deleteCartItem?index=<?= $index ?>">Xóa</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>


                        </table>

                        <div class="total d-flex justify-content-end mb-3">
                            <span>Tổng: <?= isset($totalAmount) ?  number_format($totalAmount, 0, ',', '.') . 'VNĐ'  : 0 ?></span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <!-- <div class="btn-pay">
                                <input type="submit" class="btn btn-primary me-3" value="Cập nhật">
                            </div> -->
                            <form action="<?= _WEB_ROOT ?>/clientPays" id="form-pay" method="post">
                                <div class="btn-pay ms-auto">
                                    <input type="submit" class="btn btn-primary me-3" value="Thanh toán">
                                </div>
                            </form>
                            <div>
                                <a href="<?php _WEB_ROOT ?>/ClientCarts/deleteCart" class="btn btn-primary">Xóa tất cả</a>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-3 ps-3">
                        <div class="" style="border: 1px dashed #d4a762">
                            <div class="d-flex justify-content-center">
                                <div class="m-3 ps-5 pe-5 pt-1 pb-1 bg-primary text-dark rounded">Vouchers</div>
                            </div>
                            <div>
                                <ul>
                                    <?php foreach ($vouchers as $items) : ?>
                                        <li class="p-1 mb-3">
                                            <div class="voucher-text mb-1">
                                                Còn <?= $items['number_limit'] - $items['used_count'] ?> mã <strong><?= $items['code'] ?></strong> nhập ngay để được giảm ngay
                                                <b><?= $items['discount_percentage'] ?>%</b> trên tổng hóa đơn
                                            </div>

                                        </li>
                                    <?php endforeach ?>


                                </ul>
                            </div>
                        </div>
                    </div>

                <?php else : ?>
                    <div class="text-center"> <i style="font-size: 5rem;" class="bi bi-cart4"></i>
                        <h5>Không có sản phẩm nào trong giỏ hàng của bạn</h5>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>


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
                    document.addEventListener('click', event => {
                        const formPay = document.querySelector('#form-quantity');
                        formPay.submit();
                    });
                });

                decreaseBtn.addEventListener('click', function() {
                    var currentQuantity = parseInt(quantityInput.value);
                    if (currentQuantity > 1) {
                        quantityInput.value = currentQuantity - 1;
                        document.addEventListener('click', event => {
                            const formPay = document.querySelector('#form-quantity');
                            formPay.submit();
                        });

                    }
                });
            });
        });
    </script>
    <script src="<?= _WEB_ROOT; ?>/public/assets/admin/js/Validation.js"></script>
    <script>
        if (document.querySelector('#form-quantity')) {
            Validator({
                form: '#form-quantity',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',

                rules: [
                    Validator.isNumber('input[name="quantity"]', 'Kiểm tra lại số lượng!'),
                ],

                onSubmit: function(data) {
                    // call API
                    this.form.submit();

                }
            })
        }
    </script>