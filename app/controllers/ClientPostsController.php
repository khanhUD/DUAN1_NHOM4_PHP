<?php

class ClientPostsController extends Controller
{

    public $posts, $data = [];

    public function __construct()
    {
        
    }

    public function index()
    {
        
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'clients/blogs';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }
}
