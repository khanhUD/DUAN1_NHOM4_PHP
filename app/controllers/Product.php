<?php
class Product extends Controller

{
    public $data = [];
    public function index()
    {
       $this->render('products/index');
       $this->render('layouts/admin_layout', $this->data);

    }
    public function list_product()
    {
        $product = $this->model('ProductModel');
        $dataProduct = $product->getProductList();
        $tile = 'Danh sach sp';
       $this->data['sub_content']['product_list'] = $dataProduct;
       $this->data['sub_content']['page_tile'] = $tile;
        // render view 
        $this->data['content'] = 'products/list';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function detail($id=0){
        $product = $this->model('ProductModel');
        $this->data['sub_content']['info'] =  $product->getDetail($id);
        $this->data['sub_content']['title'] =  'chi tiết sản phẩm';
        $this->data['content'] = 'products/detail';
        $this->render('layouts/admin_layout', $this->data);
    }
}
