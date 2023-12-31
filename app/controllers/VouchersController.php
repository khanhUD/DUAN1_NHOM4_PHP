<?php

class VouchersController extends Controller
{
    public $data = [], $vouchers;

    public function __construct()
    {
        $this->vouchers = $this->model('VouchersModel');
    }

    public function index()
    {
        $this->data['sub_content']['vouchers'] = $this->vouchers->getList(); //Lấy danh sách vouchers = $data = 3 vouchers
        $this->data['sub_content']['title'] = 'Thêm bài viết';
        $this->data['content'] = 'admin/vouchers/add';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function add()
    {
        $request = new Request;
        if ($request->isPost()) {
            $request->rules([
                'code' => 'unique:vouchers:code'
            ]);

            $request->messages([
                'code.unique' => 'Code đã tồn tại, vui lòng nhập Code mới'
            ]);

            $validate = $request->validate();

            if (!$validate) {
                Session::flash('msg', 'Code đã tồn tại, vui lòng nhập Code mới');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response  = new Response();
                $response->redirect(_WEB_ROOT .'vouchers');
            }
            $postValues = $request->getFields();

            $data = [
                'code' => $postValues['code'],
                'discount_percentage' => $postValues['discount_percentage'],
                'number_limit' => $postValues['number_limit'],

            ];

            $result = $this->vouchers->addVouchers($data);
            if ($result) {
                $response = new Response();

                $response->redirect(_WEB_ROOT .'vouchers');
            }
        }
    }
    public function edit()
    {
        $request = new Request;
        $id = $request->getFields()['id'];
        $this->data['sub_content']['vouchers'] = $this->vouchers->getDetail($id);
        $this->data['content'] = 'admin/vouchers/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function post_edit()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $data = [
            'code' => $postValues['code'],
            'discount_percentage' => $postValues['discount_percentage'],
            'number_limit' => $postValues['number_limit'],
            'status' => $postValues['status'],
        ];

        $result = $this->vouchers->updateVouchers($data, $id);
        if ($result) {
            $response = new Response();
            $response->redirect(_WEB_ROOT .'vouchers');
        }
    }
    public function updateStatus()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $data = [
            'status' => $postValues['status'],
        ];
        $result = $this->vouchers->updateVouchers($data, $id);
        if ($result) {
            $response = new Response();
            $response->redirect(_WEB_ROOT .'vouchers');
        }
    }
    public function list_hidden()
    {
        $this->data['sub_content']['list_hidden'] = $this->vouchers->getListHidden();
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/vouchers/list_hidden';
        $this->render('layouts/admin_layout', $this->data);
    }
}
