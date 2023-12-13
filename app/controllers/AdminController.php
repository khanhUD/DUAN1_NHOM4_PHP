<?php

class AdminController extends Controller
{

    public $data = [], $admin, $users;

    public function __construct()
    {
        $this->users = $this->model('UsersModel');
        $this->admin = $this->model('AdminModel');
    }
    public function index()
    {
    }

    public function login()
    {
        $this->render('login/sing_in');
    }
  
    public function register()
    {
        $this->render('login/sing_up');
    }
    public function forgot_password()
    {

        $this->render('login/forgot_password');
    }
    public function forgot_pass_otp()
    {

        $this->render('login/forgot_pass_otp');
    }
    public function change_password()
    {
        $this->render('login/change_password');
     
    }
    public function change_pass_otp()
    {
        $this->render('login/change_pass_otp');
     
    }
    public function logOut()
    {
        session_destroy();
        $response = new Response;
        $response->redirect(_WEB_ROOT .'Trang-Chu');
    }
 
}
