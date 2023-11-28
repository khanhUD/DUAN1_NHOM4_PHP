<?php

class ProfileController extends Controller {
    public $data = [];
    public function index() {
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/profile/profile';
        $this->render('layouts/admin_layout', $this->data);
    }
}