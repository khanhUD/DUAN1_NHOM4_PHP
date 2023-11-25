<div class="mt-3">
  <!-- Nội dung của cột 3 -->
  <h4>THÊM MÓN ĂN</h4>
  <div class="card p-3">
    <form action="" method="POST">
      <div class="row">
        <div class="mb-3 col-md-6">
          <label for="title" class="form-label">TÊN MÓN ĂN</label>
          <input class="form-control" type="text" id="title" name="title" value="" placeholder="Nhập tiêu đề bài viết" />
          <span class="error-message" id="title-error"></span>
        </div>
        <div class="mb-3 col-md-6">
          <label for="title" class="form-label">GIÁ</label>
          <input class="form-control" type="number" id="title" name="title" value="" placeholder="Nhập giá" />
          <span class="error-message" id="title-error"></span>
        </div>
        <div class="mb-3 col-md-6">
          <label for="title" class="form-label">Tiêu đề</label>
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
        <label for="content" class="form-label">Mô tả ngắn</label>
        <textarea name="content" id="editor2" cols="30" rows="10"></textarea>
        <span class="error-message" id="content-error"></span>
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
        
      </div>
    </form>
  </div>
</div>
<div class="row mt-3">
  <!-- Cột chiều rộng 9 -->
  <div class="col-md-12">
    <div class="main-content">
      <!-- Nội dung của cột 9 -->
      <h4>DANH SÁCH MÓN ĂN</h4>
      <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Mã </th>
                <th>Tên </th>
                <th>giá </th>
                <th>Hình</th>
                <th>Lượt xem</th>
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
                <td>Trevor Baker</td>
                <td>Trevor Baker</td>
                <td>20</td>

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