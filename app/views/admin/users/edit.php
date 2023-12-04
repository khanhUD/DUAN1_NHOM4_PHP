<div class="mt-3">
  <div class="row">
    <!-- Cột chiều rộng 3 -->
    <div class="col-md-12">
      <div class="sidebar">
        <!-- Nội dung của cột 3 -->
        <h4>SỬA TÀI KHOẢN </h4>
        <div class="card p-3">
          <form id="form-edit-users" action="<?= _WEB_ROOT ?>/users/edit_post" method="post" enctype="multipart/form-data">
            <div class="row">
              <input type="hidden" name="id" value="<?= $users_detail['id'] ?>">
              <div class="mb-3 col-md-6 form-group">
                <label for="full_name" class="form-label">Họ và tên</label>
                <input class="form-control" type="text" id="full_name" name="full_name" value="<?= $users_detail['full_name'] ?>" placeholder="Nhập họ và tên..." />
                <span class="form-message " id="full_name-error"></span>
              </div>
              <div class="mb-3 col-md-6 form-group">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="<?= $users_detail['email'] ?>" placeholder="Nhập email..." readonly />
                <span class="form-message " id="email-error"></span>
              </div>
              <div class="mb-3 col-md-6 form-group">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input class="form-control" type="text" id="phone" name="phone" value="<?= $users_detail['phone'] ?>" placeholder="0*** *** ***" />
                <span class="form-message" id="phone-error"></span>
              </div>

              <div class="mb-3 col-md-6 form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input class="form-control" type="password" id="password" name="password" value="<?= $users_detail['password'] ?>" placeholder="Tối thiểu 8 ký tự..." />
                <span class="form-message" id="password-error"></span>
              </div>

              <div class="mb-3 col-md-6  ">
                <label for="image" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="image" name="image">
                <input type="hidden" value="<?= $users_detail['image'] ?>" name="imageOld">
                <div class='form-message'></div>

              </div>

              <div class="mb-3 col-md-6 ">
                <label class="form-label" for="role">Vai trò</label>
                <div class="input-group input-group-merge">
                  <div class="form-check mx-3">
                    <input class="form-check-input" type="radio" name="role" id="role1" value="admin" <?= $users_detail['role'] === 'admin' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="role1">
                      Nhân viên
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="role2" value="user" <?= $users_detail['role'] === 'user' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="role2">
                      Khách hàng
                    </label>
                  </div>
                </div>
              </div>

              <div class="mb-3 col-md-6 ">
                <label class="form-label" for="status">trạng thái</label>
                <div class="input-group input-group-merge">
                  <div class="form-check mx-3">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="off" <?= $users_detail['status'] === 'off' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="status1">
                      Khóa
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="on" <?= $users_detail['status'] === 'on' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="status2">
                      Hoạt Động
                    </label>
                  </div>
                </div>

              </div>
            </div>


            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <button type="reset" class="btn btn-primary">Nhập lại</button>
            <a class="btn btn-primary" href="<?= _WEB_ROOT . 'users'; ?>">Nhập Thêm</a>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>