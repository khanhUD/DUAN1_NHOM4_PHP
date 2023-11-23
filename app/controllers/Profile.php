
<?php
class Profile extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  'Thêm tài khoản';
        $this->data['content'] = 'admin/profile/profile';
        $this->render('layouts/admin_layout', $this->data);
    }

 
}
