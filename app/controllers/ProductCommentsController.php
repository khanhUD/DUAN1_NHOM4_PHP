<?php

class ProductCommentsController extends Controller
{

    public $data = [], $productComments, $err;

    public function __construct()
    {
        $this->productComments = $this->model('ProductCommentsModel');
    }

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
    public function deleteComments()
    {
        $request = new Request;
        if ($request->isPost()) {
            $id = $request->getFields()['id'];
            $this->productComments->deleteCommentDetails($id);
            $response = new Response;
            $response->redirect(_WEB_ROOT .'postComments');
        }
    }
}
