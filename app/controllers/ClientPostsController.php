<?php

class ClientPostsController extends Controller
{

    public $posts, $postCategories, $data = [];

    public function __construct()
    {
        $this->posts = $this->model('PostsModel');
        $this->postCategories = $this->model('PostCategoriesModel');
    }

    public function index()
    {

        $this->data['sub_content']['posts'] = $this->posts->getListClient();
        $this->data['sub_content']['postCategories'] = $this->postCategories->getListPostCategoriesClient();
        $this->data['content'] = 'clients/blogs';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }

    public function posts()
    {
        $request = new Request;
        if ($request->isGet()) {
            $postValues = $request->getFields();

            $id = $postValues['id'];

            $this->data['sub_content']['posts'] = $this->posts->getListClientByCategory($id);
            $this->data['sub_content']['postCategories'] = $this->postCategories->getListPostCategoriesClient();
            $this->data['content'] = 'clients/blogs';
            $this->data['sub_content']['action'] = '';
            $this->render('layouts/client_layout', $this->data);
        }
    }

    public function postDetails()
    {

        $this->data['sub_content']['title'] = '';
        $this->data['content'] = 'clients/blogsDetail';
        $this->data['sub_content']['action'] = '';
        $this->render('layouts/client_layout', $this->data);
    }
}
