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

            $request->rules([
                'email' => 'unique:users:email'
            ]);

            $request->messages([
                'email.unique' => 'đã ton taio'
            ]);

            $validate = $request->validate();

            if (!$validate) {
                Session::flash('msg', 'Email đã tồn tại, vui lòng nhập email mới');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());
                $response  = new Response();
                $response->redirect(_WEB_ROOT . 'users');
            }
            $postValues = $request->getFields();
            $image = $postValues['image'];
            $targetDir = "public/uploads/";
            $targetFile = $targetDir . basename($image["name"]);
            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                echo "Tệp " . basename($image["name"]) . " đã được tải lên thành công.";
            } else {
            }

            $data = [
                'image' => $postValues['image']['name'],
                'full_name' => $postValues['full_name'],
                'email' => $postValues['email'],
                'password' => md5($postValues['password']),
                'role' => $postValues['role'],
                'phone' =>  $postValues['phone'],

            ];

            $result = $this->users->addUsers($data);

            if ($result) {
                $response = new Response();
                $response->redirect(_WEB_ROOT . 'users');
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
        if ($request->isPost()) {
            $postValues = $request->getFields(); //layid
            $id = $postValues['id'];
            $data = [
                'full_name' => $postValues['full_name'],
                'email' => $postValues['email'],
                'password' => md5($postValues['password']),
                'role' => $postValues['role'],
                'status' => $postValues['status'],
                'phone' => $postValues['phone'],
            ];
            $image = $postValues['image'];
            $targetDir = "public/uploads/";
            $targetFile = $targetDir . basename($image["name"]);

            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                echo "Tệp " . basename($image["name"]) . " đã được tải lên thành công.";
                $data['image'] = $postValues['image']['name'];
            } else {
                $data['image'] = $postValues['imageOld'];
            }


            $result = $this->users->updateUsers($data, $id);

            if ($result) {
                $response = new Response();
                $response->redirect(_WEB_ROOT . 'users');
            }
        }
    }
    public function delete()
    {
        $request = new Request;
        if ($request->isPost()) {
            $id = $request->getFields()['id'];
            $this->users->deleteUsers($id);
            $response = new Response;
            $response->redirect(_WEB_ROOT . 'users');
        }
    }

    // client 
    public function register()
    {
        $request = new Request;

        if ($request->isPost()) {
            $request->rules([
                'email' => 'unique:users:email'
            ]);

            $request->messages([
                'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới'
            ]);

            $validate = $request->validate();

            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra, vui lòng kiểm tra và sửa lại.');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response = new Response();
                $response->redirect(_WEB_ROOT . 'users'); // hoặc chuyển hướng đến trang khác tùy ý
                return; // dừng thực thi
            }

            $postValues = $request->getFields();
            $data = [
                'full_name' => $postValues['full_name'],
                'email' => $postValues['email'],
                'password' => md5($postValues['password']),
                'phone' =>  $postValues['phone'],
            ];

            $result = $this->users->addUsers($data);

            if ($result) {
                $response = new Response();
                $response->redirect(_WEB_ROOT . 'Dang-Nhap');
                return; // dừng thực thi
            }
        }
    }

    public function change_password()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $check = $this->users->checkPassword($id);

        if ($check['password'] === md5($postValues['password_old'])) {
            $data = [
                'password' => md5($postValues['password']),
            ];

            $result = $this->users->updateUsers($data, $id);

            if ($result) {
                $response = new Response();
                $response->redirect('Dang-Nhap');
            }
        }

        $response = new Response();
        Session::flash('msg', 'Sai thông tin !');
        $response->redirect('Doi-Mat-Khau');
    }
    public function changePass()
    {
        echo ' xin chào';
    }
    public function checkLogin()
    {
        // Kiểm tra xem form đăng nhập đã được gửi hay chưa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy thông tin đăng nhập từ form
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $result = $this->users->checkUsers($email, $password);
            // Nếu đăng nhập thành công
            if ($result) {
                $_SESSION["users"] = $result;
                $response = new Response;
                $response->redirect(_WEB_ROOT . 'Trang-Chu');
                exit();
            } else {
                $response = new Response;
                Session::flash('msg', 'Đăng nhập không thành công. Vui lòng kiểm tra lại Email và Password !');
                $response->redirect(_WEB_ROOT . 'Dang-Nhap');
            }
        }
    }
}
