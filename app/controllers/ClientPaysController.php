<?php

class ClientPaysController extends Controller
{

    public $pays, $data = [], $orders, $orderDetails;

    public function __construct()
    {
        $this->orders = $this->model('OrdersModel');
    }

    public function index()
    {
        if (isset($_SESSION['cart'])) {
            $this->data['sub_content']['title'] = '';
            $this->data['content'] = 'clients/pays';
            $this->data['sub_content']['productCart'] = $_SESSION['cart'];
            $this->render('layouts/client_layout', $this->data);
        } else {
            $response = new Response;
            $response->redirect(_WEB_ROOT . 'trang-chu');
            exit();
        }
    }

    public function pays()
    {
        if (isset($_SESSION['cart'])) {
            $request = new Request;

            if ($request->isPost()) {

                $postValues = $request->getFields();

                $dataOrders = [
                    'user_id' => $postValues['user_id'],
                    'total' => $postValues['total'],
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
                        'product_id' => $product['product_id'], 
                        'quantity' => $product['quantity'], 
                        'price' => $product['price'], 
                    ];

                    // Thêm dữ liệu vào bảng orderdetails
                    $this->orderDetails->insertOrderDetails($dataOrderDetails);
                }

                // Hiển thị hóa đơn
                if ($resultOrders) {
                    $response = new Response();
                    $response->redirect(_WEB_ROOT . 'hoa-don');
                }
            }
        } else {
            $response = new Response;
            $response->redirect(_WEB_ROOT . 'trang-chu');
            exit();
        }
    }
}
