<div class="mt-3">
    <!-- Message -->
    <?= show_message('<div id="alert" class="alert alert-custom bg-gradient-primary alert-dismissible text-sm  text-white  fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>', '</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>') ?>
    <!-- Message -->
    <div class="row">
        <h4>SỬA BANNER</h4>
        <!-- Cột chiều rộng 3 -->
        <div class="col-md-6">
            <div class="sidebar">
                <!-- Nội dung của cột 3 -->

                <div class="card p-3">
                    <form id="form-edit-banner" action="<?= _WEB_ROOT ?>/banner/edit_post" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="id" value="<?= $banner_detail['id'] ?>">
                            <div class="mb-3 col-md-12 form-group">
                                <label for="title" class="form-label">Tiêu Đề</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= $banner_detail['title'] ?>">
                                <div class='form-message'></div>
                            </div>
                            <div class="mb-3 col-md-12 form-group">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" class="form-control" id="link" name="link" value="<?= $banner_detail['link'] ?>">
                                <div class='form-message'></div>
                            </div>

                            <div class="mb-3 col-md-12 form-group">
                                <label for="image" class="form-label">Ảnh</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <input type="hidden" value="<?= $banner_detail['image'] ?>" name="imageOld">
                                <div class='form-message'></div>

                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="status">Trạng thái</label>
                                <div class="input-group form-control input-group-merge">
                                    <div class="form-check mx-3">
                                        <input <?php if ($banner_detail['status'] === 'off') echo 'checked'; ?> class="form-check-input" type="radio" name="status" value="off">
                                        <label class="form-check-label" for="radioOption1">
                                            Ẩn
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input <?php if ($banner_detail['status'] === 'on') echo 'checked'; ?> class="form-check-input" type="radio" name="status" value="on">
                                        <label class="form-check-label" for="radioOption2">
                                            Hiển thị
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                        <a class="btn btn-primary" href="<?= _WEB_ROOT . 'banner'; ?>">Nhập Thêm</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="row">
                <img src="<?= _WEB_ROOT ?>/public/uploads/<?= ($banner_detail['image']) != '' ? $banner_detail['image'] : 'no-image-news.png' ?>" alt="" class="img-fluid rounded" >
            </div>
        </div>


    </div>
    <div class="row mt-3">
        <!-- Cột chiều rộng 9 -->

    </div>
</div>