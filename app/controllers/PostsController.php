<?php

class PostsController extends Controller {
    public $data = [] ,$posts;
    public function __construct()
    {
        $this->posts = $this->model('PostsModel');
    }
    public function index() {
        $this->data['sub_content']['posts'] = $this->posts->getList();
        $this->data['sub_content']['title'] = 'Thêm bài viết';
        $this->data['content'] = 'admin/posts/add';
        $this->render('layouts/admin_layout', $this->data);
    }
}