<div class="mt-3">
  <div class="row">
    <!-- Cột chiều rộng 3 -->
    <div class="col-md-4">
      <div class="sidebar">
        <!-- Nội dung của cột 3 -->
        <h4>SỬA LOẠI BÀI VIẾT</h4>

        <div class="card p-3">
          <form id="form-edit-postCategories" action="<?= _WEB_ROOT ?>/postCategories/edit_post" method="post">
          <input type="hidden" name="id" value="{{$postCategories_detail['id']}}">
          <div class="mb-3 col-md-12 form-group">
              <label for="name" class="form-label">Tên loại bài viết</label>
              <input class="form-control" type="text" id="name" name="name" value="<?= $postCategories_detail['name'] ?>" placeholder="loại bài viết.." />
              <span class="form-message "></span>
            </div>
            <div class="mb-3 col-md-12">
              <label class="form-label" for="status">Trạng thái</label>
              <div class="input-group form-control input-group-merge">
                <div class="form-check mx-3 form-group">
                  <input <?= ($postCategories_detail['status'] === 'off') ? 'checked' : '' ?> class="form-check-input" type="radio" name="status" value="off">
                 
                    Ẩn
                  </label>
                </div>
                <div class="form-check">
                  <input <?= ($postCategories_detail['status'] === 'on') ? 'checked' : '' ?> class="form-check-input" type="radio" name="status" value="on">
                  <label class="form-check-label" for="radioOption2">
                    Hiển thị
                  </label>
                </div>
              </div>

            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <button type="reset" class="btn btn-primary">Nhập lại</button>
            <a class="btn btn-primary" href="<?= _WEB_ROOT . 'postCategories'; ?>">Nhập Thêm</a>

          </form>
        </div>
      </div>
    </div>

  