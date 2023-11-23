<div class="mt-5">
  <div class="row">
    <div class="col-md-12">
      <h4 class="card-title">THÊM MÓN ĂN</h4>
      <div class="card p-4">
        <form class="form-horizontal form_edit_loai" action="./index.php?btn_update" method="POST">
          <div class="row">
            <div class="form-group mb-3 col-md-6">
              <label for="ten_loai" class="fw-bold control-label col-form-label">Tên món</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="ten_loai" placeholder="Nhập tên món..." name="ten_loai" value="<?php if (isset($ten_loai) && ($ten_loai != "")) echo $ten_loai; ?>">
                <span class="text-danger text_message">

                </span>
              </div>
            </div>
            <div class="form-group mb-3 col-md-6">
              <label for="ten_loai" class="fw-bold control-label col-form-label">Giá</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="ten_loai" placeholder="Nhập giá..." name="ten_loai" value="<?php if (isset($ten_loai) && ($ten_loai != "")) echo $ten_loai; ?>">
                <span class="text-danger text_message">

                </span>
              </div>
            </div>
          </div>
          <div class="form-group mb-3">
            <div class="button-wrapper">
              <label for="upload" class="fw-bold control-label col-form-label">HÌNH</label>
              <div class="input-img">
                <label for="upload" class="btn btn-primary me-2" tabindex="0">
                  <span class="d-none d-sm-block">Tải ảnh mới lên</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input type="file" id="upload" class="account-file-input"  accept="image/png, image/jpeg" />
                </label>
              </div>
              <p class="text-muted mb-0">Được phép JPG,JPEG hoặc PNG.</p>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="ten_loai" class="fw-bold control-label col-form-label">TIÊU ĐỀ</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="ten_loai" placeholder="Nhập tiêu đề cho món..." name="ten_loai" value="">
              <span class="text-danger text_message">

              </span>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="ten_loai" class="fw-bold control-label col-form-label">MÔ TẢ</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="ten_loai" placeholder="Hãy mô tả cho món..." name="ten_loai" value="">
              <span class="text-danger text_message">

              </span>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="ten_loai" class="fw-bold control-label col-form-label">MÔ TẢ NGẮN</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="ten_loai" placeholder="Mô tả ngắn gọn cho món..." name="ten_loai" value="">
              <span class="text-danger text_message">

              </span>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="ten_loai" class="fw-bold control-label col-form-label">NGÀY TẠO</label>
            <div class="col-sm-12">
              <input type="date" class="form-control" id="ten_loai" name="ten_loai" value="">
              <span class="text-danger text_message">

              </span>
            </div>
          </div>
          <div class="">
            <input type="submit" class="btn btn-primary" name="update_loai" value="Thêm">
          </div>
        </form>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="main-content">
        <!-- Nội dung của cột 9 -->
        <h4 class="card-title">DANH SÁCH MÓN</h4>
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tên</th>
                  <th>Giá</th>
                  <th>Hình</th>
                  <th>Số lượt xem</th>
                  <th>Trạng Thái</th>
                  <th>Chức năng</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <tr>
                  <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                    <strong>id</strong>

                  </td>
                  <td>tên</td>
                  <td>giá</td>
                  <td>
                    <img width="100px" src="<?= _WEB_ROOT; ?>/public/assets/admin/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                  </td>
                  <td>số lượt xem </td>
                  <!-- <td>
                                  <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                      <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                      <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                      <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                  </ul>
                                </td> -->
                  <td><span class="badge bg-label-info me-1">Scheduled</span>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                          Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
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