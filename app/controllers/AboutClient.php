<?php
class AboutClient extends Controller
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
    $this->data['content'] = 'clients/about';
    $this->render('layouts/client_layout', $this->data);
  }
}
