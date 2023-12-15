<!-- Hero Start -->
<div class="container-fluid bg-light py-6  mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1 mb-4">Giới Thiệu</h1>
        <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="<?_WEB_ROOT?>/Trang-Chu">Trang chủ</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Giới thiệu</li>
        </ol>
    </div>
</div>
<!-- Hero End -->


<!-- About Satrt -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <img src="<?= _WEB_ROOT; ?>/public/assets/clients/img/about.jpg" class="img-fluid rounded" alt="">
            </div>
            <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Về Chúng Tôi</small>
                <h1 class="display-5 mb-4">
                    Được tin cậy bởi hơn 200 khách hàng hài lòng</h1>
                <p class="mb-4">Nhà hàng Ninh Kiều - Nhà hàng ẩm thực hiện đại kết hợp với truyền thống, tạo nên tính mới lạ cho thực khách. Được ra đời vào năm 2021 với tiêu chí "Khách hàng là trên hết" nên chúng tôi luôn tự hào về cách phục vụ cũng như các món ăn mà chúng tôi làm ra. Nhà hàng chúng tôi luôn luôn đặt khách hàng lên hàng đầu, tận tâm phục vụ, mang lại cho khách hàng những trãi nghiệm tuyệt với nhất. Các món ăn với công thức độc quyền sẽ mang lại hương vị mới mẻ cho thực khách. Nhà hàng Ninh Kiều xin chân thành cảm ơn.</p>
                <div class="row g-4 text-dark mb-5">
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Giao Thức Ăn Nhanh và Tươi Mát
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Hỗ trợ Khách hàng 24/7
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Lựa Chọn Tùy Chỉnh Đơn Giản
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Ưu Đãi Hấp Dẫn
                    </div>
                </div>
                <!-- <a href="" class="btn btn-primary py-3 px-5 rounded-pill">About Us<i class="fas fa-arrow-right ps-2"></i></a> -->
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Fact Start-->
<div class="container-fluid faqt py-6">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.3s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-users fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">689</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Khách hàng</p>
                        </div>
                    </div>
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.5s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-users-cog fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">107</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Đầu bếp</p>
                        </div>
                    </div>
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.7s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-check fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">253</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Sự kiện</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="video">
                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Video -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tnLgP6GzEhg?si=1Fm-pZa2reTCl1j-" title="YouTube video player" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->


<!-- Team Start -->
<div class="container-fluid team py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Đầu Bếp</small>
            <h1 class="display-5 mb-5">Chúng tôi có đội ngũ đầu bếp giàu kinh nghiệm</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <img class="img-fluid rounded-top " src="<?= _WEB_ROOT; ?>/public/assets/clients/img/team-1.jpg" alt="">
                    <div class="team-content text-center py-3 bg-dark rounded-bottom">
                        <h4 class="text-primary">Henry</h4>
                        <p class="text-white mb-0">Decoration Chef</p>
                    </div>
                    <div class="team-icon d-flex flex-column justify-content-center m-4">
                        <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fas fa-share-alt"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.3s">
                <div class="team-item rounded">
                    <img class="img-fluid rounded-top " src="<?= _WEB_ROOT; ?>/public/assets/clients/img/team-2.jpg" alt="">
                    <div class="team-content text-center py-3 bg-dark rounded-bottom">
                        <h4 class="text-primary">Jemes Born</h4>
                        <p class="text-white mb-0">Executive Chef</p>
                    </div>
                    <div class="team-icon d-flex flex-column justify-content-center m-4">
                        <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fas fa-share-alt"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.5s">
                <div class="team-item rounded">
                    <img class="img-fluid rounded-top " src="<?= _WEB_ROOT; ?>/public/assets/clients/img/team-3.jpg" alt="">
                    <div class="team-content text-center py-3 bg-dark rounded-bottom">
                        <h4 class="text-primary">Martin Hill</h4>
                        <p class="text-white mb-0">Kitchen Porter</p>
                    </div>
                    <div class="team-icon d-flex flex-column justify-content-center m-4">
                        <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fas fa-share-alt"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.7s">
                <div class="team-item rounded">
                    <img class="img-fluid rounded-top " src="<?= _WEB_ROOT; ?>/public/assets/clients/img/team-4.jpg" alt="">
                    <div class="team-content text-center py-3 bg-dark rounded-bottom">
                        <h4 class="text-primary">Adam Smith</h4>
                        <p class="text-white mb-0">Head Chef</p>
                    </div>
                    <div class="team-icon d-flex flex-column justify-content-center m-4">
                        <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fas fa-share-alt"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->