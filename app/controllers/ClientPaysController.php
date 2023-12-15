<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ClientPaysController extends Controller
{

    public $mail, $pays, $data = [], $orders, $products, $orderDetails;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->orders = $this->model('OrdersModel');
        $this->orderDetails = $this->model('OrderDetailsModel');
        $this->products = $this->model('ProductsModel');
    }

    public function index()
    {
        if (isset($_SESSION['cart']) && isset($_SESSION['users'])) {
            $this->data['sub_content']['title'] = '';
            $this->data['content'] = 'clients/pays';
            $this->data['sub_content']['productCart'] = $_SESSION['cart'];
            $this->data['sub_content']['count_view'] = $this->products->getProductCountView();
            $this->render('layouts/client_layout', $this->data);
        } else {
            $response = new Response;
            $response->redirect(_WEB_ROOT . 'trang-chu');
            exit();
        }
    }

    public function pays()
    {
        if (isset($_SESSION['cart']) && isset($_SESSION['users'])) {
            $request = new Request;

            if ($request->isPost()) {
                $flag = false;
                $postValues = $request->getFields();
                $dataOrders = [
                    'user_id' => $postValues['user_id'],
                    'total_money' => $postValues['total_money'],
                    'full_name' => $postValues['full_name'],
                    'address' => $postValues['address'],
                    'phone' => $postValues['phone'],
                    'note' => $postValues['note'],
                ];
                // Thêm dữ liệu vào bảng orders
                $resultOrders = $this->orders->insertOrders($dataOrders);
                // Lấy order_id vừa được thêm vào bảng orders
                $orderID = $this->orders->getLastInsertID();
                // Thêm dữ liệu vào bảng orderdetails
                foreach ($_SESSION['cart'] as $product) {
                    $dataOrderDetails = [
                        'order_id' => $orderID,
                        'product_id' => $product[5],
                        'quantity' => $product[3],
                        'price' => $product[2],
                        'total_money' => $product[4],

                    ];
                    // Thêm dữ liệu vào bảng orderdetails
                    $resultOrderDetails = $this->orderDetails->insertOrderDetails($dataOrderDetails);
                    $flag = true;
                }
                // Hiển thị hóa đơn
                if ($resultOrders && $resultOrderDetails) {
                    $user_id = $postValues['user_id'];
                    $this->data['sub_content']['title'] = '';
                    $this->data['sub_content']['inforUser'] = $this->orders->getInfoUsers($orderID, $user_id);
                    $this->data['sub_content']['orders'] = $this->orderDetails->getOrderClient($orderID);
                    $this->data['sub_content']['count_view'] = $this->products->getProductCountView();
                    $this->data['content'] = 'clients/orders';


                    $inforUser = $this->orders->getInfoUsers($orderID, $user_id);
                    $bill  = $this->orderDetails->getOrderClient($orderID);

                    // echo "<pre>";
                    // var_dump($inforUser);
                    // echo "</pre>";
                    // echo "<br>";
                    // echo "<pre>";
                    // var_dump($bill);
                    // echo "</pre>";
                    // die();

                    if ($flag == true) {

                        $receiver = $_SESSION['users']['email'];

                        $product = '';
                        foreach ($bill as $billItems) {

                            $product .= '<tr>
                                            <td style="border: 1px solid #eee; padding: 8px; text-align: left;">#' . $billItems['order_id'] . '</td>
                                            <td style="border: 1px solid #eee; padding: 8px; text-align: left;">' . $billItems['name'] . '</td>
                                            <td style="border: 1px solid #eee; padding: 8px; text-align: left;">' . $billItems['quantity'] . '</td>
                                            <td style="border: 1px solid #eee; padding: 8px; text-align: left;">' . number_format($billItems['total_price_product']) . ' đ</td>
                                        </tr>';
                        }

                        if (is_array($product)) {
                            $product = implode('', $product);
                        }

                        $fullname = $inforUser['full_name'];
                        $address = $inforUser['address'];
                        $note = $inforUser['note'];
                        $phone = $inforUser['phone'];
                        $totalMoney = number_format($inforUser['total_money']);
                        $orderid = $inforUser['id'];

                        $currentDate = date('Y-m-d'); // Biểu diễn ngày tháng

                        $date = new DateTime($currentDate);

                        $year = $date->format('Y');
                        $month = $date->format('m');
                        $day = $date->format('d');


                        try {
                            //Server settings
                            $this->mail->isSMTP();                                            // Send using SMTP
                            $this->mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
                            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $this->mail->Username   = 'khanhnqpc06731@fpt.edu.vn';            // SMTP username
                            $this->mail->Password   = 'ohmy eexw gxan xozw';
                            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            $this->mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                            //Recipients
                            $this->mail->setFrom('khanhnqpc06731@fpt.edu.vn', 'Ninh Kieu Restaurant');
                            $this->mail->addAddress($receiver, 'Recipient Name');     // Add a recipient

                            // Content
                            $this->mail->isHTML(true);                                  // Set email format to HTML
                            $this->mail->Subject = 'Hoa don thanh toan tai Ninh Kieu Restaurant';
                            $this->mail->Body    =
                                '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                                <div style="margin:50px auto;width:70%;padding:20px 0">
                                    <div style="border-bottom:1px solid #eee">
                                        <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Ninh Kiều Restaurant xin chào quý khách</a>
                                    </div>
                                    <div>
                                        <h3 style="color: #00466a">Hóa đơn cho đơn hàng [#' . $orderid . ']</h3>
                                    </div>
                                    <p>Xin chào ' . $fullname . ',</p>
                                    <p>Đây là thông tin đơn hàng mà bạn đã mua ở '.$day.' Tháng '.$month.', '.$year.':</p>
                                    <p>Trả tiền mặt khi nhận hàng</p>
                                    <h4 style="color: #00466a">[Đơn hàng #' . $orderid . '] ('.$day.' Tháng '.$month.', '.$year.')</h4>
                                    <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                                        <thead>
                                            <tr>
                                                <th style="border: 1px solid #eee; padding: 8px; text-align: left;">Mã hóa đơn</th>
                                                <th style="border: 1px solid #eee; padding: 8px; text-align: left;">Sản phẩm</th>
                                                <th style="border: 1px solid #eee; padding: 8px; text-align: left;">Số lượng</th>
                                                <th style="border: 1px solid #eee; padding: 8px; text-align: left;">Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ' . $product . '
                                        </tbody>
                                    </table>
                                    <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                                        <tbody>
                                            <tr>
                                                <th style="border: 1px solid #eee; padding: 8px; text-align: left;">Phí vận chuyển:</th>
                                                <td style="border: 1px solid #eee; padding: 8px; text-align: left;">30,000đ</td>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid #eee; padding: 8px; text-align: left;">Phương thức thanh toán:</th>
                                                <td style="border: 1px solid #eee; padding: 8px; text-align: left;">Trả tiền mặt khi nhận hàng</td>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid #eee; padding: 8px; text-align: left;">Tổng cộng:</th>
                                                <td style="border: 1px solid #eee; padding: 8px; text-align: left;">' . $totalMoney . ' đ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                                        <thead>
                                            <tr>
                                                <th style="border: 1px solid #eee; padding: 8px; text-align: left;">Địa chỉ thanh toán</th>
                                                <th style="border: 1px solid #eee; padding: 8px; text-align: left;">Địa chỉ giao hàng</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="border: 1px solid #eee; padding: 8px; text-align: left;">' . $fullname . '</td>
                                                <td style="border: 1px solid #eee; padding: 8px; text-align: left;">' . $fullname . '</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #eee; padding: 8px; text-align: left;">' . $address . '</td>
                                                <td style="border: 1px solid #eee; padding: 8px; text-align: left;">' . $address . '</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #eee; padding: 8px; text-align: left;">' . $note . '</td>
                                                <td style="border: 1px solid #eee; padding: 8px; text-align: left;">' . $note . '</td>
                                            </tr>
                                            <tr style="border: 1px solid #eee; padding: 8px; text-align: left;">
                                                <td>' . $phone . '</td>
                                                
                                            </tr>
                                            <tr style="border: 1px solid #eee; padding: 8px; text-align: left;">
                                            <td>' . $receiver . '</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p style="font-size:0.9em;">Cảm ơn bạn đã mua hàng tại <a href="" style="color: #00466a;text-decoration:none;">Ninh Kiều Restaurant</a></p>
                                    <hr style="border:none;border-top:1px solid #eee" />
                                    <div style="float:left;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                                        <p>Ninh Kiều Restaurant</p>
                                        <p>Địa chỉ: 02 Đường Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ</p>
                                        <p>Số điện thoại: 0909 1509 09
                                        </p>
                                    </div>
                                </div>
                            </div>';

                            $this->mail->send();
                            if ($this->mail->send()) {
                                $this->render('layouts/client_layout', $this->data);
                            }
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
                        }
                    }

                    unset($_SESSION['cart']);
                }
            }
        } else {
            $response = new Response;
            $response->redirect(_WEB_ROOT . 'trang-chu');
            exit();
        }
    }
}
