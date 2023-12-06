<?php

class ContactsController extends Controller
{
    public $data = [], $contacts;
    public function __construct()
    {
        $this->contacts = $this->model('ContactsModel');
    }
    public function index()
    {
        $this->data['sub_content']['contacts'] = $this->contacts->getList();
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/contacts/list';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function edit_status(){
        $request = new Request;
        $postValues = $request->getFields(); 
        $id = $postValues['id'];//layid
        $data = [
            'status' => $postValues['status'],
        ];
        $result = $this->contacts->updateStatus($data, $id);

        if ($result) {
            // Nếu thành công chuyển hướng đến danh sách danh mục
            $response = new Response();
            $response->redirect(_WEB_ROOT .'Contacts');
        }
    }
    public function delete()
    {
        $request = new Request;
        if ($request->isPost()) {
            $id = $request->getFields()['id'];
            $this->contacts->deleteContacts($id);
            $response = new Response;
            $response->redirect('contacts');
        }
    }
}
