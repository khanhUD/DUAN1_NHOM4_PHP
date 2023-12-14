<?php

class ClientContactsController extends Controller
{

    public $contacts, $data = [];

    public function __construct()
    {
        $this->contacts = $this->model('ContactsModel');
    }

    public function index()
    {

        $this->data['sub_content']['title'] = 'Hello';
        $this->data['content'] = 'clients/contact';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }

    public function postForm()
    {

        $request = new Request;

        if ($request->isPost()) {

            $postValues = $request->getFields();
            $data = [
                'full_name' => $postValues['full_name'],
                'phone' => $postValues['phone'],
                'email' => $postValues['email'],
                'note' => $postValues['note'],
                
            ];

            $result = $this->contacts->insertContacts($data);

            if($result){
                $response = new Response();
                $response->redirect(_WEB_ROOT .'ClientContacts');
                
            }
        }
    }
}
