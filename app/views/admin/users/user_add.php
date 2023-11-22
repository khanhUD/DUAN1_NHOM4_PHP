<div class="mt-3">
              <div class="row">
                <!-- Cột chiều rộng 3 -->
                <div class="col-md-4">
                  <div class="sidebar">
                    <!-- Nội dung của cột 3 -->
                    <h4>THÊM KHÁCH HÀNG</h4>
                    <div class="card p-3">
                      <form action="">
                        <div class="mb-3 col-md-12">
                          <label for="full_name" class="form-label">Họ và tên</label>
                          <input class="form-control" type="text" id="full_name" name="full_name" value="" placeholder="Nguyễn Văn A" />
                          <span class="error-message " id="full_name-error"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                          <label for="email" class="form-label">Email</label>
                          <input class="form-control" type="text" id="email" name="email" value="" placeholder="Nguyễn Văn A" />
                          <span class="error-message " id="email-error"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                          <label for="phone" class="form-label">Số điện thoại</label>
                          <input class="form-control" type="text" id="phone" name="phone" value="" placeholder="Nguyễn Văn A" />
                          <span class="error-message " id="phone-error"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                          <label for="password" class="form-label">Mật khẩu</label>
                          <input class="form-control" type="text" id="password" name="password" value="" placeholder="Nguyễn Văn A" />
                          <span class="error-message " id="password-error"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                          <label for="hinh" class="form-label">Hình ảnh</label>
                          <input type="file" class="form-control" id="hinh" name="hinh" onblur="validatehinh()">
                          <span class="error-message " id="hinh-error"></span>
                        </div>
                      
                        <div class="mb-3 col-md-12">
                          <label class="form-label" for="phone">Vai trò</label>
                          <div class="input-group input-group-merge">
                            <div class="form-check mx-3">
                              <input class="form-check-input" type="radio" name="role" value="Khách hàng">
                              <label class="form-check-label" for="radioOption1">
                                Khách hàng
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="role" value="nhân viên" checked>
                              <label class="form-check-label" for="radioOption2">
                                Nhân viên
                              </label>
                            </div>
                          </div>
                          <span class="error-message" id="role-error">Lỗi vai trò</span>
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
                    <h4>DANH SÁCH KHÁCH HÀNG</h4>
                    <div class="card">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Tên</th>
                              <th>Email</th>
                              <th>Hình</th>
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
                              <td>
                                email
                              </td>
                              <td>hình</td>
                              <td><span class="badge bg-label-info me-1">Scheduled</span>
                              </td>
                              <td>
                                <form class="d-flex justify-content-center" method="post" action="#">
                                  <a href="index.php?act=suahanghoa&ma_hh=<?= $ma_hh ?>" class="btn btnsua">Sửa</a>
                                  <a href="index.php?act=xoahanghoa&ma_hh= <?= $ma_hh ?>" class="btn btn-outline-danger mx-2">Xóa</a>
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
            </div>