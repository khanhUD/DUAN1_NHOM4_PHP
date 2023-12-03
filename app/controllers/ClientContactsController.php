<?php

class ClientContactsController extends Controller
{

    public $contacts, $data = [];

    public function __construct()
    {
        
    }

    public function index()
    {
        
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'clients/contact';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }
}
