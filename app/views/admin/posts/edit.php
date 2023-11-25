<div class="mt-3">
  <div class="row">
    <!-- Nội dung của cột 3 -->
    <h4>SỬA BÀI VIẾT</h4>
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
        <div class="mb-3 col-md-6">
          <label class="form-label" for="status">Trạng Thái</label>
          <div class="input-group input-group-merge">
            <div class="form-check mx-3">
              <input class="form-check-input" type="radio" name="status" id="radioOption1" value="off">
              <label class="form-check-label" for="radioOption1">
                Ẩn
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="radioOption2" value="on" checked>
              <label class="form-check-label" for="radioOption2">
                Hiện
              </label>
            </div>
          </div>

        </div>



        <div class="mb-3">
          <label for="content" class="form-label">Nội dung bài viết</label>
          <textarea name="content" id="editor" cols="30" rows="10"></textarea>
          <span class="error-message" id="content-error"></span>
        </div>

        <!-- Thêm nhiều trường hoặc tùy chỉnh theo nhu cầu -->

        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Cập nhật</button>
          <button type="reset" class="btn btn-primary">Nhập lại</button>
          <a class="btn btn-primary" href="<?= _WEB_ROOT . 'posts'; ?>">Nhập Thêm</a>
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