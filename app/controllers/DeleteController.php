<?php

class DeleteController extends Controller {
    public $banner, $orderTables;

    public function __construct()
    {
        $this->banner = $this->model('BannerModel');

        $this->orderTables = $this->model('OrderTablesModel');

    }

    public function banner() {

        $request = new Request;
        if($request->isPost()) {
            $id = $request->getFields()['id'];
            $this->banner->deleteBanner($id);
            $response = new Response;
            $response->redirect('banner');
        }
    }

}