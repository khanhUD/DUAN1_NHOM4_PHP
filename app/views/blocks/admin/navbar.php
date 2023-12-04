  <!-- Navbar -->
  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

      <div>
        <a href="<?php _WEB_ROOT?>/clientHome">
          <h4> Đến Trang Chủ</h4>
        </a>
      </div>

      <ul class="navbar-nav flex-row align-items-center ms-auto">

        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="<?= _WEB_ROOT; ?>/public/assets/admin/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="<?= _WEB_ROOT; ?>/public/assets/admin/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block">John Doe</span>
                    <small class="text-muted">Quản trị viên</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="<?= _WEB_ROOT . 'profile'; ?>">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">Hồ sơ của tôi</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= _WEB_ROOT . 'change_password' ?>">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Đổi mật khẩu</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= _WEB_ROOT . 'forgot_password' ?>">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Quên mật khẩu</span>
              </a>
            </li>

            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="auth-login-basic.php">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Đăng xuất</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>
  </nav>
  <!-- / Navbar -->