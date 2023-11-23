<?php
class Vouchers extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  'Thêm vouchers';
        $this->data['content'] = 'admin/vouchers/add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function edit()
    {
        $this->data['sub_content']['title'] =  'Sửa vouchers';
        $this->data['content'] = 'admin/vouchers/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
}
