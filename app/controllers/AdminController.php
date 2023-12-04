<?php

class AdminController extends Controller
{

    public $data = [], $admin, $users;

    public function __construct()
    {
        $this->users = $this->model('UsersModel');
    }
    public function index()
    {
    }

    public function login()
    {
        $this->render('login/sing_in');
    }
    public function checkLogin()
    {
        // Kiểm tra xem form đăng nhập đã được gửi hay chưa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy thông tin đăng nhập từ form
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->users->checkUsers($email, $password);
            // Nếu đăng nhập thành công
            if ($result) {
                Session::data('users', $result);
                $response = new Response;
                $response->redirect(_WEB_ROOT . '/ClientHome');
                exit();          
            } else {
                $response = new Response;
                Session::flash('msg', 'Đăng nhập không thành công. Vui lòng kiểm tra lại Email và Password !');
                $response->redirect('login');
            }
        }
    }

    public function register()
    {
        $request = new Request;
        $this->render('login/sing_up');
        if ($request->isPost()) {
            $postDatas = $request->getFields();
            $result = $this->admin->register($postDatas);
            if ($result) {
                $response = new Response;
                Session::flash('msg', 'dang nhap thanh cong !');
                $response->redirect('login');
            }
        }
    }

    public function forgot_password()
    {
        $this->render('login/forgot_password');
    }
    public function change_password()
    {
        $this->render('login/change_password');
    }
}
