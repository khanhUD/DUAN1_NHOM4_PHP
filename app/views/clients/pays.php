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
        <div class="row">
            <form action="" class="form form-pay"></form>
            <div class="col-md-6">
                <h4>Thông tin nhận hàng</h4>

                <div class="row">
                    <div class="form-input mb-3">
                        <label for="full-name">Họ và tên <b class="text-danger">*</b></label>
                        <input type="text" id="full-name" name="full-name" class="form-control" placeholder="Nhập họ và tên của bạn...">
                        <span class="error-message">
                        </span>
                    </div>
                    <div class="form-input mb-3">
                        <label for="full-name">Số điện thoại<b class="text-danger">*</b></label>
                        <input type="text" id="full-name" name="full-name" class="form-control" placeholder="Nhập số điện thoại của bạn...">
                        <span class="error-message">
                        </span>
                    </div>
                    <div class="form-input mb-3">
                        <label for="full-name">Địa chỉ<b class="text-danger">*</b></label>
                        <input type="text" id="full-name" name="full-name" class="form-control" placeholder="Nhập địa chỉ của bạn...">
                        <span class="error-message">
                        </span>
                    </div>
                    <div class="form-input mb-3">
                        <label for="full-name">Ghi chú</label>
                        <textarea type="text" id="full-name" name="full-name" class="form-control" placeholder="Ghi chú về đơn hàng, ví dụ: chỉ dẫn địa chỉ chi tiết hơn"></textarea>
                        <span class="error-message">
                        </span>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-1"></div> -->
            <div class="col-md-6">
                <h4 class="">Đơn hàng (<span>6</span>)</h4>
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
                                    <tr>
                                        <td class="product-img">
                                            <div class="position-relative">
                                                <img class="" src="./img/menu-06.jpg" width="100%" alt="ảnh product">
                                                <span style="font-size: 0.7rem;" class=" position-absolute top-0 left-100 translate-middle badge rounded-pill bg-primary text-dark">7</span>
                                            </div>

                                        </td>
                                        <td class="product-name ps-3">
                                            pizza
                                        </td>
                                        <td class="product-price text-end pe-1">
                                            60.000đ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-img">
                                            <div class="position-relative">
                                                <img class="" src="./img/menu-06.jpg" width="100%" alt="ảnh product">
                                                <span style="font-size: 0.7rem;" class=" position-absolute top-0 left-100 translate-middle badge rounded-pill bg-primary text-dark">7</span>
                                            </div>

                                        </td>
                                        <td class="product-name ps-3">
                                            pizza
                                        </td>
                                        <td class="product-price text-end pe-1">
                                            60.000đ
                                        </td>
                                    </tr>


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
                                    <td class="text-end">3</td>
                                </tr>
                                <tr>
                                    <td>Phí Vận chuyển</td>
                                    <td class="text-end">3</td>
                                </tr>
                            </table>
                        </div>
                        <div class="div">
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        <h5>Tổng</h5>
                                    </td>
                                    <td class="text-end">3</td>
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
            </form>
        </div>
    </div>
</div>