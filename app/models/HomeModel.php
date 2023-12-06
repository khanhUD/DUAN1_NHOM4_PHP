<?php
class HomeModel extends Model
{
    private $_table = '';
    private $_field = '*';

    function tableFill()
    {
        return '';
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'id';
    }



    public function totalRevenue($get_month)
    {
        $data = $this->db->query("SELECT
        MONTH(o.created_at) AS month,
        COALESCE(SUM(o.total_money), 0) AS total_revenue
    FROM
        orders o
    WHERE
        (o.status = 'accepted' OR o.status = 'delate') AND
        MONTH(o.created_at) = $get_month
    GROUP BY
        month
    ORDER BY
        month")->fetch(PDO::FETCH_ASSOC);
        if (empty($data)) {
            return ['total_revenue' => 0];
        }
        return $data;
    }

    public function totalOders($get_month)
    {
        $data = $this->db->query("SELECT COUNT(id) AS total_oders FROM
            orders WHERE status IN ('accepted', 'deleted')
            AND MONTH(created_at) = $get_month")->fetch(PDO::FETCH_ASSOC);
        if (empty($data)) {
            // Return a default structure with total_table_orders set to 0
            return ['total_oders' => 0];
        }
        return $data;
    }
    public function totalOderTable($get_month)
    {
        $data = $this->db->query("SELECT MONTH(ot.created_at)
         AS month, COALESCE(COUNT(ot.id), 0) AS total_table_orders FROM
          orders_table ot WHERE ot.status IN ('accepted', 'delate') AND
           MONTH(ot.created_at) =$get_month
            GROUP BY month ORDER BY month;
        ")->fetch(PDO::FETCH_ASSOC);
        if (empty($data)) {
            // Return a default structure with total_table_orders set to 0
            return ['total_table_orders' => 0];
        }

        return $data;
    }


    public function totalRevenueByMonth($get_month)
    {
        // Tạo bảng tạm thời chứa tất cả các tháng từ 1 đến $get_month
        $tempTable = [];
        for ($i = 1; $i <= $get_month; $i++) {
            $tempTable[] = "SELECT $i AS month";
        }

        // Kết hợp các truy vấn UNION để tạo bảng chứa tất cả các tháng
        $unionQuery = implode(' UNION ', $tempTable);

        // Truy vấn chính: Liên kết với bảng tạo từ UNION để lấy doanh thu
        $data = $this->db->query("
            SELECT
                t.month,
                CASE t.month
                    WHEN 1 THEN 'Tháng 1'
                    WHEN 2 THEN 'Tháng 2'
                    WHEN 3 THEN 'Tháng 3'
                    WHEN 4 THEN 'Tháng 4'
                    WHEN 5 THEN 'Tháng 5'
                    WHEN 6 THEN 'Tháng 6'
                    WHEN 7 THEN 'Tháng 7'
                    WHEN 8 THEN 'Tháng 8'
                    WHEN 9 THEN 'Tháng 9'
                    WHEN 10 THEN 'Tháng 10'
                    WHEN 11 THEN 'Tháng 11'
                    WHEN 12 THEN 'Tháng 12'
                    ELSE ''
                END AS ten_thang,
                COALESCE(SUM(o.total_money), 0) AS total_revenue
            FROM
                ($unionQuery) AS t
            LEFT JOIN
                orders o ON t.month = MONTH(o.created_at) AND o.status = 'accepted'
            GROUP BY
                t.month, ten_thang
            ORDER BY
                t.month
        ")->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function totalOrdersByMonth($get_month)
    {
        // Tạo bảng tạm thời chứa tất cả các tháng từ 1 đến $get_month
        $tempTable = [];
        for ($i = 1; $i <= $get_month; $i++) {
            $tempTable[] = "SELECT $i AS month";
        }

        // Kết hợp các truy vấn UNION để tạo bảng chứa tất cả các tháng
        $unionQuery = implode(' UNION ', $tempTable);

        // Truy vấn chính: Liên kết với bảng tạo từ UNION để đếm số đơn hàng
        $data = $this->db->query("
            SELECT
                t.month,
                COALESCE(COUNT(o.id), 0) AS total_orders
            FROM
                ($unionQuery) AS t
            LEFT JOIN
                orders o ON t.month = MONTH(o.created_at)
            GROUP BY
                t.month
            ORDER BY
                t.month
        ")->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function totalCategoriByMonth($get_month)
    {
        $data = $this->db->query("
        SELECT
    pc.name AS category_name,
    (SUM(od.quantity * od.price) / total_monthly_revenue) * 100 AS percentage_revenue
FROM
    order_details od
JOIN orders o ON od.order_id = o.id
JOIN products p ON od.product_id = p.id
JOIN product_categories pc ON p.product_category_id = pc.id
JOIN (
    SELECT
        SUM(od.quantity * od.price) AS total_monthly_revenue
    FROM
        order_details od
    JOIN orders o ON od.order_id = o.id
    WHERE
        MONTH(o.created_at) = $get_month
) AS monthly_revenue
WHERE
    MONTH(o.created_at) = $get_month
GROUP BY
    pc.name, total_monthly_revenue
ORDER BY
    percentage_revenue DESC;

    ")->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}
