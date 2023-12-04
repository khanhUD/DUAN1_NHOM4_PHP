<div class="mt-3">
<div class="d-flex justify-content-between">
    <h4 class="card-title"> </h4>
    <a href="<?= _WEB_ROOT . 'vouchers/list_hidden'; ?>">
      <h5><i class="bi bi-eye-slash-fill me-1"></i> Danh xách xóa tạm</h5>
    </a>
  </div>
      <!-- Message -->
      <?= show_message('<div id="alert" class="alert alert-custom bg-gradient-primary alert-dismissible text-sm  text-white  fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>', '</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>') ?>
    <!-- Message -->

  <!-- Cột chiều rộng 9 -->
  <div class=" mt-3 col-md-12">
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
                <th>GIỚI HẠN SỬ DỤNG</th>
                <th>PHẦN TRĂM GIẢM GIÁ</th>
                <th>LƯỢT SỬ DỤNG</th>
                <th>Trạng thái</th>
                <th>Sửa trạng thái</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php foreach ($list_hidden as $items) : ?>
                <tr>
                  <td>
                    <?= $items['id'] ?>
                  </td>
                  <td> <?= $items['code'] ?></td>
                  <td><?= $items['number_limit'] ?></td>
                  <td><?= $items['discount_percentage'] ?></td>
                  <td><?= $items['used_count'] ?> / <?= $items['number_limit'] ?></td>


                  <td>
                    <span class="badge <?= $items['status'] === 'on' ? 'bg-label-primary' : 'bg-label-danger' ?> me-1">
                      <?= $items['status'] === 'on' ? 'Đang hoạt động' : 'Đang khóa' ?>
                    </span>
                  </td>
                  <td>
                    <form action="<?= _WEB_ROOT ?>/vouchers/updateStatus" method="post" onsubmit="return confirm('Bạn chắc chắn muốn cập nhật trạng thái?')">
                      <input type="hidden" name="id" value="<?= $items['id'] ?>">
                      <div class="mb-2">
                        <select class="form-select" name="status">
                          <option value="off" <?= ($items['status'] == 'off') ? 'selected' : '' ?>>Khóa</option>
                          <option value="on" <?= ($items['status'] == 'on') ? 'selected' : '' ?>>Mở</option>
                          <option value="delete" <?= ($items['status'] == 'delete') ? 'selected' : '' ?>>Xóa tạm</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary">
                        Chọn
                      </button>
                    </form>
                  <td>
                    <div class="dropdown">
                      <a class="dropdown-item" href="<?= _WEB_ROOT ?>/vouchers/edit?id=<?= $items['id'] ?>"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
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