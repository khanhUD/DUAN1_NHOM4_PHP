<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <h4 class="card-title">BÌNH LUẬN BÀI VIẾT - DANH SÁCH</h4>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th class="pe-0" style="max-width: 400px;">Tên bài viết</th>
                                <th>Trạng Thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($postComments as $items) : ?>
                                <tr>
                                    <td>
                                        <?php if (!empty($items['image'])) : ?>
                                            <img style="height: 100px; width: 100px;" src="<?= _WEB_ROOT . '/public/uploads/' . $items['image'] ?>" alt="">
                                        <?php else : ?>
                                            <img style="height: 100px; width: 100px;" src="<?= _WEB_ROOT . '/public/uploads/no-image-news.png' ?>" alt="">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="mb-3" style="border-left: 2px solid #72757e; background-color: #eff0f3; max-width: 500px; overflow: hidden; white-space: normal; text-align: justify;">
                                            <a href="<?= _WEB_ROOT ?>" class="m-0 p-1 ms-1 pe-3"><?= $items['title'] ?></a>
                                        </div>
                                        <div class=" align-items-center">
                                            <a class="position-relative text-decoration-none ms-1" href="<?= _WEB_ROOT ?>/postComments/commentDetails?id=<?= $items['posts_id'] ?>">
                                                <i class="bi bi-chat-square-fill text-dark " style="font-size: 1.5rem;"></i>
                                                <span style="font-size: 0.7rem;" class=" position-absolute top-50 left-100 translate-middle badge rounded-pill bg-light text-dark"><?= $items['quantity'] ?></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge <?= $items['status'] === 'on' ? 'bg-label-primary' : 'bg-label-danger' ?> me-1">
                                            <?= $items['status'] === 'on' ? 'Hiển thị' : 'Ẩn' ?>
                                        </span>
                                    </td>
                                    <td style="width: 200px;">
                                        <a class="" href="<?= _WEB_ROOT ?>/postComments/commentDetails?id=<?= $items['posts_id'] ?>">
                                            <i class="bi bi-eye-fill me-1"></i> Xem chi tiết
                                        </a>


                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>