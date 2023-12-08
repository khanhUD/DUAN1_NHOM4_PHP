<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="text-center mt-5">

                <div class="d-flex d-lg-grid ">
                    <h4>ĐƠN HÀNG CỦA BẠN</h4>
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID_Hóa Đơn</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày Tạo</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Sửa Trạng Thái</th>

                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php foreach ($orders as $items) : ?>
                                        <tr>
                                            <td><?= $items['id'] ?></td>
                                            <td>
                                                <div class="mb-1" style="border-left: 2px solid #72757e;  max-width: 400px; overflow: hidden; white-space: normal; ">
                                                    <p class="m-0 p-1 ms-1 pe-3">địa chỉ: <?= $items['address'] ?> adfsdfsdfzsdfsddddddddddddddddddddddddddddddddddđ</p>

                                                </div>


                                            </td>
                                            <td><?= $items['created_at'] ?></td>
                                            <td><?= number_format($items['total_money'], 0, ',', '.'); ?> VNĐ</td>


                                            <td>
                                                <?php
                                                $badgeClass = '';
                                                $statusText = '';

                                                switch ($items['status']) {
                                                    case 'pending':
                                                        $badgeClass = 'btn btn-warning'; // Màu vàng cho trạng thái chờ duyệt
                                                        $statusText = 'Chờ duyệt';
                                                        break;
                                                    case 'accepted':
                                                        $badgeClass = ' btn btn-success'; // Màu xanh cho trạng thái đã duyệt
                                                        $statusText = 'Đã duyệt';
                                                        break;
                                                    case 'cancel':
                                                        $badgeClass = ' btn btn-danger'; // Màu đỏ cho trạng thái đã hủy
                                                        $statusText = 'Đã hủy';
                                                        break;
                                                    default:
                                                        $badgeClass = 'btn btn-success '; // Màu xanh cho trạng thái đã duyệt
                                                        $statusText = 'Đã duyệt';
                                                        break;
                                                }
                                                ?>

                                                <span class="badge <?= $badgeClass ?> me-1">
                                                    <?= $statusText ?>
                                                </span>
                                            </td>
                                            <td>
                                                <form action="<?= _WEB_ROOT ?>/clientOrders/updateStatuOrderClient" method="post" onsubmit="return confirm('Bạn chắc chắn muốn cập nhật trạng thái?')">
                                                    <input type="hidden" name="id" value="<?= $items['id'] ?>">
                                                    <input type="hidden" name="status" value="cancel">
                                                    <button type="submit" class="btn btn-danger">
                                                        Hủy
                                                    </button>
                                                </form>
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
    </div>
</div>