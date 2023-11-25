<div class="mt-3">
    <div class="row">
        <!-- Cột chiều rộng 3 -->
        <div class="col-md-12">
            <div class="sidebar">
                <!-- Nội dung của cột 3 -->
                <h4>THÊM BANNER</h4>
                <div class="card p-3">
                    <form action="">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Tiêu Đề</label>
                                <input type="email" class="form-control" id="name" name="name">
                                <div id="mess_err" class="form-text"></div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Link</label>
                                <input type="email" class="form-control" id="name" name="name">
                                <div id="mess_err" class="form-text"></div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="image" class="form-label">Ảnh</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <div id="mess_err" class="form-text"></div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="status">Trạng thái</label>
                                <div class="input-group form-control input-group-merge">
                                    <div class="form-check mx-3">
                                        <input class="form-check-input" type="radio" name="role" value="off">
                                        <label class="form-check-label" for="radioOption1">
                                            Ẩn
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" value="on" checked>
                                        <label class="form-check-label" for="radioOption2">
                                            Hiện
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                        <a class="btn btn-primary" href="<?= _WEB_ROOT . 'banner'; ?>">Nhập Thêm</a>
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
                                    <th>chức năng/th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                                        <strong>VueJs
                                            Project</strong>
                                    </td>
                                    <td>Trevor Baker</td>
                                    <td>
                                        link:
                                    </td>
                                    <td>
                                        ảnh
                                    </td>
                                    <td><span class="badge bg-label-info me-1">Scheduled</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                                    Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>