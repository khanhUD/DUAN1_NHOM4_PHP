<div class="mt-3">
  <div class="row">
    <!-- Cột chiều rộng 3 -->
    <div class="col-md-12">
      <div class="sidebar">
        <!-- Nội dung của cột 3 -->
        <h4>THÊM TÀI KHOẢN </h4>
        <div class="card p-3">
          <form action="">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="full_name" class="form-label">Họ và tên</label>
                <input class="form-control" type="text" id="full_name" name="full_name" value="" placeholder="Nguyễn Văn A" />
                <span class="error-message " id="full_name-error"></span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="" placeholder="Nguyễn Văn A" />
                <span class="error-message " id="email-error"></span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input class="form-control" type="text" id="phone" name="phone" value="" placeholder="Nguyễn Văn A" />
                <span class="error-message " id="phone-error"></span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Mật khẩu</label>
                <input class="form-control" type="text" id="password" name="password" value="" placeholder="Nguyễn Văn A" />
                <span class="error-message " id="password-error"></span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="hinh" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="hinh" name="hinh" onblur="validatehinh()">
                <span class="error-message " id="hinh-error"></span>
              </div>

              <div class="mb-3 col-md-6">
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
        <h4>DANH SÁCH TÀI KHOẢN</h4>
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