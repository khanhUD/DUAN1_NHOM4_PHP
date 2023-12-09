<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <i style="font-size: 5rem;" class="text-success bi bi-check-circle"></i>
                <div class="d-flex d-lg-grid">
                    <h4>Cảm ơn bạn đã đặt hàng</h4>
                    <p>Một email xác nhận đã được gửi tới <span class="text-success"><?= $inforUser['email'] ?></span>. <br>
                        Xin vui lòng kiểm tra email của bạn</p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="mt-3 bg-light border p-3">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <h5 class="mb-3">Thông tin mua hàng</h5>
                            <p><?= $inforUser['full_name'] ?></p>
                            <p><?= $inforUser['email'] ?></p>
                            <p><?= $inforUser['phone'] ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="mb-3">Địa chỉ</h5>
                            <p><?= $inforUser['full_name'] ?></p>
                            <p><?= $inforUser['address'] ?></p>
                            <p><?= $inforUser['note'] ?></p>
                            <p><?= $inforUser['phone'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="mb-3">Phương thức thanh toán</h5>
                            <p>Thanh toán khi giao hàng (COD)</p>

                        </div>
                        <div class="col-lg-6">
                            <h5 class="mb-3">Phương thức vận chuyển</h5>
                            <p>Giao hàng tận nơi</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ps-3">
                <div class=" pt-0">
                    <div>
                        <!-- Thêm nội dung cần cuộn vào đây -->
                        <div class="mt-3 fw-bold id_order p-1 text-dark">Đơn hàng</div>
                        <div class="product-pay overflow-auto" style="max-height: 150px;">
                            <div></div>
                            <table class="table-borderless table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $items) : ?>
                                        <tr>
                                            <td class="">
                                                <div class="position-relative img-order">
                                                    <img width="100%" class="img-fluid" src="<?= _WEB_ROOT ?>/public/uploads/<?= $items['image'] ?>" alt="ảnh product">
                                                    <span style="font-size: 0.7rem;" class=" position-absolute top-0 left-100 translate-middle badge rounded-pill bg-primary text-dark"><?= $items['quantity'] ?></span>
                                                </div>

                                            </td>
                                            <td class="product-name ps-3">
                                                <?= $items['name'] ?>
                                            </td>
                                            <td class="product-price text-end pe-1">
                                                <?= number_format($items['total_price_product'], 0, ',', '.'); ?>VNĐ
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- <tr>
                                            <td class="product-img">
                                                <div class="position-relative">
                                                    <img class="" src="./img/menu-06.jpg" width="100%"
                                                        alt="ảnh product">
                                                    <span style="font-size: 0.7rem;"
                                                        class=" position-absolute top-0 left-100 translate-middle badge rounded-pill bg-primary text-dark">7</span>
                                                </div>

                                            </td>
                                            <td class="product-name ps-3">
                                                pizza
                                            </td>
                                            <td class="product-price text-end pe-1">
                                                60.000đ
                                            </td>
                                        </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <!-- ... -->
                        <div class="div">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Tạm tính</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td>Phí Vận chuyển</td>
                                    <td class="text-end">30.000 VNĐ</td>
                                </tr>
                            </table>
                        </div>
                        <div class="div">
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        <h5>Tổng</h5>
                                    </td>
                                    <td class="text-end"><?=number_format($inforUser['total_money'], 0, ',', '.'); ?>VNĐ</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <a href="<?php _WEB_ROOT ?>/thuc-don" class="btn btn-primary p-3">Tiếp tục mua hàng</a>
        </div>
    </div>
</div>