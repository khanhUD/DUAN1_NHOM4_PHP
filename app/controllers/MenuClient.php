<?php
class MenuClient extends Controller
{
  public $data = [];
  public $model_home;
  public function __construct()
  {
    $this->model_home = $this->model('HomeModel');
  }
  public function index()
  {

    $this->data['sub_content']['title'] =  'Ninh kiều restaurant';
    $this->data['content'] = 'clients/menu';
    $this->render('layouts/client_layout', $this->data);
  }
  public function detailed()
  {

    $this->data['sub_content']['title'] =  'Ninh kiều restaurant';
    $this->data['content'] = 'clients/productsDetailed';
    $this->render('layouts/client_layout', $this->data);
  }
}

