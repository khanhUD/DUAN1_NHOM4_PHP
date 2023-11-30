<!-- Vĩnh -->
<div class="row">
    <!-- Cột chiều rộng 4 -->
    <div class="col-md-4">
        <div class="sidebar">
            <h4 class="card-title">THÊM LOẠI MÓN</h4>
            <div class="card p-3">
                <form class="form-horizontal form_add_loai" action="productCategories/add" method="post">
                    <div class="form-group">
                        <label for="ten_loai" class="fw-bold control-label col-form-label">TÊN LOẠI MÓN ĂN</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="ten_loai" placeholder="Nhập tên loại món..." name="ten_loai">
                            <span class="text-danger text_message">

                            </span>
                        </div>
                    </div>
                    <div class="">
                        <input type="submit" class="btn btn-primary" name="add" id="add" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Cột chiều rộng 8 -->
    <div class="col-md-8">
        <div class="main-content">
            <!-- Nội dung của cột 9 -->
            <h4 class="card-title">DANH SÁCH LOẠI MÓN</h4>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Tên</th>

                                <th>Trạng Thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>Trevor Baker</td>
                                <td><span class="badge bg-label-info me-1">Scheduled</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>