<?php

class ClientAboutUsController extends Controller
{

    public $aboutUs, $data = [];

    public function __construct()
    {
        
    }

    public function index()
    {
        
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'clients/about';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }
}