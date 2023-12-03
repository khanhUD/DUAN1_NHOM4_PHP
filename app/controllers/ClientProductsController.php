<?php

class ClientProductsController extends Controller
{

    public $products, $data = [];

    public function __construct()
    {
        
    }

    public function index()
    {
        
        // $this->data['sub_content']['aboutUs'] = $this->aboutUs->getListCategories();
        $this->data['sub_content']['title'] = 'Danh Sách Danh Mục';
        $this->data['content'] = 'clients/products';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }
}
