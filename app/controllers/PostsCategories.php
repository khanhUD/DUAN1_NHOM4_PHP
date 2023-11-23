
<?php
class PostsCategories extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  'Thêm loại bài viết';
        $this->data['content'] = 'admin/PostsCategories/add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function edit()
    {

        $this->data['sub_content']['title'] =  'Sửa loại bài viết';
        $this->data['content'] = 'admin/PostsCategories/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
}
