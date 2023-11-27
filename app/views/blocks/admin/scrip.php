<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= _WEB_ROOT; ?>/public/assets/admin/vendor/libs/jquery/jquery.js"></script>
<script src="<?= _WEB_ROOT; ?>/public/assets/admin/vendor/libs/popper/popper.js"></script>
<script src="<?= _WEB_ROOT; ?>/public/assets/admin/vendor/js/bootstrap.js"></script>
<script src="<?= _WEB_ROOT; ?>/public/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

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
        Validator.isEmail('input[name="title"]', '* Vui long nhap email !'),
        Validator.isRequired('input[name="link"]', '* Vui long nhap !'),
        Validator.isRequired('input[name="image"]', '* Vui long nhap !'),
      ]
    })
  }

  if(document.querySelector('#form-edit-banner')) {
    Validator({
      form: '#form-edit-banner',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isEmail('input[name="title"]', '* Vui long nhap email !'),
        Validator.isRequired('input[name="link"]', '* Vui long nhap !'),
        Validator.isRequired('input[name="image"]', '* Vui long nhap !'),
      ]
    })
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

    // Gọi hàm tạo CKEditor cho tiêu đề
    createCKEditor('editor2');

    // Gọi hàm tạo CKEditor cho nội dung bài viết
    createCKEditor('editor');

  });
</script>
</body>

</html>