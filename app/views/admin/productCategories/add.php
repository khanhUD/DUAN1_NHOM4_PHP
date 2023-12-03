<!-- Vĩnh -->
<div class="row">
    <!-- Message -->
    <?= show_message('<div id="alert" class="alert alert-custom bg-gradient-primary alert-dismissible text-sm  text-white  fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>', '</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>') ?>
    <!-- Message -->
    <!-- Cột chiều rộng 4 -->
    <div class="col-md-4">
        <div class="sidebar">
            <h4 class="card-title">THÊM LOẠI MÓN</h4>
            <div class="card p-3">
                <form class="form-horizontal form_add_loai" action="<?= _WEB_ROOT ?>/productCategories/add" method="post">
                    <div class="form-group">
                        <label for="ten_loai" class="fw-bold control-label col-form-label">TÊN LOẠI MÓN ĂN</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="ten_loai" placeholder="Nhập tên loại món..." name="name">
                            <span class="text-danger text_message">

                            </span>
                        </div>
                    </div>
                    <div class="">
                        <input type="submit" class="btn btn-primary" name="add" id="add" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Cột chiều rộng 8 -->
    <div class="col-md-8">
        <div class="main-content">
            <!-- Nội dung của cột 9 -->
            <h4 class="card-title">DANH SÁCH LOẠI MÓN</h4>
            <?php
            if (isset($this->err) && !empty($this->err)) {
                echo '<div class="alert alert-danger" role="alert">' . $this->err . '</div>';
            } else {
                // Hiển thị nội dung xóa thành công nếu cần
            }
            ?>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Tên</th>
                                <th>Trạng Thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($productCategories as $items) : ?>
                                <tr>
                                    <td><?= $items['name'] ?></td>
                                    <td><span class="badge me-1 <?= ($items['status'] === "on") ? 'bg-label-info' : 'bg-label-danger' ?>"><?= ($items['status'] === "on") ? 'Hiển thị' : 'Ẩn' ?></span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= _WEB_ROOT ?>/productCategories/edit?id=<?= $items['id'] ?>"><i class="bx bx-edit-alt me-1"></i>Sửa</a>
                                                <form method="post" action="<?= _WEB_ROOT ?>/delete/productCategories">
                                                    <input type="hidden" name="id" value="<?= $items['id'] ?>">
                                                    <button class="dropdown-item" type="submit">
                                                        <i class="bx bx-trash me-1"></i>Xoa</button>
                                                </form>
                                            </div>
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