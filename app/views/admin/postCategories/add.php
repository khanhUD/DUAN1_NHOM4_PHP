<div class="mt-3">
  <div class="row">
    <!-- Cột chiều rộng 3 -->
    <div class="col-md-4">
      <div class="sidebar">
        <!-- Nội dung của cột 3 -->
        <h4>THÊM LOẠI BÀI VIẾT</h4>

        <div class="card p-3 mb-3">
          <form id="form-add-postCategories" action="<?= _WEB_ROOT ?>/postCategories/add" method="post">
            <input type="hidden" name="id" value="{{$postCategories_detail['id']}}">
            <div class="mb-3 col-md-12 form-group">
              <label for="name" class="form-label ">Tên loại bài viết</label>
              <input class="form-control" type="text" id="name" name="name" value="" placeholder="Nhập tên loại bài viết..." />
              <span class="form-message "></span>
            </div>


            <button type="submit" class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-primary">Nhập lại</button>

          </form>
        </div>
      </div>
    </div>

    <!-- Cột chiều rộng 9 -->
    <div class="col-md-8 ">
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
                <?php foreach ($postCategories as $items) : ?>
                  <tr>
                    <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                      <?= $items['id'] ?>
                    </td>
                    <td> <?= $items['name'] ?></td>


                    <td>
                    <td>
                      <span class="badge <?= $items['status'] === 'on' ? 'bg-label-primary' : 'bg-label-danger' ?> me-1">
                        <?= $items['status'] === 'on' ? 'Hiện' : 'Ẩn' ?>
                      </span>
                    </td>
                    </td>

                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="<?= _WEB_ROOT ?>/postCategories/edit?id=<?= $items['id'] ?>"><i class="bi bi-pencil-square me-1"></i></i>Sửa</a>
                          <form method="post" action="<?= _WEB_ROOT ?>/postCategories/delete">
                            <input type="hidden" name="id" value="<?= $items['id'] ?>">
                            <button class="dropdown-item" type="submit">
                              <i class="bx bx-trash me-1"></i>Xoa</button>
                          </form>

                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    function toggleStatus(id, currentStatus) {
        // Lấy phần tử span có id là 'status_' và id của dòng tương ứng
        var statusSpan = document.getElementById('status_' + id);

        // Gửi yêu cầu cập nhật trạng thái qua Ajax
        // Sử dụng XMLHttpRequest hoặc Fetch API để thực hiện yêu cầu
        // Ở đây, mình sử dụng fetch để gửi POST request

        fetch('<?= _WEB_ROOT ?>/postCategories/toggleStatus', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                id: id,
                currentStatus: currentStatus,
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Cập nhật trạng thái trên giao diện
            statusSpan.innerText = data.newStatus;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>