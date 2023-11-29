<?php

class ProductsController extends Controller {
    public $data = [], $products, $productCategories;
    public function __construct()
    {
        $this->productCategories = $this->model('ProductCategoriesModel');
    }

    public function index() {
 
        $this->data['sub_content']['productCategories'] = $this->productCategories->getList(); // lấy danh sách loại sản phẩm
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/products/add';
        $this->render('layouts/admin_layout', $this->data);
    }
}