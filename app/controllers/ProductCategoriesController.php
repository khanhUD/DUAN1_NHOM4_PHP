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
            $request->rules([
                'name' => 'unique:product_categories:name'
            ]);

            $request->messages([
                'name.unique' => 'đã ton taio'
            ]);

            $validate = $request->validate();

            if (!$validate) {
                Session::flash('msg', 'Tên loại đã tồn tại, vui lòng nhập tên loại mới');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response  = new Response();
                $response->redirect(_WEB_ROOT .'productCategories');
            }
            $postValues = $request->getFields();

            $data = [
                'name' => $postValues['name'],
            ];
            $result = $this->productCategories->addProductCategories($data);
            if ($result) {
                Session::flash('msg', 'Thêm thành công !');
                $response = new Response();
                $response->redirect(_WEB_ROOT .'productCategories');
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
        $request->rules([
            'name' => 'unique:product_categories:name'
        ]);

        $request->messages([
            'name.unique' => 'đã ton taio'
        ]);

        $validate = $request->validate();

        if (!$validate) {
            Session::flash('msg', 'Tên loại đã tồn tại, vui lòng nhập tên loại mới');
            Session::flash('errors', $request->errors());
            Session::flash('old', $request->getFields());

            $response  = new Response();
            $response->redirect(_WEB_ROOT .'productCategories/edit?id='.$id);
        }
        $data = [
            'name' => $postValues['name'],
            'status' => $postValues['status'],
        ];

        $result = $this->productCategories->updateProductCategories($data, $id);

        if ($result) {
            Session::flash('msg', 'Sửa thành công !');
            $response = new Response();
            $response->redirect(_WEB_ROOT .'ProductCategories/add');
        }
    }
}
