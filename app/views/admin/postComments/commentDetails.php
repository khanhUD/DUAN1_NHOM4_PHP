<!-- Vĩnh -->
<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <!-- Nội dung của cột 9 -->
            <div class="d-flex align-items-center ">
                <a href="<?= _WEB_ROOT . 'postComments'; ?>">
                    <h4 class="card-title">BÌNH LUẬN </h4>
                </a>
                <p> - </p>
                <h6> CHI TIẾT</h6>
            </div>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ngày đăng</th>
                                <th class="pe-0" style="max-width: 400px;">Bình luận</th>
                                <th>Trạng Thái</th>
                                <th>Sửa trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($commentDetails as $items) : ?>
                                <tr>
                                    <td>
                                        <?= $items['create_at'] ?>
                                    </td>
                                    <td>
                                        <div class="mb-1">[ <span class="text-primary fw-italic"><?= $items['email'] ?></span> ]:</div>
                                        <div class="mb-1" style="border-left: 2px solid #72757e; background-color: #eff0f3; max-width: 400px; overflow: hidden; white-space: normal; text-align: justify;">
                                            <p class="m-0 p-1 ms-1 pe-3"><?= $items['note'] ?> </p>
                                        </div>
                                        <div class=" align-items-center">
                                        </div>

                                    </td>
                                    <td>
                                        <span class="badge <?= $items['status'] === 'on' ? 'bg-label-primary' : 'bg-label-danger' ?> me-1">
                                            <?= $items['status'] === 'on' ? 'Hiển thị' : 'Ẩn' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <form action="<?= _WEB_ROOT ?>/updateStatus/statusConmmentDetail?id=<?= $items['comment_id'] ?>" method="post" onsubmit="return confirm('Bạn chắc chắn muốn cập nhật trạng thái?')">
                                            <input type="hidden" name="comment_id" value="<?= $items['comment_id'] ?>">
                                            <div class="mb-2">
                                                <select class="form-select" name="status">
                                                    <option value="on" <?= ($items['status'] == 'on') ? 'selected' : '' ?>>Hiển thị</option>
                                                    <option value="off" <?= ($items['status'] == 'off') ? 'selected' : '' ?>>Ẩn</option>

                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Chọn
                                            </button>
                                        </form>
                                    </td>


                                    <td>
                                        <div class="dropdown">                                           
                                            <form method="post" action="<?= _WEB_ROOT ?>/delate/postComments">
                                                <input type="hidden" name="id" value="<?= $items['comment_id'] ?>">
                                                <button class="dropdown-item" type="submit">
                                                    <i class="bx bx-trash me-1"></i>Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>