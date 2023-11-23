<?php
class Posts extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  'Thêm bài viết';
        $this->data['content'] = 'admin/posts/add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function edit()
    {
        $this->data['sub_content']['title'] =  'Sửa bài viết';
        $this->data['content'] = 'admin/posts/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
}
