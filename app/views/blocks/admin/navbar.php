  <!-- Navbar -->
  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <ul class="navbar-nav flex-row align-items-center ms-auto">

        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online" style="width: 40px; height: 40px; overflow: hidden;">
                                <div class="avatar avatar-online" style="width: 40px; height: 40px; overflow: hidden;">
                                    <img src="<?= _WEB_ROOT . '/public/uploads/' . (!empty($_SESSION['users']) && ($_SESSION['users']['image'] !== '') ? $_SESSION['users']['image'] : 'imagenull.jpg'); ?>" alt class="w-100 h-100 rounded-circle" style="object-fit: cover;">
                                </div>
                            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
                            <?php if (isset($_SESSION['users'])) : ?>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online" style="width: 40px; height: 40px; overflow: hidden;">
                                                    <img src="<?= _WEB_ROOT . '/public/uploads/' . (!empty($_SESSION['users']) && ($_SESSION['users']['image'] !== '') ? $_SESSION['users']['image'] : 'imagenull.jpg'); ?>" alt class="w-100 h-100 rounded-circle" style="object-fit: cover;">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block"><?= $_SESSION['users']['full_name'] ?></span>
                                                <small class="text-muted"><?= $_SESSION['users']['role'] === 'admin' ? 'Quản trị viên' : 'Khách hàng'; ?></small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= _WEB_ROOT . 'Ho-So'; ?>">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">Hồ sơ của tôi</span>
                                    </a>
                                </li>
                                <?php if (isset($_SESSION['users']['role']) && $_SESSION['users']['role'] === 'admin') : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= _WEB_ROOT ?>Trang-Chu">
                                            <span class="align-middle">Trang chủ Website</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= _WEB_ROOT ?>Doi-Mat-Khau">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Đổi mật khẩu</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= _WEB_ROOT ?>Dang-Xuat">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Đăng xuất</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (!isset($_SESSION['users'])) : ?>
                                <li>
                                    <a class="dropdown-item" href="<?= _WEB_ROOT ?>Dang-Nhap">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Đăng nhập</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= _WEB_ROOT ?>Dang-Ky">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Đăng ký</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
        <!--/ User -->
      </ul>
    </div>
  </nav>
  <!-- / Navbar -->