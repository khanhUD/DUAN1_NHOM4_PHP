<div class="mt-3">
    <div class="row">
        <!-- Cột chiều rộng 3 -->
        <div class="col-md-4">
            <div class="sidebar">
                <!-- Nội dung của cột 3 -->
                <h4>SỬA MÃ GIẢM GIÁ</h4>

                <div class="card p-3">
                    <form action="<?= _WEB_ROOT ?>/vouchers/post_edit" method="post">
                    <input type="hidden" name="id" value="<?=$vouchers['id']?>">
                        <div class="mb-3 col-md-12">
                            <label for="code" class="form-label">Mã giảm giá</label>
                            <input class="form-control" type="text" id="code" name="code" value="<?= $vouchers['code'] ?>" placeholder="giam30" />
                            <span class="error-message " id="code-error"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="discount_percentage" class="form-label">Phần trăm giảm giá</label>
                            <input class="form-control" type="number" id="discount_percentage" name="discount_percentage" value="<?= $vouchers['discount_percentage'] ?>" placeholder="Nhập phần trăm giảm giá" />
                            <span class="error-message " id="discount_percentage-error"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="number_limit" class="form-label">Giới hạn tối đa</label>
                            <input class="form-control" type="text" id="number_limit" name="number_limit" value="<?= $vouchers['number_limit'] ?>" placeholder="30 người" />
                            <span class="error-message " id="number_limit-error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="status">Trạng Thái</label>
                            <div class="input-group input-group-merge">
                                <div class="form-check mx-3">
                                    <input class="form-check-input" type="radio" name="status" id="radioOption1" value="off" <?= ($vouchers['status'] == 'off') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="radioOption1">
                                        Ẩn
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="radioOption2" value="on" <?= ($vouchers['status'] == 'on') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="radioOption2">
                                        Hiển thị
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                        <a class="btn btn-primary" href="<?= _WEB_ROOT . 'vouchers'; ?>">Nhập Thêm</a>

                    </form>
                </div>
            </div>
        </div>


    </div>
</div>