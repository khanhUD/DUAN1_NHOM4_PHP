<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <h4 class="card-title">LIÊN HỆ</h4>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>họ và tên</th>
                                <th>số điện thoại</th>
                                <th class="pe-0" style="max-width: 400px;">NỘI DUNG LIÊN HỆ</th>
                                <th>Trạng Thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($contacts as $items) : ?>
                                <tr>
                                    <td><?= $items['full_name'] ?></td>
                                    <td><?= $items['phone'] ?></td>
                                    <td>
                                        <div class="mb-1">[ <span class="text-primary fw-italic"><?= $items['email'] ?></span> ]:</div>
                                        <div class="mb-1" style="border-left: 2px solid #72757e; background-color: #eff0f3; max-width: 400px; overflow: hidden; white-space: normal; text-align: justify;">
                                            <p class="m-0 p-1 ms-1 pe-3"><?= $items['note'] ?> </p>
                                        </div>
                                        <div><?= $items['create_at'] ?></div>
                                    </td>
                                    <td>

                                        <?php if ($items['status'] === 'not_responded') : ?>
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
                                        <form method="post" action="<?= _WEB_ROOT ?>/contacts/delete">
                                            <input type="hidden" name="id" value="<?= $items['id'] ?>">
                                            <button class="dropdown-item" type="submit">
                                                <i class="bx bx-trash me-1"></i>Xoa</button>
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