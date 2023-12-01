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
    
}
