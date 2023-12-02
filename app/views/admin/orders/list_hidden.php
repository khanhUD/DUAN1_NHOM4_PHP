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
                            <?php foreach ($orders_hidden as $items): ?>
                                <tr>
                                    <td><?= $items['id'] ?></td>
                                    <td>
                                        <div class="mb-1"><?= $items['full_name'] ?>[ <span class="text-primary fw-italic"><?= $items['email'] ?></span> ]:</div>
                                        <div class="mb-1" style="border-left: 2px solid #72757e; background-color: #eff0f3; max-width: 400px; overflow: hidden; white-space: normal; text-align: justify;">
                                            <p class="m-0 p-1 ms-1 pe-3">địa chỉ: <?= $items['address'] ?> </p>
                                        </div>
                                        <div class=" align-items-center">
                                            <div class="me-1" style="max-width: 300px; overflow: hidden; white-space: normal;">Số điện thoại:<?= $items['phone'] ?></div>


                                        </div>

                                    </td>
                                    <td><?= $items['created_at'] ?></td>
                                    <td><?= $items['total_money'] ?></td>
                                    <td>
                                        <span class="badge <?= $items['status'] === 'delate' ?  'bg-label-danger' : 'bg-label-primary'  ?> me-1">
                                            <?= $items['status'] === 'delate' ? 'Đang ẩn' : 'Chờ giao' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>                                  
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= _WEB_ROOT?>/orders/detail?id=<?= $items['id']  ?>"><i class="bi bi-eye-fill me-1"></i> Xem chi tiết</a>
                                                <a class="dropdown-item" href="<?= _WEB_ROOT?>/orders/edit_restore?id=<?= $items['id']  ?>"><i class="bi bi-eye-slash-fill me-1"></i> Khôi phục</a>
                                                  
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach  ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>