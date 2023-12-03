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

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <h4 class="mb-3">Giỏ hàng của bạn</h4>
                <div class="col-lg-8">
                    <table class="table text-dark" style="border: 1px solid #d4a762;">
                        <thead>
                            <tr>
                                <th>Thông tin sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td class="d-flex align-items-center">
                                    <img class="rounded-circle" src="./img/menu-10.jpg" alt="">
                                    <div class="card-name d-lg-grid ms-3">
                                        <a href="">Tên sản phẩm</a>
                                        <a href="">Xóa</a>
                                    </div>
                                </td>
                                <td>
                                    30
                                </td>
                                <td width="200px">
                                    <div class="d-flex align-items-center quantity-product">
                                        <button class="btn bg-primary mr-2 btn-minus"><b
                                                class="text-dark">-</b></button>
                                        <input type="text" class="btn-quantity quantity" value="1">
                                        <button class="btn bg-primary btn-plus"><b class="text-dark">+</b></button>
                                    </div>
                                </td>
                                <td>30</td>
                            </tr>
                            <tr class="align-middle">
                                <td class="d-flex align-items-center">
                                    <img src="./img/menu-10.jpg" alt="">
                                    <div class="card-name d-lg-grid ms-3">
                                        <a href="">Tên sản phẩm</a>
                                        <a href="">Xóa</a>
                                    </div>
                                </td>
                                <td>
                                    30
                                </td>
                                <td width="200px">
                                    <div class="d-flex align-items-center quantity-product">
                                        <button class="btn bg-primary mr-2 btn-minus"><b
                                                class="text-dark">-</b></button>
                                        <input type="text" class="btn-quantity quantity" value="1">
                                        <button class="btn bg-primary btn-plus"><b class="text-dark">+</b></button>
                                    </div>
                                </td>
                                <td>30</td>

                            </tr>
                            <!-- <tr> -->

                            <!-- </tr> -->
                        </tbody>
                        
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="row-pay">
                                        <div class="total d-flex justify-content-lg-between mb-3">
                                            <span>Tổng:</span>
                                            <b>33</b>
                                        </div>
                                        <div class="btn-pay">
                                            <a href="" class="btn btn-primary">Thanh toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-lg-4 ps-3">
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
            </div>
        </div>
    </div>


    <script>

        document.addEventListener('DOMContentLoaded', function () {
            // Lặp qua tất cả các sản phẩm để gắn sự kiện cho nút tăng và giảm
            var products = document.querySelectorAll('.quantity-product');
            products.forEach(function (product) {
                var quantityInput = product.querySelector('.quantity');
                var increaseBtn = product.querySelector('.btn-plus');
                var decreaseBtn = product.querySelector('.btn-minus');

                increaseBtn.addEventListener('click', function () {
                    var currentQuantity = parseInt(quantityInput.value);
                    quantityInput.value = currentQuantity + 1;
                    // Nếu muốn lưu trạng thái này, có thể gửi dữ liệu về máy chủ tại đây.
                });

                decreaseBtn.addEventListener('click', function () {
                    var currentQuantity = parseInt(quantityInput.value);
                    if (currentQuantity > 0) {
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