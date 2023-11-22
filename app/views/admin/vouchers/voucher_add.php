<div class="mt-3">
              <div class="row">
                <!-- Cột chiều rộng 3 -->
                <div class="col-md-4">
                  <div class="sidebar">
                    <!-- Nội dung của cột 3 -->
                    <h4>THÊM MÃ GIẢM GIÁ</h4>

                    <div class="card p-3">
                      <form action="">
                        <div class="mb-3 col-md-12">
                          <label for="code" class="form-label">Mã giảm giá</label>
                          <input class="form-control" type="text" id="code" name="code" value="" placeholder="giam30" />
                          <span class="error-message " id="code-error"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                          <label for="number_limit" class="form-label">Giới hạn tối đa</label>
                          <input class="form-control" type="text" id="number_limit" name="number_limit" value="" placeholder="30 người" />
                          <span class="error-message " id="number_limit-error"></span>
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
                    <h4>DANH SÁCH MÃ GIẢM GIÁ</h4>
                    <div class="card">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Mã </th>
                              <th>MÃ GIẢM GIÁ</th>
                              <th>LƯỢT SỬ DỤNG</th>
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
                              <td>12/30</td>


                              <td>
                                <div class="form-check form-switch">
                                  <input class="form-check-input float-end" type="checkbox" role="switch" />
                                </div>
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