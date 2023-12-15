<?php

class ClientAboutUsController extends Controller
{

    public $aboutUs, $products, $data = [];

    public function __construct()
    {
        $this->products = $this->model('ProductsModel');
    }

    public function index()
    {
        
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'clients/about';
        $this->data['sub_content']['count_view'] = $this->products->getProductCountView();
        $this->render('layouts/client_layout', $this->data);

    }
}
