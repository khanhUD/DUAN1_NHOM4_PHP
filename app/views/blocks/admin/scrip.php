<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<!-- <script src="<?= _WEB_ROOT; ?>/public/assets/admin/vendor/libs/jquery/jquery.js"></script>
<script src="<?= _WEB_ROOT; ?>/public/assets/admin/vendor/libs/popper/popper.js"></script> -->
<script src="<?= _WEB_ROOT; ?>/public/assets/admin/vendor/js/bootstrap.js"></script>
<script src="<?= _WEB_ROOT; ?>/public/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>


<script src="<?= _WEB_ROOT; ?>/public/assets/admin/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="<?= _WEB_ROOT; ?>/public/assets/admin/js/main.js"></script>
<!-- Validate -->
<script src="<?= _WEB_ROOT; ?>/public/assets/admin/js/Validation.js"></script>
<!-- Page JS -->

<script>
  if (document.querySelector('#form-add-banner')) {
    Validator({
      form: '#form-add-banner',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="title"]', 'Vui lòng nhập!'),
        Validator.isRequired('input[name="link"]', 'Vui lòng nhập!'),
      ]
    })
  }

  if (document.querySelector('#form-edit-banner')) {
    Validator({
      form: '#form-edit-banner',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="title"]', 'Vui lòng nhập!'),
        Validator.isRequired('input[name="link"]', 'Vui lòng nhập!'),
      ]
    })
  }
  if (document.querySelector('#form-add-postCategories')) {
    Validator({
      form: '#form-add-postCategories',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="name"]', 'Vui lòng nhập!'),

      ]
    })
  }
  if (document.querySelector('#form-edit-postCategories')) {
    Validator({
      form: '#form-edit-postCategories',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="name"]', 'Vui lòng nhập !'),

      ]
    })
  }
  if (document.querySelector('#form-add-posts')) {
    Validator({
      form: '#form-add-posts',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',
      rules: [
        Validator.isRequired('input[name="title"]', '* Vui lòng nhập tiêu đề bài viết'),
        Validator.isRequired('textarea[name="content"]', '* Vui lòng nhập nội dung bài viết'),
      ]
    });
  }

  if (document.querySelector('#form-edit-posts')) {
    Validator({
      form: '#form-edit-posts',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="title"]', '* Vui lòng nhập tiêu đề bài viết'),
        Validator.isRequired('textarea[name="content"]', '* Vui lòng nhập nội dung bài viết'),
      ]
    });
  }
  if (document.querySelector('#form-add-productCategories')) {
    Validator({
      form: '#form-add-productCategories',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="name"]', '* Vui lòng nhập tên loại'),

      ]
    });
  }
  if (document.querySelector('#form-edit-productCategories')) {
    Validator({
      form: '#form-edit-productCategories',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="name"]', '* Vui lòng nhập tên loại'),

      ]
    });
  }
  if (document.querySelector('#form-add-products')) {
    Validator({
      form: '#form-add-products',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="name"]', '* Vui lòng nhập tên '),
        Validator.isGreaterThanZero('input[name="price"]', '* Giá phải lớn hơn 0'),
        Validator.isRequired('input[name="title"]', '* Vui lòng nhập tiêu đề bài viết'),
        Validator.isRequired('textarea[name="short_description"]', '* Vui lòng nhập mô tả ngắn'),
        Validator.isRequired('textarea[name="description"]', '* Vui lòng nhập mô tả dài'),


      ]
    });
  }
  if (document.querySelector('#form-edit-products')) {
    Validator({
      form: '#form-edit-products',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="name"]', '* Vui lòng nhập tên '),
        Validator.isGreaterThanZero('input[name="price"]', '* Giá phải lớn hơn 0'),
        Validator.isRequired('input[name="title"]', '* Vui lòng nhập tiêu đề bài viết'),
        Validator.isRequired('textarea[name="short_description"]', '* Vui lòng nhập mô tả ngắn'),
        Validator.isRequired('textarea[name="description"]', '* Vui lòng nhập mô tả dài'),


      ]
    });
  }
  if (document.querySelector('#form-add-vouchers')) {
    Validator({
      form: '#form-add-vouchers',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="code"]', '* Vui lòng nhập mã giảm giá '),
        Validator.isGreaterThanZero('input[name="number_limit"]', '* Giới hạn phải lớn hơn 0'),
        Validator.isDiscountPercentage('input[name="discount_percentage"]', '* Giảm giá phải > 0 và < 100'),



      ]
    });
  }
  if (document.querySelector('#form-add-users')) {
    Validator({
      form: '#form-add-users',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="full_name"]', '* Vui lòng nhập họ và tên '),
        Validator.isEmail('input[name="email"]', '* Vui lòng nhập đúng định dạng email '),
        Validator.isPhoneNumber('input[name="phone"]', ''),
        Validator.minLength('input[name="password"]', '8', ''),
      ]
    });
  }
  if (document.querySelector('#form-edit-users')) {
    Validator({
      form: '#form-edit-users',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="full_name"]', '* Vui lòng nhập họ và tên '),
        Validator.isEmail('input[name="email"]', '* Vui lòng nhập đúng định dạng email '),
        Validator.isPhoneNumber('input[name="phone"]', ''),
        Validator.minLength('input[name="password"]', '8', ''),


      ]
    });
  }
</script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Hàm tạo CKEditor cho một trường cụ thể
    function createCKEditor(elementId) {
      ClassicEditor
        .create(document.querySelector(`#${elementId}`))
        .catch(error => {
          console.error(`Error creating CKEditor for ${elementId}:`, error);
        });
    }

    // Gọi hàm tạo CKEditor cho phần tử có id là 'editor'
    if (document.getElementById('editor')) {
      createCKEditor('editor');
    }

    // Gọi hàm tạo CKEditor cho phần tử có id là 'editor2'
    if (document.getElementById('editor2')) {
      createCKEditor('editor2');
    }
  });
</script>

</body>

</html>