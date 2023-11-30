<?php

class VouchersController extends Controller   {
    public $data = [],$vouchers;

    public function __construct() {
        $this->vouchers = $this->model('VouchersModel');
    }

    public function index() {
        $this->data['sub_content']['vouchers'] = $this->vouchers->getList(); //Lấy danh sách vouchers = $data = 3 vouchers
        $this->data['sub_content']['title'] = 'Thêm bài viết';
        $this->data['content'] = 'admin/vouchers/add';
        $this->render('layouts/admin_layout', $this->data);
    }

    // public function add() {
    //     $this->data['sub_content']['vouchers'] = $this->vouchers->getList();
    //     $this->data['content'] = 'admin/vouchers/add';
    //     $this->render('layouts/admin_layout', $this->data);
    // }

    // public function edit() {
    //     $this->data['sub_content']['title'] = 'Thêm bài viết';
    //     $this->data['sub_content']['vouchers'] = $this->vouchers->getList();
    //     $this->data['content'] = 'admin/vouchers/edit';
    //     $this->render('layouts/admin_layout', $this->data);
    // }
}