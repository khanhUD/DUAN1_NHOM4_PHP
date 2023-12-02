<?php

class OrdersController extends Controller
{
    public $data = [], $orders;
    public function __construct()
    {
        $this->orders = $this->model('OrdersModel');
    }
    public function index()
    {
        $this->data['sub_content']['orders'] = $this->orders->getList();
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/orders/list';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function detail()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id']; //layid
        $this->data['sub_content']['orders_details'] = $this->orders->getListDetail($id);
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/orders/detail';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function list_hidden()

    {
        $this->data['sub_content']['orders_hidden'] = $this->orders->getListHidden();
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/orders/list_hidden';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function edit_hidden()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id']; //layid
        $data = [
            'status' => 'delate'
        ];
        $result = $this->orders->updateStatus($data, $id);

        if ($result) {
            $response = new Response();
            $response->redirect('orders');
        }
    }

    public function edit_restore()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id']; //layid
        $data = [
            'status' => 'accepted'
        ];
        $result = $this->orders->updateStatus($data, $id);

        if ($result) {
            $response = new Response();
            $response->redirect('orders/list_hidden');
        }
    }
}
