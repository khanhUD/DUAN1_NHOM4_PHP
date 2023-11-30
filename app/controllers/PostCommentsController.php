<?php

class PostCommentsController extends Controller {
    public $data = [], $postComments;
    public function __construct()
    {
        $this->postComments = $this->model('PostCommentsModel');
    }
    public function index() {
        $this->data['sub_content']['postComments'] = $this->postComments->getComments();
        $this->data['content'] = 'admin/postComments/comment';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function detail() {
        $this->data['sub_content']['postComments'] = $this->postComments->getComments();
        $this->data['content'] = 'admin/postComments/commentDetail';
        $this->render('layouts/admin_layout', $this->data);
    }


    

}