<?php

class PostCategoriesController extends Controller
{

    public $data = [], $postCategories;

    public function __construct()
    {
        $this->postCategories = $this->model('PostCategoriesModel');
    }

    public function index()
    {
        $this->data['sub_content']['postCategories'] = $this->postCategories->getList(); //lay danh sach postCategories

        $this->data['sub_content']['title'] = 'Thêm Loại bài viết';
        $this->data['content'] = 'admin/postCategories/add';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function add()
    {
        $this->data['sub_content']['postCategories'] = $this->postCategories->getList(); 
        $request = new Request;
        $request->rules([
            'name' => 'unique:post_categories:name'
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
            $response->redirect(_WEB_ROOT .'postCategories');
        }
        $postValues = $request->getFields(); //layid
        $id = $postValues['id'];
        $data = [
            'name' => $postValues['name'],
        ];
        $result = $this->postCategories->addPostCategories($data, $id);

        if ($result) {
            Session::flash('msg', 'Thêm thành công !');
            $response = new Response();
            $response->redirect(_WEB_ROOT .'postCategories');
        }
    }
    public function edit()
    {
        $request = new Request;
        $id = $request->getFields()['id'];
        $this->data['sub_content']['postCategories_detail'] = $this->postCategories->getDetail($id);
        $this->data['content'] = 'admin/postCategories/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
    // update postCategories 
    public function edit_post()
    {
        $request = new Request;

        $postValues = $request->getFields(); //layid
        $id = $postValues['id'];
        $request->rules([
            'name' => 'unique:post_categories:name'
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
            $response->redirect(_WEB_ROOT .'postCategories/edit?id=' . $id);
        }
        $data = [
            'name' => $postValues['name'],
            'status' => $postValues['status'],
        ];
        $result = $this->postCategories->updatePostCategories($data, $id);

        if ($result) {
            Session::flash('msg', 'Sửa thành công !');
            $response = new Response();
            $response->redirect(_WEB_ROOT .'postCategories');
        }
    }
    public function delete()
    {
        $request = new Request;
        $id = $request->getFields()['id'];
        $productCount = $this->postCategories->getPostCountByCategoryId($id);
        if ($productCount > 0) {
            Session::flash('msg', 'Loại bài viết có chứa bài viết, không thể xóa !');
            $response = new Response();
            $response->redirect(_WEB_ROOT .'postCategories');
        } else {
            $result = $this->postCategories->deletePostCategories($id);
            if ($result) {
                $response = new Response();
                $response->redirect(_WEB_ROOT .'postCategories/add');
            }
        }
    }
}
