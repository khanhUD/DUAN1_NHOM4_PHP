<?php

class PostCommentsController extends Controller {
    public $data = [];
    public function index() {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/postComments/comment';
        $this->render('layouts/admin_layout', $this->data);
    }
}