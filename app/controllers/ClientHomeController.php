<?php

class ClientHomeController extends Controller
{

    public $data = [],$banner, $home,$products,$productCategories,$posts;

    public function __construct()
    {
        $this->home = $this->model('ClientHomeModel');
        // $this->banner = $this->model('BannerModel');
        // $this->products = $this->model('ProductsModel');
        // $this->productCategories = $this->model('ProductCategoriesModel');
        // $this->posts = $this->model('PostsModel');
       
    }
    public function index(){
        // $this->data['sub_content']['home'] = $this->home->getBanner();
        // var_dump( $this->data['sub_content']['banner']);die();
        $this->data['sub_content']['title'] = 'Trang chủ';
        $this->data['content'] = 'clients/home';
        $this->render('layouts/client_layout', $this->data);
    }
    
}
