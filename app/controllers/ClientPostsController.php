<?php

class ClientPostsController extends Controller
{

    public $posts, $postCategories, $postComments, $data = [];

    public function __construct()
    {
        $this->posts = $this->model('PostsModel');
        $this->postCategories = $this->model('PostCategoriesModel');
        $this->postComments = $this->model('PostCommentsModel');
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

            // Bài viết theo loại 
            $this->data['sub_content']['posts'] = $this->posts->getListClientByCategory($id);

            // Show phần nav phải 
            $this->data['sub_content']['postCategories'] = $this->postCategories->getListPostCategoriesClient();
            $this->data['content'] = 'clients/blogs';
            $this->data['sub_content']['action'] = '';
            $this->render('layouts/client_layout', $this->data);
        }
    }

    public function postDetails()
    {
        $request = new Request;
        if ($request->isGet()) {
            $postValues = $request->getFields();

            $id = $postValues['id'];
            if ($id == '') {
                $response = new Response();
                $response->redirect(_WEB_ROOT . 'ClientPosts');
            } else {

                // Bài viết chi tiết 
                $this->data['sub_content']['postDetails'] = $this->posts->getPostDetailById($id);

                // show phần nav phải 
                // danh mục bài viết 
                $this->data['sub_content']['postCategories'] = $this->postCategories->getListPostCategoriesClient();
                $this->data['sub_content']['postTop5'] = $this->posts->getPostTop5();

                // hiển thị bình luận 
                $this->data['sub_content']['postComments'] = $this->postComments->getPostComment($id);
                $this->data['content'] = 'clients/blogsDetail';
                $this->data['sub_content']['action'] = '';
                $this->render('layouts/client_layout', $this->data);
            }
        }
    }

    public function submitPostComments()
    {
        $request = new Request;
        if ($request->isPost()) {
            $postValues = $request->getFields();

            $note = $postValues['note'];
            $posts_id = $postValues['posts_id'];
            $users_id = $postValues['users_id'];
            $status = $postValues['status'];
            $data = [
                'post_id' => $posts_id,
                'user_id' => $users_id,
                'note' => $note,
                'status' => $status
            ];

            $result = $this->postComments->submitPostComment($data);

            if ($result) {
                $response = new Response();
                $response->redirect(_WEB_ROOT . 'Bai-Viet/postDetails?id='.$posts_id);
            }
        }
    }
}
