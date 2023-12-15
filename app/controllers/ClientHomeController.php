<?php

class ClientHomeController extends Controller
{

    public $data = [],$banner, $home,$products,$productCategories,$posts,$users;

    public function __construct()
    {
        $this->posts = $this->model('PostsModel');
        $this->products = $this->model('ProductsModel');
        $this->productCategories = $this->model('ProductCategoriesModel');
        $this->home = $this->model('ClientHomeModel');
        $this->banner = $this->model('BannerModel');
        $this->users = $this->model('UsersModel');
        // $this->products = $this->model('ProductsModel');
        // $this->productCategories = $this->model('ProductCategoriesModel');
        // $this->posts = $this->model('PostsModel');
       
    }
    public function index(){
        // load danh mục 
        $this->data['sub_content']['productCategories'] = $this->productCategories->getListCategoriesClient();
        // load món ăn 
        $this->data['sub_content']['products'] = $this->products->getListProductHomeClient();

        $this->data['sub_content']['count_view'] = $this->products->getProductCountView();

        $this->data['sub_content']['posts'] = $this->posts->getListHomeClient();

        $this->data['sub_content']['banner'] = $this->banner->getListClient();
        
        $this->data['sub_content']['users'] = $this->users->CountUsers();
        $this->data['sub_content']['title'] = 'Trang chủ';
        $this->data['content'] = 'clients/home';
        $this->render('layouts/client_layout', $this->data);
    }
    
}
