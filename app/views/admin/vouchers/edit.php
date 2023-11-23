<div class="mt-3">
    <div class="row">
        <!-- Cột chiều rộng 3 -->
        <div class="col-md-4">
            <div class="sidebar">
                <!-- Nội dung của cột 3 -->
                <h4>SỬA MÃ GIẢM GIÁ</h4>

                <div class="card p-3">
                    <form action="">
                        <div class="mb-3 col-md-12">
                            <label for="code" class="form-label">Mã giảm giá</label>
                            <input class="form-control" type="text" id="code" name="code" value="" placeholder="giam30" />
                            <span class="error-message " id="code-error"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="number_limit" class="form-label">Giới hạn tối đa</label>
                            <input class="form-control" type="text" id="number_limit" name="number_limit" value="" placeholder="30 người" />
                            <span class="error-message " id="number_limit-error"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="status">Trạng Thái</label>
                            <div class="input-group input-group-merge">
                                <div class="form-check mx-3">
                                    <input class="form-check-input" type="radio" name="status" id="radioOption1" value="Đã kích hoạt">
                                    <label class="form-check-label" for="radioOption1">
                                        Đã kích hoạt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="radioOption2" value="Chưa kích hoạt" checked>
                                    <label class="form-check-label" for="radioOption2">
                                        Chưa kích hoạt
                                    </label>
                                </div>
                            </div>
                            <span class="error-message" id="status-error">Lỗi trạng thái</span>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>

                    </form>
                </div>
            </div>
        </div>

        <!-- Cột chiều rộng 9 -->
        <div class="col-md-8">
            <div class="main-content">
                <!-- Nội dung của cột 9 -->
                <h4>DANH SÁCH MÃ GIẢM GIÁ</h4>
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Mã </th>
                                    <th>MÃ GIẢM GIÁ</th>
                                    <th>LƯỢT SỬ DỤNG</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                                        <strong>VueJs
                                            Project</strong>
                                    </td>
                                    <td>Trevor Baker</td>
                                    <td>12/30</td>


                                    <td><span class="badge bg-label-primary me-1">Active</span></td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Xóa</a>
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