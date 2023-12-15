<?php

class ClientProfileController extends Controller
{

    public $profile, $products, $data = [];

    public function __construct()
    {
        $this->profile = $this->model('UsersModel');
        $this->products = $this->model('ProductsModel');
    }

    public function index()
    {
        $request = new Request;
        $id = $_SESSION['users']['id'];
        $this->data['sub_content']['profile'] = $this->profile->getDetail($id);
        $this->data['sub_content']['count_view'] = $this->products->getProductCountView();
        $this->data['content'] = 'clients/profile';
        $this->render('layouts/client_layout', $this->data);
    }
    public function updateProfile()
    {
        $request = new Request;
        if ($request->isPost()) {
            $postValues = $request->getFields(); //layid
            $id = $postValues['id'];
            $data = [
                'full_name' => $postValues['full_name'],
                'email' => $postValues['email'],
                'phone' => $postValues['phone'],
            ];
            $image = $postValues['image'];
            $targetDir = "public/uploads/";
            $targetFile = $targetDir . basename($image["name"]);

            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                echo "Tệp " . basename($image["name"]) . " đã được tải lên thành công.";
                $data['image'] = $postValues['image']['name'];
            } else {
                // Ảnh cũ đã tồn tại, sử dụng ảnh cũ
                $data['image'] = $postValues['imageOld'];
            }
            $result = $this->profile->updateUsers($data, $id);
            if ($result) {
                Session::flash('msg', 'Sửa thành công !');
                $response = new Response();
                $response->redirect(_WEB_ROOT.'Tai-Khoan');
            }
        }
    }
}
