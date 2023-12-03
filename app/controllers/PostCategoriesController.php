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
        $this->data['sub_content']['postCategories'] = $this->postCategories->getList();  //lay danh sach postCategories

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
            $response->redirect('postCategories');
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
            $response->redirect('postCategories');
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
            $response->redirect('postCategories/edit?id=' . $id);
        }
        $data = [
            'name' => $postValues['name'],
            'status' => $postValues['status'],
        ];
        $result = $this->postCategories->updatePostCategories($data, $id);

        if ($result) {
            Session::flash('msg', 'Sửa thành công !');
            $response = new Response();
            $response->redirect('postCategories');
        }
    }
    public function delete()
    {
        $request = new Request;
        if ($request->isPost()) {
            $id = $request->getFields()['id'];
            $this->postCategories->deletepostCategories($id);
            $response = new Response;
            $response->redirect('postCategories');
        }
    }
}
