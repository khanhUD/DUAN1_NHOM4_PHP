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
    <!-- Nội dung của cột 3 -->
    <h4>SỬA MÓN ĂN</h4>
    <div class="card p-3">
        <form id="form-edit-products" action="<?= _WEB_ROOT ?>/products/edit_post" method="POST" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" name="id" value="<?= $products['id'] ?>">
                <div class="mb-3 col-md-6 form-group">
                    <label for="product_categories_id" class="form-label">Loại Món ăn</label>
                    <select class="form-control" name="product_categories_id" id="product_categories_id">
                        <?php foreach ($productCategories as $category) : ?>
                            <?php
                            $selected = ($category['id'] == $products['product_categories_id']) ? 'selected' : '';
                            ?>
                            <option value="<?= $category['id'] ?>" <?= $selected ?>><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="form-message" id="post_category_id-error"></span>
                </div>

                <div class="mb-3 col-md-6 form-group">
                    <label for="name" class="form-label">TÊN MÓN ĂN</label>
                    <input class="form-control" type="text" id="name" name="name" value="<?= $products['name'] ?>" placeholder="Nhập tiêu đề bài viết" />
                    <span class="form-message" id="name-error"></span>
                </div>
                <div class="mb-3 col-md-6 form-group">
                    <label for="price" class="form-label">GIÁ</label>
                    <input class="form-control" type="number" id="price" name="price" value="<?= $products['price'] ?>" placeholder="Nhập giá" />
                    <span class="form-message" id="price-error"></span>
                </div>
                <div class="mb-3 col-md-6 form-group">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input class="form-control" type="text" id="title" name="title" value="<?= $products['title'] ?>" placeholder="Nhập tiêu đề bài viết" />
                    <span class="form-message" id="title-error"></span>
                </div>

                <div class="mb-3 col-md-6 form-group ">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <input type="hidden" value="<?= $products['image'] ?>" name="imageOld">
                    <div class='form-message'></div>

                </div>
                <div class="mb-3 col-md-6 form-group">
                    <label class="form-label" for="status">Trạng thái</label>
                    <div class="input-group form-control input-group-merge">
                        <div class="form-check mx-3 form-group">
                            <input <?= ($products['status'] === 'off') ? 'checked' : '' ?> class="form-check-input" type="radio" name="status" value="off">

                            Ẩn
                            </label>
                        </div>
                        <div class="form-check">
                            <input <?= ($products['status'] === 'on') ? 'checked' : '' ?> class="form-check-input" type="radio" name="status" value="on">
                            <label class="form-check-label" for="radioOption2">
                                Hiển thị
                            </label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mb-3 form-group">
                <label for="short_description" class="form-label">Mô tả ngắn</label>
                <textarea name="short_description" id="editor2" cols="30" rows="10"><?= $products['short_description'] ?></textarea>
                <span class="form-message" id="short_description-error"></span>
            </div>
            <div class="mb-3 form-group">
                <label for="description" class="form-label">Nội dung bài viết</label>
                <textarea name="description" id="editor" cols="30" rows="10"><?= $products['description'] ?></textarea>
                <span class="form-message" id="description-error"></span>
            </div>

            <!-- Thêm nhiều trường hoặc tùy chỉnh theo nhu cầu -->

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <button type="reset" class="btn btn-primary">Nhập lại</button>
                <a class="btn btn-primary" href="<?= _WEB_ROOT . 'products'; ?>">Nhập Thêm</a>
            </div>
        </form>
    </div>
</div>