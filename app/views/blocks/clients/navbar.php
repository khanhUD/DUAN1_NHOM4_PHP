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
                <a href="<?= _WEB_ROOT . 'Trang-Chu'; ?>" class="navbar-brand">
                    <h1 class="text-primary fw-bold mb-0">Ninh<span class="text-dark">Kiều</span> </h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="<?= _WEB_ROOT . 'Trang-Chu'; ?>" class="nav-item nav-link ">Trang Chủ</a>
                        <a href="<?= _WEB_ROOT . 'Gioi-Thieu'; ?>" class="nav-item nav-link">Giới Thiệu</a>
                        <a href="<?= _WEB_ROOT . 'Thuc-Don'; ?>" class="nav-item nav-link">Thực Đơn</a>
                        <a href="<?= _WEB_ROOT . 'Bai-Viet'; ?>" class="nav-item nav-link">Bài Viết</a>
                        <a href="<?= _WEB_ROOT . 'Lien-He'; ?>" class="nav-item nav-link">Liên Hệ</a>
                        <a href="<?= _WEB_ROOT . 'dat-ban'; ?>" class="nav-item nav-link">Đặt Bàn</a>

                    </div>
                    <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                    <li class="nav-item navbar-dropdown dropdown-user dropdown me-4" style="list-style-type: none;">
                        <div class="nav-link  hide-arrow " style="cursor: pointer;">
                            <div class="avatar avatar-online" style="width: 40px; height: 40px; overflow: hidden;">
                                <div class="avatar avatar-online" style="width: 40px; height: 40px; overflow: hidden;">
                                    <img src="<?= _WEB_ROOT . '/public/uploads/' . (!empty($_SESSION['users']) && ($_SESSION['users']['image'] !== '') ? $_SESSION['users']['image'] : 'imagenull.jpg'); ?>" alt class="w-100 h-100 rounded-circle" style="object-fit: cover;">
                                </div>
                            </div>
                        </div>
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
                                    <a class="dropdown-item" href="<?= _WEB_ROOT . 'Tai-Khoan'; ?>">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">Hồ sơ của tôi</span>
                                    </a>
                                </li>
                                <?php if (isset($_SESSION['users']['role']) && $_SESSION['users']['role'] === 'admin') : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= _WEB_ROOT ?>Admin">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Trang quản trị</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a class="dropdown-item" href="<?= _WEB_ROOT ?>quan-ly-hoa-don?id=<?= $_SESSION['users']['id'] ?>">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Quản lý đơn hàng</span>
                                    </a>
                                </li>
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
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $totolQuantity = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            $totolQuantity += $item[3];
                        }
                    ?>
                        <a class="position-relative" href="<?= _WEB_ROOT ?>Gio-Hang"><button class=" btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal"><i class="bi bi-bag-fill"></i> <span style="font-size: 0.7rem;" class=" position-absolute top-0 start-50 translate-middle badge rounded-pill bg-primary text-dark"><?= (isset($totolQuantity)) ? "$totolQuantity" : '' ?></span> </button></a>

                    <?php
                    } else {
                    ?>
                        <a class="position-relative" href="<?= _WEB_ROOT ?>Gio-Hang"><button class=" btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal"><i class="bi bi-bag-fill"></i></button></a>

                    <?php
                    }
                    ?>



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
                    <h5 class="modal-title" id="exampleModalLabel">Tìm Kiếm Bằng Từ Khóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <form action="<?= _WEB_ROOT ?>/ClientProducts/search" class="w-75 mx-auto" method="get">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input name="keyword" type="search" class="form-control bg-transparent p-3" placeholder="Nhập tìm kiếm..." aria-describedby="search-icon-1">
                            <button type="submit" id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->