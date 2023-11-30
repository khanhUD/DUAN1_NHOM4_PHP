<div class="mt-3">
  <div class="row">
    <!-- Cột chiều rộng 3 -->
    <div class="col-md-12">
      <div class="sidebar">
        <!-- Nội dung của cột 3 -->
        <h4>THÊM TÀI KHOẢN </h4>
        <div class="card p-3">
          <form action="<?= _WEB_ROOT ?>/users" method="post" enctype="multipart/form-data">
            <div class="row">
        
              <div class="mb-3 col-md-6">
                <label for="full_name" class="form-label">Họ và tên</label>
                <input class="form-control" type="text" id="full_name" name="full_name" value="" placeholder="Nhập họ và tên..." />
                <span class="error-message " id="full_name-error"></span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="" placeholder="Nhập email..." />
                <span class="error-message " id="email-error"></span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input class="form-control" type="text" id="phone" name="phone" value="" placeholder="Nhập ..." />
                <span class="error-message " id="phone-error"></span>
              </div>

              <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Mật khẩu</label>
                <input class="form-control" type="password" id="password" name="password" value="" placeholder="Nhập mật khẩu..." />
                <span class="error-message " id="password-error"></span>
              </div>

              <div class="mb-3 col-md-6">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="image" name="image">
                <span class="error-message " id="image-error"></span>
              </div>

              <div class="mb-3 col-md-6">
                <label class="form-label" for="role">vai trò</label>
                <div class="input-group input-group-merge">
                  <div class="form-check mx-3">
                    <input class="form-check-input" type="radio" name="role" id="role1" value="admin">
                    <label class="form-check-label" for="role1">
                      Nhân viên
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="role2" value="user" checked>
                    <label class="form-check-label" for="role2">
                      Khách hàng
                    </label>
                  </div>
                </div>

              </div>
              <div class="mb-3 col-md-6" hidden>
                <label class="form-label" for="status">trạng thái</label>
                <div class="input-group input-group-merge">
                  <div class="form-check mx-3">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="off">
                    <label class="form-check-label" for="status1">
                      Khóa
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="on" checked>
                    <label class="form-check-label" for="status2">
                      Hoạt Động
                    </label>
                  </div>
                </div>

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
                  <th>Vai trò</th>
                  <th>Trạng thái</th>
                  <th>Chức năng</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php foreach ($users as $items) : ?>
                  <tr>
                    <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                      <?= $items['id'] ?>
                    </td>
                    <td><?= $items['full_name'] ?></td>
                    <td>
                      <?= $items['email'] ?>
                    </td>
                    <td>
                      <?php if ($items['image'] !== null) {
                      ?>
                        <img style="height: 50px;" src="<?= _WEB_ROOT ?>/public/uploads/<?= $items['image'] ?>" alt="">
                      <?php
                      } ?>
                    </td>
                    <td>
                      <?= $items['role'] === 'admin' ? 'Nhân viên' : 'Khách hàng' ?>

                    </td>
                    <td>
                      <span class="badge <?= $items['status'] === 'on' ? 'bg-label-primary' : 'bg-label-danger' ?> me-1">
                        <?= $items['status'] === 'on' ? 'Hoạt Động' : 'Đã Khóa' ?>
                      </span>
                    </td>





                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="<?= _WEB_ROOT ?>/users/edit?id=<?= $items['id'] ?>"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                          <form method="post" action="<?= _WEB_ROOT ?>/users/delete">
                            <input type="hidden" name="id" value="<?= $items['id'] ?>">
                            <button class="dropdown-item" type="submit">
                              <i class="bx bx-trash me-1"></i>Xoa</button>
                          </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach  ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>