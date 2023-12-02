<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <div class="d-flex align-items-center ">
                <a href="<?= _WEB_ROOT . 'orderTables'; ?>">
                    <h4 class="card-title">HÓA ĐƠN ĐẶT BÀN </h4>
                </a>
                <p> - </p>
                <h6> ẨN</h6>
            </div>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>họ và tên</th>
                                <th>số điện thoại</th>
                                <th class="pe-0">Email</th>
                                <th>Ngày đến</th>
                                <th>Giờ đến</th>
                                <th>Trạng Thái</th>
                                <th>Sửa Trạng Thái</th>
                              
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($orderTables as $items) : ?>
                                <tr>
                                    <td><?= $items['full_name'] ?></td>
                                    <td><?= $items['phone'] ?></td>
                                    <td>
                                        <div class="mb-1">[ <span class="text-primary fw-italic"><?= $items['users_email'] ?></span> ]:</div>
                                    </td>
                                    <td><?= $items['arrival_date'] ?></td>
                                    <td><?= $items['arrival_time'] ?></td>
                                    <td>
                                        <?php
                                        $badgeClass = '';
                                        $statusText = '';

                                        switch ($items['status']) {
                                            case 'pending':
                                                $badgeClass = 'bg-label-warning'; // Màu vàng cho trạng thái chờ duyệt
                                                $statusText = 'Chờ xác nhận';
                                                break;
                                            case 'accepted':
                                                $badgeClass = 'bg-label-primary'; // Màu xanh cho trạng thái đã duyệt
                                                $statusText = 'Đã xác nhận';
                                                break;
                                            case 'cancel':
                                                $badgeClass = 'bg-label-danger'; // Màu đỏ cho trạng thái đã hủy
                                                $statusText = 'Đã hủy';
                                                break;
                                            default:
                                                $badgeClass = 'bg-label-danger'; // Màu đỏ cho trạng thái đã hủy
                                                $statusText = 'Đang xóa tạm';
                                                break;
                                        }
                                        ?>

                                        <span class="badge <?= $badgeClass ?> me-1">
                                            <?= $statusText ?>
                                        </span>
                                    </td>
                                    <td>
                                        <form action="<?= _WEB_ROOT ?>/updateStatus/orderTables" method="post" onsubmit="return confirm('Bạn chắc chắn muốn cập nhật trạng thái?')">
                                            <input type="hidden" name="id" value="<?= $items['table_id'] ?>">
                                            <div class="mb-2">
                                                <select class="form-select" name="status">
                                                    <option value="pending" <?= ($items['status'] == 'pending') ? 'selected' : '' ?>>Chờ xác nhận</option>
                                                    <option value="accepted" <?= ($items['status'] == 'accepted') ? 'selected' : '' ?>>Đã xác nhận</option>
                                                    <option value="cancel" <?= ($items['status'] == 'cancel') ? 'selected' : '' ?>>Hủy</option>
                                                    <option value="delate" <?= ($items['status'] == 'delate') ? 'selected' : '' ?>>Xóa tạm</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Chọn
                                            </button>
                                        </form>
                                    </td>
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