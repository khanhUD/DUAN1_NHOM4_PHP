<?php
class Home extends Controller
{
  public $data = [];
  public $model_home;
  public function __construct()
  {
    $this->model_home = $this->model('HomeModel');
  }
  public function index()
  {
    $data = $this->model_home->getList();
    $this->data['sub_content']['title'] =  'Thêm tài khoản';
    $this->data['content'] = 'admin/home/dashboard';
    $this->render('layouts/admin_layout', $this->data);
  }
}
