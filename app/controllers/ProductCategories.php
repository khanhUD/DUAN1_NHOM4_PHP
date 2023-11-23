<?php
class ProductCategories extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  '';
        $this->data['content'] = 'admin/product-categories/add';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function edit()
    {
        $this->data['sub_content']['title'] =  '';
        // render view 
        $this->data['content'] = 'admin/product-categories/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
    
  
}
