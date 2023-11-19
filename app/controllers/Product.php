<?php
class Product extends Controller

{
    public $data = [];
    public function index()
    {
       $this->render('products/index');
    }
    public function list_product()
    {
        $product = $this->model('ProductModel');
        $dataProduct = $product->getProductList();
        $tile = 'Danh sach sp';
       $this->data['product_list'] = $dataProduct;
       $this->data['page_tile'] = $tile;
        // render view 
        $this->render('products/list', $this->data);
    }
    public function detail($id=0){
        $product = $this->model('ProductModel');
        $this->data['info'] =  $product->getDetail($id);
        $this->render('products/detail', $this->data);
    }
}
