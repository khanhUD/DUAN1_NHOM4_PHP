<?php
class Oders extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  'Thêm bài viết';
        $this->data['content'] = 'admin/oders/list';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function detail()
    {
        $this->data['sub_content']['title'] =  'Sửa bài viết';
        $this->data['content'] = 'admin/oders/detail';
        $this->render('layouts/admin_layout', $this->data);
    }
}
