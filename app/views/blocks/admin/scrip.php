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
        Validator.isRequired('input[name="title"]', '* Vui long nhap !'),
        Validator.isRequired('input[name="link"]', '* Vui long nhap !'),
      ],

      onSubmit: function(data) {
        // call API
        console.log(data);

        // Quang du lieu vao input truoc khi submit

        //Submit =====>

        document.querySelector(this.form).submit();
      }
    })
  }

  if (document.querySelector('#form-edit-banner')) {
    Validator({
      form: '#form-edit-banner',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="title"]', '* Vui long nhap !'),
        Validator.isRequired('input[name="link"]', '* Vui long nhap !'),
      ]
    })
  }
  if (document.querySelector('#form-add-postCategories')) {
    Validator({
      form: '#form-add-postCategories',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="name"]', '* Vui long nhap !'),

      ]
    })
  }
  if (document.querySelector('#form-edit-postCategories')) {
    Validator({
      form: '#form-add-postCategories',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',

      rules: [
        Validator.isRequired('input[name="name"]', '* Vui long nhap !'),

      ]
    })
  }
</script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {

    if (document.getElementById('editor2')) {
      createCKEditor('editor2');
    }

    if (document.getElementById('editor')) {
      let editor;

      ClassicEditor.create(document.getElementById('editor'))
        .then(newEditor => {
          editor = newEditor;
        })
    }




  });
</script>
</body>

</html>