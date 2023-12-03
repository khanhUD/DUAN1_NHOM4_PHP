<?php

class AdminController extends Controller
{

    public $data = [], $admin;

    public function __construct()
    {
       $this->admin = $this->model('AdminModel');
    }
    public function index(){

    }

    public function login()
    {      
       $this->render('login/sing_in');
    }
    public function register()
    {   
        $request = new Request;   
        $this->render('login/sing_up');
        if($request->isPost()) {
            $postDatas = $request->getFields();
            $result = $this->admin->register($postDatas);
            if($result) {
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
