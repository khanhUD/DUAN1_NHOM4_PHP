<div class="mt-3">
              <div class="row">
                <!-- Cột chiều rộng 3 -->
                <div class="col-md-4">
                  <div class="sidebar">
                    <!-- Nội dung của cột 3 -->
                    <h4>SỬA LOẠI BÀI VIẾT</h4>

                    <div class="card p-3">
                      <form action="">
                        <div class="mb-3 col-md-12">
                          <label for="name" class="form-label">Tên loại bài viết</label>
                          <input class="form-control" type="text" id="name" name="name" value="" placeholder="loại bài viết.." />
                          <span class="error-message " id="name-error"></span>
                        </div>
                        <div class="mb-3 col-md-12">
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
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>                  
                        <a class="btn btn-primary" href="<?= _WEB_ROOT . 'postsCategories'; ?>">Nhập Thêm</a>

                      </form>
                    </div>
                  </div>
                </div>

                <!-- Cột chiều rộng 9 -->
                <div class="col-md-8">
                  <div class="main-content">
                    <!-- Nội dung của cột 9 -->
                    <h4>DANH SÁCH LOẠI BÀI VIẾT</h4>
                    <div class="card">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Mã loại</th>
                              <th>Tên loại</th>
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