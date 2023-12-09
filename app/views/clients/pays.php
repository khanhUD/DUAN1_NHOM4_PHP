<div class="container-fluid bg-light py-6 mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1">Thanh toán</h1>
        <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Thanh toán</li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <form action="<?= _WEB_ROOT ?>/ClientPays/pays" class="form form-pay" method="post" id="form-pay">
            <div class="row">

                <div class="col-md-6">
                    <h4>Thông tin nhận hàng</h4>

                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="full_name">Họ và tên <b class="text-danger">*</b></label>
                            <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Nhập họ và tên của bạn...">
                            <span class="form-message text-danger">
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Số điện thoại<b class="text-danger">*</b></label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại của bạn...">
                            <span class="form-message text-danger">
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Địa chỉ<b class="text-danger">*</b></label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Nhập địa chỉ của bạn...">
                            <span class="form-message text-danger">
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="note">Ghi chú</label>
                            <textarea type="text" id="note" name="note" class="form-control" placeholder="Ghi chú về đơn hàng, ví dụ: chỉ dẫn địa chỉ chi tiết hơn"></textarea>
                            <span class="form-message text-danger">
                            </span>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-1"></div> -->
                <div class="col-md-6">
                    <h4 class="">Đơn hàng</h4>
                    <div class=" pt-0">
                        <div>
                            <!-- Thêm nội dung cần cuộn vào đây -->
                            <div class="product-pay overflow-auto" style="max-height: 150px;">
                                <table class="table-borderless table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
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
                                                <td class="product-img">
                                                    <div class="position-relative">
                                                        <img class="" src="<?= _WEB_ROOT ?>/public/uploads/<?= $product[1] ?>" width="100%" alt="ảnh product">
                                                        <span style="font-size: 0.7rem;" class=" position-absolute top-0 left-100 translate-middle badge rounded-pill bg-primary text-dark"><?= $product[3] ?></span>
                                                    </div>

                                                </td>
                                                <td class="product-name ps-3">
                                                    <?= $product[0] ?>
                                                </td>
                                                <td class="product-price text-end pe-1">
                                                    <?= number_format($product[4], 0, ',', '.'); ?> VNĐ
                                                </td>
                                            </tr>
                                        <?php
                                            
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- ... -->
                            <div class="voucher pt-3 pb-3">
                                <div class="d-flex justify-content-between">
                                    <input type="text" id="voucher-code" class="form-control input-voucher" name="voucher" placeholder="Nhập mã giảm giá">
                                    <!-- <button class="btn btn-primary btn-voucher" onclick="loadData()">Áp dụng</button> -->
                                </div>
                            </div>
                            <div class="div">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Tạm tính</td>
                                        <td class="text-end"><?= number_format($totalAmount, 0, ',', '.'); ?> VNĐ</td>
                                    </tr>
                                    <?php
                                    $total = $totalAmount + 30000;
                                    ?>
                                    <tr>
                                        <td>Phí Vận chuyển</td>
                                        <td class="text-end">30,000 VNĐ</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="div">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>
                                            <h5>Tổng</h5>
                                        </td>
                                        <td class="text-end"><?= number_format($total, 0, ',', '.'); ?> VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>Quay về giỏ hàng</td>
                                        <td class="text-end"><input type="submit" class="btn btn-primary btn-order" value="Đặt hàng"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="input-hidden">
                    <input type="text" name="user_id" value="<?= $_SESSION['users']['id'] ?>" hidden>
                    <input type="text" name="total_money" value="<?= $total ?>" hidden>
                </div>

            </div>
        </form>
    </div>
</div>

<script src="<?= _WEB_ROOT; ?>/public/assets/admin/js/Validation.js"></script>
    <script>
        if (document.querySelector('#form-pay')) {
            Validator({
                form: '#form-pay',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',

                rules: [
                    Validator.isRequired('input[name="full_name"]', '* Vui lòng nhập họ tên!'),
                    Validator.isRequired('input[name="phone"]', '* Vui lòng nhập số điện thoại!'),
                    Validator.isPhone('input[name="phone"]', '* Số điện thoại không hợp lệ!'),
                    Validator.isRequired('input[name="address"]', '* Vui lòng nhập địa chỉ!'),
                    // Validator.isEmail('input[name="email"]', '* Email không hợp lệ!'),
                    // Validator.isRequired('textarea[name="note"]', '* Hãy để lại lời nhắn!'),
                ],

                onSubmit: function(data) {
                    // call API
                    //Submit =====>
                    alert("Đơn hàng của bạn đã được nhận. ");

                    setTimeout((document.querySelector(this.form).submit()),3000);

                }
            })
        }
    </script>