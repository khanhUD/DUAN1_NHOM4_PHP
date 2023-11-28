<?php

class ProductCommentsController extends Controller {
    public $data = [];
    public function index() {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/productComments/comment';
        $this->render('layouts/admin_layout', $this->data);
    }
}