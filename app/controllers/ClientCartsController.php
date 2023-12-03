<?php

class ClientCartsController extends Controller
{

    public $carts, $data = [];

    public function __construct()
    {
        
    }

    public function index()
    {
        
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'clients/carts';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }
}
