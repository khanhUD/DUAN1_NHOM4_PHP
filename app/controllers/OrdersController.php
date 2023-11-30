<?php

class OrdersController extends Controller {
    public $data = [],$orders;
    public function __construct()
    {
        $this->orders = $this->model('OrdersModel');
    }
    public function index() {
        $this->data['sub_content']['orders'] = $this->orders->getList();
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/orders/list';
        $this->render('layouts/admin_layout', $this->data);

    }
    public function detail() {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/orders/detail';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function list_hidden() {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/orders/list_hidden';
        $this->render('layouts/admin_layout', $this->data);
    }
}