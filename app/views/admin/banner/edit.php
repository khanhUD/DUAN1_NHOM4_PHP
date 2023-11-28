<div class="mt-3">
    <div class="row">
        <!-- Cột chiều rộng 3 -->
        <div class="col-md-12">
            <div class="sidebar">
                <!-- Nội dung của cột 3 -->
                <h4>SỬA BANNER</h4>
                <div class="card p-3">
                    <form id="form-edit-banner" action="<?=_WEB_ROOT?>/banner/edit_post" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="id" value="{{$banner_detail['id']}}">
                            <div class="mb-3 col-md-6 form-group">
                                <label for="title" class="form-label">Tiêu Đề</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$banner_detail['title']}}">
                                  <div class='form-message'></div>
                            </div>
                            <div class="mb-3 col-md-6 form-group">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" class="form-control" id="link" name="link" value="{{$banner_detail['link']}}">
                                  <div class='form-message'></div>
                            </div>

                            <div class="mb-3 col-md-6 form-group">
                                <label for="image" class="form-label">Ảnh</label>
                                <input type="file" class="form-control" id="image" name="image">
                               
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="status">Trạng thái</label>
                                <div class="input-group form-control input-group-merge">
                                    <div class="form-check mx-3">
                                        <input 
                                        @if($banner_detail['status'] === 'off')
                                        checked
                                        @endif
                                        class="form-check-input" type="radio" name="status" value="off">
                                        <label class="form-check-label" for="radioOption1">
                                            Ẩn
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input 
                                        @if($banner_detail['status'] === 'on')
                                        checked
                                        @endif
                                        class="form-check-input" type="radio" name="status" value="on">
                                        <label class="form-check-label" for="radioOption2">
                                            Hiện
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
    </div>
    <div class="row mt-3">
        <!-- Cột chiều rộng 9 -->
     
    </div>
</div>