<?php

class ClientAboutUsController extends Controller
{

    public $aboutUs, $data = [];

    public function __construct()
    {
        
    }

    public function aboutUs()
    {
        
        // $this->data['sub_content']['aboutUs'] = $this->aboutUs->getListCategories();
        $this->data['sub_content']['title'] = 'Danh Sách Danh Mục';
        $this->data['content'] = 'clients/about';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }
}
