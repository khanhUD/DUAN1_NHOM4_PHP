<?php

class ProductsController extends Controller {
    public $data = [];
    public function index() {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/products/add';
        $this->render('layouts/admin_layout', $this->data);
    }
}