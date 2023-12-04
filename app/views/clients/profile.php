<div class="container mt-5">
 <!-- Message -->
<?= show_message('<div id="alert" class="alert alert-custom bg-primary alert-dismissible text-sm text-white fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>', '</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>') ?>
<!-- Message -->



  <div class="col-md-12">
    <div class="card mb-4">
      <form id="form-edit-profile" action="<?= _WEB_ROOT ?>/clientProfile/updateProfile" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $_SESSION['users']['id'] ?>">
   
        <!-- Account -->
        <div class="card-body">
          <h5>Chi tiết hồ sơ</h5>
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="<?= _WEB_ROOT . '/public/uploads/' . (!empty($profile['image'] !== '') ? $profile['image'] : 'imagenull.jpg'); ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
            <div class="button-wrapper">
              <label for="image" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Tải ảnh mới lên</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" name="image" id="image" class="account-file-input" hidden />
                <input type="hidden" value="<?= $profile['image'] ?>" name="imageOld">
              </label>
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="full_name" class="form-label">Họ Và Tên</label>
              <input class="form-control" type="text" id="full_name" name="full_name" value="<?= $profile['full_name'] ?>" />
              <span class="error-message " id="full_name-error"> </span>
            </div>

            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">Email</label>
              <input class="form-control" type="text" id="email" name="email" value="<?= $profile['email'] ?>" />
              <span class="error-message" id="email-error"> </span>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phone">Số Điện Thoại</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">VN (+84)</span>
                <input type="text" id="phone" name="phone" class="form-control" value="<?= $profile['phone'] ?>" />
              </div>
              <span class="error-message" id="phone-error"></span>
            </div>
            <div class="row">
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