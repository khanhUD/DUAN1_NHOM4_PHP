<?php

class ClientCartsController extends Controller
{

    public $carts, $products, $vouchers, $data = [];

    public function __construct()
    {
        $this->products = $this->model('ProductsModel');
        $this->vouchers = $this->model('VouchersModel');
    }

    public function index()
    {

        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'clients/carts';
        $this->data['sub_content']['vouchers'] = $this->vouchers->getListClient();
        $this->render('layouts/client_layout', $this->data);
    }
    public function addCart()
    {
        // Kiểm tra nếu giỏ hàng không tồn tại, tạo mới giỏ hàng
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Lấy thông tin sản phẩm từ request
        $request = new Request;
        if ($request->isGet()) {
            $postValues = $request->getFields();
            $id = $postValues['id'];
            $product_categogy_id = $postValues['product_categories_id'];
            $quantity = 1;
            $quantity = $postValues['quantity'];
            $result = $this->products->getDetail($id);

            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
            $found = false;
            if (isset($quantity)) {
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item[5] == $result['id']) {
                        $item[3] += $quantity; // Cộng thêm vào số lượng
                        $item[4] = $item[2] * $item[3]; // Cập nhật thành tiền
                        $found = true;
                        break;
                    }
                }
            } else {
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item[5] == $result['id']) {
                        $item[3] += 1; // Cộng thêm vào số lượng
                        $item[4] = $item[2] * $item[3]; // Cập nhật thành tiền
                        $found = true;
                        break;
                    }
                }
            }
         
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào giỏ hàng
            if (!$found) {
                $result = [$result['name'], $result['image'], $result['price'],$quantity, $result['price'], $result['id'], $result['product_categories_id']];
                $_SESSION["cart"][] = $result;
            }

            // Hiển thị giỏ hàng sau khi thêm sản phẩm
            $this->data['sub_content']['productCart'] = $_SESSION['cart'];
            $response = new Response;
            if (isset($product_categogy_id)) {
                $response->redirect(_WEB_ROOT . 'ClientProducts/productDetails?id=' . $id . '&categories_id=' . $product_categogy_id);
            } else {
                $response->redirect(_WEB_ROOT . 'Thuc-Don');
            }
            exit();
        }
    }

    public function updateCart()
    {
        // Lấy thông tin sản phẩm từ request
        $request = new Request;
        if ($request->isPost()) {
            $postValues = $request->getFields();
            $id = $postValues['id'];
            $quantity = $postValues['quantity'];
            // $index = $postValues['index'];

            $found = false;
            foreach ($_SESSION['cart'] as &$item){
                if ($item[5] == $id) {
                    $item[3] = $quantity; // cập nhật số lượng số lượng
                    $item[4] = $item[2] * $item[3]; // Cập nhật thành tiền
                    $found = true;
                    break;
                }
            }

            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào giỏ hàng
            if (!$found) {
                $result = $this->products->getDetail($id);
                $result = [$result['name'], $result['image'], $result['price'], $quantity, $result['price'] * $quantity, $result['id']];
                $_SESSION["cart"][] = $result;
            }

            // Hiển thị giỏ hàng sau khi thêm sản phẩm
            $this->data['sub_content']['productCart'] = $_SESSION['cart'];

            // Trả về kết quả để hiển thị trên giao diện nếu cần
            $response = new Response;
            $response->redirect(_WEB_ROOT . 'gio-hang');
            exit();
        }
    }


    public function deleteCart()
    {
        unset($_SESSION['cart']);
        $response = new Response;
        $response->redirect(_WEB_ROOT . 'gio-hang');
        exit();
    }
    public function deleteCartItem()
    {

        $request = new Request;
        $postValues = $request->getFields();
        $index = $postValues['index'];
        // Nếu tìm thấy vị trí, xóa sản phẩm
        if ($index !== false) {
            unset($_SESSION['cart'][$index]);
        }

        $response = new Response;
        $response->redirect(_WEB_ROOT . 'gio-hang');
        exit();
    }
}
