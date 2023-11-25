<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid nav-bar">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-4">
                <a href="homeClient" class="navbar-brand">
                    <h1 class="text-primary fw-bold mb-0">Ninh<span class="text-dark">Kiều</span> </h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="homeClient" class="nav-item nav-link ">Trang Chủ</a>
                        <a href="aboutClient" class="nav-item nav-link">Giới Thiệu</a>
                        <a href="menuClient" class="nav-item nav-link">Thực Đơn</a>
                        <a href="blogsClient" class="nav-item nav-link">Bài Viết</a>
                        <a href="contactClient" class="nav-item nav-link">Liên Hệ</a>
                    </div>
                    <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                    <li class="nav-item navbar-dropdown dropdown-user dropdown me-4">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="<?= _WEB_ROOT; ?>/public/assets/admin/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" style="max-width: 40px;" />
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="<?= _WEB_ROOT; ?>/public/assets/admin/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" style="max-width: 40px;" />
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
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Đổi mật khẩu</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Trang quảng trị</span>
                                </a>
                            </li> <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Webstie</span>
                                </a>
                            </li>

                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="auth-login-basic.php">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Đăng nhập</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="auth-login-basic.php">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Đăng xuất</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal"><i class="bi bi-bag-fill"></i></button>

                  


                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control bg-transparent p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->