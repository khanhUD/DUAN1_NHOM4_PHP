<?php

class ProductCommentsController extends Controller
{

    public $data = [], $productComments, $err;

    public function __construct()
    {
        $this->productComments = $this->model('ProductCommentsModel');
    }

    // file mặc định thêm loại 
    public function listComments()
    {
        $request = new Request;
        $this->data['sub_content']['productComments'] = $this->productComments->getComments(); 
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/productComments/listComments';
        $this->render('layouts/admin_layout', $this->data);
        
    
    }

    public function commentDetails()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $this->data['sub_content']['commentDetails'] = $this->productComments->getCommentDetails($id); 
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/productComments/commentDetails';
        $this->render('layouts/admin_layout', $this->data);
        
    
    }

   

    // update loại món ăn
    // public function edit_post()
    // {
    //     $request = new Request;
    //     $postValues = $request->getFields();
    //     $id = $postValues['id'];
    //     $name = $postValues['name'];


    //     $data = [
    //         'name' => $postValues['name'],
    //         'status' => $postValues['status'],
    //     ];

    //     $result = $this->productCategories->updateProductCategories($data, $id);

    //     if ($result) {
    //         // Nếu thành công chuyển hướng đến danh sách danh mục
    //         $response = new Response();
    //         $response->redirect('ProductCategories/add');
    //     }
    // }
}
