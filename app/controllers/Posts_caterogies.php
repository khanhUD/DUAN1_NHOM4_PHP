
<?php
class Posts_caterogies extends Controller

{
    public $data = [];
    public function index()
    {
        $this->data['sub_content']['title'] =  'chi tiết sản phẩm';
        $this->data['content'] = 'admin/posts_categories/add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function edit($id = 0)
    {

        $this->data['sub_content']['title'] =  'chi tiết sản phẩm';
        $this->data['content'] = 'admin/posts_categories/edit';
        $this->render('layouts/admin_layout', $this->data);
    }
}
