    <!-- Modal Search End -->

    <div class="container-fluid bg-light py-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1">Giỏ hàng</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
                <li class="breadcrumb-item text-dark" aria-current="page">Giỏ hàng</li>
            </ol>
        </div>
    </div>
    <form action="">
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
                                        $totalAmount += $product[4]; // $product[4] chứa thành tiền của mỗi sản phẩm
                                    }
                                    ?>
                                    <?php foreach ($_SESSION['cart'] as $index => $product) : ?>
                                        <tr class="align-middle" data-index="<?= $index ?>">
                                            <td><?= $index + 1 ?></td>
                                            <td>
                                                <a href=""><?= $product[0] ?></a>
                                            </td>
                                            <td>
                                                <img style="width: 100px; height: 100px; object-fit: cover;" class="rounded-circle" src="<?= _WEB_ROOT ?>/public/uploads/<?= $product[1] ?>" alt="">
                                            </td>
                                            <td><?= number_format($product[2], 0, ',', '.'); ?> VNĐ </td>
                                            <td>
                                                <div class="d-flex align-items-center quantity-product">
                                                    <button type="button" class="btn bg-primary mr-2 btn-minus"><b class="text-dark">-</b></button>
                                                    <input type="text" class="btn-quantity quantity" value="<?= $product[3] ?>">
                                                    <button type="button" class="btn bg-primary btn-plus"><b class="text-dark">+</b></button>
                                                </div>
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
                                <div class="btn-pay ms-auto">
                                    <a href="<?=_WEB_ROOT?>/ClientPays" class="btn btn-primary me-3">Thanh toán</a>
                                </div>
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
                                        <li class="p-1 mb-3">
                                            <div class="voucher-text mb-1">
                                                <b>Còn 10.000đ</b>
                                                để nhận mã freeship
                                            </div>

                                            <input type="text" class="copyText" value="HEllo" hidden>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" onclick="copyToClipboard()">Sao
                                                    chép</button>
                                            </div>

                                        </li>
                                        <li class="p-1 mb-3">
                                            <div class="voucher-text mb-1">
                                                <b>Còn 10.000đ</b>
                                                để nhận mã freeship
                                            </div>

                                            <input type="text" class="copyText" value="Dữ liệu cần sao chép" hidden>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" onclick="copyToClipboard()">Sao
                                                    chép</button>
                                            </div>

                                        </li>
                                        <li class="p-1">
                                            <div class="voucher-text mb-1">
                                                <b>Còn 10.000đ</b>
                                                để nhận mã freeship
                                            </div>

                                            <input type="text" class="copyText" value="Dữ liệu cần sao chép" hidden>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" onclick="copyToClipboard()">Sao
                                                    chép</button>
                                            </div>

                                        </li>
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
    </form>

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
                    if (currentQuantity > 1) {
                        quantityInput.value = currentQuantity - 1;
                        // Nếu muốn lưu trạng thái này, có thể gửi dữ liệu về máy chủ tại đây.
                    }
                });
            });
        });
    </script>
    <script>
        function copyToClipboard() {
            // Chọn phần tử input chứa dữ liệu cần sao chép
            var copyText = document.querySelector(".copyText");

            // Chọn vùng chọn trong input
            copyText.select();
            copyText.setSelectionRange(0, 99999); // Hỗ trợ cho một số trình duyệt

            // Sao chép văn bản vào clipboard
            document.execCommand("copy");

            // Hiển thị thông báo hoặc thực hiện các hành động khác nếu cần
            alert("Đã sao chép thành công: " + copyText.value);
        }
    </script>