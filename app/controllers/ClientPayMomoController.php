<?php

class ClientPayMomoController extends Controller
{

    public $pays, $data = [], $orders, $orderDetails, $totalAmount;

    public function __construct()
    {
        $this->orders = $this->model('OrdersModel');
        $this->orderDetails = $this->model('OrderDetailsModel');
    }
    public function payMomo()
    {
        function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data)
                )
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
        }


        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh Toán Qua Ví MoMo";
        $amount = '20000';
        $orderId = time() . "";
        $redirectUrl = _WEB_ROOT . 'trang-chu';
        $ipnUrl = _WEB_ROOT . 'trang-chu';
        $extraData = "";



        $partnerCode = $partnerCode;
        $accessKey = $accessKey;
        $serectkey = $secretKey;
        $orderId = $orderId; // Mã đơn hàng
        $orderInfo = $orderInfo;
        $amount = $amount;
        $ipnUrl = $ipnUrl;
        $redirectUrl = $redirectUrl;
        $extraData = $extraData;

        $requestId = time() . "";
        $requestType = "payWithATM";
        $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );

        $users_id = $_POST['users_id'];
        $total_money = $_POST['total_money'];
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $note = $_POST['note'];
      
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there

        header('Location: ' . $jsonResult['payUrl']);

        if (isset($_SESSION['cart'])) {
            $request = new Request;

            if ($request->isPost()) {
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
                }
                // Hiển thị hóa đơn
                if ($resultOrders && $resultOrderDetails) {
                    $user_id = $postValues['user_id'];
                    $this->data['sub_content']['title'] = '';
                    $this->data['sub_content']['inforUser'] = $this->orders->getInfoUsers($orderID, $user_id);
                    $this->data['sub_content']['orders'] = $this->orderDetails->getOrderClient($orderID);
                    $this->data['content'] = 'clients/orders';
                    $this->render('layouts/client_layout', $this->data);
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
