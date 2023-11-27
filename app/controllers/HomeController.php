<?php

class HomeController extends Controller {
    public $data = [];
    public function index() {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/home/dashboard';
        $this->render('layouts/admin_layout', $this->data);
    }
}