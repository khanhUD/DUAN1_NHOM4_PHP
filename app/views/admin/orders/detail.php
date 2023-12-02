<!-- Vĩnh -->
<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <div class="d-flex align-items-center ">
                <a href="<?= _WEB_ROOT . 'orders'; ?>">
                    <h4 class="card-title">HÓA ĐƠN </h4>
                </a>
                <P>--</P>
                <h6>CHI TIẾT</h6>
            </div>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>       
                                <th>Tên món ăn</th>
                                <th>hình</th>
                                <th>số lượng</th>
                                <th>giá</th>                     
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($orders_details as $items): ?>
                            <tr>                            
                                <td>
                                <?=$items['name'] ?>
                                </td>
                                <td><?=$items['image'] ?> </td>
                                <td><?=$items['quantity'] ?></td>
                                <td>
                                <?=$items['price'] ?>
                                </td>
                             
                            </tr>
                            <?php endforeach  ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>