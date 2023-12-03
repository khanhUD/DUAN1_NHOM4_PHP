<div class="row mt-3">
    <!-- Cột chiều rộng 9 -->
    <div class="col-md-12">
        <div class="main-content">
            <!-- Nội dung của cột 9 -->
            <a href="<?php _WEB_ROOT?>/posts"> <h4>DANH SÁCH BÀI VIẾT</h4></a>

            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã bài viết</th>
                                <th>Tên bài viết</th>
                                <th>Hình</th>
                                <th>Trạng thái</th>
                                <th>Sửa trạng thái</th>
                                <th>Chức năng</th>
                            </tr>

                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($list_hidden as $items) : ?>
                                <tr>
                                    <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                                        <?= $items['id'] ?>
                                    </td>
                                    <td> <?= $items['title'] ?></td>
                                    <td> <?= $items['image'] ?></td>

                                    <td>
                                        <span class="badge <?= $items['status'] === 'on' ? 'bg-label-primary' : 'bg-label-danger' ?> me-1">
                                            <?= $items['status'] === 'on' ? 'Đang hiển thị' : 'Đang ẩn' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <form action="<?= _WEB_ROOT ?>/posts/updatePosts" method="post" onsubmit="return confirm('Bạn chắc chắn muốn cập nhật trạng thái?')">
                                            <input type="hidden" name="id" value="<?= $items['id'] ?>">
                                            <div class="mb-2">
                                                <select class="form-select" name="status">
                                                    <option value="on" <?= ($items['status'] == 'on') ? 'selected' : '' ?>>Hiển thị</option>
                                                    <option value="off" <?= ($items['status'] == 'off') ? 'selected' : '' ?>>Ẩn</option>
                                                    <option value="delete" <?= ($items['status'] == 'delete') ? 'selected' : '' ?>>Xóa tạm</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Chọn
                                            </button>
                                        </form>
                                    <td>
                                        <div class="dropdown">
                                            <a class="dropdown-item" href="<?php _WEB_ROOT ?>/posts/edit?id=<?= $items['id'] ?>"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
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