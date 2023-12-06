<?php

class HomeController extends Controller
{
    public $data = [], $home;

    public function __construct()
    {
        $this->home = $this->model('HomeModel');
    }
    public function index()
    {
        $get_month = date('m');
        $this->data['sub_content']['get_month'] = date('m');
        $this->data['sub_content']['revenue'] = $this->home->totalRevenue($get_month);
        $this->data['sub_content']['oders'] = $this->home->totalOders($get_month);
        $this->data['sub_content']['oderTables'] = $this->home->totalOderTable($get_month);
        $this->data['sub_content']['revenuebyMonth'] = $this->home->totalRevenueByMonth($get_month);
        $this->data['sub_content']['ordersbyMonth'] = $this->home->totalOrdersByMonth($get_month);
        $this->data['sub_content']['revenueCategories'] = $this->home->totalCategoriByMonth($get_month);


    //    print_r($this->data['sub_content']['ordersbyMonth']);die();

        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/home/dashboard';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function byMonth()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $get_month = $postValues['get_month'];
        $this->data['sub_content']['get_month'] =  $get_month;
        $this->data['sub_content']['revenue'] = $this->home->totalRevenue($get_month);
        $this->data['sub_content']['oders'] = $this->home->totalOders($get_month);
        $this->data['sub_content']['oderTables'] = $this->home->totalOderTable($get_month);
        $get_monthCurrent = date('m');
        $this->data['sub_content']['revenuebyMonth'] = $this->home->totalRevenueByMonth($get_monthCurrent);
        $this->data['sub_content']['ordersbyMonth'] = $this->home->totalOrdersByMonth($get_month);
        $this->data['sub_content']['revenueCategories'] = $this->home->totalCategoriByMonth($get_month);
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/home/dashboard';
        $this->render('layouts/admin_layout', $this->data);
    }
}
