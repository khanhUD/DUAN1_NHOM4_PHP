<?php

class ContactsController extends Controller {
    public $data = [];
    public function index() {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/contacts/list';
        $this->render('layouts/admin_layout', $this->data);
    }
}