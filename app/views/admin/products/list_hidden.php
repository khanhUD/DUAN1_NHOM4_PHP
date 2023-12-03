<div class="row mt-3">
  <!-- Cột chiều rộng 9 -->
  <div class="col-md-12">
    <div class="main-content">
      <!-- Nội dung của cột 9 -->
      <a href="<?php _WEB_ROOT?>/products"> <h4>DANH SÁCH MÓN ĂN</h4></a>
     
      <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Mã </th>
                <th>Tên </th>
                <th>giá </th>
                <th>Hình</th>
                <th>Lượt bán</th>
                <th>Trạng thái</th>
                <th>Sửa Trạng thái</th>
                <th>Chức năng</th>
              </tr>

            </thead>
            <tbody class="table-border-bottom-0">
              <?php foreach ($list_hidden as $items) : ?>
                <tr>
                  <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                    <?= $items['id'] ?>
                  </td>
                  <td><?= $items['name'] ?></td>
                  <td><?= $items['price'] ?></td>
                  <td><?= $items['image'] ?></td>
                  <td><?= $items['count_view'] ?></td>

                  <td>
                    <span class="badge <?= $items['status'] === 'on' ? 'bg-label-primary' : 'bg-label-danger' ?> me-1">
                      <?= $items['status'] === 'on' ? 'Đang hiển thị' : 'Đang ẩn' ?>
                    </span>
                  </td>
                  <td>
                    <form action="<?= _WEB_ROOT ?>/products/updateProducts" method="post" onsubmit="return confirm('Bạn chắc chắn muốn cập nhật trạng thái?')">
                      <input type="hidden" name="id" value="<?= $items['id'] ?>">
                      <div class="mb-2">
                        <select class="form-select" name="status">
                          <option value="on" <?= ($items['status'] == 'on') ? 'selected' : '' ?>>Hiển thị</option>
                          <option value="off" <?= ($items['status'] == 'off') ? 'selected' : '' ?>>Ẩn</option>
                          <option value="delete" <?= ($items['status'] == 'delete') ? 'selected' : '' ?>>Xóa tạm</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary">
                        Chọn
                      </button>
                    </form>
                  <td>

                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= _WEB_ROOT ?>/products/edit?id=<?= $items['id'] ?>"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
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