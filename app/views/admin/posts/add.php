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
    <!-- Nội dung của cột 3 -->

    <div class="card p-3">
        <h4>THÊM BÀI VIẾT</h4>
        <form id="form-add-posts" action="<?= _WEB_ROOT ?>/posts/add" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col-md-6 form-group ">
                    <label for="post_category_id" class="form-label">Loại Món ăn</label>
                    <select class="form-control" name="post_category_id" id="post_category_id">
                        <?php foreach ($postCategories as $postCategories) : ?>
                            <option value="<?= $postCategories['id'] ?>"><?= $postCategories['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="form-message"></span>
                </div>
                <div class="mb-3 col-md-6 form-group">
                    <label for="title" class="form-label">Tiêu đề bài viết</label>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Nhập tiêu đề bài viết" />
                    <span class="form-message"></span>
                </div>
                <div class="mb-3 col-md-6 form-group">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*" />
                    <span class="form-message"></span>
                </div>
                <div class="mb-3 col-md-6 form-group">
                    <label for="short_description" class="form-label">Mô tả ngắn</label>
                    <textarea id="short_description" name="short_description" class="form-control"></textarea>
                    <span class="form-message"></span>
                </div>
            </div>

            <div class="mb-3 form-group">
                <label for="content" class="form-label">Nội dung bài viết</label>
                <textarea name="content" id="editor" cols="30" rows="10"></textarea>
                <span class="form-message"></span>
            </div>



            <!-- Thêm nhiều trường hoặc tùy chỉnh theo nhu cầu -->

            <div class="mb-3">

                <button type="submit" class="btn btn-primary">Thêm</button>
                <button type="reset" class="btn btn-primary">Làm mới</button>
            </div>
        </form>
    </div>
</div>
<div class="row mt-3">
    <!-- Cột chiều rộng 9 -->
    <div class="col-md-12">
        <div class="main-content">
            <!-- Nội dung của cột 9 -->
            <h4>DANH SÁCH BÀI VIẾT</h4>
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
                            <?php foreach ($posts as $items) : ?>
                                <tr>
                                    <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                                        <?= $items['id'] ?>
                                    </td>
                                    <td> <?= $items['title'] ?></td>
                                    <td>
                                        <?php if (!empty($items['image'])) : ?>
                                            <img style="height: 100px; width: 100px;" src="<?= _WEB_ROOT . '/public/uploads/' . $items['image'] ?>" alt="">
                                        <?php else : ?>
                                            <img style="height: 100px; width: 100px;" src="<?= _WEB_ROOT . '/public/uploads/no-image-news.png' ?>" alt="">
                                        <?php endif; ?>
                                    </td>

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
                              
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Chọn
                                            </button>
                                        </form>
                                  
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php _WEB_ROOT ?>/posts/edit?id=<?= $items['id'] ?>"><i class="bi bi-pencil-square me-1"></i></i>Sửa</a>
                                                <form method="post" action="<?= _WEB_ROOT ?>/posts/deletePost">
                                                    <input type="hidden" name="id" value="<?= $items['id'] ?>">
                                                    <button class="dropdown-item" type="submit">
                                                        <i class="bx bx-trash me-1"></i>Xoa</button>
                                                </form>

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