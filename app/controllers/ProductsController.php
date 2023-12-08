<?php

class ProductsController extends Controller
{
    public $data = [], $products, $productCategories;
    public function __construct()
    {
        $this->productCategories = $this->model('ProductCategoriesModel');
        $this->products = $this->model('ProductsModel');
    }

    public function index()
    {

        $this->data['sub_content']['productCategories'] = $this->productCategories->getList();
        $this->data['sub_content']['products'] = $this->products->getList();
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/products/add';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function add()
    {
        $request = new Request;
        if ($request->isPost()) {
            $request->rules([
                'name' => 'unique:products:name'
            ]);

            $request->messages([
                'name.unique' => 'đã ton taio'
            ]);

            $validate = $request->validate();

            if (!$validate) {
                Session::flash('msg', 'Tên đã tồn tại, vui lòng nhập tên mới');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response  = new Response();
                $response->redirect(_WEB_ROOT .'products');
            }
            $postValues = $request->getFields();

            $image = $postValues['image'];
            $targetDir = "public/uploads/";
            $targetFile = $targetDir . basename($image["name"]);
            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                echo "Tệp " . basename($image["name"]) . " đã được tải lên thành công.";
            } else {
                // echo "Có lỗi xảy ra khi tải lên tệp.";
            }

            $data = [
                'product_categories_id' => $postValues['product_categories_id'], // Sửa đổi tên trường này
                'title' => $postValues['title'],
                'image' => $postValues['image']['name'],
                'name' => $postValues['name'],
                'price' => $postValues['price'],
                'short_description' => $postValues['short_description'],
                'description' => $postValues['description'],
            ];
            $result = $this->products->addProducts($data);

            if ($result) {
                Session::flash('msg', 'Thêm sản phẩm thành công !');
                $response = new Response();
                $response->redirect(_WEB_ROOT .'products');
            }
        }
    }
    public function list_hidden()
    {
        $this->data['sub_content']['list_hidden'] = $this->products->getListHidden();
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/products/list_hidden';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function updateProducts()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $data = [
            'status' => $postValues['status'],
        ];
        $result = $this->products->updateProducts($data, $id);
        if ($result) {
            $response = new Response();
            $response->redirect(_WEB_ROOT .'products');
        }
    }
    public function hidden()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $data = [
            'status' => 'delate'
        ];
        $result = $this->products->updateProducts($data, $id);

        if ($result) {
            $response = new Response();
            $response->redirect(_WEB_ROOT .'products');
        }
    }
    public function edit()
    {
        $request = new Request;
        $id = $request->getFields()['id'];
        $this->data['sub_content']['productCategories'] = $this->productCategories->getList();
        $this->data['sub_content']['products'] = $this->products->getDetail($id);
        $this->data['content'] = 'admin/products/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function edit_post()
    {
        $request = new Request;

        $postValues = $request->getFields(); //layid
        $id = $postValues['id'];
        $request->rules([
            'name' => 'unique:products:name'
        ]);

        $request->messages([
            'name.unique' => 'đã ton taio'
        ]);

        $validate = $request->validate();

        if (!$validate) {
            Session::flash('msg', 'Tên đã tồn tại, vui lòng nhập tên mới');
            Session::flash('errors', $request->errors());
            Session::flash('old', $request->getFields());

            $response  = new Response();
            $response->redirect(_WEB_ROOT .'products/edit?id=' . $id);
        }
        $data = [
            'image' => $postValues['imageOld'],
            'product_category_id' => $postValues['product_categories_id'], // Sửa đổi tên trường này
            'title' => $postValues['title'],
            'name' => $postValues['name'],
            'price' => $postValues['price'],
            'short_description' => $postValues['short_description'],
            'description' => $postValues['description'],
        ];
        $image = $postValues['image'];
        $targetDir = "public/uploads/";
        $targetFile = $targetDir . basename($image["name"]);

        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            echo "Tệp " . basename($image["name"]) . " đã được tải lên thành công.";
            $data['image'] = $postValues['image']['name'];
        } else {
            // Ảnh cũ đã tồn tại, sử dụng ảnh cũ
            $data['image'] = $postValues['imageOld'];
            echo "Có lỗi xảy ra khi tải lên tệp.";
        }

        $result = $this->products->updateProducts($data, $id);

        if ($result) {
            Session::flash('msg', 'Sửa thành công !');
            $response = new Response();
            $response->redirect(_WEB_ROOT .'products');
        }
    }
}
