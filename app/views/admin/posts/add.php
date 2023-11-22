<div class="mt-3">
    <div class="row">
        <!-- Nội dung của cột 3 -->
        <h4>THÊM BÀI VIẾT</h4>
        <div class="card p-3">
            <form action="" method="POST">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="title" class="form-label">Tiêu đề bài viết</label>
                        <input class="form-control" type="text" id="title" name="title" value="" placeholder="Nhập tiêu đề bài viết" />
                        <span class="error-message" id="title-error"></span>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" />
                        <span class="error-message" id="image-error"></span>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung bài viết</label>
                    <div id="editor"></div>
                    <span class="error-message" id="content-error"></span>
                </div>

                <!-- Thêm nhiều trường hoặc tùy chỉnh theo nhu cầu -->

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-secondary">Làm mới</button>
                </div>
            </form>
        </div>


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
                                <th class="text-center">Mã bài viết</th>
                                <th class="text-center">Tên bài viết</th>
                                <th class="text-center">Hình</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Chức năng</th>
                            </tr>

                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                                    <strong>VueJs
                                        Project</strong>
                                </td>
                                <td>Trevor Baker</td>
                                <td>hình</td>

                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" />
                                    </div>
                                </td>

                                <td>
                                    <form class="d-flex justify-content-center" method="post" action="#">
                                        <a href="index.php?act=suahanghoa&ma_hh=<?= $ma_hh ?>" class="btn btnsua">Sửa</a>
                                        <a href="index.php?act=xoahanghoa&ma_hh=<?= $ma_hh ?>" class="btn btn-outline-danger mx-2">Xóa</a>
                                    </form>
                                </td>

                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>