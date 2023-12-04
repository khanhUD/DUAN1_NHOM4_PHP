<?php

class ClientHomeController extends Controller
{

    public $data = [],$banner, $home,$products,$productCategories,$posts,$users;

    public function __construct()
    {
        $this->home = $this->model('ClientHomeModel');
        $this->banner = $this->model('BannerModel');
        $this->users = $this->model('UsersModel');
        // $this->products = $this->model('ProductsModel');
        // $this->productCategories = $this->model('ProductCategoriesModel');
        // $this->posts = $this->model('PostsModel');
       
    }
    public function index(){
        $this->data['sub_content']['banner'] = $this->banner->getListClient();
        $this->data['sub_content']['users'] = $this->users->CountUsers();
        $this->data['sub_content']['title'] = 'Trang chủ';
        $this->data['content'] = 'clients/home';
        $this->render('layouts/client_layout', $this->data);
    }
    
}
