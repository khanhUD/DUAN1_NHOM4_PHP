<?php

class DeleteController extends Controller {
    public $banner;

    public function __construct()
    {
        $this->banner = $this->model('BannerModel');
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