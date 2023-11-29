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
        $postValues = $request->getFields(); //layid
        $id = $postValues['id'];
        $data = [
            'name' => $postValues['name'],
        ];
        $result = $this->postCategories->addPostCategories($data, $id);

        if ($result) {
            // Nếu thành công chuyển hướng đến danh sách danh mục
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
        $data = [
            'name' => $postValues['name'],
            'status' => $postValues['status'],
        ];
        $result = $this->postCategories->updatePostCategories($data, $id);

        if ($result) {
            // Nếu thành công chuyển hướng đến danh sách danh mục
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
