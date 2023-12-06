<?php

class OrderTablesController extends Controller
{
    public $data = [], $orderTables;
    public function __construct()
    {
        $this->orderTables = $this->model('OrderTablesModel');
    }
    public function index()
    {
        $this->data['sub_content']['orderTables'] = $this->orderTables->getList();
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/orderTables/list';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function list_hidden(){
        $this->data['sub_content']['orderTables'] = $this->orderTables->getListHidden();
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/orderTables/list_hidden';
        $this->render('layouts/admin_layout', $this->data); 
    }
    public function updateHidden()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id']; 
        $data = [
            'status' => 'delate'
        ];
      
        $result = $this->orderTables->updateStatusOrderTables($data, $id);

        if ($result) {
            $response = new Response();
            $response->redirect(_WEB_ROOT .'orderTables');
        }
    }
}
