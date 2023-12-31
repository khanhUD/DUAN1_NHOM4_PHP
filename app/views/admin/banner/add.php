<div class="mt-3">
    <!-- Message -->
    <?= show_message('<div id="alert" class="alert alert-custom bg-gradient-primary alert-dismissible text-sm  text-white  fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>', '</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>') ?>
    <!-- Message -->
 
    <div class="row">
        <!-- Cột chiều rộng 3 -->
        <div class="col-md-12">
            <div class="sidebar">
                <!-- Nội dung của cột 3 -->
                <h4>THÊM BANNER</h4>
                <div class="card p-3">
                    <form id="form-add-banner" action="<?= _WEB_ROOT ?>/banner/add" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="id" value=" <?= $banner_detail['id'] ?>">
                            <div class="mb-3 col-md-6 form-group">
                                <label for="name" class="form-label">Tiêu Đề</label>
                                <input type="text" class="form-control" id="name" name="title">
                                <div class='form-message'></div>
                            </div>
                            <div class="mb-3 col-md-6 form-group">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" class="form-control" id="link" name="link">
                                <div class='form-message'></div>
                            </div>

                            <div class="mb-3 col-md-6 form-group">
                                <label for="image" class="form-label">Ảnh</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <div class='form-message'></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <!-- Cột chiều rộng 9 -->
        <div class="col-md-12">
            <div class="main-content">
                <!-- Nội dung của cột 9 -->
                <H4>QUẢN LÝ BANNER</H4>
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tiêu Đề</th>
                                    <th>Link</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>chức năng</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($banners as $banner) : ?>
                                    <tr>
                                        <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                                            <strong><?= $banner['id'] ?></strong>
                                        </td>
                                        <td><?= $banner['title'] ?></td>
                                        <td>
                                            <?= $banner['link'] ?>
                                        </td>
                                        <td>
                                            <img style="height: 100px; width: 100px;" src="<?= _WEB_ROOT . '/public/uploads/' . (!empty($banner['image']) ? $banner['image'] : 'no-image-news.png'); ?>" alt="">
                                        </td>
                                        <td>
                                            <span class="badge <?= $banner['status'] === 'on' ? 'bg-label-primary' : 'bg-label-danger' ?> me-1">
                                                <?= $banner['status'] === 'on' ? 'Hiển thị' : 'Ẩn' ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?= _WEB_ROOT ?>/banner/edit?id=<?= $banner['id'] ?>"><i class="bi bi-pencil-square me-1"></i></i>Sửa</a>
                                                    <form method="post" action="<?= _WEB_ROOT ?>/delete/banner">
                                                        <input type="hidden" name="id" value="<?= $banner['id'] ?>">
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
</div>