<!-- Vĩnh -->
<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <h4 class="card-title">BÌNH LUẬN -> Bài viết</h4>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ngày đăng</th>
                                <th class="pe-0" style="max-width: 400px;">Bình luận</th>
                                <th>Trạng Thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <?php foreach ($postComments as $items):?>
                            <tr>
                                <td>
                                    <?=$items['create_at'] ?>
                                </td>
                                <td>
                                    <div class="mb-1"><?=$items['full_name'] ?>[ <span class="text-primary fw-italic"><?=$items['email'] ?></span> ]:</div>
                                    <div class="mb-1" style="border-left: 2px solid #72757e; background-color: #eff0f3; max-width: 400px; overflow: hidden; white-space: normal; text-align: justify;">
                                        <p class="m-0 p-1 ms-1 pe-3"><?=$items['note'] ?> </p>
                                    </div>
                                    <div class=" align-items-center">
                                        <div class="me-1" style="max-width: 300px; overflow: hidden; white-space: normal;"><a href="" class="text-primary text-decoration-none"><?=$items['title'] ?></a></div>

                                        <a class="position-relative text-decoration-none ms-1" href="#">
                                            <i class="bi bi-chat-square-fill text-dark " style="font-size: 1.5rem;"></i>
                                            <span style="font-size: 0.7rem;" class=" position-absolute top-50 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                                        </a>
                                    </div>

                                </td>
                                <td><span class="badge bg-label-info me-1"><?=$items['status'] ?></span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                                không chấp thuận</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Xóa</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-reply-fill me-1"></i> Trả lời hay j đó</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach?>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>