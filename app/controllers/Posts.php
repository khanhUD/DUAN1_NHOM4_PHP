<?php
class Posts extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  'chi tiết sản phẩm';
        $this->data['content'] = 'admin/posts/add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function edit($id = 0)
    {

        $this->data['sub_content']['title'] =  'chi tiết sản phẩm';
        $this->data['content'] = 'admin/posts/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
}
