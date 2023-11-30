<?php

class ProductCategoriesController extends Controller {
    public $data = [];
    public function add() {
        $request = new Request;
        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'admin/productCategories/add';
        $this->render('layouts/admin_layout', $this->data);
        
        if($request->isPost()) {
            $postValues = $request->getFields();
            var_dump($postValues);
        }
    }
}