  <!-- Menu -->

  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="<?= _WEB_ROOT . 'admin'; ?>" class="app-brand-link">
        <span class="app-brand-logo demo">
         
        </span>
        <h5 class="demo menu-text fw-bolder ms-2" >Ninh Kiều Restaurant</h5>
        
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Bảng điều khiển -->
      <li class="menu-item">
        <a href="<?= _WEB_ROOT . 'admin'; ?>" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">THỐNG KÊ / BÁO CÁO</div>
        </a>
      </li>



      <!-- giao diện -->

      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Form Elements">Giao diện</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'banner'; ?>" class="menu-link">
              <div data-i18n="Basic Inputs">Banners</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'PostCategories'; ?>" class="menu-link">
              <div data-i18n="Input groups">Loại bài viết</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'posts'; ?>" class="menu-link">
              <div data-i18n="Input groups">Bài viết</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- giao diện -->
      <!-- NHÀ HÀNG -->

      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Form Elements">Nhà hàng</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'productCategories'; ?>" class="menu-link">
              <div data-i18n="Input groups">Loại món ăn</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'products'; ?>" class="menu-link">
              <div data-i18n="Input groups">Món ăn</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'orders'; ?>" class="menu-link">
              <div data-i18n="Input groups">Hóa đơn đặt món</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'orderTables'; ?>" class="menu-link">
              <div data-i18n="Input groups">Hóa đơn đặt bàn</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'Vouchers'; ?>" class="menu-link">
              <div data-i18n="Input groups">Voucher</div>
            </a>
          </li>

        </ul>
      </li>

      <!-- NHÀ HÀNG -->
      <!-- khách hàng -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
          <div data-i18n="Authentications">Khách hàng</div>
        </a>

        <ul class="menu-sub">

          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'users'; ?>" class="menu-link">
              <div data-i18n="Input groups">Tài khoản</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'postComments'; ?>" class="menu-link">
              <div data-i18n="Input groups">Bình luận bài viết</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'productComments'; ?>" class="menu-link">
              <div data-i18n="Input groups">Bình luận món ăn</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= _WEB_ROOT . 'contacts'; ?>" class="menu-link">
              <div data-i18n="Input groups">Liên hệ</div>
            </a>
          </li>



        </ul>
      </li>

      <!-- khách hàng -->
    </ul>

  </aside>
  <!-- / Menu -->