<?php

class ProductsCommentsController extends Controller {
    public $data = [];
    public function index() {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/productsComments/comment';
        $this->render('layouts/admin_layout', $this->data);
    }
}