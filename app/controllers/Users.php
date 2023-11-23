<?php
class Users extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  'Thêm tài khoản';
        $this->data['content'] = 'admin/users/add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function edit()
    {
        $this->data['sub_content']['title'] =  'Sửa tài khoản';
        $this->data['content'] = 'admin/users/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
}
