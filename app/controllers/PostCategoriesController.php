<?php

class PostCategoriesController extends Controller {
    public $data = [];
    public function index() {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/postCategories/add';
        $this->render('layouts/admin_layout', $this->data);
    }
}