<?php

class ProductCategoriesController extends Controller
{

    public $data = [], $productCategories, $err;

    public function __construct()
    {
        $this->productCategories = $this->model('ProductCategoriesModel');
    }

    // file mặc định thêm loại 
    public function add()
    {
        $this->data['sub_content']['productCategories'] = $this->productCategories->getList(); //lay danh sach banner
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/productCategories/add';
        $this->render('layouts/admin_layout', $this->data);
        $request = new Request;
        if ($request->isPost()) {
            $postValues = $request->getFields();

            $data = [
                'name' => $postValues['name'],
            ];
            $result = $this->productCategories->addProductCategories($data);
            if ($result) {
                $response = new Response();
                $response->redirect('productCategories');
            }
        }
    }

    // show thông tin loại cần sửa 
    public function edit()
    {
        $request = new Request;
        $id = $request->getFields()['id'];
        $this->data['sub_content']['productCategories_detail'] = $this->productCategories->getDetail($id);
        $this->data['content'] = 'admin/productCategories/edit';
        $this->render('layouts/admin_layout', $this->data);
    }

    // update loại món ăn
    public function edit_post()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $name = $postValues['name'];

        $data = [
            'name' => $postValues['name'],
            'status' => $postValues['status'],
        ];

        $result = $this->productCategories->updateProductCategories($data, $id);

        if ($result) {
            // Nếu thành công chuyển hướng đến danh sách danh mục
            $response = new Response();
            $response->redirect('ProductCategories/add');
        }
    }
}
