<?php

class ClientProductsController extends Controller
{

    public $products, $productCategories, $productComments, $data = [];

    public function __construct()
    {
        $this->products = $this->model('ProductsModel');
        $this->productCategories = $this->model('ProductCategoriesModel');
        $this->productComments = $this->model('ProductCommentsModel');
    }

    public function index()
    {
        // load danh mục 
        $this->data['sub_content']['productCategories'] = $this->productCategories->getListCategoriesClient();
        // load món ăn 
        $this->data['sub_content']['products'] = $this->products->getListProductClient();

        $this->data['sub_content']['title'] = 'Danh Sách Danh Mục';
        $this->data['content'] = 'clients/products';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }

    public function products()
    {
        $request = new Request;
        if ($request->isGet()) {
            $postValues = $request->getFields();

            $id = $postValues['id'];

            // Bài viết theo loại 
            $this->data['sub_content']['products'] = $this->products->getListClientByCategory($id);

            // Show phần nav phải 
            $this->data['sub_content']['productCategories'] = $this->productCategories->getListCategoriesClient();
            $this->data['content'] = 'clients/products';
            $this->data['sub_content']['action'] = '';
            $this->render('layouts/client_layout', $this->data);
        }
    }
}
