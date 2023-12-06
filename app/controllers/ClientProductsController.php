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

            // Bài theo loại 
            $this->data['sub_content']['products'] = $this->products->getListClientByCategory($id);

            // Show phần nav phải 
            $this->data['sub_content']['productCategories'] = $this->productCategories->getListCategoriesClient();
            $this->data['content'] = 'clients/products';
            $this->data['sub_content']['action'] = '';
            $this->render('layouts/client_layout', $this->data);
        }
    }

    public function search()
    {

        $request = new Request;
        if ($request->isGet()) {
            $postValues = $request->getFields();

            $keyword = $postValues['keyword'];

            // Bài viết theo loại 
            $this->data['sub_content']['products'] = $this->products->getListClientByKey($keyword);

            // Show phần nav phải 
            // $this->data['sub_content']['productCategories'] = $this->productCategories->getListCategoriesClient();
            // Session::data('key', "Kết quả tìm kiếm cho $keyword");
            $this->data['content'] = 'clients/search';
            $this->data['sub_content']['action'] = '';
            $this->render('layouts/client_layout', $this->data);
        }
    }

    public function productDetails()
    {
        $request = new Request;
        if ($request->isGet()) {
            $postValues = $request->getFields();

            $id = $postValues['id'];
            $categories_id = $postValues['categories_id'];
            if ($id == '') {
                $response = new Response();
                $response->redirect(_WEB_ROOT . 'ClientProducts');
            } else {

                $this->data['sub_content']['productRelated'] = $this->products->getListClientByCategory($categories_id);

                $this->data['sub_content']['productDetails'] = $this->products->getProductClientById($id);

                $this->data['sub_content']['productComments'] = $this->productComments->getProductComment($id);

                $this->data['content'] = 'clients/productDetails';
                $this->data['sub_content']['action'] = '';
                $this->render('layouts/client_layout', $this->data);
            }
        }
    }

    public function submitProductComments()
    {
        $request = new Request;
        if ($request->isPost()) {
            $postValues = $request->getFields();

            $note = $postValues['note'];
            $categories_id = $postValues['categories_id'];
            $product_id = $postValues['product_id'];
            $users_id = $postValues['users_id'];
            $status = $postValues['status'];
            $data = [
                'user_id' => $users_id,
                'product_id' => $product_id,
                'note' => $note,
                'status' => $status
            ];

            $result = $this->productComments->submitProductComment($data);

            if ($result) {
                $response = new Response();
                $response->redirect(_WEB_ROOT . 'ClientProducts/productDetails?id='.$product_id.'&categories_id='.$categories_id);
            }
        }
    }
}
