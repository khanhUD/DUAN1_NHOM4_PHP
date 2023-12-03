<!-- Vĩnh -->
<div class="row">
       <!-- Message -->
       <?= show_message('<div id="alert" class="alert alert-custom bg-gradient-primary alert-dismissible text-sm  text-white  fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>', '</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>') ?>
    <!-- Message -->
    <!-- Cột chiều rộng 3 -->
    <div class="col-md-12">
        <div class="sidebar">
            <!-- Nội dung của cột 3 -->
            <h4>SỬA LOẠI MÓN ĂN</h4>
            <div class="card p-3">
                <form action="<?= _WEB_ROOT ?>/productCategories/edit_post">
                    <div class="mb-3">
                        <label for="name" class="form-label">TÊN LOẠI MÓN</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$productCategories_detail['name']?>">
                        <input type="hidden" name="id" value="<?=$productCategories_detail['id']?>">

                        <div id="mess_err" class="form-text"></div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="status">Trạng Thái</label>
                        <div class="input-group input-group-merge">
                            <div class="form-check mx-3">
                                <input class="form-check-input" type="radio" name="status" id="radioOption1" value="off" <?=($productCategories_detail['status'] == 'off') ? 'checked': ''?>>
                                <label class="form-check-label" for="radioOption1">
                                    Ẩn
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="radioOption2" value="on" <?=($productCategories_detail['status'] == 'on') ? 'checked': ''?>>
                                <label class="form-check-label" for="radioOption2">
                                Hiển thị
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-3">Cập nhật</button>
                    <!-- <button type="reset" class="btn btn-primary">Nhập lại</button> -->
                    <a class="btn btn-primary" href="<?= _WEB_ROOT . 'productCategories'; ?>">Nhập Thêm</a>
                </form>
            </div>
        </div>
    </div>
</div>