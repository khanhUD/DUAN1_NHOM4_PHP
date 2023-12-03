<?php

class ClientOrdersController extends Controller
{

    public $orders, $data = [];

    public function __construct()
    {
        
    }

    public function index()
    {
        
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'clients/orders';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }
}
