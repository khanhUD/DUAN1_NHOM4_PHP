<?php

class PostCommentsController extends Controller
{

    public $data = [], $postComments;

    public function __construct()
    {
        $this->postComments = $this->model('PostCommentsModel');
    }

    public function listComments()
    {
        $request = new Request;
        $this->data['sub_content']['postComments'] = $this->postComments->getComments(); 
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/postComments/listComments';
        $this->render('layouts/admin_layout', $this->data);
        
    
    }

    public function commentDetails()
    {
        $request = new Request;
        $postValues = $request->getFields();
        $id = $postValues['id'];
        $this->data['sub_content']['commentDetails'] = $this->postComments->getCommentDetails($id); 
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/postComments/commentDetails';
        $this->render('layouts/admin_layout', $this->data);
    
    }
  
    
}
