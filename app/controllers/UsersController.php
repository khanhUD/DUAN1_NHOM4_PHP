<?php

class UsersController extends Controller
{
    public $data = [], $users;
    public function __construct()
    {
        $this->users = $this->model('UsersModel');
    }
    public function index()
    {
        $this->data['sub_content']['users'] = $this->users->getList();
        $this->data['sub_content']['title'] = 'Thêm và Danh sách tài khoản';
        $this->data['content'] = 'admin/users/add';
        $this->render('layouts/admin_layout', $this->data);
        $request = new Request;
        if ($request->isPost()) {
            $postValues = $request->getFields();
            $image = $postValues['image'];
            $targetDir = "public/uploads/";
            $targetFile = $targetDir . basename($image["name"]);
            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                echo "Tệp " . basename($image["name"]) . " đã được tải lên thành công.";
            } else {
                // echo "Có lỗi xảy ra khi tải lên tệp.";
            }

            $data = [
                'image' => $postValues['image']['name'],
                'full_name' => $postValues['full_name'],
                'email' => $postValues['email'],
                'password' => $postValues['password'],
                'role' => $postValues['role'],

            ];

            $result = $this->users->addUsers($data);

            if ($result) {
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                $response = new Response();
                $response->redirect('users');
            }
        }
    }
    // lay ve hien thi len form sua 
    public function edit()
    {
        $request = new Request;
        $id = $request->getFields()['id'];
        $this->data['sub_content']['users_detail'] = $this->users->getDetail($id);
        $this->data['content'] = 'admin/users/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
    // update  
    public function edit_post()
    {
        $request = new Request;
        $postValues = $request->getFields(); //layid
        $id = $postValues['id'];
        $data = [
            'full_name' => $postValues['full_name'],
            'email' => $postValues['email'],
            'password' => $postValues['password'],
            'role' => $postValues['role'],
            'status' => $postValues['status'],
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
            echo "Có lỗi xảy ra khi tải lên tệp.";
        }
        

        $result = $this->users->updateUsers($data, $id);

        if ($result) {
            // Nếu thành công chuyển hướng đến danh sách danh mục
            $response = new Response();
            $response->redirect('users');
        }
    }
    public function delete()
    {
        $request = new Request;
        if ($request->isPost()) {
            $id = $request->getFields()['id'];
            $this->users->deleteUsers($id);
            $response = new Response;
            $response->redirect('users');
        }
    }
}
