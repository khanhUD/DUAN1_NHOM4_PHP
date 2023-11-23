<div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <h5 class="card-header">Chi tiết hồ sơ</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="<?= _WEB_ROOT; ?>/public/assets/admin/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Tải ảnh mới lên</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                          </label>



                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">

                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label for="name" class="form-label">Họ và tên</label>
                          <input class="form-control" type="text" id="name" name="name" value="" placeholder="Nguyễn Văn A" />
                          <span class="error-message " id="name-error"> Lỗi</span>
                        </div>

                        <div class="mb-3 col-md-6">
                          <label for="email" class="form-label">E-mail</label>
                          <input class="form-control" type="text" id="email" name="email" placeholder="hongbietlamgi@gmail.com" />
                          <span class="error-message" id="email-error"> Lỗi</span>
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="phone">Số điện thoại</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text">VN (+84)</span>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="0342582305" />
                          </div>
                          <span class="error-message" id="phone-error">lỗi phone</span>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="status">Trạng Thái</label>
                            <div class="input-group input-group-merge">
                              <div class="form-check mx-3">
                                <input class="form-check-input" type="radio" name="status" id="radioOption1" value="Đã kích hoạt">
                                <label class="form-check-label" for="radioOption1">
                                  Đã kích hoạt
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="radioOption2" value="Chưa kích hoạt" checked>
                                <label class="form-check-label" for="radioOption2">
                                  Chưa kích hoạt
                                </label>
                              </div>
                            </div>
                            <span class="error-message" id="status-error">Lỗi trạng thái</span>
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



                      </div>
                      <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Lưu thay đổi</button>
                        <button type="reset" class="btn btn-outline-secondary">Hủy bỏ</button>
                      </div>
                  </form>
                </div>
                <!-- /Account -->
              </div>

            </div>