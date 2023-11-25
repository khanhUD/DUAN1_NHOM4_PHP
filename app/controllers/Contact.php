<?php
class Contact extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  '';
        $this->data['content'] = 'admin/contact/list';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function detail()
    {
        $this->data['sub_content']['title'] =  '';
        // render view 
        $this->data['content'] = 'admin/contact/detail';
        $this->render('layouts/admin_layout', $this->data);
    }
    
  
}
