<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <h4 class="card-title">ĐẶT BÀN</h4>
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
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($orderTables as $items) : ?>
                                <tr>
                                    <td><?= $items['full_name'] ?></td>
                                    <td><?= $items['phone'] ?></td>
                                    <td>
                                        <div class="mb-1">[ <span class="text-primary fw-italic"><?= $items['email'] ?></span> ]:</div>
                                    </td>
                                    <td><?= $items['arrival_date'] ?></td>
                                    <td><?= $items['arrival_time'] ?></td>
                                    <td>

                                        <?php if ($items['status_orderTables'] == 'pending') : ?>
                                            <form method="post" action="<?= _WEB_ROOT ?>/contacts/edit_status">
                                                <input type="hidden" name="id" value="<?= $items['id'] ?>">
                                                <button class=" badge bg-label-danger me-1" type="submit">
                                                    Chưa phản hồi</button>
                                            </form>

                                        <?php else : ?>
                                            <span class="badge bg-label-primary me-1">
                                                Đã phản hồi
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    </td>
                                    <td>
                                        <form method="post" action="<?= _WEB_ROOT ?>/delete/deleteById?id=<?= $items['id'] ?>">
                                            <input type="hidden" name="id" value="<?= $items['id'] ?>">
                                            <button class=" badge bg-label-danger me-1" type="submit"><i class="bx bx-trash me-1"></i>
                                                Xoa</button>
                                        </form>
                                        <!-- <a href="<?= _WEB_ROOT ?>/delete/deleteById?id=<?= $items['id'] ?>"><i class="bx bx-trash me-1"></i>Xoa</a> -->
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php
                    echo "<pre>";
                    print_r($orderTables);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>