
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

  <!-- Page JS -->

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