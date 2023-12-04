<!-- Vĩnh -->
<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">HÓA ĐƠN </h4>
                <a href="<?= _WEB_ROOT . 'orders/list_hidden'; ?>">
                    <h5><i class="bi bi-eye-slash-fill me-1"></i> ẨN</h5>


                </a>
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
                                <th>Trạng thái</th>
                                <th>Sửa Trạng Thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($orders as $items) : ?>
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
                                        <?php
                                        $badgeClass = '';
                                        $statusText = '';

                                        switch ($items['status']) {
                                            case 'pending':
                                                $badgeClass = 'bg-label-warning'; // Màu vàng cho trạng thái chờ duyệt
                                                $statusText = 'Chờ duyệt';
                                                break;
                                            case 'accepted':
                                                $badgeClass = 'bg-label-primary'; // Màu xanh cho trạng thái đã duyệt
                                                $statusText = 'Đã duyệt';
                                                break;
                                            case 'cancel':
                                                $badgeClass = 'bg-label-danger'; // Màu đỏ cho trạng thái đã hủy
                                                $statusText = 'Đã hủy';
                                                break;
                                            default:
                                                // Mặc định cho trường hợp khác nếu cần
                                                break;
                                        }
                                        ?>

                                        <span class="badge <?= $badgeClass ?> me-1">
                                            <?= $statusText ?>
                                        </span>
                                    </td>
                                    <td>
                                        <form action="<?= _WEB_ROOT ?>/updateStatus/orders" method="post" onsubmit="return confirm('Bạn chắc chắn muốn cập nhật trạng thái?')">
                                            <input type="hidden" name="id" value="<?= $items['id'] ?>">
                                            <div class="mb-2">
                                                <select class="form-select" name="status">
                                                    <option value="pending" <?= ($items['status'] == 'pending') ? 'selected' : '' ?>>Chờ xác nhận</option>
                                                    <option value="accepted" <?= ($items['status'] == 'accepted') ? 'selected' : '' ?>>Đã xác nhận</option>
                                                    <option value="cancel" <?= ($items['status'] == 'cancel') ? 'selected' : '' ?>>Đã Hủy</option>
                                                    <option value="delate" <?= ($items['status'] == 'delate') ? 'selected' : '' ?>>Ẩn</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Chọn
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= _WEB_ROOT ?>/orders/detail?id=<?= $items['id']  ?>"><i class="bi bi-eye-fill me-1"></i> Xem chi tiết</a>
                                                <a class="dropdown-item" href="<?= _WEB_ROOT ?>/orders/edit_hidden?id=<?= $items['id']  ?>"><i class="bi bi-eye-slash-fill me-1"></i> Ẩn</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>