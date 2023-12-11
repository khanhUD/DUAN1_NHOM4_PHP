<?php

class ClientOrdersController extends Controller
{

    public $ordersClient, $data = [];

    public function __construct()
    {
        $this->ordersClient = $this->model('OrdersModel');
    }

    public function index()
    {

        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'clients/orders';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }
    public function orderManagement()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $this->data['sub_content']['orders'] = $this->ordersClient->getOrderManagerById($id);
        $this->data['content'] = 'clients/orderManagement';
        $this->render('layouts/client_layout', $this->data);
    }
    public function updateStatuOrderClient()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $data = [
            'status' => $postValues['status'],
        ];
        $result = $this->ordersClient->updateStatus($data, $id);
        if ($result) {
            $response = new Response();
            $response->redirect(_WEB_ROOT . 'quan-ly-hoa-don?id='.$_SESSION['users']['id']);
        }
    }
}
