<h2 class="mb-4">Dashboard</h2>

<div class="row col-md-12">
    <div class="mb-3 col-md-4">
        <form action="<?= _WEB_ROOT ?>home/byMonth" method="post">
            <div class="row ">
                <div class="col-md-8">
                    <select class="form-control" name="get_month">
                        <?php
                        $monthsInVietnamese = array(
                            "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6",
                            "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"
                        );

                        for ($month = 1; $month <= 12; $month++) {
                            $monthName = $monthsInVietnamese[$month - 1];
                            $selected = ($month == $get_month) ? 'selected' : '';
                        ?>
                            <option value='<?= $month ?>' <?= $selected ?>><?= $monthName ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>

                <div class="col-md-4"><input class="btn btn-primary ml-2" type="submit" value="Chọn"></div>

            </div>
        </form>
    </div>

</div>

<div class="row">

    <!-- Total Revenue Card -->
    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-chart-line"></i>Doanh Thu</h5>
                <p class="card-text"><?= number_format($revenue['total_revenue'], 0, ',', '.') . ' VNĐ'  ?></p>
            </div>
        </div>
    </div>

    <!-- Total Orders Card -->
    <div class="col-md-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Tổng Đơn Đặt Món</h5>
                <p class="card-text"><?= $oders['total_oders'] ?></p>
            </div>
        </div>
    </div>

    <!-- Total Reservations Card -->
    <div class="col-md-4">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-calendar-alt"></i> Tổng Đơn Đặt Bàn</h5>
                <p class="card-text"><?= $oderTables['total_table_orders'] ?></p>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <!-- Biểu đồ cột -->
    <div class="col-md-12 col-lg-8">
    
         
            <canvas id="revenueChart" width="800" height="400"></canvas>

<!-- Script để vẽ biểu đồ -->
<script>
                var chartData = <?= json_encode($revenuebyMonth); ?>;
                var labels = chartData.map(item => item.ten_thang);
            var doanhThu = chartData.map(item => item.total_revenue);
    // Điều chỉnh dữ liệu theo kết quả trả về từ hàm totalRevenueByMonth
    var data = {
        labels: labels,
        datasets: [{
    label: 'Tổng Doanh Thu',
    data: doanhThu,
    backgroundColor: 'rgba(75, 192, 192, 0.2)',
    borderColor: 'rgba(75, 192, 192, 1)',
    borderWidth: 1,
}]
    };

    // Lấy thẻ canvas và vẽ biểu đồ cột
    var ctx = document.getElementById('revenueChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

    </div>

    <!-- Biểu đồ tròn -->
    <div class="col-md-12 col-lg-4">
        <canvas id="myPieChart"></canvas>
        <script>
                var chartData = <?= json_encode($revenueCategories); ?>;
                var labels = chartData.map(item => item.category_name);
            var phanTram = chartData.map(item => item.percentage_revenue);	

            var dataPie = {
                labels: labels,
                datasets: [{
                    data: phanTram,
                    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4CAF50"]
                }]

            };

            var ctxPie = document.getElementById('myPieChart').getContext('2d');
            var myPieChart = new Chart(ctxPie, {
                type: 'doughnut',
                data: dataPie,
                options: {
                    legend: {
                        display: true,
                        position: 'bottom', // Thiết lập vị trí ở dưới biểu đồ
                        labels: {
                            boxWidth: 15, // Độ rộng của hộp màu
                            fontSize: 14, // Kích thước chữ
                            padding: 10 // Khoảng cách giữa chữ và hộp màu
                        }
                    }
                }
            });
        </script>
    </div>


</div>