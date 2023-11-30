<!-- Vĩnh -->
<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <div class="d-flex align-items-center ">
                <a href="<?= _WEB_ROOT . 'orders'; ?>">
                    <h4 class="card-title">HÓA ĐƠN </h4>
                </a>
                <p> -- </p>
                <h6> HÓA ĐƠN ẨN</h6>
            </div>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID_Hóa Đơn</th>
                                <th>Thông Tin Khách Hàng</th>
                                <th>Ngày Tạo</th>
                                <th>Tổng tiền</th>
                                <th>Trạng Thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="mb-1">Nguyễn Quốc Khanh[ <span class="text-primary fw-italic">vinhlh@gmail.com</span> ]:</div>
                                    <div class="mb-1" style="border-left: 2px solid #72757e; background-color: #eff0f3; max-width: 400px; overflow: hidden; white-space: normal; text-align: justify;">
                                        <p class="m-0 p-1 ms-1 pe-3">địa chỉ </p>
                                    </div>
                                    <div class=" align-items-center">
                                        <div class="me-1" style="max-width: 300px; overflow: hidden; white-space: normal;">Số điện thoại: 0342585406</div>


                                    </div>

                                </td>
                                <td>27/11/2023 : 11:12:60: </td>
                                <td>120000</td>
                                <td><span class="badge bg-label-info me-1">chờ</span>
                                    <span class="badge bg-label-info me-1">đang giao</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= _WEB_ROOT . 'orders/detail'; ?>"><i class="bi bi-eye-fill me-1"></i>
                                                Xem chi tiết</a>
                                            <a class="dropdown-item" href="#"><i class="bi bi-eye-slash-fill me-1"></i> Ẩn</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>