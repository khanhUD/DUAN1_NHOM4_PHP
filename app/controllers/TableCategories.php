<?php
class TableCategories extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  '';
        $this->data['content'] = 'admin/table-categories/add';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function edit()
    {
        $this->data['sub_content']['title'] =  '';
        // render view 
        $this->data['content'] = 'admin/table-categories/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
    
  
}
